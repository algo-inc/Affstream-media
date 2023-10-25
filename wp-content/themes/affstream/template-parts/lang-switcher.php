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
