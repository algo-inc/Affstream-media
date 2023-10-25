<?php
function register_acf_fields_for_recent_posts_by_category() {
	if (function_exists('acf_add_local_field_group')) {
		acf_add_local_field_group(array(
			'key' => 'group_recent_posts_by_category',
			'title' => 'Recent Posts by Category',
			'fields' => array(
				array(
					'key' => 'field_recent_posts_by_category_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Введіть заголовок для цього блоку',
					'required' => true,
					'wrapper' => array(
						'width' => '50%',
					),
				),
				array(
					'key' => 'field_post_type',
					'label' => 'Оберіть тип посттайпу',
					'name' => 'post_type',
					'type' => 'select',
					'instructions' => 'Оберіть тип посттайпу',
					'choices' => array(
						'university' => 'University',
						'reviews' => 'Reviews',
					),
					'wrapper' => array(
						'width' => '50%',
					),
				),
				array(
					'key' => 'field_university_category',
					'label' => 'Оберіть категорію для University',
					'name' => 'university_category',
					'type' => 'taxonomy',
					'instructions' => 'Виберіть категорію для University',
					'field_type' => 'select',
					'allow_null' => 1,
					'return_format' => 'id',
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 1,
					'placeholder' => 'Оберіть категорію для University',
					'wrapper' => array(
						'width' => '50%',
					),
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_post_type',
								'operator' => '==',
								'value' => 'university',
							),
						),
					),
					'taxonomy' => 'university-category', // Таксономія для University
				),
				array(
					'key' => 'field_reviews_category',
					'label' => 'Оберіть категорію для Reviews',
					'name' => 'reviews_category',
					'type' => 'taxonomy',
					'instructions' => 'Виберіть категорію для Reviews',
					'field_type' => 'select',
					'allow_null' => 1,
					'return_format' => 'id',
					'multiple' => 0,
					'ui' => 1,
					'ajax' => 1,
					'placeholder' => 'Оберіть категорію для Reviews',
					'wrapper' => array(
						'width' => '50%',
					),
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_post_type',
								'operator' => '==',
								'value' => 'reviews',
							),
						),
					),
					'taxonomy' => 'reviews-categories', // Таксономія для Reviews
				),
				array(
					'key' => 'field_sorting',
					'label' => 'Сортування записів',
					'name' => 'sorting',
					'type' => 'select',
					'default_value' => 'popular',
					'choices' => array(
						'popular' => 'Популярні записи',
						'new' => 'Нові записи',
					),
					'wrapper' => array(
						'width' => '50%',
					),
				)
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/recent-posts-by-category',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
		));
	}
}

add_action('acf/init', 'register_acf_fields_for_recent_posts_by_category');
