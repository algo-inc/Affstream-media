<?php
/**
 * Media affstream-quote Block template.
 *
 * @param  array  $block  The block settings and attributes.
 */
?>
<?php
function enqueue_intro_block_script() {
	wp_enqueue_script(
		'custom-intro-script',
		get_template_directory_uri() . '/blocks/media-intro/scripts.js',
		array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-editor' ),
		'1.0.0',
		true
	);
}

// Створення групи полів для вашого блоку
function my_acf_block_fields() {
	acf_add_local_field_group(array(
		'key' => 'group_affstream_quote',
		'title' => 'Поля блоку Affstream Quote',
		'location' => array(array('block' => 'acf/affstream-quote')), // Замініть на ваш ключ блоку
		'fields' => array(
			array(
				'key' => 'field_text',
				'label' => 'Текстове поле',
				'name' => 'text_field', // Змініть на ваше унікальне ім'я поля
				'type' => 'text',
				'instructions' => 'Введіть текст', // Опціональна інструкція для користувача
			),
			// Додайте інші поля тут, якщо потрібно
		),
	));
}

// Додавання полів до блоку при ініціалізації ACF
add_action('acf/init', 'my_acf_block_fields');




add_action( 'enqueue_block_editor_assets', 'enqueue_intro_block_script' );
if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'Affstream quote',
		'title'           => __( 'Affstream quote', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_affstream_quote',
        'enqueue_style'   => get_template_directory_uri() . '/blocks/affstream-quote/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function render_affstream_quote($block): void {
    ?>
    <div class="affstream-quote">
        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16" fill="none">
            <path d="M3.97331 15.4676L9.62015 12.4872L13.6737 10.3824C14.0766 10.172 14.4115 9.86807 14.6444 9.50139C14.8773 9.13471 15 8.71832 15 8.2944C15 7.87048 14.8773 7.45409 14.6444 7.08741C14.4115 6.72073 14.0766 6.41678 13.6737 6.20636L3.97331 1.1201C2.21368 0.192683 0 1.3463 0 3.20868L0 13.3801C0 15.2414 2.21368 16.3907 3.97331 15.4676Z" fill="#0C62FD"/>
        </svg>

    </div>
<?php
}

