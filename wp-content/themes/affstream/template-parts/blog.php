<section class="blog">
    <div class="home-blog-title wow animate__animated  animate__fadeInLeft ">
        affstream media
    </div>
    <div class="container">
        <div class="top-blog">
            <div class="swiper blog-slider-top">
                <div class="swiper-wrapper">
					<?php
					$post_types   = array( 'reviews', 'university', 'interviews', 'news' );
					$args         = array(
						'post_type'      => $post_types,
						'posts_per_page' => 4,
						'orderby'        => 'date',
						'order'          => 'DESC',
					);
					$latest_posts = new WP_Query( $args );
					if ( $latest_posts->have_posts() ) :
						while ( $latest_posts->have_posts() ) :
							$latest_posts->the_post();
							?>
                            <div class="swiper-slide">
                                <div class="blog-post">
									<?php
									$post_type        = get_post_type();
									$post_id          = get_the_ID();
									$taxonomy_name    = getTaxonomyNameByPostType( $post_type );
									$categories       = get_the_terms( $post_id, $taxonomy_name );
									$post_type_object = get_post_type_object( $post_type );
									?>
                                    <img class="swiper-lazy" data-src="<?php the_post_thumbnail_url( $post_id, 'thumbnail' ); ?>" loading="lazy" alt="<?php the_title( $post_id ); ?>">
                                    <div class="swiper-lazy-preloader"></div>
                                    <div class="info-container">
                                        <div class="category">
											<?php
											if ( $post_type_object ) {
												$post_type_name = $post_type_object->labels->singular_name; ?>
                                                <div class="item post-type-name"><?= $post_type_name ?></div>
												<?php

											} else {
												echo 'Тип запису не знайдено.';
											}
											if ( ! empty( $categories ) ) {
												$category_names = array();
												foreach ( $categories as $category ) {
													if ( $category->name ):
														?>
                                                        <div class="item category-name"><?= $category->name ?></div>
													<?php
													endif;
													?>
													<?php
												}
											}
											?>
                                        </div>
                                        <?php
                                        $post_title = get_the_title();
                                        $title = custom_trim_excerpt($post_title, 70 );

                                        ?>
                                        <h3 class="title"><?= $title ?></h3>
                                        <p>
		                                    <?php
		                                    $text = get_the_excerpt();
		                                    $except = custom_trim_excerpt ($text, 200, '...'  );
		                                    echo $except;
		                                    ?>
                                        </p>
                                        <a class="see-more" aria-label="<?= $title ?>" href="<?php the_permalink(); ?>">See more</a>
                                    </div>
                                </div>
                            </div>
						<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
                </div>
            </div>
        </div>
        <div class="other-blogs-pages">
            <div class="swiper blog-slider">
                <div class="swiper-wrapper">
					<?php
					$latest_posts = new WP_Query( $args );
					if ( $latest_posts->have_posts() ) :
						while ( $latest_posts->have_posts() ) :
							$latest_posts->the_post();
							?>
                            <div class="swiper-slide">
                                <div class="blog-post">
									<?php the_post_thumbnail( 'thumbnail' ); ?>
                                </div>
                            </div>
						<?php
						endwhile;
						wp_reset_postdata();
					endif;
					?>
                </div>
            </div>
        </div>
    </div>

</section>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var blogSliderTop = new Swiper('.blog-slider-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      loop: true,
      loopedSlides: 4,
      lazy: true,
    });

    var blogSlider = new Swiper('.blog-slider', {
      spaceBetween: 60,
      slidesPerView: 4,
      touchRatio: 0.2,
      slideToClickedSlide: true,
      loop: true,
      loopedSlides: 4,
      breakpoints: {
        0: {
          centeredSlides: true,
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768:{
          slidesPerView: 4,
          spaceBetween: 40,
        }
      },
    });
    blogSlider.controller.control = blogSliderTop;
  });
</script>


