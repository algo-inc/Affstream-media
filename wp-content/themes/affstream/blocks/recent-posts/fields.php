<?php
if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_recent_posts',
		'title' => 'Recent Posts Fields',
		'fields' => array(
			array(
				'key' => 'field_title',
				'label' => 'Title',
				'name' => 'title',
				'type' => 'text',
			),
			array(
				'key' => 'field_post_types',
				'label' => 'Post Types',
				'name' => 'post_types',
				'type' => 'checkbox',
				'choices' => array(
					'news' => 'News',
					'university' => 'University',
					'reviews' => 'Reviews',
					'interviews' => 'Interviews',
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'block',
					'operator' => '==',
					'value' => 'acf/recent-posts',
				),
			),
		),
	));

endif;
