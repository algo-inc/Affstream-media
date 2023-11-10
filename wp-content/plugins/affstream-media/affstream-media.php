<?php
/*
Plugin Name: Affstream Media
Description: The plugin was created for Affstream Media
*/
function custom_taxonomy(): void {
	$labels = array(
		'name'          => 'Tags',
		'singular_name' => 'Tag',
		'menu_name'     => 'Tags',
	);
	$args   = array(
		'show_ui'      => true,
		'labels'       => $labels,
		'show_in_rest' => true,
		'hierarchical' => true,
		'public'       => true,

		'rewrite' => [ 'slug' => 'tags' ]
	);
	register_taxonomy( 'affstream-tags', [ 'services', 'university', 'news', 'interview', 'reviews' ], $args );
}

add_action( 'init', 'custom_taxonomy' );
function custom_register_services_taxonomy(): void {
	$labels = array(
		'name'              => _x( 'Service Categories', 'taxonomy general name', 'text-domain' ),
		'singular_name'     => _x( 'Service Category', 'taxonomy singular name', 'text-domain' ),
		'search_items'      => __( 'Search Service Categories', 'text-domain' ),
		'all_items'         => __( 'All Service Categories', 'text-domain' ),
		'parent_item'       => __( 'Parent Service Category', 'text-domain' ),
		'parent_item_colon' => __( 'Parent Service Category:', 'text-domain' ),
		'edit_item'         => __( 'Edit Service Category', 'text-domain' ),
		'update_item'       => __( 'Update Service Category', 'text-domain' ),
		'add_new_item'      => __( 'Add New Service Category', 'text-domain' ),
		'new_item_name'     => __( 'New Service Category Name', 'text-domain' ),
		'menu_name'         => __( 'Service Categories', 'text-domain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'public'            => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => 'service-category',
		'rewrite'           => array( 'slug' => 'service-category' ),
	);

	register_taxonomy( 'service-category', array( 'services' ), $args );
}

function custom_register_services_acf_fields(): void {
	if ( function_exists( 'acf_add_local_field_group' ) ) {
		$field_group = array(
			'key'      => 'group_services_fields',
			'title'    => 'Service Fields',
			'fields'   => array(
				array(
					'key'   => 'field_service_icon',
					'label' => 'Service Icon',
					'name'  => 'service_icon',
					'type'  => 'image',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_is_top',
					'label'   => 'Is Top',
					'name'    => 'is_top',
					'type'    => 'true_false',
					'message' => 'Mark as Top Service',
					'wrapper' => array(
						'width' => '15%',
					),
				),


				array(
					'key' => 'field_related_post_review',
					'label' => 'Review Link',
					'name' => 'related_post_review',
					'type' => 'post_object',
					'post_type' => array('reviews'),
					'return_format' => 'id',
					'filters' => array(
						'category' => '74',
					),
					'wrapper' => array(
						'width' => '25%',
					),
				),

				array(
					'key' => 'field_related_post_guide',
					'label' => 'Guide Link',
					'name' => 'related_post_guide',
					'type' => 'post_object',
					'post_type' => array('university'),
					'return_format' => 'id',
					'filters' => array(
						'category' => 'university-category',
					),
					'wrapper' => array(
						'width' => '25%',
					),
				),

				array(
					'key'     => 'field_from_ukraine',
					'label'   => 'From Ukraine',
					'name'    => 'from_ukraine',
					'type'    => 'true_false',
					'message' => 'Mark as Top Service',
					'wrapper' => array(
						'width' => '15%',
					),
				),
				array(
					'key'   => 'field_monthly_price',
					'label' => 'Monthly Price',
					'name'  => 'monthly_price',
					'type'  => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'services',
					),
				),
			),
			'position' => 'side',
		);
		acf_add_local_field_group( $field_group );
	}
}
function custom_register_about_company_acf_fields(): void {
	if (function_exists('acf_add_local_field_group')) {
		$field_group = array(
			'key'      => 'group_about_company_fields',
			'title'    => 'About Company',
			'fields'   => array(
				array(
					'key'     => 'field_category',
					'label'   => 'Category',
					'name'    => 'category',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_founded_year',
					'label'   => 'Founded Year',
					'name'    => 'founded_year',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_made_in',
					'label'   => 'Made in',
					'name'    => 'made_in',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_country',
					'label'   => 'Country',
					'name'    => 'country',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'services',  // Змініть на ваш тип посту, який ви використовуєте
					),
				),
			),
			'position' => 'side',
		);
		acf_add_local_field_group($field_group);
	}
}

