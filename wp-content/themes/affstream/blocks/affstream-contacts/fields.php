<?php
if ( function_exists( 'acf_add_local_field_group' ) ) {
	acf_add_local_field_group( array(
		'key'                   => 'group_617cfd647234a',
		'title'                 => 'Контакти Affstream',
		'layout'                => 'block',
		'fields'                => array(
			array(
				'key'          => 'field_617cfd6d84567',
				'label'        => 'Повторювач полів',
				'name'         => 'contacts_repeater',
				'type'         => 'repeater',
				'instructions' => 'Додайте контактну інформацію тут',
				'collapsed'    => 'field_617cfd8a84568',
				'min'          => 0,
				'max'          => 0,
				'layout'       => 'block',
				'button_label' => 'Додати контакт',
				'sub_fields'   => array(
					array(
						'key'     => 'field_617cfd9f8456a',
						'label'   => 'Фото',
						'name'    => 'contact_photo',
						'type'    => 'image',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => '',
						'label'   => 'Імя',
						'name'    => 'contact_name',
						'type'    => 'text',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd8a84568',
						'label'   => 'Посада',
						'name'    => 'contact_position',
						'type'    => 'text',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd9384569',
						'label'   => 'Email',
						'name'    => 'contact_email',
						'type'    => 'email',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd9f8456b',
						'label'   => 'Skype',
						'name'    => 'contact_skype',
						'type'    => 'link',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd9f8456c',
						'label'   => 'Telegram',
						'name'    => 'contact_telegram',
						'type'    => 'link',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd9f8456d',
						'label'   => 'LinkedIn',
						'name'    => 'contact_linkedin',
						'type'    => 'link',
						'wrapper' => array(
							'width' => '50%',
						),
					),
					array(
						'key'     => 'field_617cfd9f8456e',
						'label'   => 'WhatsApp',
						'name'    => 'contact_whatsapp',
						'type'    => 'link',
						'wrapper' => array(
							'width' => '50%',
						),
					),
				),
			),
		),
		'location'              => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/affstream-contacts',
				),
			),
		),
		'menu_order'            => 0,
		'position'              => 'acf_after_title',
		'style'                 => 'default',
		'label_placement'       => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen'        => '',
		'active'                => true,
		'description'           => '',
	) );
}
?>
