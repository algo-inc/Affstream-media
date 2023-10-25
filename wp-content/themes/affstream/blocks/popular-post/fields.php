<?php
function register_acf_fields_for_popular_articles() {
	if (function_exists('acf_add_local_field_group')) {
		acf_add_local_field_group(array(
			'key' => 'group_popular_posts',
			'title' => 'Popular Articles',
			'fields' => array(
				array(
					'key' => 'field_popular_articles_title',
					'label' => 'Заголовок',
					'name' => 'title',
					'type' => 'text',
					'instructions' => 'Введіть заголовок для цього блоку',
					'required' => true,
					'wrapper' => array(
						'width' => '50%', // Задаємо ширину поля відсотками
					),
				),
				array(
					'key' => 'field_popular_articles_post_type',
					'label' => 'Типи постів',
					'name' => 'post_types',
					'type' => 'select',
					'choices' => array(
						'news' => 'News',
						'university' => 'University',
						'reviews' => 'Reviews',
						'interviews' => 'Interviews',
					),
					'multiple' => 0,
					'allow_null' => 0,
					'instructions' => 'Виберіть тип постів, який ви хочете відображати в блоку',
					'wrapper' => array(
						'width' => '50%', // Задаємо ширину поля відсотками
					),
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'block',
						'operator' => '==',
						'value' => 'acf/popular-articles',
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

add_action('acf/init', 'register_acf_fields_for_popular_articles');


