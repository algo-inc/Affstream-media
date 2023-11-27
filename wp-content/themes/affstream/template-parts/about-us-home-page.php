<?php
$aboutUs = generateId('aboutUs-swiper');
$aboutUsPagination = generateId('aboutUs-pagination');
?>
<section class="about-us">
	<div class="container">
		<div class="swiper swiper-advantages" id="<?= $aboutUs ?>">
			<div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="flex-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="63" height="56" viewBox="0 0 63 56" fill="none">
                            <path d="M14.4968 0.688477H32.2036L22.6772 55.3119H0L14.4968 0.688477ZM44.3997 0.688477H62.21L52.9942 55.3119H30.317L44.3997 0.688477Z" fill="#0C62FD"/>
                        </svg>
                        <div class="user">
                            <img src="" alt="">
                            <div class="user-info">
                                <div class="name">Maryna Yushchenko</div>
                                <div class="position">CMO at Affstream</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="flex-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="63" height="56" viewBox="0 0 63 56" fill="none">
                            <path d="M14.4968 0.688477H32.2036L22.6772 55.3119H0L14.4968 0.688477ZM44.3997 0.688477H62.21L52.9942 55.3119H30.317L44.3997 0.688477Z" fill="#0C62FD"/>
                        </svg>
                        <div class="user">
                            <img src="" alt="">
                            <div class="user-info">
                                <div class="name">Maryna Yushchenko</div>
                                <div class="position">CMO at Affstream</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-slide">
                    <div class="flex-container">
                        <svg xmlns="http://www.w3.org/2000/svg" width="63" height="56" viewBox="0 0 63 56" fill="none">
                            <path d="M14.4968 0.688477H32.2036L22.6772 55.3119H0L14.4968 0.688477ZM44.3997 0.688477H62.21L52.9942 55.3119H30.317L44.3997 0.688477Z" fill="#0C62FD"/>
                        </svg>
                        <div class="user">
                            <img src="" alt="">
                            <div class="user-info">
                                <div class="name">Maryna Yushchenko</div>
                                <div class="position">CMO at Affstream</div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<div class="swiper-pagination" id="<?= $aboutUsPagination ?>">

		</div>
	</div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('#<?= $aboutUs ?>', {
      slidesPerView: 1,
      spaceBetween: 30,
      pagination: {
        el: '#<?= $aboutUsPagination ?>',
        clickable: true,
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      },
    });
  });
</script>

