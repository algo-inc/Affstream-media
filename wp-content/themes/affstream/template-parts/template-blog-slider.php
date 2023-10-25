<section class="new-posts">
	<?php
	$newPostsSlider           = generateId( 'new-posts-swiper' );
	$newPostsSliderPrev       = generateId( 'new-posts-slider-prev' );
	$newPostsSliderNext       = generateId( 'new-posts-slider-next' );
	$newPostsSliderPagination = generateId( 'new-posts-slider-pagination' );
	$postType                 = $args['postType'];
	$category_slug            = $args['category'];
	$category                 = get_term_by( 'slug', $category_slug, 'reviews-categories' );
	$query_args               = array(
		'post_type'      => $postType,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => 3,
	);
	if ( ! empty( $category_slug ) ) {
		$query_args['tax_query'] = array(
			array(
				'taxonomy' => 'reviews-categories',
				'field'    => 'slug',
				'terms'    => $category_slug,
			),
		);
	}
	$query = new WP_Query( $query_args );
	?>
    <div class="category-slider-container">
        <div class="reviews-title-container">
            <h2><?php echo $args['title'] ?></h2>
            <?php if ( $category ) {
				$category_link = get_term_link( $category );
				if ( ! is_wp_error( $category_link ) ) {
					echo '<a class="term-link" href="' . esc_url( $category_link ) . '">see more</a>';
				}
			} ?>
        </div>
        <div class="swiper swiper-blog" id="<?= $newPostsSlider ?>">
            <div class="swiper-wrapper">
				<?php
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						$post_id = get_the_ID();
						?>
                        <div class="post-card swiper-slide">
                            <a class="" href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'media-card' ); ?>
                            </a>
                            <div class="inner-content">
								<?php
								$terms = wp_get_post_terms( get_the_ID(), 'affstream-tags' );
								if ( $terms && ! is_wp_error( $terms ) ) {
									echo '<div class="tags">';
									$count = 0;
									foreach ( $terms as $term ) {
										if ( $count < 4 ) {
											echo '<a class="tag" href="' . get_term_link( $term,
													'affstream-tags' ) . '">' . esc_html( $term->name ) . '</a>';
											$count ++;
										} else {
											break;
										}
									}
									echo '</div>';
								}
								?>

                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                                <div class="post-description">
									<?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
					<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>

            </div>
            <div class="swiper-pagination " id="<?= $newPostsSliderPagination ?>"></div>
        </div>
    </div>
    <script>
      new Swiper('#<?= $newPostsSlider?>', {
        spaceBetween: 75,
        slidesPerView: 3,
        pagination: {
          el: '#<?= $newPostsSliderPagination ?>',
          type: 'bullets',
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
            spaceBetween: 75,
          },
          1600: {
            spaceBetween: 85,
          },
          1920: {
            spaceBetween: 90,
          }
        }
      });
    </script>
</section>
