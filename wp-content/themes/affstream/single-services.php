<?php
get_header( 'media' );

$post_id    = get_the_ID();
$popularity = 0;
add_post_meta( $post_id, 'popularity', $popularity, true );
$popularity = get_post_meta( $post_id, 'popularity', true );
$popularity ++;
update_post_meta( $post_id, 'popularity', $popularity );
$service_icon = get_field( 'service_icon' );
$guide_link   = get_field( 'field_related_post_guide' );
$review_link  = get_field( 'field_related_post_review' );
?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/single-page-services.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/comment.css' ?>">
    <div class="single-page">
        <div class="container">
            <div class="post-container">
                <div class="this-post">
                    <div class="flex-container">
                        <div class="name-container">
							<?php
							$title = get_the_title();
							if ( $title ): ?>
                                <h1 class="main-title">
									<?= $title ?>
                                </h1>
							<?php endif; ?>
                            <div class="link-container">
                                <a class="link" href="<?= $review_link ?>">Review
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11"
                                         fill="none">
                                        <path d="M2.62331 10.6019L6.35154 8.48278L9.0278 6.98627C9.29383 6.83666 9.51494 6.62055 9.66872 6.35983C9.8225 6.09911 9.90349 5.80305 9.90349 5.50164C9.90349 5.20022 9.8225 4.90416 9.66872 4.64344C9.51494 4.38272 9.29383 4.16661 9.0278 4.017L2.62331 0.400567C1.46155 -0.258846 0 0.561399 0 1.88559L0 9.11769C0 10.4411 1.46155 11.2583 2.62331 10.6019Z"
                                              fill="#0C62FD"/>
                                    </svg>
                                </a>
                                <a class="link" href="<?= $guide_link ?>">Guide
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11"
                                         fill="none">
                                        <path d="M2.62331 10.6019L6.35154 8.48278L9.0278 6.98627C9.29383 6.83666 9.51494 6.62055 9.66872 6.35983C9.8225 6.09911 9.90349 5.80305 9.90349 5.50164C9.90349 5.20022 9.8225 4.90416 9.66872 4.64344C9.51494 4.38272 9.29383 4.16661 9.0278 4.017L2.62331 0.400567C1.46155 -0.258846 0 0.561399 0 1.88559L0 9.11769C0 10.4411 1.46155 11.2583 2.62331 10.6019Z"
                                              fill="#0C62FD"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="service-logo-container">
                            <img src="<?= $service_icon['url'] ?>" alt="<?= $service_icon['alt'] ?>">
                        </div>
                    </div>
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
                <div class="comments desktop">
					<?php

					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					?>
                </div>
            </div>
            <div class="recent-posts">
                <div class="about-company">
					<?php

					company_information_block();

					// Block for Paid Information
					paid_information_block();
					?>
                    <?php
                    $post_id = get_the_ID();
                    $ratings = get_ratings_for_post($post_id);
                    if ($ratings):
                    ?>
                    <div class="total-rating">
		                <?php
		                $average_ratings = get_average_ratings_for_post($post_id);
		                $average_rating = round($ratings['average_rating'], 1);
		                $average_support_rating = round($average_ratings['support'], 1);
		                $average_quality_rating = round($average_ratings['quality'], 1);
		                $average_interface_rating = round($average_ratings['interface'], 1);
		                $average_price_rating = round($average_ratings['price'], 1);
		                ?>

		                <?php
		                $post_id = get_the_ID();
		                $ratings = get_ratings_for_post($post_id);

                        ?>
                        <div class="company-rating">
                            <p>
                                Rate Company
                            </p>
                            <div class="count-company-rating">
				                <?php
				                $averageQ= get_ratings_for_post($post_id);
				                echo round($averageQ['average_rating'],1);
				                ?>
                            </div>
                        </div>
		                <?php
		                render_rating_block('Support', $average_support_rating, $average_support_rating);
		                render_rating_block('Quality', $average_quality_rating, $average_quality_rating);
		                render_rating_block('Interface', $average_interface_rating, $average_interface_rating);
		                render_rating_block('Price', $average_price_rating, $average_price_rating);
		                ?>
                    </div>
                        <?php
                    endif;
                        ?>

                    <div class="company-social">
		                <?php
		                $telegram = get_field('telegram');
		                $facebook = get_field('facebook');
		                $instagram = get_field('instagram');
		                $linkedin = get_field('linkedin');
		                $email = get_field('email');
		                $youtube = get_field('youtube');
                        $siteLink = get_field('site_link');
		                ?>

                        <h2>Contacts Company</h2>

	                    <?php if ($siteLink) : ?>
                            <a class="site-link" href="<?php echo esc_url($siteLink); ?>" target="_blank">
                                website
                            </a>
	                    <?php endif; ?>

                        <div class="social-list">


	                        <?php if ($telegram) : ?>
                                <a href="<?php echo esc_url($telegram); ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() . '/icon/social/teleg.svg' ?>" alt="telegram">
                                </a>
	                        <?php endif; ?>

	                        <?php if ($facebook) : ?>
                                <a href="<?php echo esc_url($facebook); ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() . '/icon/social/face.svg' ?>" alt="Facebook">
                                </a>
	                        <?php endif; ?>

	                        <?php if ($instagram) : ?>
                                <a href="<?php echo esc_url($instagram); ?>" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                        <mask id="mask0_4815_12326" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="40" height="40">
                                            <ellipse cx="20" cy="20" rx="20" ry="20" fill="#00E291"/>
                                        </mask>
                                        <g mask="url(#mask0_4815_12326)">
                                            <path d="M21.3589 0.0410156C31.5078 0.0410156 39.8114 8.34462 39.8114 18.4935V21.3765C39.8114 31.5254 31.5077 39.829 21.3589 39.829H18.4759C8.32704 39.829 0.0234375 31.5254 0.0234375 21.3765V18.4935C0.0234375 8.34462 8.32704 0.0410156 18.4759 0.0410156H21.3589ZM20.2801 10.0413L20.0234 10.041C18.5862 10.041 17.149 10.0729 16.3614 10.0939C15.9516 10.1048 15.5414 10.1006 15.1339 10.1446C12.5161 10.4273 10.4338 12.4969 10.1318 15.1089C10.0814 15.5444 10.0861 15.9838 10.074 16.422C10.0545 17.1297 10.0272 18.3235 10.0238 19.5714L10.0234 19.829C10.0234 21.3588 10.0574 22.925 10.0782 23.7414C10.088 24.1253 10.0844 24.5097 10.123 24.8918C10.3894 27.5278 12.4665 29.6291 15.0913 29.9326C15.5268 29.983 15.9662 29.9783 16.4044 29.9904C17.1607 30.0113 18.4722 30.041 19.8114 30.041C21.362 30.041 22.9848 30.0061 23.8122 29.9853C24.1847 29.976 24.557 29.9793 24.9279 29.9438C27.5892 29.689 29.6584 27.6269 29.9239 24.9691C29.9625 24.5826 29.9589 24.1934 29.9689 23.8051C29.9898 22.9954 30.0234 21.4604 30.0234 19.9704L30.0221 19.4632C30.0159 18.2082 29.9887 16.9991 29.9702 16.3022C29.9595 15.8967 29.9633 15.4905 29.9212 15.0871C29.6462 12.4538 27.5993 10.4108 24.964 10.1418C24.5693 10.1015 24.1723 10.1052 23.7757 10.0948C23.0225 10.0752 21.6555 10.0448 20.2801 10.0413ZM20.0234 11.841C21.2795 11.841 22.7895 11.8707 23.5447 11.8876C23.8645 11.8947 24.1848 11.892 24.5036 11.9182C26.6219 12.0923 27.9683 13.4361 28.1455 15.5524C28.1726 15.8767 28.1697 16.2022 28.1771 16.5275C28.194 17.2755 28.2234 18.7497 28.2234 19.983C28.2234 21.2617 28.1932 22.8084 28.1764 23.5704C28.1695 23.8848 28.1721 24.1994 28.1468 24.5129C27.9747 26.6467 26.6174 27.9992 24.4798 28.1656C24.1767 28.1891 23.8731 28.1867 23.5692 28.1932C22.8824 28.208 21.5313 28.234 20.3117 28.2398L19.8496 28.2409C18.6813 28.2409 17.3369 28.2133 16.6157 28.1962C16.2673 28.1879 15.9179 28.1914 15.5709 28.159C13.4625 27.9622 12.0773 26.5609 11.9006 24.4404C11.8746 24.1282 11.8774 23.8149 11.8705 23.5016C11.8537 22.7366 11.8234 21.1749 11.8234 19.8671C11.8234 18.6807 11.8519 17.2779 11.8689 16.5446C11.8767 16.2077 11.8734 15.8706 11.9038 15.5351C12.0941 13.4336 13.4867 12.0981 15.5983 11.9194C15.9273 11.8916 16.2575 11.8945 16.5877 11.8869C17.3315 11.87 18.7835 11.841 20.0234 11.841ZM20.0234 14.9184C17.1942 14.9184 14.9008 17.2118 14.9008 20.0409C14.9008 22.87 17.1942 25.1635 20.0234 25.1635C22.8525 25.1635 25.1459 22.87 25.1459 20.0409C25.1459 17.2118 22.8525 14.9184 20.0234 14.9184ZM20.0234 16.7076C21.8643 16.7076 23.3567 18.2 23.3567 20.0409C23.3567 21.8819 21.8643 23.3743 20.0234 23.3743C18.1824 23.3743 16.69 21.8819 16.69 20.0409C16.69 18.2 18.1824 16.7076 20.0234 16.7076ZM25.391 13.4969C24.7075 13.4969 24.1533 14.0538 24.1533 14.7407C24.1533 15.4277 24.7075 15.9846 25.391 15.9846C26.0746 15.9846 26.6287 15.4277 26.6287 14.7407C26.6287 14.0537 26.0746 13.4969 25.391 13.4969Z" fill="#0C62FD"/>
                                        </g>
                                    </svg>
                                </a>
	                        <?php endif; ?>

	                        <?php if ($linkedin) : ?>
                                <a href="<?php echo esc_url($linkedin); ?>" target="_blank">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                                        <circle cx="20" cy="20" r="20" fill="white"/>
                                        <path d="M20 0C8.95312 0 0 8.95312 0 20C0 31.0469 8.95312 40 20 40C31.0469 40 40 31.0469 40 20C40 8.95312 31.0469 0 20 0ZM14.4062 28.3672H10.5078V15.8906H14.4062V28.3672ZM12.3516 14.3281H12.3203C10.9062 14.3281 9.99219 13.375 9.99219 12.1641C9.99219 10.9297 10.9375 10 12.375 10C13.8125 10 14.6953 10.9297 14.7266 12.1641C14.7344 13.3672 13.8203 14.3281 12.3516 14.3281ZM30 28.3672H25.5781V21.9141C25.5781 20.2266 24.8906 19.0703 23.3672 19.0703C22.2031 19.0703 21.5547 19.8516 21.2578 20.6016C21.1484 20.8672 21.1641 21.2422 21.1641 21.625V28.3672H16.7812C16.7812 28.3672 16.8359 16.9297 16.7812 15.8906H21.1641V17.8516C21.4219 16.9922 22.8203 15.7734 25.0547 15.7734C27.8281 15.7734 30 17.5703 30 21.4297V28.3672Z" fill="#0C62FD"/>
                                    </svg>

                                </a>
	                        <?php endif; ?>

	                        <?php if ($email) : ?>
                                <a href="mailto:<?php echo esc_attr($email); ?>">
                                    <img src="<?= get_template_directory_uri() . '/icon/social/mail.svg' ?>" alt="Email">
                                </a>
	                        <?php endif; ?>

	                        <?php if ($youtube) : ?>
                                <a href="<?php echo esc_url($youtube); ?>" target="_blank">
                                    <img src="<?= get_template_directory_uri() . '/icon/social/you.svg' ?>" alt="YouTube">
                                </a>
	                        <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
      document.addEventListener("DOMContentLoaded", function () {
        var ratingContainers = document.querySelectorAll('.form-rating-item');
        var submitButton = document.getElementById('submit');

        ratingContainers.forEach(function (container) {
          var stars = container.querySelectorAll('.star');
          var hiddenInputId = container.id.replace('rating_', '');
          var hiddenInput = document.getElementById('hidden_rating_' + hiddenInputId);

          stars.forEach(function (star) {
            star.addEventListener('click', function () {
              var value = star.getAttribute('data-value');
              container.setAttribute('data-rating', value);
              hiddenInput.value = value;
              stars.forEach(function (innerStar) {
                innerStar.classList.remove('active');
              });

              for (var i = 1; i <= value; i++) {
                stars[i - 1].classList.add('active');
              }

              localStorage.setItem('lastRating', value);
              var allRatingsFilled = Array.from(ratingContainers).every(function (ratingContainer) {
                return parseInt(ratingContainer.getAttribute('data-rating')) > 0;
              });
              submitButton.disabled = !allRatingsFilled;
            });
          });
        });
      });
    </script>


<?php

get_footer( 'media' );
