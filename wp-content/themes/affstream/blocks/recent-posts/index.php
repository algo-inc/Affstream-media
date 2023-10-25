<?php
/**
 * Media Recent posts Block template.
 *
 * @param  array  $block  The block settings and attributes.
 */
function recent_posts_block_script(): void {
	wp_enqueue_script(
		'custom-block-script',
		get_template_directory_uri() . '/blocks/recent-posts/scripts.js',
		array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-editor' ),
		'1.0.0',
		true
	);
}
add_action('acf/init', 'recent_posts_block_script');
include_once( get_template_directory() . '/blocks/recent-posts/fields.php' );

if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'recent-posts',
		'title'           => __( 'Recent Posts', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_recent_posts_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/recent-posts/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function render_recent_posts_block( $block ): void {
	$title = get_field('title', $block['id']);
	$second_title = get_field('second_title', $block['id']);
	$background_color = get_field('background_color', $block['id']);
	$text_color = get_field('text_color', $block['id']);
	$post_types = get_field('post_types', $block['id']);

	?>
    <section class="media-recent-posts">
        <div class="recent-posts-title">
            <h2 style="background: <?php echo esc_attr($background_color); ?>; color: <?php echo esc_attr($text_color); ?>"><?php echo esc_html($title); ?></h2>
        </div>
        <div class="container">
			<?php
			$args = array(
				'post_type'      => empty($post_types) ? array('news', 'university', 'reviews', 'interviews') : $post_types,
				'posts_per_page' => 3,
				'orderby'        => 'date',
				'order'          => 'DESC',
			);
			$recent_posts = new WP_Query( $args );
			if ( $recent_posts->have_posts() ) {
				while ( $recent_posts->have_posts() ) {
					$recent_posts->the_post();
					?>
                    <div class="post-card">
						<?php $slide_id = get_the_ID(); ?>
                        <a href="<?= get_permalink( $slide_id ) ?>">
							<?php the_post_thumbnail( $slide_id, '' ); ?>
                        </a>
                        <div class="inner-content">
							<?php
							custom_display_tags($slide_id);
							?>
                            <a href="<?= get_permalink( $slide_id ) ?>">
	                            <?php
	                            $post_title = get_the_title($slide_id);
	                            $trimTitle = media_trim_title($post_title, 40);
	                            ?>
                                <h3><?= $trimTitle ?></h3>
                            </a>
                            <div class="post-description">
                                <p>
	                                <?php $except = custom_trim_excerpt( get_the_excerpt(), 100, '...'  );
	                                echo $except
	                                ?>
                                </p>
                            </div>
                        </div>
                    </div>
					<?php
				}
				wp_reset_postdata();
			} else {
				echo 'Постів не знайдено.';
			}
			?>
        </div>
    </section>
	<?php
}




