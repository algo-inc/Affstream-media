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
function custom_image_sizes() {
	add_image_size( 'blog-previews', 760, 600, true );
	add_image_size( 'media-card', 350, 150, true );
}
add_action( 'after_setup_theme', 'custom_image_sizes' );


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
	add_post_type_support('page', 'excerpt');
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

function registration_pages (){
	if (is_page_template('register-page.php') && is_page_template('restore-password-page.php') && is_page_template('resetpassword-page.php') && is_page_template('login-page.php')){
		return true;
	}
}


add_action( 'widgets_init', 'affstream_widgets_init' );
function affstream_scripts() {
	if (registration_pages() ) {
		wp_enqueue_style( 'affstream-materialize', get_template_directory_uri() . '/styles/materialize.css', array(), _S_VERSION );
		wp_enqueue_style( 'affstream-register', get_template_directory_uri() . '/styles/registration/registration.css', array(), _S_VERSION );
	}

	wp_enqueue_style( 'affstream-main', get_template_directory_uri() . '/styles/main.css', null, _S_VERSION );
	wp_enqueue_style( 'affstream-swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
		_S_VERSION );
	wp_enqueue_style( 'affstream-wow-style', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
		_S_VERSION );
	wp_enqueue_script( 'affstream-wow-js', get_template_directory_uri() . '/js/wow.js', _S_VERSION, );
	wp_enqueue_script( 'affstream-swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
		_S_VERSION );
	wp_enqueue_script( 'affstream-navigation', get_template_directory_uri() . '/js/blog-script.js', array( 'jquery' ),
		_S_VERSION, true );
	wp_enqueue_script( 'affstream-requests', get_stylesheet_directory_uri() . '/js/requests.js', array( 'jquery' ),
		_S_VERSION, false );

	if ( ! is_front_page() && !registration_pages()) {
		wp_enqueue_style( 'affstream-media', get_template_directory_uri() . '/styles/media.css', null, _S_VERSION );
	}

	$manifest = json_decode( file_get_contents( __DIR__ . '/dist/manifest.json' ), true );

	wp_enqueue_script( 'main111111js',
		get_template_directory_uri() . '/dist/' . $manifest['src/js/main.js']['file'], array(), _S_VERSION,
		true );
}
add_action( 'wp_enqueue_scripts', 'affstream_scripts' );


function my_enqueue_scripts() {
	wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/blog-script.js', array( 'jquery' ), '1.0',
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



function get_custom_categories($post_id, $tax_name ) {
	$categories = wp_get_post_terms(1356, 'reviews-category');
	if (!empty($categories) && !is_wp_error($categories)) {
		return $categories;
	} else {
		return array();
	}
}
function estimated_reading_time() {
	$content = get_post_field('post_content', get_the_ID());
	$word_count = str_word_count(strip_tags($content));
	$words_per_minute = 200;
	$reading_time = ceil($word_count / $words_per_minute); // Час читання в хвилинах, округлений до ближчого цілого
	return $reading_time;
}
function getTaxonomyNameByPostType( $postType ) {
	if ( $postType === 'university' ) {
		return 'university-category';
	}
	if ($postType === 'reviews'){
		return 'reviews-categories';
	}
};

function getFieldByPostType ($postType){
	if ($postType == 'university'){
		return 'university_category';
	}
	else if ($postType === 'reviews'){
		return 'reviews_category';
	}
}

function media_trim_title($title, $max_chars) {
	$trimmed_title = mb_strimwidth($title, 0, $max_chars, '...');
	return $trimmed_title;
}
function custom_trim_excerpt($text, $length = 80, $ellipsis = '...') {
	if (mb_strlen($text) > $length) {
		$text = mb_substr($text, 0, $length);
		$text = rtrim($text, " \t\n\r\0\x0B");
		$text .= $ellipsis;
	}
	return $text;
}


function add_meta_key_to_services_posts() {
	$args = array(
		'post_type' => 'services',
		'posts_per_page' => -1,
	);

	$services_query = new WP_Query($args);

	if ($services_query->have_posts()) {
		while ($services_query->have_posts()) {
			$services_query->the_post();
			$service_id = get_the_ID();
			$is_top = get_field('field_is_top');
			if ($is_top === true) {
				update_post_meta($service_id, 'top_service', 'true');
			}
		}
	}
	wp_reset_postdata();
}
add_action('wp_enqueue_scripts', 'add_meta_key_to_services_posts');

