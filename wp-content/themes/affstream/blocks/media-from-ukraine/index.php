<?php
/**
 * Media from Ukraine template.
 *
 * @param  array  $block  The block settings and attributes.
 */
?>
<?php
if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'Media from Ukraine',
		'title'           => __( 'Media from Ukraine', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_media_from_ukraine_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/media-from-ukraine/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}
function render_media_from_ukraine_block( $block ): void { ?>
    <section class="video-section">
        <div class="container">
			<?php
			$videoID = 'youtube_video_id';
			$args    = array(
				'videoID' => $videoID,
			);
			?>
			<?php
			$mediaSlider           = generateId( 'media-swiper' );
			$mediaSliderPrev       = generateId( 'media-slider-prev' );
			$mediaSliderNext       = generateId( 'media-slider-next' );
			$mediaSliderPagination = generateId( 'media-slider-pagination' );
            $title = get_field('title');
			?>
            <div class="video-slider-container">
                <div class="slider-title">
                    <h2><?= $title?></h2>
                    <div class="navigation">
                        <div class="next" id="<?= $mediaSliderNext ?>">
                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="14.6388" cy="15.5333" r="13.9069" stroke="#100F0F" stroke-width="1.46388"/>
                                <path d="M16.3246 8.00083L11.0178 11.0172L7.20843 13.1474C6.82976 13.3603 6.51503 13.6679 6.29614 14.039C6.07725 14.4101 5.96196 14.8316 5.96196 15.2606C5.96196 15.6896 6.07725 16.111 6.29614 16.4822C6.51503 16.8533 6.82976 17.1609 7.20843 17.3738L16.3246 22.5215C17.9782 23.4601 20.0586 22.2925 20.0586 20.4077L20.0586 10.1135C20.0586 8.22976 17.9782 7.06658 16.3246 8.00083Z"
                                      fill="#100F0F"/>
                            </svg>
                        </div>
                        <div class="prev" id="<?= $mediaSliderPrev ?>">
                            <svg width="30" height="31" viewBox="0 0 30 31" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="15.0448" cy="15.5331" r="13.9069" transform="rotate(-180 15.0448 15.5331)"
                                        stroke="#100F0F" stroke-width="1.46388"/>
                                <path d="M13.3629 22.6994L18.6697 19.683L22.4791 17.5528C22.8577 17.3399 23.1725 17.0323 23.3914 16.6612C23.6102 16.2901 23.7255 15.8686 23.7255 15.4396C23.7255 15.0106 23.6103 14.5892 23.3914 14.218C23.1725 13.8469 22.8577 13.5393 22.4791 13.3264L13.3629 8.17874C11.7093 7.24013 9.62891 8.40767 9.62891 10.2925L9.6289 20.5867C9.6289 22.4704 11.7093 23.6336 13.3629 22.6994Z"
                                      fill="#100F0F"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="swiper video-slider">
                    <div class="swiper-wrapper">
						<?php
						if ( have_rows( 'youtube_video' ) ):
							while ( have_rows( 'youtube_video' ) ) : the_row();
								$videoPreviewImage = get_sub_field( 'video_preview_image' );
								$url               = get_sub_field( 'youtube_video_id' );
								$explodedUrl       = explode( '/', $url );
								$id                = $explodedUrl[ count( $explodedUrl ) - 1 ];
								?>
                                <div class="swiper-slide">
                                    <div class="video-preview " onclick="showModal('<?= $id ?>')">
                                        <img src="<?= $videoPreviewImage['url'] ?>"
                                             alt="<?= $videoPreviewImage['alt'] ?>">
                                    </div>
                                </div>
							<?php
							endwhile;
						endif;
						?>
                    </div>
                    <div class="swiper-pagination" id="<?= $mediaSliderPagination ?>"></div>
                </div>
                <img class="block-logo" src="<?= get_template_directory_uri() . '/blocks/media-from-ukraine/ua-logo.svg' ?>" alt="">
            </div>
            <script>
              new Swiper('.video-slider', {
                loop: true,
                slidesPerView: 1,
                navigation: {
                  nextEl: '#<?= $mediaSliderNext ?>',
                  prevEl: '#<?= $mediaSliderPrev ?>',
                },
                pagination: {
                  el: '#<?= $mediaSliderPagination ?>',
                  type: 'bullets',
                },
              });
            </script>
            <div id="video-modal" class="video-modal" onclick=" closeModal()">
                <button class="close-modal" onclick="closeModal()">&times;</button>
                <div style="max-width: 1400px; height: 100%; margin: 0 auto; padding: 0 12px; display: flex; align-items: center">
                    <div class="videoWrapper">
                        <iframe id="ytiframe" width="1024" height="768" src="" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
			<?php
			?>
            <div class="banner">
                <?php
                $image_banner = get_field('banner_image');
                ?>
                <img src="<?= $image_banner['url']?>" alt="<?= $image_banner['alt']?>">
            </div>
        </div>
    </section>
    <script>
      const iframe = document.getElementById('ytiframe');
      const modal = document.getElementById('video-modal');

      function showModal(id) {
        modal.style.display = 'block';
        iframe.src = 'https://www.youtube.com/embed/' + id;
      }

      function closeModal() {
        modal.style.display = 'none';
        iframe.src = '';
      }
    </script>
	<?php
}
