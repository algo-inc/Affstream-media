<?php
get_header( 'media' );
$post_id    = get_the_ID();
$popularity = 0;
add_post_meta( $post_id, 'popularity', $popularity, true );
$popularity = get_post_meta( $post_id, 'popularity', true );
$popularity ++;
update_post_meta( $post_id, 'popularity', $popularity );
?>
    <div class="single-page" id="single-page">
        <div class="container">
            <div class="post-container">
                <div class="this-post">
					<?php the_post_thumbnail( 'large' ) ?>
                    <div class="category-and-time">
                        <div class="category">
							<?php $post_type  = get_post_type();
							$post_id          = get_the_ID();
							$taxonomy_name    = getTaxonomyNameByPostType( $post_type );
							$categories       = get_the_terms( $post_id, $taxonomy_name );
							$post_type_object = get_post_type_object( $post_type );
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
                        <div class="time-and-date">
                            <div class="read-time">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                     fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M8 2.35977C4.46538 2.35977 1.6 5.22514 1.6 8.75977C1.6 12.2944 4.46538 15.1598 8 15.1598C11.5346 15.1598 14.4 12.2944 14.4 8.75977C14.4 5.22514 11.5346 2.35977 8 2.35977ZM0 8.75977C0 4.34149 3.58172 0.759766 8 0.759766C12.4182 0.759766 16 4.34149 16 8.75977C16 13.178 12.4182 16.7598 8 16.7598C3.58172 16.7598 0 13.178 0 8.75977ZM7.86272 4.56565C8.30456 4.56565 8.66272 4.92382 8.66272 5.36565V9.33937L11.4842 10.412C11.8973 10.569 12.1048 11.031 11.9478 11.444C11.7908 11.857 11.3287 12.0646 10.9158 11.9075L7.57848 10.639C7.268 10.5209 7.06272 10.2233 7.06272 9.89113V5.36565C7.06272 4.92382 7.42088 4.56565 7.86272 4.56565Z"
                                          fill="#100F0F"/>
                                </svg>
								<?=
								$reading_time = estimated_reading_time();
								?>m
                            </div>
                            <div class="date">
								<?php the_date() ?>
                            </div>
                        </div>
						<?php
						$promo = get_field( 'promo_code' );
						if ( $promo ) {
							?>
                            <div class="promo">
                                <p>PROMO CODE</p>
                                <span>
                                         <?= $promo ?>
                                </span>
                            </div>
							<?php
						}
						?>
                    </div>
					<?php
					custom_display_tags( get_the_ID(), null, true );
					?>
					<?php
					$title = get_the_title();
					if ( $title ): ?>
                        <h1 class="main-title">
							<?= $title ?>
                        </h1>
					<?php endif; ?>
					<?php the_content(); ?>
                </div>
                <div class="share-post-container">
                    <div class="popularity-container">
						<?= do_shortcode( '[wp_ulike]' ) ?>
                        <div class="popularity">
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="26" viewBox="0 0 35 26"
                                 fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.15563 18.8822C5.74153 16.8373 4.01724 14.5002 3.20832 13.293C4.01724 12.0858 5.74153 9.74856 8.15563 7.70381C10.648 5.59273 13.7255 3.91797 17.1875 3.91797C20.6494 3.91797 23.7271 5.59273 26.2194 7.70381C28.6336 9.74856 30.3578 12.0858 31.1668 13.293C30.3578 14.5002 28.6336 16.8373 26.2194 18.8822C23.7271 20.9933 20.6494 22.668 17.1875 22.668C13.7255 22.668 10.648 20.9933 8.15563 18.8822ZM17.1875 0.792969C12.6665 0.792969 8.87789 2.97206 6.0899 5.33352C3.29179 7.70353 1.35006 10.383 0.488331 11.6833C-0.162777 12.6656 -0.162777 13.9203 0.488331 14.9027C1.35006 16.203 3.29179 18.8823 6.0899 21.2525C8.87789 23.6139 12.6665 25.793 17.1875 25.793C21.7085 25.793 25.4971 23.6139 28.2852 21.2525C31.0832 18.8823 33.0249 16.203 33.8867 14.9027C34.5378 13.9203 34.5378 12.6656 33.8867 11.6833C33.0249 10.383 31.0832 7.70353 28.2852 5.33352C25.4971 2.97206 21.7085 0.792969 17.1875 0.792969ZM14.0176 13.293C14.0176 11.567 15.4369 10.168 17.1875 10.168C18.9382 10.168 20.3573 11.567 20.3573 13.293C20.3573 15.0189 18.9382 16.418 17.1875 16.418C15.4369 16.418 14.0176 15.0189 14.0176 13.293ZM17.1875 7.04297C13.6862 7.04297 10.8478 9.84119 10.8478 13.293C10.8478 16.7447 13.6862 19.543 17.1875 19.543C20.6889 19.543 23.5272 16.7447 23.5272 13.293C23.5272 9.84119 20.6889 7.04297 17.1875 7.04297Z"
                                      fill="#0C62FD"/>
                            </svg>
                            <span class="popularity-count">
                            <?= $popularity ?>
                        </span>
                        </div>
                    </div>
                    <div class="share-post">
                        <p class="text"><?= pll__( 'Share post' ) ?></p>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"
                           rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                                 fill="none">
                                <circle cx="17.7969" cy="18.293" r="17.5" fill="#0C62FD"/>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M14.8097 19.3437V28.4285C14.8097 28.5852 14.888 28.6635 15.0447 28.6635H18.6473C18.8039 28.6635 18.8822 28.5852 18.8822 28.4285V19.187H21.545C21.7017 19.187 21.78 19.1087 21.78 18.9521L22.0149 16.1326C22.0149 15.976 21.9366 15.8977 21.78 15.8977H18.8822V13.9397C18.8822 13.4698 19.2738 13.0782 19.822 13.0782H21.8583C22.0933 13.0782 22.1716 12.9999 22.1716 12.8433V10.1021C22.1716 9.94551 22.0933 9.86719 21.9366 9.86719H18.4906C16.4544 9.86719 14.8097 11.3552 14.8097 13.2349V15.8977H13.0084C12.8518 15.8977 12.7734 15.976 12.7734 16.1326V18.9521C12.7734 19.1087 12.8518 19.187 13.0084 19.187H14.8097V19.3437Z"
                                      fill="white"/>
                            </svg>
                        </a>
                        <a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"
                           target="_blank" rel="noopener noreferrer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                                 fill="none">
                                <circle cx="17.9805" cy="18.293" r="17.5" fill="#0C62FD"/>
                                <path d="M24.9389 10.7667C25.5304 10.7959 25.9461 11.4363 25.6507 12.5748L21.9539 28.697C21.6945 29.8435 21.0945 30.0929 20.3117 29.5149L13.7055 23.0953C13.6798 23.0711 13.6595 23.0399 13.6462 23.0042C13.6329 22.9685 13.6269 22.9294 13.6289 22.8901C13.6308 22.8508 13.6405 22.8125 13.6573 22.7783C13.6741 22.744 13.6974 22.7149 13.7253 22.6934L22.123 14.5025C22.5051 14.137 22.0732 13.9297 21.5788 14.2525L11.1994 21.2856C11.1679 21.3077 11.1327 21.321 11.0964 21.3246C11.0602 21.3282 11.0239 21.3219 10.9903 21.3063L6.81995 19.4951C5.89181 19.1208 5.92991 18.3477 7.11406 17.8544L24.5018 10.8754C24.6405 10.8049 24.7891 10.768 24.9389 10.7667Z"
                                      fill="white"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="recent-posts">
                <h2 class="recent-post-title">Recent Posts</h2>
				<?php
				$post_type    = get_post_type();
				$args         = array(
					'post_type'      => $post_type,
					'posts_per_page' => 3,
					'orderby'        => 'date',
					'order'          => 'DESC'
				);
				$recent_posts = new WP_Query( $args );
				if ( $recent_posts->have_posts() ) :
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						$post_id = get_the_ID();
						?>
                        <div class="post-card">
                            <a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'large' ); ?>
                            </a>
                            <div class="inner-content">
								<?php
								custom_display_tags( $post_id, 4, );
								?>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>

					<?php
					endwhile;
					wp_reset_postdata();
				else :
					echo 'Постів не знайдено.';
				endif;
				?>
                <div class="form-container">
                    <h2>SUBSCRIBE</h2>
                    <p class="label">ENTER YOUR EMAIL
                        TO GET WEEKLY NEWS</p>
					<?= do_shortcode( '[contact-form-7 id="150501e" title="Contact form 1"]' ) ?>
                </div>
				<?php $banner = get_field( 'global_gif_image' );
				if ( $banner ):
					?>
                    <div class="banner">
                        <img src="<?= $banner['url'] ?>" alt="<?= $banner['alt'] ?>">
                    </div>
				<?php
				endif; ?>
            </div>
        </div>
    </div>
<?php
get_footer( 'media' );