function custom_register_social_media_acf_fields(): void {
	if (function_exists('acf_add_local_field_group')) {
		$field_group = array(
			'key'      => 'group_social_media_fields',
			'title'    => 'Social Media',
			'fields'   => array(
				array(
					'key'   => 'field_site_link',
					'label' => 'Site Link',
					'name'  => 'site_link',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_telegram',
					'label' => 'Telegram',
					'name'  => 'telegram',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_facebook',
					'label' => 'Facebook',
					'name'  => 'facebook',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_instagram',
					'label' => 'Instagram',
					'name'  => 'instagram',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_linkedin',
					'label' => 'LinkedIn',
					'name'  => 'linkedin',
					'type'  => 'url',
				),
				array(
					'key'   => 'field_email',
					'label' => 'Email',
					'name'  => 'email',
					'type'  => 'email',
				),
				array(
					'key'   => 'field_youtube',
					'label' => 'YouTube',
					'name'  => 'youtube',
					'type'  => 'url',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'services', // Змініть на ваш тип посту
					),
				),
			),
			'position' => 'side',
		);
		acf_add_local_field_group($field_group);
	}
}

add_action('acf/init', 'custom_register_social_media_acf_fields');


// Block for Company Information
function company_information_block() {
	$post_id = get_the_ID();
	$category = get_field('category', $post_id);
	$founded_year = get_field('founded_year', $post_id);
	$made_in = get_field('made_in', $post_id);
	$country = get_field('country', $post_id);
	?>
    <div class="company-information-block">
        <h2>Company Information</h2>
        <p><strong>Category:</strong> <?php echo esc_html($category); ?></p>
        <p><strong>Founded Year:</strong> <?php echo esc_html($founded_year); ?></p>
        <p><strong>Made in:</strong> <?php echo esc_html($made_in); ?></p>
        <p><strong>Country:</strong> <?php echo esc_html($country); ?></p>
    </div>
	<?php
}
register_block_type('custom/company-information', array('render_callback' => 'company_information_block'));

// Block for Paid Information
function paid_information_block(): void {
	$post_id = get_the_ID();
	$trial = get_field('trial', $post_id);
	$standart = get_field('standart', $post_id);
	$advanced = get_field('advanced', $post_id);
	$professional = get_field('professional', $post_id);
	?>
    <div class="paid-information-block">
        <h2>Paid Information</h2>
        <p><strong>Trial:</strong> <?php echo esc_html($trial); ?></p>
        <p><strong>Standart:</strong> <?php echo esc_html($standart); ?></p>
        <p><strong>Advanced:</strong> <?php echo esc_html($advanced); ?></p>
        <p><strong>Professional:</strong> <?php echo esc_html($professional); ?></p>
    </div>
	<?php
}
register_block_type('custom/paid-information', array('render_callback' => 'paid_information_block'));

function custom_register_paid_acf_fields(): void {
	if (function_exists('acf_add_local_field_group')) {
		$field_group = array(
			'key'      => 'group_paid_fields',
			'title'    => 'Paid Fields',
			'fields'   => array(
				array(
					'key'     => 'field_trial',
					'label'   => 'Trial',
					'name'    => 'trial',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_standart',
					'label'   => 'Standart',
					'name'    => 'standart',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_advanced',
					'label'   => 'Advanced',
					'name'    => 'advanced',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
				array(
					'key'     => 'field_professional',
					'label'   => 'Professional',
					'name'    => 'professional',
					'type'    => 'text',
					'wrapper' => array(
						'width' => '25%',
					),
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'services',  // Змініть на ваш тип посту, який ви використовуєте
					),
				),
			),
			'position' => 'side',
		);
		acf_add_local_field_group($field_group);
	}
}

add_action('acf/init', 'custom_register_paid_acf_fields');


add_action('acf/init', 'custom_register_about_company_acf_fields');


add_action( 'acf/init', 'custom_register_services_acf_fields' );

add_action( 'init', 'custom_register_services_taxonomy' );
function custom_register_services_post_type(): void {
	$labels = array(
		'name'               => __( 'Services', 'text-domain' ),
		'singular_name'      => __( 'Service', 'text-domain' ),
		'menu_name'          => __( 'Services', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New Service', 'text-domain' ),
		'edit_item'          => __( 'Edit Service', 'text-domain' ),
		'new_item'           => __( 'New Service', 'text-domain' ),
		'view_item'          => __( 'View Service', 'text-domain' ),
		'search_items'       => __( 'Search Services', 'text-domain' ),
		'not_found'          => __( 'No services found', 'text-domain' ),
		'not_found_in_trash' => __( 'No services found in Trash', 'text-domain' ),
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'show_in_rest'  => true,
		'has_archive'   => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-admin-generic',
		'taxonomies'    => array( 'affstream-tags', 'service-category' ),
		'supports'      => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'page-attributes',
			'comments',
			'revisions',
		),
	);
	register_post_type( 'services', $args );
}

