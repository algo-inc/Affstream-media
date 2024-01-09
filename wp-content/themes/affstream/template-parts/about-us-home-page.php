<?php
$aboutUs           = generateId( 'aboutUs-swiper' );
$aboutUsPagination = generateId( 'aboutUs-pagination' );
$aboutNext = generateId('about-next');
$aboutPrev = generateId('about-prev');
$blockTitle = get_field('experts_about_us_title');
if ($blockTitle):
?>
<section class="about-us">
    <h2><?php the_field('experts_about_us_title'); ?></h2>
    <div class="container">
        <div class="swiper-about-button-prev" id="<?=$aboutPrev?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <circle cx="25" cy="25" r="23.75" transform="rotate(90 25 25)" stroke="#0C62FD" stroke-width="2.5"/>
                <path d="M36.3975 26.25C37.0878 26.25 37.6475 25.6904 37.6475 25C37.6475 24.3096 37.0878 23.75 36.3975 23.75L36.3975 26.25ZM12.7198 24.1161C12.2316 24.6043 12.2316 25.3957 12.7198 25.8839L20.6748 33.8388C21.1629 34.327 21.9544 34.327 22.4425 33.8388C22.9307 33.3507 22.9307 32.5592 22.4425 32.0711L15.3715 25L22.4425 17.9289C22.9307 17.4408 22.9307 16.6493 22.4425 16.1612C21.9544 15.673 21.1629 15.673 20.6748 16.1612L12.7198 24.1161ZM36.3975 23.75L13.6037 23.75L13.6037 26.25L36.3975 26.25L36.3975 23.75Z" fill="#0C62FD"/>
            </svg>
        </div>
        <div class="swiper swiper-about-us" id="<?= $aboutUs ?>">
            <div class="swiper-wrapper">
		        <?php
		        $comments = get_field('create_comments');
		        if ($comments) {
			        foreach ($comments as $comment) {
				        ?>
                        <div class="swiper-slide about-card">
                            <div class="flex-container">
                                <svg xmlns="http://www.w3.org/2000/svg" width="63" height="56" viewBox="0 0 63 56"
                                     fill="none">
                                    <path d="M14.4968 0.688477H32.2036L22.6772 55.3119H0L14.4968 0.688477ZM44.3997 0.688477H62.21L52.9942 55.3119H30.317L44.3997 0.688477Z"
                                          fill="#0C62FD"/>
                                </svg>
						        <?php
						        if (!empty($comment['services_or_user_'])) {
							        $service = $comment['service'];
							        if (!empty($service)) {
								        ?>
                                        <div class="service">
                                            <img src="<?= $service['logo']['url'] ?>"
                                                 alt="<?= $service['logo']['alt'] ?>" class="logo">
                                        </div>
								        <?php
							        }
						        } else {
							        $user = $comment['user'];
							        ?>
                                    <div class="user">
                                        <img src="<?= $user['user_photo']['url'] ?>" alt="<?= $user['user_photo']['alt'] ?>">
                                        <div class="user-info">
                                            <div class="name"><?= $user['user_name'] ?></div>
                                            <div class="position"><?= $user['user_position'] ?></div>
                                        </div>
                                    </div>
							        <?php
						        }
						        ?>
                            </div>
                            <p class="comment-text"><?= $comment['comments'] ?></p>
                        </div>
				        <?php
			        }
		        }
		        ?>
            </div>
        </div>
        <div class="swiper-about-button-next" id="<?= $aboutNext ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <circle cx="25" cy="25" r="23.75" transform="rotate(-90 25 25)" stroke="#0C62FD" stroke-width="2.5"/>
                <path d="M13.6016 23.75C12.9112 23.75 12.3516 24.3096 12.3516 25C12.3516 25.6904 12.9112 26.25 13.6016 26.25L13.6016 23.75ZM37.2792 25.8839C37.7674 25.3957 37.7674 24.6043 37.2792 24.1161L29.3243 16.1612C28.8361 15.673 28.0447 15.673 27.5565 16.1612C27.0684 16.6493 27.0684 17.4408 27.5565 17.9289L34.6276 25L27.5565 32.0711C27.0683 32.5592 27.0683 33.3507 27.5565 33.8388C28.0447 34.327 28.8361 34.327 29.3243 33.8388L37.2792 25.8839ZM13.6016 26.25L36.3953 26.25L36.3953 23.75L13.6016 23.75L13.6016 26.25Z" fill="#0C62FD"/>
            </svg>
        </div>
    </div>
    <div class="swiper-pagination" id="<?= $aboutUsPagination ?>">
</section>
<?php
endif;
?>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('#<?= $aboutUs ?>', {
      slidesPerView: 1,
      spaceBetween: 40,
      navigation: {
        nextEl: '#<?= $aboutNext ?>',
        prevEl: '#<?= $aboutPrev ?>',
      },
      pagination: {
        el: '#<?= $aboutUsPagination ?>',
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 30,
        }
      },
    });
  });
</script>

