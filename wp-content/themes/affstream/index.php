<?php
get_header();
?>
    <main id="primary" class="site-main">
        <section class="intro">
            <div class="intro-container">
                <div class="intro-content">
                    <h1>
                        Boutique Affiliate Network
                    </h1>
                    <h2>
                        Gambling and betting offers
                        for emerging markets
                    </h2>
                    <a href="#" class="intro-button">
                        sign up
                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.83322 25.7558L16.1617 20.6084L22.858 16.9733C23.5237 16.6099 24.0769 16.085 24.4617 15.4517C24.8465 14.8184 25.0491 14.0993 25.0491 13.3671C25.0491 12.635 24.8465 11.9159 24.4617 11.2826C24.0769 10.6493 23.5237 10.1244 22.858 9.76095L6.83322 0.976604C3.92635 -0.625116 0.269379 1.36727 0.269379 4.58373L0.269379 22.1506C0.269379 25.3652 3.92635 27.3501 6.83322 25.7558Z"
                                  fill="#100F0F"/>
                        </svg>
                    </a>
                </div>
                <div class="intro-animation">
                    <img src="<?= get_template_directory_uri() . '/img/intro-animation.png' ?>" alt="">
                </div>
            </div>
        </section>
        <section class="advantages">
            <div class="container">
                <h2>Our Advantages</h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">Slide 1</div>
                        <div class="swiper-slide">Slide 2</div>
                        <div class="swiper-slide">Slide 3</div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </section>

    </main>
<?php
get_footer();
