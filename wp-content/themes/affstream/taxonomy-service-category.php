<?php get_header( 'media' );
$page_id = get_the_ID();
$title   = get_the_title();
$content = get_post( $page_id );
?>

<div class="posts-section reviews">
    <div class="title-container">
        <h2 class="section-title"><?php

	        $current_taxonomy = get_queried_object();
	        if ($current_taxonomy) {
		        // Виведення заголовка поточної таксономії
		        echo '<h1>' . $current_taxonomy->name . '</h1>';
	        }
			?>
        </h2>

    </div>

    <div class="affstream-services">
        <div class="field-title">
            <h4 class="column-name"><?= __( 'Service' ) ?></h4>
            <h4 class="column-name"><?= __( 'Description' ) ?></h4>
            <h4 class="column-name"><?= __( 'Price' ) ?></h4>
        </div>
		<?php
		$category_slug = get_query_var( 'service-category' );
		$category      = get_term_by( 'slug', $category_slug, 'service-category' );
		$category_id   = $category->term_id;
		$args          = array(
			'post_type'  => 'services',
			'tax_query'  => array(
				array(
					'taxonomy' => 'service-category',
					'field'    => 'term_id',
					'terms'    => $category_id,
				),
			),
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key'     => 'top_service',
					'value'   => 'true',
					'compare' => '='
				),
				array(
					'key'     => 'top_service',
					'compare' => 'NOT EXISTS'
				)
			),
			'orderby'    => array(
				'meta_value' => 'DESC',
				'post_date'  => 'DESC'
			)
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) : $query->the_post(); ?>
                <div class="service-card">
					<?php $service_id = get_the_ID(); ?>
					<?php
					$service_icon  = get_field( 'service_icon', $service_id );
					$monthly_price = get_field( 'monthly_price', $service_id );
					$is_top        = get_field( 'field_is_top', $service_id );
					$from_ukraine  = get_field( 'field_from_ukraine', $service_id );
					?>
					<?php if ( $is_top ) { ?>
                        <div class="is-top top-style"
                             style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                            TOP
                        </div>
					<?php } ?>
                    <a href="<?php the_permalink( $service_id ); ?>"
                       class="service-card <?php if ( $is_top ): echo 'top_card'; endif; ?>">
						<?php if ( $is_top ) { ?>
                            <div class="is-top top-style"
                                 style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                TOP
                            </div>
						<?php } ?>
                        <div class="card-container">
                            <div class="service-icon">
                                <div class="container">
                                    <div class="border"
                                         style="<?php if ( $from_ukraine ): echo 'border: 3px solid #0C62FD; border-radius: 10px; width: fit-content;'; endif; ?>">
                                        <div class="from-ukraine"
                                             style="<?php if ( ! $from_ukraine ): echo 'border: none;'; endif; ?>">
											<?php if ( $service_icon ) { ?>
                                                <img src="<?= $service_icon['url'] ?>"
                                                     alt="<?= $service_icon['alt'] ?>">
												<?php
											}
											?>
                                        </div>
                                    </div>


									<?php if ( $is_top ) { ?>
                                        <div class="is-top-mobile top-style"
                                             style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                            TOP
                                        </div>

									<?php } else { ?>
                                        <div class="block"></div>
										<?php
									}
									?>
                                </div>

                            </div>
                            <div class="service-description">

								<?php the_excerpt(); ?>

                            </div>
                            <div class="monthly-price">
								<?php if ( ! empty( $monthly_price ) ) {
									echo '<p>' . esc_html( $monthly_price ) . '</p>';
								} ?>
                            </div>
							<?php if ( $is_top ) { ?>
                                <div class="is-top-inner top-style"
                                     style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                    TOP
                                </div>
							<?php } ?>
                            <div class="single-page-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="61" viewBox="0 0 60 61"
                                     fill="none">
                                    <circle cx="30" cy="30.1201" r="30" transform="rotate(-90 30 30.1201)"
                                            fill="#0C62FD"/>
                                    <path d="M16.3203 28.6201C15.4919 28.6201 14.8203 29.2917 14.8203 30.1201C14.8203 30.9485 15.4919 31.6201 16.3203 31.6201L16.3203 28.6201ZM44.7335 31.1808C45.3193 30.595 45.3193 29.6452 44.7335 29.0595L35.1876 19.5135C34.6018 18.9277 33.652 18.9277 33.0662 19.5135C32.4805 20.0993 32.4805 21.049 33.0662 21.6348L41.5515 30.1201L33.0662 38.6054C32.4805 39.1912 32.4805 40.1409 33.0662 40.7267C33.652 41.3125 34.6018 41.3125 35.1876 40.7267L44.7335 31.1808ZM16.3203 31.6201L43.6728 31.6201L43.6728 28.6201L16.3203 28.6201L16.3203 31.6201Z"
                                          fill="#EDEDFF"/>
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
			<?php
			endwhile;
		}

		wp_reset_postdata();
		?>
    </div>

	<?php
	if ( $query->max_num_pages > 1 ) {
		echo '<div class="pagination">';
		echo paginate_links( array(
			'total'     => $query->max_num_pages,
			'current'   => $paged,
			'prev_text' => '&laquo;',
			'next_text' => '&raquo;',
		) );
		echo '</div>';
	}
	?>
</div>
<?php get_footer( 'media' ); ?>