function custom_register_category_taxonomy(): void {
	$labels = array(
		'name'          => __( 'University Categories', 'text-domain' ),
		'singular_name' => __( 'University Category', 'text-domain' ),
		'menu_name'     => __( 'University Categories', 'text-domain' ),
		'all_items'     => __( 'All Categories', 'text-domain' ),
		'edit_item'     => __( 'Edit Category', 'text-domain' ),
		'view_item'     => __( 'View Category', 'text-domain' ),
		'update_item'   => __( 'Update Category', 'text-domain' ),
		'add_new_item'  => __( 'Add New Category', 'text-domain' ),
		'new_item_name' => __( 'New Category Name', 'text-domain' ),
		'search_items'  => __( 'Search Categories', 'text-domain' ),
	);
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'university-category' ),
	);
	register_taxonomy( 'university-category', array( 'university' ), $args );
}

function set_default_category_for_custom_post( $post_id ): void {
	if ( 'university' == get_post_type( $post_id ) ) {
		$default_category_id = 68;
		wp_set_post_terms( $post_id, array( $default_category_id ), 'university-category', true );
	}
}

add_action( 'init', 'custom_register_category_taxonomy' );
function custom_register_university_post_type(): void {
	$labels = array(
		'name'               => __( 'Universities', 'text-domain' ),
		'singular_name'      => __( 'University', 'text-domain' ),
		'menu_name'          => __( 'Universities', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New University', 'text-domain' ),
		'edit_item'          => __( 'Edit University', 'text-domain' ),
		'new_item'           => __( 'New University', 'text-domain' ),
		'view_item'          => __( 'View University', 'text-domain' ),
		'search_items'       => __( 'Search Universities', 'text-domain' ),
		'not_found'          => __( 'No universities found', 'text-domain' ),
		'not_found_in_trash' => __( 'No universities found in Trash', 'text-domain' ),
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'show_in_rest'  => true,
		'has_archive'   => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-book', // Змініть іконку на потрібну
		'supports'      => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'page-attributes',
			'taxonomies' => array( 'affstream-tags', 'university-category' )
		),
	);
	register_post_type( 'university', $args );
}


function custom_register_reviews_post_type(): void {
	$labels = array(
		'name'               => __( 'Reviews', 'text-domain' ),
		'singular_name'      => __( 'Review', 'text-domain' ),
		'menu_name'          => __( 'Reviews', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New Review', 'text-domain' ),
		'edit_item'          => __( 'Edit Review', 'text-domain' ),
		'new_item'           => __( 'New Review', 'text-domain' ),
		'view_item'          => __( 'View Review', 'text-domain' ),
		'search_items'       => __( 'Search Reviews', 'text-domain' ),
		'not_found'          => __( 'No reviews found', 'text-domain' ),
		'not_found_in_trash' => __( 'No reviews found in Trash', 'text-domain' ),
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'show_in_rest'  => true,
		'has_archive'   => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-star-filled', // Змініть іконку на потрібну
		'supports'      => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'page-attributes',
			'taxonomies' => array( 'affstream-tags', 'reviews-categories' )
		),
	);
	register_post_type( 'reviews', $args );
}
add_action( 'save_post', 'set_default_category_for_custom_post' );
function custom_register_reviews_category_taxonomy(): void {
	register_taxonomy( 'reviews-categories', array( 'reviews' ), array(
		'labels'            => array(
			'name'          => __( 'Reviews Categories', 'text-domain' ),
			'singular_name' => __( 'Reviews Category', 'text-domain' ),
		),
		'public'            => true,
		'hierarchical'      => true,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'reviews-category' ),
	) );
}

