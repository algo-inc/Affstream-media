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

function render_intro_block( $block ): void {
	$introMediaSlider           = generateId( 'intro-media-swiper' );
	$introMediaSliderPrev       = generateId( 'intro-media-slider-prev' );
	$introMediaSliderNext       = generateId( 'intro-media-slider-next' );
	$introMediaSliderPagination = generateId( 'intro-media-slider-pagination' );
	$introSlider                 = $block['data']['intro_media_slider'];
	?>
    <section class="intro-media-section">
        <div class="container">
            <div class="inner-container">
		        <?php
		        $image = get_field('intro_banner');
		        ?>
                <img src="<?= $image['url']?>" alt="<?= $image['alt']?>">
            </div>
            <div class="inner-slider">
                <div class="intro-media-slider">
                    <div class="prev" id="<?= $introMediaSliderPrev ?>">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21.5915" cy="21.5915" r="20.5119" stroke="#100F0F" stroke-width="2.15915"/>
                            <path d="M24.0746 11.0251L16.2473 15.4742L10.6287 18.616C10.0702 18.9301 9.60598 19.3838 9.28312 19.9312C8.96027 20.4786 8.79022 21.1001 8.79022 21.7329C8.79022 22.3657 8.96026 22.9873 9.28312 23.5347C9.60597 24.082 10.0702 24.5357 10.6287 24.8498L24.0745 32.4423C26.5136 33.8267 29.582 32.1047 29.582 29.3246L29.582 14.1413C29.582 11.3628 26.5136 9.64718 24.0746 11.0251Z" fill="#100F0F"/>
                        </svg>
                    </div>
                    <div class="swiper intro-media-slider" id="<?= $introMediaSlider ?>">
                        <div class="swiper-wrapper">
							<?php
							foreach ( $introSlider as $post ) {
								setup_postdata( $post );
								?>
                                <div class="swiper-slide">
                                    <?= get_the_post_thumbnail( $post, 'large' ); ?>
                                </div>
								<?php
							}
							wp_reset_postdata();
							?>
                        </div>

                    </div>
                    <div class="next" id="<?= $introMediaSliderNext ?>">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="21.7757" cy="21.5911" r="20.5119" transform="rotate(-180 21.7757 21.5911)" stroke="#100F0F" stroke-width="2.15915"/>
                            <path d="M19.2926 32.1614L27.1198 27.7123L32.7385 24.5705C33.297 24.2564 33.7612 23.8027 34.0841 23.2553C34.4069 22.708 34.577 22.0864 34.577 21.4536C34.577 20.8208 34.4069 20.1992 34.0841 19.6519C33.7612 19.1045 33.297 18.6508 32.7385 18.3367L19.2926 10.7442C16.8536 9.35979 13.7852 11.0818 13.7852 13.8619L13.7852 29.0453C13.7852 31.8237 16.8536 33.5393 19.2926 32.1614Z" fill="#100F0F"/>
                        </svg>
                    </div>
                </div>
                <div class="swiper-pagination" id="<?= $introMediaSliderPagination ?>"></div>
                <script>
                  new Swiper('#<?= $introMediaSlider ?>', {
                    loop: true,
                    slidesPerView: 1,
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
