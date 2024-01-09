<?php
/**
 * affstream functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package affstream
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.2.9' );
}
function generateId( $name ): string {
	return '_id' . rand( 9999, 99999 ) . time() . $name;
}

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( array(
		'page_title' => 'Option page',
		'menu_title' => 'Option page',
		'menu_slug'  => 'site-options',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}
//function custom_image_sizes() {
//
////	$image_sizes = get_intermediate_image_sizes();
////	foreach ($image_sizes as $size) {
////		$size_info = wp_get_additional_image_sizes()[$size];
////		echo 'Розмір: ' . $size . '<br>';
////		echo 'Ширина: ' . $size_info['width'] . '<br>';
////		echo 'Висота: ' . $size_info['height'] . '<br>';
////		echo 'Обрізка: ' . $size_info['crop'] . '<br>';
////		echo '<br>';
////	}
//}
//
//add_action( 'after_setup_theme', 'custom_image_sizes' );


function theme_register_menus() {
	register_nav_menus(
		array(
			'menu-header'       => esc_html__( 'Header Menu', 'affstream' ),
			'menu-footer'       => esc_html__( 'Footer Menu', 'affstream' ),
			'media-menu-header' => esc_html__( 'Media Header Menu', 'affstream' ),
			' '                 => esc_html__( 'Media Footer Menu', 'affstream' ),
		)
	);
}

add_action( 'after_setup_theme', 'theme_register_menus' );
function affstream_setup() {
	load_theme_textdomain( 'affstream', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'affstream_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

add_action( 'after_setup_theme', 'affstream_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function affstream_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'affstream_content_width', 640 );
}

add_action( 'after_setup_theme', 'affstream_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function affstream_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'affstream' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'affstream' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

function registration_pages() {
	return is_page_template( 'register-page.php' ) || is_page_template( 'restore-password-page.php' ) || is_page_template( 'resetpassword-page.php' ) || is_page_template( 'login-page.php' );
}

add_action( 'widgets_init', 'affstream_widgets_init' );
function affstream_scripts() {
	if ( registration_pages() || is_page_template( 'for-advartiser-page.php' ) ) {
		wp_enqueue_style( 'affstream-materialize', get_template_directory_uri() . '/styles/materialize.css', array(), _S_VERSION );
		wp_enqueue_style( 'affstream-register', get_template_directory_uri() . '/styles/registration/registration.css', array(), _S_VERSION );

	}

	wp_enqueue_style( 'affstream-main', get_template_directory_uri() . '/styles/main.css', null, _S_VERSION );
	wp_enqueue_style( 'affstream-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
		_S_VERSION );
	wp_enqueue_style( 'affstream-wow-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
		_S_VERSION );
	wp_enqueue_script( 'affstream-wow-js', get_template_directory_uri() . '/js/wow.js', _S_VERSION, );
	wp_enqueue_script( 'affstream-utm', get_template_directory_uri() . '/js/utm-parameters.js', _S_VERSION, );
	wp_enqueue_script( 'affstream-recaptcha', 'https://www.google.com/recaptcha/api.js', _S_VERSION, );

	wp_enqueue_script( 'affstream-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
		_S_VERSION );

	wp_enqueue_script( 'affstream-requests', get_stylesheet_directory_uri() . '/js/requests.js', array( 'jquery' ),
		_S_VERSION, false );

	if ( ! is_front_page() && ! registration_pages() ) {
		wp_enqueue_style( 'affstream-media', get_template_directory_uri() . '/styles/media.css', null, _S_VERSION );
	}

	$manifest = json_decode( file_get_contents( __DIR__ . '/dist/manifest.json' ), true );

	wp_enqueue_script( 'main111111js',
		get_template_directory_uri() . '/dist/' . $manifest['src/js/main.js']['file'], array(), _S_VERSION,
		true );
}

add_action( 'wp_enqueue_scripts', 'affstream_scripts' );

function disable_specific_scripts() {
	if ( ! is_admin() ) {
		wp_dequeue_script( 'react-dom' );
		wp_deregister_script( 'react-dom' );

		wp_dequeue_script( 'blocks' );
		wp_deregister_script( 'blocks' );

		wp_dequeue_script( 'editor' );
		wp_deregister_script( 'editor' );

	}
}

add_action( 'wp_enqueue_scripts', 'disable_specific_scripts' );


function my_enqueue_scripts() {
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/', array( 'jquery' ), '1.0',
		true );
	wp_localize_script( 'my-script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts' );
add_action( 'wp_ajax_load_post_data', 'load_post_data' );
add_action( 'wp_ajax_nopriv_load_post_data', 'load_post_data' );
include_once( get_template_directory() . '/blocks/post-slider/index.php' );
include_once( get_template_directory() . '/blocks/media-intro/index.php' );
include_once( get_template_directory() . '/blocks/affstream-contacts/index.php' );
include_once( get_template_directory() . '/blocks/media-from-ukraine/index.php' );
include_once( get_template_directory() . '/blocks/recent-posts/index.php' );
include_once( get_template_directory() . '/blocks/posts-by-category/index.php' );
include_once( get_template_directory() . '/blocks/popular-post/index.php' );
include_once( get_template_directory() . '/blocks/affstream-services/index.php' );
//include_once( get_template_directory() . '/blocks/affstream-quote/index.php' );


function get_custom_categories( $post_id, $tax_name ) {
	$categories = wp_get_post_terms( 1356, 'reviews-category' );
	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		return $categories;
	} else {
		return array();
	}
}

function estimated_reading_time() {
	$content          = get_post_field( 'post_content', get_the_ID() );
	$word_count       = str_word_count( strip_tags( $content ) );
	$words_per_minute = 200;
	$reading_time     = ceil( $word_count / $words_per_minute );
	return $reading_time;
}

function getTaxonomyNameByPostType( $postType ) {
	if ( $postType === 'university' ) {
		return 'university-category';
	}
	if ( $postType === 'reviews' ) {
		return 'reviews-categories';
	}
}

;

function getFieldByPostType( $postType ) {
	if ( $postType == 'university' ) {
		return 'university_category';
	} elseif ( $postType === 'reviews' ) {
		return 'reviews_category';
	}
}

function media_trim_title( $title, $max_chars ) {
	$trimmed_title = mb_strimwidth( $title, 0, $max_chars, '...' );

	return $trimmed_title;
}

function custom_trim_excerpt( $text, $length = 80, $ellipsis = '...' ) {
	if ( mb_strlen( $text ) > $length ) {
		$text = mb_substr( $text, 0, $length );
		$text = rtrim( $text, " \t\n\r\0\x0B" );
		$text .= $ellipsis;
	}

	return $text;
}


function render_rating_block( $rating_title, $rating_value, $rating_average ) {
	?>
    <div class="rating-container">
        <span class="rating-title"><?php echo esc_html( $rating_title ); ?>:</span>
		<?php
		if ( $rating_value ):
			?>
            <div class="rating">
				<?php
				for ( $i = 0; $i < 5; $i ++ ) {
					$active_class = ( $i < $rating_value ) ? ' active' : '';
					$star_class   = ( $i < $rating_value ) ? 'bxs-star' : 'bx-star';
					echo '<i class="bx ' . $star_class . ' star' . $active_class . '" style="--i: 1;"></i>';
				}
				?>
            </div>
		<?php
		endif;
		if ( $rating_average ) {
			?>
            <div class="rating-number"><?= $rating_average ?>
            </div>        <?php
		}
		?>
    </div>
	<?php
}



function my_first_block_enqueue() {
	wp_enqueue_script(
		'my-first-block',
		get_template_directory_uri() . '/blocks/affstream-quote/scripts.js',
		array('wp-blocks', 'wp-i18n', 'wp-element'),
		true
	);
}
add_action('enqueue_block_editor_assets', 'my_first_block_enqueue');



function get_ratings_for_post( $post_id ) {
	$comments = get_comments(
		array(
			'post_id' => $post_id,
			'status'  => 'approve',
		) );

	$total_rating   = 0;
	$total_comments = count( $comments );

	$field_ratings = array(
		'support'   => 0,
		'quality'   => 0,
		'interface' => 0,
		'price'     => 0,
	);

	foreach ( $comments as $comment ) {
		$support_rating   = (float) get_comment_meta( $comment->comment_ID, 'rating_container-1', true );
		$quality_rating   = (float) get_comment_meta( $comment->comment_ID, 'rating_container-2', true );
		$interface_rating = (float) get_comment_meta( $comment->comment_ID, 'rating_container-3', true );
		$price_rating     = (float) get_comment_meta( $comment->comment_ID, 'rating_container-4', true );

		if ( is_numeric( $support_rating ) && is_numeric( $quality_rating ) && is_numeric( $interface_rating ) && is_numeric( $price_rating ) ) {
			$average_rating             = ( $support_rating + $quality_rating + $interface_rating + $price_rating ) / 4;
			$total_rating               += $average_rating;
			$field_ratings['support']   += $support_rating;
			$field_ratings['quality']   += $quality_rating;
			$field_ratings['interface'] += $interface_rating;
			$field_ratings['price']     += $price_rating;
		}
	}

	$result = array(
		'total_rating'   => $total_rating,
		'total_comments' => $total_comments,
		'average_rating' => ( $total_comments > 0 ) ? ( $total_rating / $total_comments ) : 0,
		'field_ratings'  => $field_ratings,
	);

	return $result;
}

function get_average_ratings_for_post( $post_id ) {
	$ratings        = get_ratings_for_post( $post_id );
	$total_comments = $ratings['total_comments'];

	if ( $total_comments > 0 ) {
		$average_support   = ( $ratings['field_ratings']['support'] / $total_comments );
		$average_quality   = ( $ratings['field_ratings']['quality'] / $total_comments );
		$average_interface = ( $ratings['field_ratings']['interface'] / $total_comments );
		$average_price     = ( $ratings['field_ratings']['price'] / $total_comments );

		$average_ratings = array(
			'support'   => $average_support,
			'quality'   => $average_quality,
			'interface' => $average_interface,
			'price'     => $average_price,
		);

		return $average_ratings;
	} else {
		return array(
			'support'   => 0,
			'quality'   => 0,
			'interface' => 0,
			'price'     => 0,
		);
	}
}


function save_comment_rating_meta( $comment_id ) {
	for ( $i = 1; $i <= 4; $i ++ ) {
		$rating_key = 'rating_container-' . $i;
		if ( isset( $_POST[ $rating_key ] ) ) {
			$rating_value = absint( $_POST[ $rating_key ] );
			update_comment_meta( $comment_id, $rating_key, $rating_value );
		}
	}
}

add_action( 'comment_post', 'save_comment_rating_meta' );

function add_rating_fields_to_comment_form(): string {
	ob_start();
	$rating_names = array( 'Support', 'Quality', 'Interface', 'Price' );
	?>
    <div class="rating-container" id="rating-container">
		<?php for ( $i = 1; $i <= 4; $i ++ ) : ?>
            <div class="comment-form-rating">
                <p class="rating-name"> <?= $rating_names[ $i - 1 ] ?> </p>
                <div class="form-rating-item affstream-rating" data-rating="0" id="<?= 'rating_' . $i ?>">
                    <span class="bx  star" data-value="1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M8.86314 2.6879C9.08754 2.18444 9.19979 1.93272 9.35605 1.8552C9.49176 1.78785 9.65112 1.78785 9.78682 1.8552C9.94308 1.93272 10.0553 2.18444 10.2797 2.6879L12.0672 6.69798C12.1336 6.84681 12.1667 6.92123 12.2181 6.97822C12.2635 7.02864 12.319 7.06897 12.381 7.09658C12.451 7.12779 12.5321 7.13634 12.6942 7.15344L17.0603 7.61428C17.6085 7.67213 17.8825 7.70105 18.0046 7.8257C18.1105 7.93396 18.1598 8.08557 18.1377 8.23547C18.1123 8.40801 17.9075 8.59247 17.4981 8.9615L14.2366 11.9007C14.1156 12.0098 14.055 12.0643 14.0167 12.1307C13.9828 12.1896 13.9616 12.2548 13.9545 12.3223C13.9464 12.3986 13.9633 12.4783 13.9971 12.6377L14.9081 16.9326C15.0225 17.4718 15.0797 17.7414 14.9989 17.8959C14.9286 18.0302 14.7997 18.1239 14.6503 18.1492C14.4783 18.1783 14.2396 18.0406 13.7621 17.7652L9.95888 15.5716C9.81775 15.4902 9.74718 15.4496 9.67215 15.4336C9.60575 15.4195 9.53712 15.4195 9.47072 15.4336C9.3957 15.4496 9.32513 15.4902 9.18399 15.5716L5.38082 17.7652C4.90334 18.0406 4.6646 18.1783 4.49263 18.1492C4.34325 18.1239 4.21429 18.0302 4.14407 17.8959C4.06324 17.7414 4.12042 17.4718 4.23479 16.9326L5.14573 12.6377C5.17954 12.4783 5.19645 12.3986 5.18842 12.3223C5.18132 12.2548 5.16012 12.1896 5.12619 12.1307C5.08785 12.0643 5.02733 12.0098 4.90629 11.9007L1.64484 8.9615C1.23538 8.59247 1.03064 8.40801 1.00519 8.23547C0.983089 8.08557 1.03234 7.93396 1.13833 7.8257C1.26035 7.70105 1.53443 7.67213 2.08259 7.61428L6.44877 7.15344C6.61082 7.13634 6.69184 7.12779 6.7619 7.09658C6.82389 7.06897 6.87939 7.02864 6.92482 6.97822C6.97614 6.92123 7.00931 6.84681 7.07567 6.69798L8.86314 2.6879Z"
                              stroke="#0C62FD" stroke-width="1.81372" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="bx  star" data-value="2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M8.86314 2.6879C9.08754 2.18444 9.19979 1.93272 9.35605 1.8552C9.49176 1.78785 9.65112 1.78785 9.78682 1.8552C9.94308 1.93272 10.0553 2.18444 10.2797 2.6879L12.0672 6.69798C12.1336 6.84681 12.1667 6.92123 12.2181 6.97822C12.2635 7.02864 12.319 7.06897 12.381 7.09658C12.451 7.12779 12.5321 7.13634 12.6942 7.15344L17.0603 7.61428C17.6085 7.67213 17.8825 7.70105 18.0046 7.8257C18.1105 7.93396 18.1598 8.08557 18.1377 8.23547C18.1123 8.40801 17.9075 8.59247 17.4981 8.9615L14.2366 11.9007C14.1156 12.0098 14.055 12.0643 14.0167 12.1307C13.9828 12.1896 13.9616 12.2548 13.9545 12.3223C13.9464 12.3986 13.9633 12.4783 13.9971 12.6377L14.9081 16.9326C15.0225 17.4718 15.0797 17.7414 14.9989 17.8959C14.9286 18.0302 14.7997 18.1239 14.6503 18.1492C14.4783 18.1783 14.2396 18.0406 13.7621 17.7652L9.95888 15.5716C9.81775 15.4902 9.74718 15.4496 9.67215 15.4336C9.60575 15.4195 9.53712 15.4195 9.47072 15.4336C9.3957 15.4496 9.32513 15.4902 9.18399 15.5716L5.38082 17.7652C4.90334 18.0406 4.6646 18.1783 4.49263 18.1492C4.34325 18.1239 4.21429 18.0302 4.14407 17.8959C4.06324 17.7414 4.12042 17.4718 4.23479 16.9326L5.14573 12.6377C5.17954 12.4783 5.19645 12.3986 5.18842 12.3223C5.18132 12.2548 5.16012 12.1896 5.12619 12.1307C5.08785 12.0643 5.02733 12.0098 4.90629 11.9007L1.64484 8.9615C1.23538 8.59247 1.03064 8.40801 1.00519 8.23547C0.983089 8.08557 1.03234 7.93396 1.13833 7.8257C1.26035 7.70105 1.53443 7.67213 2.08259 7.61428L6.44877 7.15344C6.61082 7.13634 6.69184 7.12779 6.7619 7.09658C6.82389 7.06897 6.87939 7.02864 6.92482 6.97822C6.97614 6.92123 7.00931 6.84681 7.07567 6.69798L8.86314 2.6879Z"
                              stroke="#0C62FD" stroke-width="1.81372" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="bx  star" data-value="3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M8.86314 2.6879C9.08754 2.18444 9.19979 1.93272 9.35605 1.8552C9.49176 1.78785 9.65112 1.78785 9.78682 1.8552C9.94308 1.93272 10.0553 2.18444 10.2797 2.6879L12.0672 6.69798C12.1336 6.84681 12.1667 6.92123 12.2181 6.97822C12.2635 7.02864 12.319 7.06897 12.381 7.09658C12.451 7.12779 12.5321 7.13634 12.6942 7.15344L17.0603 7.61428C17.6085 7.67213 17.8825 7.70105 18.0046 7.8257C18.1105 7.93396 18.1598 8.08557 18.1377 8.23547C18.1123 8.40801 17.9075 8.59247 17.4981 8.9615L14.2366 11.9007C14.1156 12.0098 14.055 12.0643 14.0167 12.1307C13.9828 12.1896 13.9616 12.2548 13.9545 12.3223C13.9464 12.3986 13.9633 12.4783 13.9971 12.6377L14.9081 16.9326C15.0225 17.4718 15.0797 17.7414 14.9989 17.8959C14.9286 18.0302 14.7997 18.1239 14.6503 18.1492C14.4783 18.1783 14.2396 18.0406 13.7621 17.7652L9.95888 15.5716C9.81775 15.4902 9.74718 15.4496 9.67215 15.4336C9.60575 15.4195 9.53712 15.4195 9.47072 15.4336C9.3957 15.4496 9.32513 15.4902 9.18399 15.5716L5.38082 17.7652C4.90334 18.0406 4.6646 18.1783 4.49263 18.1492C4.34325 18.1239 4.21429 18.0302 4.14407 17.8959C4.06324 17.7414 4.12042 17.4718 4.23479 16.9326L5.14573 12.6377C5.17954 12.4783 5.19645 12.3986 5.18842 12.3223C5.18132 12.2548 5.16012 12.1896 5.12619 12.1307C5.08785 12.0643 5.02733 12.0098 4.90629 11.9007L1.64484 8.9615C1.23538 8.59247 1.03064 8.40801 1.00519 8.23547C0.983089 8.08557 1.03234 7.93396 1.13833 7.8257C1.26035 7.70105 1.53443 7.67213 2.08259 7.61428L6.44877 7.15344C6.61082 7.13634 6.69184 7.12779 6.7619 7.09658C6.82389 7.06897 6.87939 7.02864 6.92482 6.97822C6.97614 6.92123 7.00931 6.84681 7.07567 6.69798L8.86314 2.6879Z"
                              stroke="#0C62FD" stroke-width="1.81372" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="bx  star" data-value="4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M8.86314 2.6879C9.08754 2.18444 9.19979 1.93272 9.35605 1.8552C9.49176 1.78785 9.65112 1.78785 9.78682 1.8552C9.94308 1.93272 10.0553 2.18444 10.2797 2.6879L12.0672 6.69798C12.1336 6.84681 12.1667 6.92123 12.2181 6.97822C12.2635 7.02864 12.319 7.06897 12.381 7.09658C12.451 7.12779 12.5321 7.13634 12.6942 7.15344L17.0603 7.61428C17.6085 7.67213 17.8825 7.70105 18.0046 7.8257C18.1105 7.93396 18.1598 8.08557 18.1377 8.23547C18.1123 8.40801 17.9075 8.59247 17.4981 8.9615L14.2366 11.9007C14.1156 12.0098 14.055 12.0643 14.0167 12.1307C13.9828 12.1896 13.9616 12.2548 13.9545 12.3223C13.9464 12.3986 13.9633 12.4783 13.9971 12.6377L14.9081 16.9326C15.0225 17.4718 15.0797 17.7414 14.9989 17.8959C14.9286 18.0302 14.7997 18.1239 14.6503 18.1492C14.4783 18.1783 14.2396 18.0406 13.7621 17.7652L9.95888 15.5716C9.81775 15.4902 9.74718 15.4496 9.67215 15.4336C9.60575 15.4195 9.53712 15.4195 9.47072 15.4336C9.3957 15.4496 9.32513 15.4902 9.18399 15.5716L5.38082 17.7652C4.90334 18.0406 4.6646 18.1783 4.49263 18.1492C4.34325 18.1239 4.21429 18.0302 4.14407 17.8959C4.06324 17.7414 4.12042 17.4718 4.23479 16.9326L5.14573 12.6377C5.17954 12.4783 5.19645 12.3986 5.18842 12.3223C5.18132 12.2548 5.16012 12.1896 5.12619 12.1307C5.08785 12.0643 5.02733 12.0098 4.90629 11.9007L1.64484 8.9615C1.23538 8.59247 1.03064 8.40801 1.00519 8.23547C0.983089 8.08557 1.03234 7.93396 1.13833 7.8257C1.26035 7.70105 1.53443 7.67213 2.08259 7.61428L6.44877 7.15344C6.61082 7.13634 6.69184 7.12779 6.7619 7.09658C6.82389 7.06897 6.87939 7.02864 6.92482 6.97822C6.97614 6.92123 7.00931 6.84681 7.07567 6.69798L8.86314 2.6879Z"
                              stroke="#0C62FD" stroke-width="1.81372" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <span class="bx  star" data-value="5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                         <path d="M8.86314 2.6879C9.08754 2.18444 9.19979 1.93272 9.35605 1.8552C9.49176 1.78785 9.65112 1.78785 9.78682 1.8552C9.94308 1.93272 10.0553 2.18444 10.2797 2.6879L12.0672 6.69798C12.1336 6.84681 12.1667 6.92123 12.2181 6.97822C12.2635 7.02864 12.319 7.06897 12.381 7.09658C12.451 7.12779 12.5321 7.13634 12.6942 7.15344L17.0603 7.61428C17.6085 7.67213 17.8825 7.70105 18.0046 7.8257C18.1105 7.93396 18.1598 8.08557 18.1377 8.23547C18.1123 8.40801 17.9075 8.59247 17.4981 8.9615L14.2366 11.9007C14.1156 12.0098 14.055 12.0643 14.0167 12.1307C13.9828 12.1896 13.9616 12.2548 13.9545 12.3223C13.9464 12.3986 13.9633 12.4783 13.9971 12.6377L14.9081 16.9326C15.0225 17.4718 15.0797 17.7414 14.9989 17.8959C14.9286 18.0302 14.7997 18.1239 14.6503 18.1492C14.4783 18.1783 14.2396 18.0406 13.7621 17.7652L9.95888 15.5716C9.81775 15.4902 9.74718 15.4496 9.67215 15.4336C9.60575 15.4195 9.53712 15.4195 9.47072 15.4336C9.3957 15.4496 9.32513 15.4902 9.18399 15.5716L5.38082 17.7652C4.90334 18.0406 4.6646 18.1783 4.49263 18.1492C4.34325 18.1239 4.21429 18.0302 4.14407 17.8959C4.06324 17.7414 4.12042 17.4718 4.23479 16.9326L5.14573 12.6377C5.17954 12.4783 5.19645 12.3986 5.18842 12.3223C5.18132 12.2548 5.16012 12.1896 5.12619 12.1307C5.08785 12.0643 5.02733 12.0098 4.90629 11.9007L1.64484 8.9615C1.23538 8.59247 1.03064 8.40801 1.00519 8.23547C0.983089 8.08557 1.03234 7.93396 1.13833 7.8257C1.26035 7.70105 1.53443 7.67213 2.08259 7.61428L6.44877 7.15344C6.61082 7.13634 6.69184 7.12779 6.7619 7.09658C6.82389 7.06897 6.87939 7.02864 6.92482 6.97822C6.97614 6.92123 7.00931 6.84681 7.07567 6.69798L8.86314 2.6879Z"
                               stroke="#0C62FD" stroke-width="1.81372" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </div>
                <input type="hidden" name="rating_container-<?= $i ?>" id="hidden_rating_<?= $i ?>" value="0">
            </div>
		<?php endfor; ?>
    </div>
	<?php
	return ob_get_clean();
}


function custom_comment_form_fields( $fields ) {
	$req = get_option( 'require_name_email' ); // Check if $req is defined, provide a default value if not

	$aria_req                       = ( $req ? " aria-required='true'" : '' );
	$fields['comment_notes_before'] = '';
	$fields['author']               = '<p class="comment-form-author">' .
	                                  '<input id="author" name="author" type="text" placeholder="' . esc_attr__( 'Your Name',
			'domain' ) . '" ' . $aria_req . ' /></p>';

	$fields['email'] = '<p class="comment-form-email">' .
	                   '<input id="email" name="email" type="text" placeholder="' . esc_attr__( 'Your Email',
			'domain' ) . '" ' . $aria_req . ' /></p>';

	return $fields;
}

add_filter( 'comment_form_default_fields', 'custom_comment_form_fields' );

function custom_comment_fields_order( $fields ) {
	$output_fields = array();

	$output_fields['author_email'] = '<div class="comment-form-author-email">' . $fields['author'] . $fields['email'] . '</div>';
	$output_fields['comment']      = '<div class="comment-form-comment">' . $fields['comment'] . '</div>';
	$output_fields['rating']       = add_rating_fields_to_comment_form();

	return $output_fields;
}

add_filter( 'comment_form_fields', 'custom_comment_fields_order' );


