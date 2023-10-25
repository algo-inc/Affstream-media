<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package affstream
 */

?>
<?php
$video_url = get_field('video_loader', 'option');
$server = $_SERVER['HTTP_HOST'];
if (!empty($video_url) && !wp_is_mobile()) {
	if (strpos($server, 'localhost') === false) {
//		echo '<video class="video-loader" src="' . esc_url($video_url) . '" autoplay muted></video>';
	}
}

?>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var video = document.querySelector('.video-loader');

    function hideVideo() {
      if (video) {
        video.style.display = 'none';
      }
    }

    if (video) {
      video.addEventListener('canplaythrough', function() {
        video.play();
        setTimeout(hideVideo, 6000);
      });

      video.addEventListener('ended', function() {
        hideVideo();
      });

      window.addEventListener('load', function() {
        if (video.paused) {
          hideVideo();
        }
      });
    }
  });

</script>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<script>
  console.log(window.innerWidth); // ширина вікна браузера
  console.log(window.innerHeight); // висота вікна браузера
</script>
<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="container desktop-menu">
            <div class="site-branding">
				<?php the_custom_logo(); ?>
            </div>
            <nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-header',
					'menu_class'     => 'header-menu',
				) );
				?>
            </nav>
            <div class="lang-container">
				<?php
				$languages        = get_terms( array(
					'taxonomy'   => 'language',
					'hide_empty' => false,
				) );
				$current_language = pll_get_post_language( get_the_ID() ); // Отримання активної мови
				if ( $languages ) {
					echo '<ul class="language-switcher">';
					foreach ( $languages as $language ) {
						$language_slug = $language->slug;
						$language_url  = pll_home_url( $language_slug ); // Побудова URL за допомогою ідентифікатора мови
						$active_class = ( $language_slug === $current_language ) ? 'active' : ''; // Додати клас "active" для активної мови
						echo '<li class="language-item ' . $active_class . '">';
						echo '<a class="lang-link" href="' . $language_url . '">';
						echo '<img src="' . get_stylesheet_directory_uri() . '/icon/flag/' . $language_slug . '.svg" alt="' . $language_slug . ' Flag">';
						echo $language_slug;
						echo '</a>';
						echo '</li>';
					}
					echo '</ul>';
				}
				?>
            </div>
            <script>
              var languageSwitcher = document.querySelector('.language-switcher');
              var activeLanguageItem = languageSwitcher.querySelector('.language-item.active');

              activeLanguageItem.addEventListener('mouseover', function () {
                var allLanguageItems = languageSwitcher.querySelectorAll('.language-item');
                for (var i = 0; i < allLanguageItems.length; i++) {
                  allLanguageItems[i].style.display = 'flex';
                }
              });

              languageSwitcher.addEventListener('mouseleave', function () {
                var allLanguageItems = languageSwitcher.querySelectorAll('.language-item');
                for (var i = 0; i < allLanguageItems.length; i++) {
                  if (!allLanguageItems[i].classList.contains('active')) {
                    allLanguageItems[i].style.display = 'none';
                  }
                }
              });
            </script>
            <div class="buttons-container">
                <a href="/login/" target="_blank" class="auth-button button-signin"> Log in</a>
                <a href="/registration/" target="_blank" class="auth-button button-login">Sign up</a>

            </div>
        </div>
        <div class="mobile-menu-toggle" onclick="toggleMobileMenu()">
            <div class="site-branding">
				<?php the_custom_logo(); ?>
            </div>
            <div class="burger-icon">
                <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8.45477 33.2625L20.4706 26.5069L29.0961 21.7361C29.9535 21.2592 30.6661 20.5702 31.1617 19.7391C31.6573 18.9079 31.9184 17.9641 31.9184 17.0032C31.9184 16.0424 31.6573 15.0985 31.1617 14.2674C30.6661 13.4363 29.9535 12.7473 29.0961 12.2704L8.45477 0.741502C4.71048 -1.36065 0 1.25422 0 5.47561L0 28.5309C0 32.7498 4.71048 35.3549 8.45477 33.2625Z"
                          fill="url(#paint0_linear_925_2331)"/>
                    <defs>
                        <linearGradient id="paint0_linear_925_2331" x1="31.9184" y1="34" x2="-2.01388" y2="2.14523"
                                        gradientUnits="userSpaceOnUse">
                            <stop stop-color="#00E291"/>
                            <stop offset="1" stop-color="#E0F01E"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </div>
        <nav class="mobile-menu">
			<?php
			$languages        = get_terms( array(
				'taxonomy'   => 'language',
				'hide_empty' => false,
			) );
			$current_language = pll_get_post_language( get_the_ID() ); // Отримання активної мови
			if ( $languages ) {
				echo '<ul class="language-switcher-mobile">';
				foreach ( $languages as $language ) {
					$language_slug = $language->slug;
					$language_url  = pll_home_url( $language_slug ); // Побудова URL за допомогою ідентифікатора мови

					$active_class = ( $language_slug === $current_language ) ? 'active' : ''; // Додати клас "active" для активної мови

					echo '<li class="language-item ' . $active_class . '">';
					echo '<a class="lang-link" href="' . $language_url . '">';
					echo '<img src="' . get_stylesheet_directory_uri() . '/icon/flag/' . $language_slug . '.svg" alt="' . $language_slug . ' Flag">';
					echo $language_slug;
					echo '</a>';
					echo '</li>';
				}
				echo '</ul>';
			}
			?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-header',
				'menu_class'     => 'header-menu',
			) );
			?>
            <div class="buttons-container-mobile">
                <a href="/registration/" target="_blank" class="auth-button button-login">Log in</a>
                <a href="/login/" target="_blank" class="auth-button button-signin">Sign up</a>
            </div>
        </nav>
    </header>


    <script>
      function toggleMobileMenu() {
        var menu = document.querySelector('.mobile-menu');
        var menuToggle = document.querySelector('.burger-icon');
        menu.classList.toggle('show');
        menuToggle.classList.toggle('active');
      }

      var menuLinks = document.querySelectorAll('.mobile-menu a');
      menuLinks.forEach(function(link) {
        link.addEventListener('click', function() {
          var menu = document.querySelector('.mobile-menu');
          var menuToggle = document.querySelector('.burger-icon');
          menu.classList.remove('show');
          menuToggle.classList.remove('active');
        });
      });
    </script>


