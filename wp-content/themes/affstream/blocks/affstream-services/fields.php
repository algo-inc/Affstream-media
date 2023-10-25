<?php
function custom_register_block_fields() {
	if (function_exists('acf_add_local_field_group')) {
		acf_add_local_field_group(array(
			'key' => 'group_affstream_services_block',
			'title' => 'Affstream Services Block Settings',
			'fields' => array(
				array(
					'key' => 'field_service_category',
					'label' => 'Select Service Category',
					'name' => 'service_category',
					'type' => 'taxonomy',
					'instructions' => 'Select the category of services to display.',
					'taxonomy' => 'service-category', // Замініть на вашу таксономію категорій
					'field_type' => 'select',
					'allow_null' => true,
					'multiple' => false,
				),
				array(
					'key' => 'field_number_of_posts',
					'label' => 'Number of Posts to Display',
					'name' => 'number_of_posts',
					'type' => 'number',
					'instructions' => 'Enter the number of service posts to display.',
					'min' => 1,
					'max' => 10, // Змініть за вашими потребами
				),
				array(
					'key' => 'field_sort_order',
					'label' => 'Sort Order',
					'name' => 'sort_order',
					'type' => 'select',
					'instructions' => 'Select the sort order for service posts.',
					'choices' => array(
						'date_desc' => 'Date (Descending)',
						'date_asc' => 'Date (Ascending)',
						'title_asc' => 'Title (Ascending)',
						'title_desc' => 'Title (Descending)',
					),
					'default_value' => 'date_desc',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/affstream-services',
					),
				),
			),
		));
	}
}

add_action('acf/init', 'custom_register_block_fields');