add_action( 'init', 'custom_register_reviews_category_taxonomy' );
function custom_register_interview_post_type(): void {
	$labels = array(
		'name'               => __( 'Interviews', 'text-domain' ),
		'singular_name'      => __( 'Interview', 'text-domain' ),
		'menu_name'          => __( 'Interviews', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New Interview', 'text-domain' ),
		'edit_item'          => __( 'Edit Interview', 'text-domain' ),
		'new_item'           => __( 'New Interview', 'text-domain' ),
		'view_item'          => __( 'View Interview', 'text-domain' ),
		'search_items'       => __( 'Search Interviews', 'text-domain' ),
		'not_found'          => __( 'No interviews found', 'text-domain' ),
		'not_found_in_trash' => __( 'No interviews found in Trash', 'text-domain' ),
	);
	$args   = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'show_in_rest'  => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-microphone', // Змініть іконку на потрібну
		'supports'      => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'page-attributes',
			'taxonomies' => array( 'affstream-tags' )
		),
	);
	register_post_type( 'interview', $args );
}

function custom_register_news_post_type(): void {
	$labels = array(
		'name'               => __( 'News', 'text-domain' ),
		'singular_name'      => __( 'News', 'text-domain' ),
		'menu_name'          => __( 'News', 'text-domain' ),
		'add_new'            => __( 'Add New', 'text-domain' ),
		'add_new_item'       => __( 'Add New News', 'text-domain' ),
		'edit_item'          => __( 'Edit News', 'text-domain' ),
		'new_item'           => __( 'New News', 'text-domain' ),
		'view_item'          => __( 'View News', 'text-domain' ),
		'search_items'       => __( 'Search News', 'text-domain' ),
		'not_found'          => __( 'No news found', 'text-domain' ),
		'not_found_in_trash' => __( 'No news found in Trash', 'text-domain' ),
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'show_in_rest'  => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-megaphone',
		'supports'      => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
			'custom-fields',
			'page-attributes',
			'taxonomies' => array( 'affstream-tags' )
		),
	);

	register_post_type( 'news', $args );
}

function create_events_post_type(): void {
	$labels = array(
		'name'               => 'Events',
		'singular_name'      => 'Event',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Event',
		'edit_item'          => 'Edit Event',
		'new_item'           => 'New Event',
		'view_item'          => 'View Event',
		'search_items'       => 'Search Events',
		'not_found'          => 'No events found',
		'not_found_in_trash' => 'No events found in trash',
		'parent_item_colon'  => 'Parent Event:',
		'menu_name'          => 'Events'
	);
	$args   = array(
		'labels'      => $labels,
		'public'      => true,
		'has_archive' => false,
		'menu_icon'   => 'dashicons-calendar',
		'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes' ),
		'rewrite'     => array( 'slug' => 'events' ),
	);
	register_post_type( 'events', $args );
}

function create_glossary_post_type(): void {
	register_post_type( 'glossary',
		array(
			'labels'      => array(
				'name'          => __( 'Glossary' ),
				'singular_name' => __( 'Glossary Item' )
			),
			'public'      => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'glossary' ),
			'supports'    => array( 'title', 'editor' ),
		)
	);
}


add_action( 'init', 'create_glossary_post_type' );
add_action( 'init', 'custom_register_news_post_type' );
add_action( 'init', 'custom_register_interview_post_type' );
add_action( 'init', 'custom_register_reviews_post_type' );
add_action( 'init', 'custom_register_university_post_type' );
add_action( 'init', 'custom_taxonomy' );
add_action( 'init', 'custom_register_services_post_type' );
add_action( 'init', 'create_events_post_type' );



function custom_display_categories( $post_id, $count = 4, $all_categories = false ) {
	$categories = wp_get_post_categories( $post_id );
	if ( $categories && ! is_wp_error( $categories ) ) {
		echo '<div class="categories">';
		$category_count = count( $categories );
		$limit         = $all_categories ? $category_count : min( $count, $category_count );
		for ( $i = 0; $i < $limit; $i ++ ) {
			$category = get_category( $categories[ $i ] );
			$hover_color_index = $i % 4;
			echo '<a class="category hover-color-' . $hover_color_index . '" href="' . get_category_link( $category ) . '">' . esc_html( $category->name ) . '</a>';
		}
		echo '</div>';
	}
}
function custom_display_tags( $post_id, $count = 4, $all_tags = false ) {
	$terms = wp_get_post_terms( $post_id, 'affstream-tags' );
	if ( $terms && ! is_wp_error( $terms ) ) {
		echo '<div class="tags">';
		$tag_count = count( $terms );
		$limit     = $all_tags ? $tag_count : min( $count, $tag_count );
		for ( $i = 0; $i < $limit; $i ++ ) {
			$term              = $terms[ $i ];
			$hover_color_index = $i % 4;
			echo '<a class="tag hover-color-' . $hover_color_index . '" href="' . get_term_link( $term,
					'affstream-tags' ) . '">' . esc_html( $term->name ) . '</a>';
		}
		echo '</div>';
	}
}

