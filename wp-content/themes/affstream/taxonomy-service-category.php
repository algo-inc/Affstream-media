<?php get_header( 'media' );
$page_id = get_the_ID();
$title   = get_the_title();
$content = get_post( $page_id );
?>

<div class="posts-section reviews">
    <div class="title-container">
        <h2 class="section-title">catalog services</h2>
    </div>
    <div class="affstream-services">
		<?php
		$category_slug = get_query_var('service-category');
		$category = get_term_by('slug', $category_slug, 'service-category');
		$category_id = $category->term_id;

		$args = array(
			'post_type' => 'services',
			'tax_query' => array(
				array(
					'taxonomy' => 'service-category',
					'field' => 'term_id',
					'terms' => $category_id,
				),
			),
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'top_service',
					'value' => 'true',
					'compare' => '='
				),
				array(
					'key' => 'top_service',
					'compare' => 'NOT EXISTS'
				)
			),
			'orderby' => array(
				'meta_value' => 'DESC',
				'post_date' => 'DESC'
			)
		);

		$query = new WP_Query($args);

		if ($query->have_posts()) {
			while ($query->have_posts()) : $query->the_post();?>
                <div class="service-card">
					<?php $service_id = get_the_ID(); ?>

					<?php
					$service_icon          = get_field( 'service_icon', $service_id );
					$monthly_price         = get_field( 'monthly_price', $service_id );
					$page_university_gude  = get_field( 'related_post_1', $service_id );
					$page_reviews_services = get_field( 'related_post_2', $service_id );
					$is_top                = get_field( 'field_is_top', $service_id );
					?>
					<?php if ( $is_top ) { ?>
                        <div class="is-top top-style"
                             style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                            TOP
                        </div>
					<?php } ?>
                    <div class="card-container">
                        <div class="service-icon">
							<?php
							if ( $service_icon ) {
								echo '<img src="' . esc_url( $service_icon['url'] ) . '" alt="' . esc_attr( $service_icon['alt'] ) . '" />';
							}
							?>
	                        <?php if ( $is_top ) { ?>
                                <div class="is-top-mobile top-style"
                                     style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                    TOP
                                </div>
	                        <?php } ?>
                        </div>
                        <div class="service-description">
                            <p>
								<?php $excerpt = custom_trim_excerpt( get_the_excerpt(), 100, '...' );
								echo $excerpt;
								?>
                            </p>
                        </div>
                        <div class="monthly-price">
							<?php
							if ( ! empty( $monthly_price ) ) {
								echo '<p>' . esc_html( $monthly_price ) . '</p>';
							}
							?>
                        </div>
	                    <?php if ( $is_top ) { ?>
                            <div class="is-top-inner top-style"
                                 style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                TOP
                            </div>
	                    <?php } ?>
                        <div class="links">
							<?php if ( ! empty( $page_university_gude ) ) {
								$page_university_gude_link = get_permalink( $page_university_gude );
								?>
                                <a class="page-link" href="<?= $page_university_gude_link ?>"> Guide
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                                         viewBox="0 0 11 12" fill="none">
                                        <path d="M2.79518 11.1918L6.52341 9.07263L9.19967 7.57612C9.46571 7.42651 9.68681 7.21039 9.84059 6.94968C9.99438 6.68896 10.0754 6.3929 10.0754 6.09148C10.0754 5.79006 9.99438 5.494 9.84059 5.23328C9.68681 4.97257 9.46571 4.75646 9.19967 4.60684L2.79518 0.990411C1.63342 0.330998 0.171875 1.15124 0.171875 2.47543L0.171875 9.70753C0.171875 11.031 1.63342 11.8481 2.79518 11.1918Z"
                                              fill="url(#paint0_linear_3795_4832)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_3795_4832" x1="0.171875" y1="0.757812"
                                                            x2="11.2114" y2="2.10351"
                                                            gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0C62FD"/>
                                                <stop offset="1" stop-color="#1035B8"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </a>
								<?php
							}
							if ( ! empty( $page_reviews_services ) ) {
								$page_reviews_services_link = get_permalink( $page_reviews_services );
								?>
                                <a class="page-link" href="<?= $page_reviews_services_link ?>"> Reviews
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="12"
                                         viewBox="0 0 11 12" fill="none">
                                        <path d="M2.79518 11.1918L6.52341 9.07263L9.19967 7.57612C9.46571 7.42651 9.68681 7.21039 9.84059 6.94968C9.99438 6.68896 10.0754 6.3929 10.0754 6.09148C10.0754 5.79006 9.99438 5.494 9.84059 5.23328C9.68681 4.97257 9.46571 4.75646 9.19967 4.60684L2.79518 0.990411C1.63342 0.330998 0.171875 1.15124 0.171875 2.47543L0.171875 9.70753C0.171875 11.031 1.63342 11.8481 2.79518 11.1918Z"
                                              fill="url(#paint0_linear_3795_4832)"></path>
                                        <defs>
                                            <linearGradient id="paint0_linear_3795_4832" x1="0.171875" y1="0.757812"
                                                            x2="11.2114" y2="2.10351"
                                                            gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#0C62FD"/>
                                                <stop offset="1" stop-color="#1035B8"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </a>
								<?php
							} ?>
                        </div>
                    </div>
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
