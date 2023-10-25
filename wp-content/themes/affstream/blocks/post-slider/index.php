<?php
/**
 * Media slider Block template.
 *
 * @param  array  $block  The block settings and attributes.
 */
?>
<?php
include_once( get_template_directory() . '/blocks/recent-posts/fields.php' );
function enqueue_custom_block_script() {
	wp_enqueue_script(
		'custom-block-script',
		get_template_directory_uri() . '/blocks/post-slider/scripts.js',
		array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-editor' ),
		'1.0.0',
		true
	);
}

add_action( 'enqueue_block_editor_assets', 'enqueue_custom_block_script' );
if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'your-namespace/custom-block',
		'title'           => __( 'Media slider', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_custom_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/post-slider/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function render_custom_block( $block ): void {
	$postType = strtolower( get_field( 'posts_type_name', $block['id'] ) );
	$slides   = $block['data'][ 'select_' . $postType ];
	$title    = get_field( 'title', $block['id'] );
    $color = get_field('title_color', $block['id']);
	$textColor = get_field('text_color', $block['id']);
    $typePost  = get_field('posts_type_name', $block['id']);
    $see_more_link = get_field('see_more_link', $block['id']);
	?>
    <section class="new-posts">
		<?php
		$newPostsSlider           = generateId( 'new-posts-swiper' );
		$newPostsSliderPrev       = generateId( 'new-posts-slider-prev' );
		$newPostsSliderNext       = generateId( 'new-posts-slider-next' );
		$newPostsSliderPagination = generateId( 'new-posts-slider-pagination' );
		?>
        <div class="container">
            <div class="title-container">
                <h2 class="wow animate__fadeInLeft animated" style="background: <?= $color ?>; color: <?= $textColor?>;"><?= $title ?></h2>
                <a class="archive-link" href="<?= $see_more_link?>">see more</a>
            </div>
            <div class="swiper swiper-blog" id="<?= $newPostsSlider ?>">
                <div class="swiper-wrapper">
					<?php
					if ( ! empty( $slides ) ) { ?>
						<?php
						foreach ( $slides as $post_id ) {
							$post = get_post( $post_id );
							setup_postdata( $post );
							?>
                            <div class="swiper-slide">
                                <div class="post-card">
									<?php $slide_id = $post->ID;
									?>
                                    <a href="<?= get_permalink( $slide_id ) ?>">
										<?=
										get_the_post_thumbnail( $slide_id, '' );
										?>
                                    </a>
                                    <div class="inner-content">
	                                    <?php
	                                    custom_display_tags($slide_id);
	                                    ?>
                                        <a href="<?= get_permalink( $slide_id ) ?>">
                                            <h3><?= get_the_title( $slide_id ); ?></h3>
                                        </a>
                                        <div class="post-description">
	                                        <?php
                                            $text = get_the_excerpt();
                                            $except = custom_trim_excerpt ($text, 60, '...'  );
	                                        echo $except;
	                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
						}
						wp_reset_postdata();
						?>
						<?php
					} else {
						$args = array(
							'post_type'      => $postType,
							'posts_per_page' => 3,
							'orderby'        => 'date',
							'order'          => 'DESC',
						);
						$recent_posts = new WP_Query( $args );
						if ( $recent_posts->have_posts() ) :
							while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
								?>
                                <div class="swiper-slide">
                                    <?= get_template_part('blocks/components/post-card'); ?>
                                </div>
							<?php
							endwhile;
							wp_reset_postdata();
						else :
							echo 'Немає постів для відображення.';
						endif;
					}
                    ?>
                </div>
                <div class="swiper-pagination " id="<?= $newPostsSliderPagination ?>"></div>
            </div>
        </div>
        <script>
          var swiperOptions = {
            spaceBetween: 35,
            slidesPerView: 3,
            initialSlide: 1,
            speed: 300,
            navigation: {
              nextEl: '#<?= $newPostsSliderNext ?>',
              prevEl: '#<?= $newPostsSliderPrev ?>',
            },
            breakpoints: {
              0: {
                slidesPerView: 1,
                spaceBetween: 16,
                pagination: {
                  el: '#<?= $newPostsSliderPagination ?>',
                  type: 'bullets',
                },
              },
              768: {
                spaceBetween: 15,
                slidesPerView: 2,
                pagination: {
                  el: '#<?= $newPostsSliderPagination ?>',
                  type: 'bullets',
                },
              },
              1000: {
                pagination: false,
                slidesPerView: 3,
              },
              1300: {
                spaceBetween: 40,
              },
              1600: {
                spaceBetween: 85,
              },
              1920: {
                spaceBetween: 90,
              }
            }
          };
          if (window.innerWidth <= 768) {
            swiperOptions.pagination = {
              el: '#<?= $newPostsSliderPagination ?>',
              type: 'bullets',
            };
          }

          new Swiper('#<?= $newPostsSlider ?>', swiperOptions);
        </script>
    </section>
	<?php
}


