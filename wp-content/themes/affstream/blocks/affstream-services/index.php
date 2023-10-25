<?php
/**
 * Affstream Services Block template.
 *
 * @param  array  $block  The block settings and attributes.
 */
function affstream_services_block_script(): void {
	wp_enqueue_script(
		'custom-block-script',
		get_template_directory_uri() . '/blocks/affstream-services/scripts.js',
		array( 'wp-blocks', 'wp-components', 'wp-element', 'wp-editor' ),
		'1.0.0',
		true
	);
}

add_action( 'acf/init', 'affstream_services_block_script' );
include_once( get_template_directory() . '/blocks/affstream-services/fields.php' );

if ( function_exists( 'acf_register_block' ) ) {
	acf_register_block( array(
		'name'            => 'affstream-services',
		'title'           => __( 'Affstream Services', 'your-text-domain' ),
		'description'     => __( 'Опис вашого блоку', 'your-text-domain' ),
		'render_callback' => 'render_affstream_services_block',
		'enqueue_style'   => get_template_directory_uri() . '/blocks/affstream-services/style.css',
		'category'        => 'common',
		'icon'            => 'format-image',
		'keywords'        => array( 'acf', 'custom', 'block' ),
		'mode'            => 'preview',
	) );
}

function render_affstream_services_block( $block ): void {
	$service_category_id = get_field( 'service_category', $block['id'] );
	$posts_count         = get_field( 'field_number_of_posts', $block['id'] );
	$posts_sort          = get_field( 'field_sort_order', $block['id'] );
	$category            = get_term( $service_category_id, 'service-category' );
	$category_title      = $category && ! is_wp_error( $category ) ? $category->name : '';
	$args                = [
		'post_type'      => 'services',
		'posts_per_page' => - 1,
		'orderby'        => $posts_sort,
		'order'          => 'DESC',
		'meta_query'     => [ [ 'is_top' => [ 'key' => 'is_top', 'value' => '1', 'compare' => '==' ], ] ],
		'tax_query'      => [
			[
				'taxonomy' => 'service-category',
				'field'    => 'id',
				'terms'    => $service_category_id,
			],
		],
	];

	$topServicesQ = new WP_Query( $args );

	$args['meta_query'] = [ [ 'is_top' => [ 'key' => 'is_top', 'value' => '1', 'compare' => '!=' ], ] ];
	$servicesQ          = new WP_Query( $args );

	$services = array_merge( $topServicesQ->posts, $servicesQ->posts );

	?>
    <section class="affstream-services">
        <div class="affstream-services-title">
            <h2><?= esc_html( $category_title ) ?></h2>
        </div>
        <div class="field-title">
            <h4 class="column-name"><?= __( 'Service' ) ?></h4>
            <h4 class="column-name"><?= __( 'Description' ) ?></h4>
            <h4 class="column-name"><?= __( 'Price' ) ?></h4>
        </div>

        <div class="affstream-services-container">
			<?php
			if ( count( $services ) ) {
				foreach ( $services as $service ) {
					setup_postdata( $service );
					$service_id            = $service->ID;
					$service_icon          = get_field( 'service_icon', $service_id );
					$monthly_price         = get_field( 'monthly_price', $service_id );
					$is_top                = get_field( 'field_is_top', $service_id );
					$link_service          = get_field( 'service_link', $service_id );
					$page_university_gude  = get_field( 'related_post_1', $service_id );
					$page_reviews_services = get_field( 'related_post_2', $service_id );

					?>

                    <div class="service-card">
						<?php if ( $is_top ) { ?>
                            <div class="is-top top-style"
                                 style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                TOP
                            </div>
						<?php } ?>
                        <div class="card-container">
                            <div class="service-icon">
                                <a href="<?php if ( isset( $link_service['url'] ) ): echo esc_url( $link_service['url'] ); endif; ?>">
									<?php if ( $service_icon ) {
										echo '<img src="' . esc_url( $service_icon['url'] ) . '" alt="' . esc_attr( $service_icon['alt'] ) . '" />';
									} ?>
                                </a>
	                            <?php if ( $is_top ) { ?>
                                    <div class="is-top-mobile top-style"
                                         style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                        TOP
                                    </div>
	                            <?php } ?>
                            </div>
                            <div class="service-description">
                                <p>
									<?php $excerpt = custom_trim_excerpt( get_the_excerpt( $service ), 100, '...' );
									echo $excerpt;
									?>
                                </p>
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
				}
				wp_reset_postdata();
			} else {
				echo 'Сервісів не знайдено.';
			}
			wp_reset_postdata();

			?>
			<?php if ( $category ) {
				$category_link = get_term_link( $category );
				if ( ! is_wp_error( $category_link ) ) {
					echo '<a class="term-archive-link" href="' . esc_url( $category_link ) . '">see more</a>';
				}
			} ?>
        </div>
    </section>
	<?php
}
