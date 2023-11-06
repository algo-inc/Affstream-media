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
					?>
                    <a href="<?php the_permalink( $service_id); ?>" class="service-card <?php if ($is_top): echo 'top_card'; endif;  ?>">
						<?php if ( $is_top ) { ?>
                            <div class="is-top top-style"
                                 style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                TOP
                            </div>
						<?php } ?>
                        <div class="card-container">
                            <div class="service-icon">
								<?php if ( $service_icon ) {
									echo '<img src="' . esc_url( $service_icon['url'] ) . '" alt="' . esc_attr( $service_icon['alt'] ) . '" />';
								} ?>
								<?php if ( $is_top ) { ?>
                                    <div class="is-top-mobile top-style"
                                         style="border-radius: 5px;background: linear-gradient(108deg, #FF2F7A 0%, #0C62FD 100%); ">
                                        TOP
                                    </div>
								<?php }
                                else{?>
                                        <div class="block"></div>
                                    <?php
                                }

                                ?>
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
