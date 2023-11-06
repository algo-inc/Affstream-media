<?php
/**
 * Media intro Block template.
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

add_action( 'enqueue_block_editor_assets', 'enqueue_intro_block_script' );
if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'Intro media',
		'title'           => __( 'intro media', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_intro_block',
            'enqueue_style'   => get_template_directory_uri() . '/blocks/media-intro/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function render_intro_block($block): void {
	$introMediaSlider           = generateId('intro-media-swiper');
	$introMediaSliderPrev       = generateId('intro-media-slider-prev');
	$introMediaSliderNext       = generateId('intro-media-slider-next');
	$introMediaSliderPagination = generateId('intro-media-slider-pagination');
	$introSlider                = $block['data']['intro_media_slider'];

	if (empty($introSlider)) {

		$introSliderQuery = new WP_Query(array(
			'post_type'      => array('news', 'university', 'reviews', 'interviews'),
			'posts_per_page' => 3,
			'order'          => 'DESC',
		));

		$introSlider = $introSliderQuery->posts;
	}
	?>

	<?php
	if (!empty($introSlider)) {
		?>
        <section class="intro-media-section">
            <div class="container">
                <div class="inner-container">
					<?php
					$image = get_field('intro_banner');
					?>
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                </div>
                <div class="inner-slider">
                    <div class="intro-media-slider">
                        <div class="prev" id="<?= $introMediaSliderPrev ?>">
                        </div>
                        <div class="swiper intro-media-slider" id="<?= $introMediaSlider ?>">
                            <div class="swiper-wrapper">
								<?php
								foreach ($introSlider as $post) {
									setup_postdata($post);
									?>
                                    <div class="swiper-slide">
                                        <a href="<?php the_permalink($post) ?>">
											<?= get_the_post_thumbnail($post, 'full'); ?>
                                        </a>
                                    </div>
									<?php
								}
								wp_reset_postdata();
								?>
                            </div>
                        </div>
                        <div class="next" id="<?= $introMediaSliderNext ?>">
                        </div>
                    </div>
                    <div class="swiper-pagination" id="<?= $introMediaSliderPagination ?>"></div>
                    <script>
                      new Swiper('#<?= $introMediaSlider ?>', {
                        slidesPerView: 1,
                        speed: 600,
                        loop: true,
                        spaceBetween: 10,
                        autoplay: {
                          delay: 2000,
                        },
                        navigation: {
                          nextEl: '#<?= $introMediaSliderNext ?>',
                          prevEl: '#<?= $introMediaSliderPrev ?>',
                        },
                        pagination: {
                          el: '#<?= $introMediaSliderPagination ?>',
                          type: 'bullets',
                        },
                      });
                    </script>
                </div>
            </div>
        </section>
		<?php
	}
}

