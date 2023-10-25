<?php
/**
 * Media Recent posts by category Block template.
 * @param  array  $block  The block settings and attributes.
 */
include_once( get_template_directory() . '/blocks/popular-post/fields.php' );
function enqueue_block_editor_assets() {
	wp_enqueue_style(
		'popular-articles-block-editor-style',
		get_template_directory_uri() . '/blocks/popular-post/editor-style.css',
		array('wp-edit-blocks') // Залежність від стандартного CSS-файлу редактора
	);
}

add_action('enqueue_block_editor_assets', 'enqueue_block_editor_assets');


if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'popular-articles',
		'title'           => __( 'Popular Articles', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'popular_articles_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/popular-post/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function popular_articles_block( $block ): void {
	$title = get_field('title', $block['id']);
	$post_types = get_field('post_types', $block['id']);
	?>
    <section class="popular-articles-block">
        <div class="popular-articles-title">
            <h2><?php echo esc_html($title); ?></h2>
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
                                <h3><?= get_the_title( $slide_id ); ?></h3>
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





