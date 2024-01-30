<?php
/*
Template Name: Home
*/
?>
<?php
//$video_url = get_field('video_loader', 'option');
//$server = $_SERVER['HTTP_HOST'];
//if (!empty($video_url) && !wp_is_mobile()) {
//	if (strpos($server, 'localhost') === false) {
//		echo '<video class="video-loader" src="' . esc_url($video_url) . '" autoplay muted></video>';
//	}
//}
//
//?>
<?php
get_header();
?>
    <main id="primary" class="site-main">
        <section class="intro">
            <div class="intro-container">
                <div class="intro-content">
                    <h1 class="banner-title">
                        <?php the_title() ?>
                    </h1>
                    <?php $subtitle = get_the_excerpt(); ?>
                    <h2 class="banner-subtitle">
                        <?= $subtitle ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="309" height="24" viewBox="0 0 309 24"
                             fill="none">
                            <path d="M1 7.05512C81.575 4.60064 162.551 2.40905 243.737 1.3667C263.439 1.11375 320 1.3667 305.885 5.7125C291.77 10.0583 46.6168 18.7059 45.3091 21.603C44.0015 24.5 269.5 21.603 284.655 22.0005"
                                  stroke="#E0F01E" stroke-linecap="round"/>
                        </svg>
                    </h2>
                    <a aria-label="registration" href="/registration" class="intro-button">
                        sign up
                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.83322 25.7558L16.1617 20.6084L22.858 16.9733C23.5237 16.6099 24.0769 16.085 24.4617 15.4517C24.8465 14.8184 25.0491 14.0993 25.0491 13.3671C25.0491 12.635 24.8465 11.9159 24.4617 11.2826C24.0769 10.6493 23.5237 10.1244 22.858 9.76095L6.83322 0.976604C3.92635 -0.625116 0.269379 1.36727 0.269379 4.58373L0.269379 22.1506C0.269379 25.3652 3.92635 27.3501 6.83322 25.7558Z"
                                  fill="#100F0F"/>
                        </svg>
                    </a>
                </div>
                <div class="intro-animation">
                    <?php
                    $video_url = get_field('banner_video');
                    $video_poster = get_field('poster_video');
                    ?>
                    <div id="video-container">
                        <video width="460px" height="460px" playsinline loop muted poster="<?= $video_poster['url'] ?>">
                            <source src="<?= $video_url ?>" type="video/mp4">
                        </video>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var videoContainer = document.getElementById('video-container');
                            var video = document.querySelector('video');
                            video.addEventListener('loadeddata', function () {
                                video.play();
                            });
                        });
                    </script>
                </div>
            </div>
        </section>
        <section class="advantages">
            <?php
            $advantagesSlider = generateId('advantages-swiper');
            $advantagesSliderPrev = generateId('advantages-slider-prev');
            $advantagesSliderNext = generateId('advantages-slider-next');
            $advantagesSliderPagination = generateId('advantages-slider-pagination');

            ?>
            <div class="top-container">
                <h2 class="advantages-title wow animate__animated  animate__fadeInLeft"> Our Advantages</h2>
                <div class="navigation">
                    <div class="arrow-next swiper-navigation-desktop" id="<?= $advantagesSliderPrev ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51" fill="none">
                            <circle cx="25" cy="25.8965" r="23.75" transform="rotate(90 25 25.8965)" stroke="#00E291"
                                    stroke-width="2.5"/>
                            <path d="M36.3984 27.1465C37.0888 27.1465 37.6484 26.5868 37.6484 25.8965C37.6484 25.2061 37.0888 24.6465 36.3984 24.6465L36.3984 27.1465ZM12.7208 25.0126C12.2326 25.5008 12.2326 26.2922 12.7208 26.7804L20.6757 34.7353C21.1639 35.2235 21.9553 35.2235 22.4435 34.7353C22.9316 34.2472 22.9316 33.4557 22.4435 32.9676L15.3724 25.8965L22.4435 18.8254C22.9317 18.3373 22.9317 17.5458 22.4435 17.0576C21.9553 16.5695 21.1639 16.5695 20.6757 17.0576L12.7208 25.0126ZM36.3984 24.6465L13.6047 24.6465L13.6047 27.1465L36.3984 27.1465L36.3984 24.6465Z"
                                  fill="#00E291"/>
                        </svg>
                    </div>
                    <div class="arrow-prev swiper-navigation-desktop" id="<?= $advantagesSliderNext ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="51" viewBox="0 0 50 51" fill="none">
                            <circle cx="25" cy="25.8965" r="23.75" transform="rotate(-90 25 25.8965)" stroke="#00E291"
                                    stroke-width="2.5"/>
                            <path d="M13.6016 24.6465C12.9112 24.6465 12.3516 25.2061 12.3516 25.8965C12.3516 26.5868 12.9112 27.1465 13.6016 27.1465L13.6016 24.6465ZM37.2792 26.7804C37.7674 26.2922 37.7674 25.5008 37.2792 25.0126L29.3243 17.0577C28.8361 16.5695 28.0447 16.5695 27.5565 17.0577C27.0684 17.5458 27.0684 18.3373 27.5565 18.8254L34.6276 25.8965L27.5565 32.9676C27.0683 33.4557 27.0683 34.2472 27.5565 34.7353C28.0447 35.2235 28.8361 35.2235 29.3243 34.7353L37.2792 26.7804ZM13.6016 27.1465L36.3953 27.1465L36.3953 24.6465L13.6016 24.6465L13.6016 27.1465Z"
                                  fill="#00E291"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="swiper swiper-advantages" id="<?= $advantagesSlider ?>">
                    <div class="swiper-wrapper">
                        <?php
                        $slider = get_field('advantages');
                        if ($slider) :
                            foreach ($slider as $slide) :
                                include(locate_template('template-parts/advantages-slide.php', false, false));
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination " id="<?= $advantagesSliderPagination ?>">
            </div>
            <script>
                const navigation = new Swiper('.swiper-advantages', {
                    spaceBetween: 30,
                    slidesPerView: 2,
                    simulateTouch: false,
                    speed: 600,
                    effect: 'slide',
                    pagination: {
                        el: '#<?= $advantagesSliderPagination ?>',
                        type: 'bullets',
                    },
                    navigation: {
                        nextEl: '#<?= $advantagesSliderNext ?>',
                        prevEl: '#<?= $advantagesSliderPrev ?>',
                    },
                    breakpoints: {
                        0: {
                            slidesPerView: 1,
                            spaceBetween: 25,
                            speed: 400,
                        },
                        768: {
                            spaceBetween: 15,
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                            speed: 800,
                        },
                        1300: {
                            spaceBetween: 110,
                        },
                        1600: {
                            spaceBetween: 140,
                        },
                        1920: {
                            spaceBetween: 90,
                        },
                    }
                });
            </script>
        </section>
        <section class="advantages-cards" style="background-image: url('<?= get_template_directory_uri() . '/icon/background-home.png' ?>')">
            <div class="container">
                <h2>
                    <?php the_field('payment_models') ?>
                </h2>
                <div class="payment-models-container" >
                    <?php
                    $rows = get_field('advantages_cards');
                    $count = count($rows);
                    if ($rows) {
                        for ($i = 0; $i < $count; $i++) {
                            $name = $rows[$i]['icon'];
                            $about = $rows[$i]['about'];
                            ?>

                            <div class="card <?= 'card_' . $i ?>">
                                <img src="<?= get_template_directory_uri() . '/icon/payment-models/decoration-arrow-' . $i . '.svg' ?>">
                                <div class="content">
                                    <h3 class="payment-model-name">
                                        <?= $name ?>
                                    </h3>
                                    <p>
                                        <?= $about ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>
                </div>
            </div>
        </section>
        <section class="top-brands">
            <?php
            $topBrandsSlider = generateId('top-brands');
            $topBrandsSliderPrev = generateId('top-brands-prev');
            $topBrandsSliderNext = generateId('top-brands-next');
            $topBrandsSliderPagination = generateId('top-brands-pagination');
            ?>
            <div class="container ">
                <div class="swiper swiper-top-brands" id="<?= $topBrandsSlider ?>">
                    <h2 class="top-brands-title">
                        top brands
                    </h2>
                    <div class="swiper-wrapper">
                        <?php
                        $slider = get_field('top_brands');
                        if ($slider) :
                            foreach ($slider as $slide) :
                                include(locate_template('template-parts/top-brands-slide.php', false, false));
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="swiper-pagination" id="<?= $topBrandsSliderPagination ?>"></div>
                </div>
                <div class="navigation">
                    <div class="arrow-prev swiper-navigation-desktop" id="<?= $topBrandsSliderPrev ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                            <circle cx="20.0781" cy="20.2656" r="19" transform="rotate(90 20.0781 20.2656)"
                                    stroke="#00E291" stroke-width="2"/>
                            <path d="M29.1953 21.2656C29.7476 21.2656 30.1953 20.8179 30.1953 20.2656C30.1953 19.7133 29.7476 19.2656 29.1953 19.2656L29.1953 21.2656ZM10.2532 19.5585C9.86266 19.949 9.86266 20.5822 10.2532 20.9727L16.6171 27.3367C17.0077 27.7272 17.6408 27.7272 18.0314 27.3367C18.4219 26.9462 18.4219 26.313 18.0314 25.9225L12.3745 20.2656L18.0314 14.6088C18.4219 14.2182 18.4219 13.5851 18.0314 13.1946C17.6408 12.804 17.0077 12.804 16.6171 13.1946L10.2532 19.5585ZM29.1953 19.2656L10.9603 19.2656L10.9603 21.2656L29.1953 21.2656L29.1953 19.2656Z"
                                  fill="#00E291"/>
                        </svg>
                    </div>
                    <div class="arrow-next swiper-navigation-desktop" id="<?= $topBrandsSliderNext ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                            <circle cx="20.0781" cy="20.2656" r="19" transform="rotate(-90 20.0781 20.2656)"
                                    stroke="#00E291" stroke-width="2"/>
                            <path d="M10.9609 19.2656C10.4087 19.2656 9.96094 19.7133 9.96094 20.2656C9.96094 20.8179 10.4087 21.2656 10.9609 21.2656L10.9609 19.2656ZM29.9031 20.9727C30.2936 20.5822 30.2936 19.949 29.9031 19.5585L23.5391 13.1946C23.1486 12.804 22.5154 12.804 22.1249 13.1946C21.7344 13.5851 21.7344 14.2182 22.1249 14.6088L27.7817 20.2656L22.1249 25.9225C21.7344 26.313 21.7344 26.9462 22.1249 27.3367C22.5154 27.7272 23.1486 27.7272 23.5391 27.3367L29.9031 20.9727ZM10.9609 21.2656L29.196 21.2656L29.196 19.2656L10.9609 19.2656L10.9609 21.2656Z"
                                  fill="#00E291"/>
                        </svg>
                    </div>
                </div>
                <div class="inner-container">
                    <p>
                        Sign up to get more exclusive deals from Affstream
                    </p>
                    <a class="main-button" aria-label="registration" href="/registration">
                        sign up
                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.80966 25.4575L16.1382 20.31L22.8345 16.675C23.5001 16.3116 24.0534 15.7867 24.4381 15.1534C24.8229 14.5201 25.0256 13.801 25.0256 13.0688C25.0256 12.3367 24.8229 11.6175 24.4381 10.9842C24.0534 10.351 23.5001 9.82603 22.8345 9.46262L6.80966 0.678264C3.90279 -0.923456 0.245819 1.06893 0.245819 4.28539L0.245819 21.8522C0.245819 25.0668 3.90279 27.0518 6.80966 25.4575Z"
                                  fill="#100F0F"/>
                        </svg>
                    </a>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    var topBrandsNavigation = new Swiper('.swiper-top-brands', {
                        spaceBetween: 30,
                        loop: true,
                        pagination: {
                            el: '#<?= $topBrandsSliderPagination ?>',
                            type: 'bullets',
                        },
                        navigation: {
                            nextEl: '#<?= $topBrandsSliderNext ?>',
                            prevEl: '#<?= $topBrandsSliderPrev ?>',
                        },

                        breakpoints: {
                            480: {
                                slidesPerView: 1,
                            },
                            768: {
                                slidesPerView: 2,
                            },
                            900: {
                                slidesPerView: 3,
                                spaceBetween: 30,
                            },
                            1350: {
                                slidesPerView: 4,
                                spaceBetween: 28,
                            },
                            1730: {
                                slidesPerView: 4,
                                spaceBetween: 30,
                            }
                        }
                    });
                });
            </script>
        </section>
        <?php get_template_part('template-parts/traffic-sources') ?>
        <?php get_template_part('template-parts/about-us-home-page') ?>
        <?php get_template_part('template-parts/blog') ?>
        <section class="home-contacts" style="background-image: url('<?= get_template_directory_uri() . '/icon/background-home.png' ?>')">
            <h2 id="contacts" class="wow animate__animated  animate__fadeInLeft ">contact us</h2>
            <div class="contacts-container">
                <?php
                if (have_rows('contacts')):
                    while (have_rows('contacts')) : the_row(); ?>
                        <?php get_template_part('template-parts/contacts') ?>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
        </section>
    </main>
<?php
get_footer();

