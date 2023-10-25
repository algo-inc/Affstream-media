<?php
/**
 * Media Recent posts by category Block template.
 *
 * @param  array  $block  The block settings and attributes.
 */
include_once( get_template_directory() . '/blocks/posts-by-category/fields.php' );

if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'recent-posts-by-category',
		'title'           => __( 'Recent Posts by category', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_recent_posts_by_category_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/posts-by-category/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}
function render_recent_posts_by_category_block( $block ): void {
	$title    = get_field( 'title', $block['id'] );
	$post_type = get_field('post_type', $block['id']);
	$sorting = get_field('sorting', $block['id']);
	$slider_id = 'swiper-' . uniqid();
    $taxonomy_name = getTaxonomyNameByPostType($post_type);
	$category_id = get_field( getFieldByPostType($post_type) , $block['id']);
	$category = get_term_by('id', $category_id, $taxonomy_name);
	?>
    <script>
      jQuery(function ($) {
        function loadCategoryContent(categoryId, categorySlug) {
          var ajaxUrl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
          var data = {
            action: 'load_posts_by_category',
            category_id: categoryId,
            category: categorySlug,
          };
          $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: data,
            success: function (response) {
              $('.category-posts').html(response);
            }
          });
        }

        $('.tab-link').on('click', function (e) {
          e.preventDefault();
          var categoryId = $(this).data('category-id');
          var categorySlug = $(this).data('category-slug');
          var newURL = window.location.pathname + '?category=' + categorySlug;
          history.pushState(null, null, newURL);
          $('.category-link').removeClass('active');
          $('.category-link[data-category-slug="' + categorySlug + '"]').addClass('active');
          $('.glossary-link').removeClass('active');
          $('.category-posts').removeClass('container-glossary');
          $(this).addClass('active');
          loadCategoryContent(categoryId, categorySlug);
        });
      });
    </script>
    <script>
      jQuery(function ($) {
        var urlParams = new URLSearchParams(window.location.search);
        var glossaryParam = urlParams.get('glossary');

        function loadGlossaryTemplate() {
          var ajaxUrl = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
          var data = {
            action: 'load_glossary_template'
          };
          $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: data,
            success: function (response) {
              $('.category-posts').addClass('container-glossary');
              $('.category-posts').html(response);
            }
          });
        }

        if (glossaryParam) {
          loadGlossaryTemplate();
          $('.glossary-link').addClass('active');
        } else {
          console.log(1);
        }

        $('.tab-glossary-link').on('click', function (e) {
          e.preventDefault();
          var newURL = window.location.pathname + '?glossary';
          history.pushState(null, null, newURL);
          loadGlossaryTemplate();
          $('.category-link').removeClass('active');
          $('.glossary-link[data-category-slug="glossary"]').addClass('active');
        });
      });
    </script>
    <section class="media-recent-posts-by-category">
        <div class="recent-posts-title">
            <h2><?php echo esc_html( $title ); ?></h2>
            <?php
            if ($category):
            ?>
            <a class="term-link tab-link" data-category-id="<?= $category->term_id ?>"
               data-category-slug="<?= $category->slug ?>"
               href="">see more</a>
            <?php
            endif;
            ?>
        </div>
        <div class="category-slider-container">
            <div class="swiper-container <?= $slider_id ?>">
                <div class="swiper-wrapper">
					<?php
					$args         = array(
						'post_type'      => $post_type,
						'posts_per_page' => 3,
						'orderby'        => 'date',
						'order'          => 'DESC',
					);

					if (!empty($category)) {
						$args['tax_query'] = array(
							array(
								'taxonomy' => $taxonomy_name,
								'field' => 'id',
								'terms' => $category_id,
							),
						);
					}

					if ($sorting === 'popular') {
						$args['orderby'] = 'meta_value_num';
						$args['meta_key'] = 'popularity';
					} elseif ($sorting === 'new') {
						$args['orderby'] = 'date';
					}

					$recent_posts = new WP_Query( $args );
					if ( $recent_posts->have_posts() ) {
						while ( $recent_posts->have_posts() ) {
							$recent_posts->the_post();
							?>
                            <div class="post-card swiper-slide">
								<?php $slide_id = get_the_ID(); ?>
                                <a href="<?= get_permalink( $slide_id ) ?>">
									<?php the_post_thumbnail( 'media-card' ); ?>
                                </a>
                                <div class="inner-content">
									<?php
									custom_display_tags( $slide_id );
									?>
                                    <a href="<?= get_permalink( $slide_id ) ?>">
										<?php
										$post_title = get_the_title();
										$trimTitle  = media_trim_title( $post_title, 30 );
										?>
                                        <h3><?= $trimTitle ?></h3>
                                    </a>
                                    <div class="post-description">
                                        <p>
											<?php $except = custom_trim_excerpt( get_the_excerpt(), 100, '...' );
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
						echo 'Постів не знайдено для обраного типу та категорії.';
					}
					?>
                </div>
                <div class=" swiper-pagination-<?= $slider_id ?>"></div>
            </div>
    </section>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.<?= $slider_id ?>', {
          slidesPerView: 3,
          spaceBetween: 75,
          pagination: {
            el: '.swiper-pagination-<?= $slider_id ?>',
            clickable: true,
          },
          breakpoints: {
            0: {
              slidesPerView: 1,
              spaceBetween: 25,
            },
            768: {
              spaceBetween: 15,
              slidesPerView: 3,
              pagination: false,
            },
            1000: {
              pagination: false,
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
        });
      });
    </script>
	<?php
}






