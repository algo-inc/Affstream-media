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

<!doctype html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<?php wp_head(); ?>
</head>
 <script async src="https://www.googletagmanager.com/gtag/js?id=G-XM7DHS7E6M"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-XM7DHS7E6M'); </script>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5MNTRNS5');</script>
<body <?php body_class(); ?>>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MNTRNS5" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<?php wp_body_open(); ?>


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
<!--            --><?php //get_template_part('template-parts/lang-switcher') ?>
            <div class="buttons-container" style="display: none">
                <a href="/login/"  class="auth-button button-signin"><?= pll__('LOG IN')?></a>
                <a href="/registration/"  class="auth-button button-login"><?= pll__('SIGN UP')?></a>
            </div>
            <div class="logout-container" style="display: none">
                <a href="https://cp.affstream.com/" class="dashboard auth-button button-signin">Go to Dashboard</a>
                <div class="logout-btn main-button" ><?= pll__('Logout');?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                        <path d="M6.13337 14.2458C7.9962 14.2458 9.50635 12.7357 9.50635 10.8729C9.50635 10.5003 9.20432 10.1983 8.83175 10.1983C8.45918 10.1983 8.15715 10.5003 8.15715 10.8729C8.15715 11.9906 7.25104 12.8967 6.13337 12.8967L3.43498 12.8967C2.31724 12.8967 1.41119 11.9906 1.41119 10.8729L1.41119 4.12689C1.41119 3.00915 2.31724 2.1031 3.43498 2.1031L6.13337 2.1031C7.25104 2.1031 8.15715 3.00915 8.15715 4.12689C8.15715 4.49947 8.45918 4.80149 8.83175 4.80149C9.20432 4.80149 9.50635 4.49947 9.50635 4.12689C9.50635 2.26406 7.9962 0.753905 6.13337 0.753905L3.43498 0.753905C1.57215 0.753905 0.0619946 2.26406 0.0619945 4.12689L0.0619939 10.8729C0.0619937 12.7357 1.57215 14.2458 3.43498 14.2458L6.13337 14.2458Z" fill="#EDEDFF"/>
                        <path d="M11.0459 8.1744C10.9858 8.24847 10.9283 8.32032 10.8738 8.38892C10.7082 8.59785 10.568 8.78127 10.469 8.91275C10.4195 8.97856 10.3801 9.0315 10.353 9.0683L10.3216 9.111L10.3131 9.12252L10.3102 9.12661C10.3101 9.12665 10.3098 9.12708 10.8556 9.5236L10.3102 9.12661C10.0912 9.42803 10.1576 9.85036 10.4591 10.0694C10.7605 10.2883 11.1823 10.2215 11.4013 9.92016L11.4032 9.91755L11.4101 9.9081L11.4383 9.86981C11.4632 9.83606 11.5 9.78647 11.5469 9.72429C11.6406 9.59981 11.7738 9.4255 11.931 9.2272C12.2489 8.82626 12.6516 8.34433 13.0191 7.97681L13.4961 7.4998L13.0191 7.0228C12.6516 6.65528 12.2489 6.17334 11.931 5.77243C11.7738 5.5741 11.6406 5.39978 11.5469 5.27532C11.5 5.21312 11.4632 5.16354 11.4383 5.12981L11.4101 5.09149L11.4032 5.08205L11.4016 5.07989C11.1826 4.77855 10.7605 4.71129 10.4591 4.93026C10.1576 5.14924 10.0908 5.57113 10.3098 5.87254L10.8556 5.47601C10.3098 5.87254 10.3098 5.87247 10.3098 5.87254L10.3131 5.87706L10.3216 5.8886L10.353 5.9313C10.3801 5.96813 10.4195 6.02102 10.469 6.08686C10.568 6.21834 10.7082 6.40176 10.8738 6.61069C10.9283 6.67929 10.9858 6.75114 11.0459 6.82521L5.4588 6.82521L5.4588 8.1744L11.0459 8.1744Z" fill="#EDEDFF"/>
                    </svg></div>
            </div>
        </div>
        <div class="mobile-menu-toggle" >
            <div class="site-branding">
				<?php the_custom_logo(); ?>
            </div>
            <input type="checkbox" id="checkbox" class="mobile-menu__checkbox" >
            <label for="checkbox" class="mobile-menu__btn" onclick="toggleMobileMenu()"><div class="mobile-menu__icon"></div> </label>
        </div>
        <nav class="mobile-menu">
			<?php
			$languages        = get_terms( array(
				'taxonomy'   => 'language',
				'hide_empty' => false,
			) );
