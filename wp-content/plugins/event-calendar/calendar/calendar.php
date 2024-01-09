<?php
function your_events_enqueue_block_editor_assets() {
    wp_enqueue_script(
        'calendar-block',
        plugin_dir_url( __FILE__ ) . 'calendar/ScriptsCalendar.js',
        array( 'wp-blocks', 'wp-element' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'calendar/ScriptsCalendar.js' ),
        true
    );
}
add_action( 'enqueue_block_editor_assets', 'your_events_enqueue_block_editor_assets' );