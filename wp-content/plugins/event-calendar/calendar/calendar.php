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


function custom_calendar_shortcode($atts) {
    ob_start();

    $current_year = date('Y');

    echo '<div class="yearly-calendar">';

    // Цикл по місяцях року
    for ($current_month = 1; $current_month <= 12; $current_month++) {
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $current_month, $current_year);
        echo '<div class="monthly-name">';
        echo '<h2>' . date('F Y', mktime(0, 0, 0, $current_month, 1, $current_year)) . '</h2>';
        echo '</div>';
        echo '<div class="monthly-container">';
        echo generate_monthly_calendar_with_events($current_month, $current_year, $days_in_month);
        echo '</div>';
    }

    echo '</div>';

    return ob_get_clean();
}
add_shortcode('custom_calendar', 'custom_calendar_shortcode');



function generate_monthly_calendar_with_events($current_month, $current_year, $days_in_month) {
    $calendar = '';

    $day_names = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    foreach (range(1, $days_in_month) as $day) {
        $timestamp = mktime(0, 0, 0, $current_month, $day, $current_year);
        $day_name = $day_names[date('w', $timestamp)];
        $args = array(
            'post_type'      => 'events', // Змініть на ваш тип постів
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'event_start_date', // Змініть на ваше поле для збереження дати початку
                    'value'   => date('Y-m-d', $timestamp),
                    'compare' => '<=',
                    'type'    => 'DATE',
                ),
                array(
                    'key'     => 'event_end_date', // Змініть на ваше поле для збереження дати закінчення
                    'value'   => date('Y-m-d', $timestamp),
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
            ),
        );

        $events_query = new WP_Query($args);

        // Вивід результату
        if ($events_query->have_posts()) {
            while ($events_query->have_posts()) {
                $events_query->the_post();
                $calendar .= '<div class="event-card">';
                $calendar .= '<h3 class="event-name">' . get_the_title() . '</h3>';
                $calendar .= '</div>';
            }
        } else {
            // Якщо немає івентів, виведемо звичайну картку дня
            $calendar .= '<div class="calendar-day">';
            $calendar .= '<span class="day-number">' . $day . '</span>';
            $calendar .= '<span class="day-name">' . $day_name . '</span>';
            $calendar .= '</div>';
        }

        wp_reset_postdata(); // Скидання запиту постів
    }

    return $calendar;
}
