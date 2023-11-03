<section class="events" style="background-image: url('<?= get_template_directory_uri() . '/img/events-bg.png' ?>')">
    <h2 class="events-title wow animate__animated  animate__fadeInLeft">Come and meet us at events</h2>
    <div class="container">
        <div class="swiper events-navigation">
            <div class="swiper-wrapper">
				<?php
				$events     = new WP_Query( array(
					'post_type'      => 'events',
					'posts_per_page' => - 1,
					'meta_key'       => 'event_logo',
					'meta_query'     => array(
						array(
							'key'     => 'event_logo', // Мета-ключ для поля логотипу
							'compare' => 'EXISTS' // Перевірка наявності значення
						)
					)
				) );
				$slideIndex = 0;
				if ( $events->have_posts() ) {
					while ( $events->have_posts() ) {
						$events->the_post();
						$event_logo = get_field( 'event_logo' );
						?>
                        <div class="swiper-slide" data-slide-index="<?= $slideIndex ?>">
                            <div class="logo-container">
                                <img src="<?= esc_url( $event_logo ) ?>" alt="<?= get_the_title() ?> Logo">
                            </div>
                        </div>
						<?php
						$slideIndex ++;
					}
				}
				wp_reset_postdata();
				?>
            </div>
            <div class="swiper-pagination swiper-navigation-pagination"></div>
        </div>
        <div class="swiper events-content">
            <div class="swiper-wrapper">
				<?php
				$events = new WP_Query( array(
					'post_type'      => 'events',
					'posts_per_page' => - 1
				) );
				if ( $events->have_posts() ) {
					while ( $events->have_posts() ) {
						$events->the_post();
						?>
                        <div class="swiper-slide">
                            <div class="slide-container">
                                <img class="swiper-lazy" width="450px" height="400px"
                                     data-src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                                <div class="event-details">
                                    <div class="title-container">
                                        <p><?= get_field( 'event_location' ) ?></p>
                                        <p> <?= get_field( 'event_date' ) ?></p>
                                    </div>
                                    <svg width="375" height="3" viewBox="0 0 375 3" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <line x1="1.5" y1="1.5" x2="373.5" y2="1.5" stroke="url(#paint0_linear_101_397)"
                                              stroke-width="2" stroke-linecap="round"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_101_397" x1="331.449" y1="-10.0166"
                                                            x2="43.549" y2="-10.0166" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#00E291" stop-opacity="0"/>
                                                <stop offset="1" stop-color="#00E291"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <h4 class="event-title"><?php the_title(); ?></h4>
									<?php
									$excerpt            = get_the_excerpt();
									$excerpt_length     = 30;
									$trimmed_excerpt    = wp_trim_words( $excerpt, $excerpt_length, '...' );
									$excerpt_with_class = '<p class="about">' . $trimmed_excerpt . '</p>';
									echo $excerpt_with_class;
									?>
                                    <div class="links-container">
										<?php
										$event_link = get_field( 'event_link' );
										if ( $event_link ):
											?>
                                            <a class="see-more" href="<?= $event_link ?>">
												<?= pll__( 'see more' ) ?>
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7.68137 18.0023L7.68477 18.0004L12.5742 15.2212L16.0826 13.2594L16.0858 13.2576C16.6633 12.9328 17.1465 12.4618 17.4838 11.8899C17.8212 11.3179 18 10.6662 18 10.0013C18 9.33643 17.8212 8.68482 17.4838 8.11274C17.1468 7.54131 16.6641 7.07064 16.0872 6.74585C16.0867 6.74559 16.0862 6.74533 16.0858 6.74507L7.68397 2.00081C7.68344 2.00051 7.68291 2.00021 7.68238 1.99991C5.20441 0.594941 2 2.31389 2 5.25466L2 14.748C2 17.6937 5.20914 19.399 7.68137 18.0023Z"
                                                          stroke="#EDEDFF" stroke-width="3"/>
                                                </svg>
                                            </a>

										<?php endif; ?>
										<?php
										$article_link = get_field( 'post_articles' );
										if ( $article_link ):
											?>
                                            <a href="<?= $article_link ?>"> read article </a>
										<?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
					}
				}
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
</section>
<script>
  var eventsNavigation = new Swiper('.events-navigation', {
    slidesPerView: 4,
    spaceBetween: 10,

    breakpoints: {
      0: {
        slidesPerView: 2,
        direction: 'horizontal',
        mousewheel: false,
        centeredSlides: true,
        initialSlide: 1,
      },
      768: {
        spaceBetween: 10,
        slidesPerView: 4,
        direction: 'horizontal',
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 10,
        direction: 'vertical',
      },
      1260: {
        slidesPerView: 4,
        spaceBetween: 40,
        direction: 'vertical',
      },
      1340: {
        slidesPerView: 4,
        spaceBetween: 20,
        direction: 'vertical',
      },
    },

    pagination: {
      el: '.swiper-navigation-pagination',
      type: 'bullets',
      clickable: true,
    },

  });


  var eventsContent = new Swiper('.events-content', {
    slidesPerView: 1,
    spaceBetween: 30,
    lazy: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: eventsNavigation
    }
  });

  var navigationSlides = document.querySelectorAll('.events-navigation .swiper-slide');
  navigationSlides.forEach(function (slide) {
    slide.addEventListener('click', function () {
      var slideIndex = parseInt(slide.getAttribute('data-slide-index'));
      console.log("Index of clicked slide:", slideIndex);
      eventsContent.slideTo(slideIndex, 300);
    });
  });
</script>