function renderPostsByCategory(): void {
	$category_id = isset($_REQUEST['category_id']) ? intval($_REQUEST['category_id']) : null;
	$category_slug = isset($_REQUEST['category']) ? sanitize_text_field($_REQUEST['category']) : '';
	$paged = isset($_REQUEST['paged']) ? intval($_REQUEST['paged']) : 1;

	if (empty($category_id) && !empty($category_slug)) {
		$category = get_term_by('slug', $category_slug, 'university-category');
		if ($category) {
			$category_id = $category->term_id;
		}
	}

	if (!empty($category_id)) {
		$posts_per_page = 15;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array(
			'post_type' => 'university',
			'posts_per_page' => $posts_per_page,
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'university-category',
					'field' => 'id',
					'terms' => $category_id
				)
			)
		);
		$posts_query = new WP_Query($args);
		echo '<div class="publication-container">';
		if ($posts_query->have_posts()) {
			while ($posts_query->have_posts()) {
				$posts_query->the_post();
				get_template_part('template-parts/media-card');
			}
		} else {
			echo 'Публікації не знайдено.';
		}
		echo '</div>';
		wp_reset_postdata();

		if ($posts_query->max_num_pages > 1) {
			echo '<div class="pagination">';
			echo paginate_links(array(
				'total' => $posts_query->max_num_pages,
				'current' => $paged,
				'prev_text' => '&laquo;',
				'next_text' => '&raquo;',
			));
			echo '</div>';
		}
	}
}
function load_posts_by_category( $category ) {
    renderPostsByCategory();
	die();
}

add_action( 'wp_ajax_load_posts_by_category', 'load_posts_by_category' );
add_action( 'wp_ajax_nopriv_load_posts_by_category', 'load_posts_by_category' );


function filter_glossary() {
	$selectedLetter = sanitize_text_field( $_POST['letter'] );
	$args           = array(
		'post_type'      => 'glossary',
		'posts_per_page' => - 1,
		'orderby'        => 'title',
		'order'          => 'ASC',
	);
	$query          = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
			$post_title   = get_the_title();
			$first_letter = strtoupper( substr( $post_title, 0, 1 ) );
			if ( $first_letter === $selectedLetter ) { ?>
                <div class="glossary-card">
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>
                </div>
			<?php }
		}
	}
	wp_reset_postdata();
	die();
}

add_action( 'wp_ajax_filter_glossary', 'filter_glossary' );
add_action( 'wp_ajax_nopriv_filter_glossary', 'filter_glossary' );


function load_glossary_template() {
	get_template_part( 'template-parts/glossary' );
	die();
}

add_action( 'wp_ajax_load_glossary_template', 'load_glossary_template' );
add_action( 'wp_ajax_nopriv_load_glossary_template', 'load_glossary_template' );



if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group( array(
		'key'      => 'group_60c1234567890',
		'title'    => 'Promo',
		'fields'   => array(
			array(
				'key'     => '',
				'label'   => 'Promo Code',
				'name'    => 'promo_code',
				'type'    => 'text',
				'wrapper' => array(
					'width' => '50%',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'reviews',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'news',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'interview',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'university',
				),
			),

		),
		'position' => 'side',
	) );


	acf_add_local_field_group(
            array(
		'key'      => 'group_banner_link',
		'title'    => 'Banner & Link',
		'fields'   => array(
			array(
				'key'               => 'field_60c1234567891',
				'label'             => __( 'Post Banner' ),
				'name'              => 'global_gif_image',
				'type'              => 'image',
				'instructions'      => 'GIF-зображення',
				'required'          => 0,
				'conditional_logic' => 0,
				'wrapper'           => array(
					'width' => '',
					'class' => '',
					'id'    => '',
				),
				'return_format'     => 'array',
				'preview_size'      => 'thumbnail',
				'library'           => 'all',
			),
			array(
				'key'     => 'field_banner_link',
				'label'   => 'Banner Link',
				'name'    => 'banner_link',
				'type'    => 'url',
				'instructions' => 'Посилання на баннер',
				'wrapper' => array(
					'width' => '50%',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'reviews',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'news',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'interview',
				),
			),
			array(
				array(
					'param'    => 'post_type',
					'operator' => '==',
					'value'    => 'university',
				),
			),
		),
		'position' => 'side',
	));
}