//			$current_language = pll_get_post_language( get_the_ID() );
//			if ( $languages ) {
//				echo '<ul class="language-switcher-mobile">';
//				foreach ( $languages as $language ) {
//					$language_slug = $language->slug;
//					$language_url  = pll_home_url( $language_slug );
//
//					$active_class = ( $language_slug === $current_language ) ? 'active' : '';
//
//					echo '<li class="language-item ' . $active_class . '">';
//					echo '<a class="lang-link" href="' . $language_url . '">';
//					echo '<img src="' . get_stylesheet_directory_uri() . '/icon/flag/' . $language_slug . '.svg" alt="' . $language_slug . ' Flag">';
//					echo $language_slug;
//					echo '</a>';
//					echo '</li>';
//				}
//				echo '</ul>';
//			}
//			?>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-header',
				'menu_class'     => 'header-menu',
			) );
			?>
                <div class="buttons-container" style="display: none">
                <a href="/login/" target="_blank" class="auth-button button-signin"><?= pll__('LOG IN')?></a>
                <a href="/registration/" target="_blank" class="auth-button button-login"><?= pll__('SIGN UP')?></a>
            </div>
            <div class="logout-container buttons-container">
                <a href="https://cp.affstream.com/affiliate/dashboard/" class="dashboard auth-button button-signin">Go to Dashboard</a>
                <button class="logout-btn main-button" ><?= pll__('Logout');?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
                        <path d="M6.13337 14.2458C7.9962 14.2458 9.50635 12.7357 9.50635 10.8729C9.50635 10.5003 9.20432 10.1983 8.83175 10.1983C8.45918 10.1983 8.15715 10.5003 8.15715 10.8729C8.15715 11.9906 7.25104 12.8967 6.13337 12.8967L3.43498 12.8967C2.31724 12.8967 1.41119 11.9906 1.41119 10.8729L1.41119 4.12689C1.41119 3.00915 2.31724 2.1031 3.43498 2.1031L6.13337 2.1031C7.25104 2.1031 8.15715 3.00915 8.15715 4.12689C8.15715 4.49947 8.45918 4.80149 8.83175 4.80149C9.20432 4.80149 9.50635 4.49947 9.50635 4.12689C9.50635 2.26406 7.9962 0.753905 6.13337 0.753905L3.43498 0.753905C1.57215 0.753905 0.0619946 2.26406 0.0619945 4.12689L0.0619939 10.8729C0.0619937 12.7357 1.57215 14.2458 3.43498 14.2458L6.13337 14.2458Z" fill="#EDEDFF"/>
                        <path d="M11.0459 8.1744C10.9858 8.24847 10.9283 8.32032 10.8738 8.38892C10.7082 8.59785 10.568 8.78127 10.469 8.91275C10.4195 8.97856 10.3801 9.0315 10.353 9.0683L10.3216 9.111L10.3131 9.12252L10.3102 9.12661C10.3101 9.12665 10.3098 9.12708 10.8556 9.5236L10.3102 9.12661C10.0912 9.42803 10.1576 9.85036 10.4591 10.0694C10.7605 10.2883 11.1823 10.2215 11.4013 9.92016L11.4032 9.91755L11.4101 9.9081L11.4383 9.86981C11.4632 9.83606 11.5 9.78647 11.5469 9.72429C11.6406 9.59981 11.7738 9.4255 11.931 9.2272C12.2489 8.82626 12.6516 8.34433 13.0191 7.97681L13.4961 7.4998L13.0191 7.0228C12.6516 6.65528 12.2489 6.17334 11.931 5.77243C11.7738 5.5741 11.6406 5.39978 11.5469 5.27532C11.5 5.21312 11.4632 5.16354 11.4383 5.12981L11.4101 5.09149L11.4032 5.08205L11.4016 5.07989C11.1826 4.77855 10.7605 4.71129 10.4591 4.93026C10.1576 5.14924 10.0908 5.57113 10.3098 5.87254L10.8556 5.47601C10.3098 5.87254 10.3098 5.87247 10.3098 5.87254L10.3131 5.87706L10.3216 5.8886L10.353 5.9313C10.3801 5.96813 10.4195 6.02102 10.469 6.08686C10.568 6.21834 10.7082 6.40176 10.8738 6.61069C10.9283 6.67929 10.9858 6.75114 11.0459 6.82521L5.4588 6.82521L5.4588 8.1744L11.0459 8.1744Z" fill="#EDEDFF"/>
                    </svg></button>
            </div>
        </nav>
    </header>
    <script>
      function toggleMobileMenu() {
        var menu = document.querySelector('.mobile-menu');
        var menuToggle = document.querySelector('.mobile-menu__btn');
        menu.classList.toggle('show');
        menuToggle.classList.toggle('active');
      }
    </script>

