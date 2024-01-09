<?php
/*
Plugin Name:  Events calendar
Description: Custom events post type and calendar.
Version: 1.0
Author: Oleksandr Goya
*/
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

add_action( 'init', 'create_events_post_type' );




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