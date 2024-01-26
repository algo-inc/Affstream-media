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

$plugin_path = plugin_dir_path(__FILE__);
include_once($plugin_path . 'calendar/calendar.php');
function enqueue_custom_styles(): void
{
    wp_enqueue_style('calendar-styles', plugins_url('/calendar/style-calendar.css', __FILE__ ), array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


function add_event_date_metaboxes() {
    add_meta_box(
        'event_start_date',
        'Дата початку події',
        'display_event_start_date_metabox',
        'events',
        'side',
        'default'
    );

    add_meta_box(
        'event_end_date',
        'Дата закінчення події',
        'display_event_end_date_metabox',
        'events',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_event_date_metaboxes');



function display_event_start_date_metabox($post) {
    $event_start_date = get_post_meta($post->ID, 'event_start_date', true);
    ?>
    <label for="event_start_date">Дата початку:</label>
    <input type="date" id="event_start_date" name="event_start_date" value="<?php echo esc_attr($event_start_date); ?>">
    <?php
}
function display_event_end_date_metabox($post) {
    $event_end_date = get_post_meta($post->ID, 'event_end_date', true);
    ?>
    <label for="event_end_date">Дата закінчення:</label>
    <input type="date" id="event_end_date" name="event_end_date" value="<?php echo esc_attr($event_end_date); ?>">
    <?php
}

function save_event_date_meta($post_id) {
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['event_start_date'])) {
        update_post_meta($post_id, 'event_start_date', sanitize_text_field($_POST['event_start_date']));
    }

    if (isset($_POST['event_end_date'])) {
        update_post_meta($post_id, 'event_end_date', sanitize_text_field($_POST['event_end_date']));
    }
}

add_action('save_post', 'save_event_date_meta');






