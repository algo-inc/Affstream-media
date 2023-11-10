<?php
/**
 * affstream functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package affstream
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.1.9' );
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
		wp_enqueue_style( 'affstream-materialize', get_template_directory_uri() . '/styles/materialize.css', array(),
			_S_VERSION );
		wp_enqueue_style( 'affstream-register', get_template_directory_uri() . '/styles/registration/registration.css',
			array(), _S_VERSION );
		wp_enqueue_style( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), _S_VERSION );
	}

	wp_enqueue_style( 'affstream-main', get_template_directory_uri() . '/styles/main.css', null, _S_VERSION );
	wp_enqueue_style( 'affstream-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
		_S_VERSION );
	wp_enqueue_style( 'affstream-wow-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
		_S_VERSION );
	wp_enqueue_script( 'affstream-wow-js', get_template_directory_uri() . '/js/wow.js', _S_VERSION, );

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

//require get_template_directory() . '/inc/custom-header.php';
//require get_template_directory() . '/inc/template-tags.php';
//require get_template_directory() . '/inc/template-functions.php';

//if ( defined( 'JETPACK__VERSION' ) ) {
//	require get_template_directory() . '/inc/jetpack.php';
//}
//

function add_event_logo_field() {
	acf_add_local_field_group( array(
		'key'      => 'group_event_logo',
		'title'    => 'Event Logo',
		'fields'   => array(
			array(
				'key'           => 'field_event_logo',
				'label'         => 'Logo',
				'name'          => 'event_logo',
				'type'          => 'image',
				'return_format' => 'url',
				'preview_size'  => 'thumbnail',
			),
			array(
				'key'   => 'field_event_location',
				'label' => 'Location',
				'name'  => 'event_location',
				'type'  => 'text',
			),
			array(
				'key'            => 'field_event_date',
				'label'          => 'Date',
				'name'           => 'event_date',
				'type'           => 'date_picker',
				'display_format' => 'F j, Y',
				'return_format'  => 'F j, Y',
			),
			array(
				'key'   => 'field_event_link',
				'label' => 'Event Link',
				'name'  => 'event_link',
				'type'  => 'url',
			),
			array(
				'key'            => 'field_blog_page_link',
				'label'          => 'Blog Page Link',
				'name'           => 'blog_page_link',
				'type'           => 'page_link',
				'post_type'      => array( 'post' ), // Вкажіть тут типи постів, на які можна посилатися
				'allow_null'     => true, // Чи може поле бути порожнім
				'allow_archives' => false, // Чи можна посилатися на архівні сторінки
			),
			array(
				'key'        => 'field_post_article',
				'label'      => 'Post Article',
				'name'       => 'post_articles',
				'type'       => 'post_object',
				'post_type'  => array( 'reviews', 'university', 'interviews', 'news' ),
				'allow_null' => true,
				'multiple'   => false,
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'events',
				),
			),
		),
	) );
}

add_action( 'acf/init', 'add_event_logo_field' );
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


// Додати поля рейтингів до коментарів
function add_custom_comment_fields( $comment_id ) {
	if ( isset( $_POST['support'] ) ) {
		$support_rating = intval( $_POST['support'] );
		add_comment_meta( $comment_id, 'support', $support_rating );
	}

	if ( isset( $_POST['quality'] ) ) {
		$quality_rating = intval( $_POST['quality'] );
		add_comment_meta( $comment_id, 'quality', $quality_rating );
	}

	if ( isset( $_POST['interface'] ) ) {
		$interface_rating = intval( $_POST['interface'] );
		add_comment_meta( $comment_id, 'interface', $interface_rating );
	}

	if ( isset( $_POST['price'] ) ) {
		$price_rating = intval( $_POST['price'] );
		add_comment_meta( $comment_id, 'price', $price_rating );
	}
}

add_action( 'comment_post', 'add_custom_comment_fields' );

function render_rating_block( $rating_title, $rating_value, $rating_average ) {
	?>
    <div class="rating-container">
        <span class="rating-title"><?php echo esc_html( $rating_title ); ?>:</span>
        <?php
        if ($rating_value):
        ?>
        <div class="rating">
            <input type="number" name="<?php echo esc_attr( strtolower( $rating_title ) ); ?>" hidden>
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


function get_ratings_for_post( $post_id ) {
	$comments = get_comments( array( 'post_id' => $post_id ) );

	$total_rating   = 0;
	$total_comments = count( $comments );

	$field_ratings = array(
		'support'   => 0,
		'quality'   => 0,
		'interface' => 0,
		'price'     => 0,
	);

	foreach ( $comments as $comment ) {
		$support_rating   = (float) get_comment_meta( $comment->comment_ID, 'support', true );
		$quality_rating   = (float) get_comment_meta( $comment->comment_ID, 'quality', true );
		$interface_rating = (float) get_comment_meta( $comment->comment_ID, 'interface', true );
		$price_rating     = (float) get_comment_meta( $comment->comment_ID, 'price', true );

		if ( is_numeric( $support_rating ) && is_numeric( $quality_rating ) && is_numeric( $interface_rating ) && is_numeric( $price_rating ) ) {
			$average_rating = ( $support_rating + $quality_rating + $interface_rating + $price_rating ) / 4;
			$total_rating   += $average_rating;
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

function get_average_ratings_for_post($post_id) {
	$ratings = get_ratings_for_post($post_id);
	$total_comments = $ratings['total_comments'];

	// Перевірка, чи total_comments не є нульовим
	if ($total_comments > 0) {
		$average_support = ($ratings['field_ratings']['support'] / $total_comments);
		$average_quality = ($ratings['field_ratings']['quality'] / $total_comments);
		$average_interface = ($ratings['field_ratings']['interface'] / $total_comments);
		$average_price = ($ratings['field_ratings']['price'] / $total_comments);

		$average_ratings = array(
			'support' => $average_support,
			'quality' => $average_quality,
			'interface' => $average_interface,
			'price' => $average_price,
		);

		return $average_ratings;
	} else {
		// Повернути значення за замовчуванням, якщо total_comments є нульовим
		return array(
			'support' => 0,
			'quality' => 0,
			'interface' => 0,
			'price' => 0,
		);
	}
}
