<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package affstream
 */
?>

<footer id="footer-media" class="site-footer">
	<div class="container">
		<div class="site-branding">
			<?php
			$custom_logo_id = get_theme_mod( 'custom_logo' );
			$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
			$width = 300;
			$height = 100;
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
				<img src="<?php echo esc_url( $logo[0] ); ?>" width="<?php echo esc_attr( $width ); ?>" height="<?php echo esc_attr( $height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
			<?php
			$copy = get_field('copyright_link', 'option');
			if($copy):
				?>
				<a class="copyright" href="<?php echo $copy ?>">
					<?php the_field('copyright', 'option'); ?>
				</a>
			<?php
			endif;
			?>
		</div>
		<svg class="separator" width="375" height="3" viewBox="0 0 375 3" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 1.01208L375 1.01208" stroke="url(#paint0_radial_504_1211)" stroke-width="2"/>
			<defs>
				<radialGradient id="paint0_radial_504_1211" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(187.499 -10.4896) rotate(180) scale(144.335 1.41887e+06)">
					<stop stop-color="#00E291"/>
					<stop offset="1" stop-color="#EDEDFF" stop-opacity="0"/>
				</radialGradient>
			</defs>
		</svg>
        <p class="footer-media-text-desktop">
            An informational blog Affstream devoted to affiliate marketing, traffic, and online moneymaking. Here you can find case studies and affiliate marketing success stories, guides, and manuals on how to kickstart your online business, interviews with top affiliate marketers as well as the latest industry news and so much more.
        </p>
		<nav id="site-navigation" class="main-navigation">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'media-menu-footer',
				'container' => 'nav',
				'container_class' => 'menu',
			));
			?>
		</nav>
		<svg class="separator" width="375" height="3" viewBox="0 0 375 3" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0 1.01208L375 1.01208" stroke="url(#paint0_radial_504_1211)" stroke-width="2"/>
			<defs>
				<radialGradient id="paint0_radial_504_1211" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(187.499 -10.4896) rotate(180) scale(144.335 1.41887e+06)">
					<stop stop-color="#00E291"/>
					<stop offset="1" stop-color="#EDEDFF" stop-opacity="0"/>
				</radialGradient>
			</defs>
		</svg>
		<div class="social">
			<span><?php the_field('social_title', 'option'); ?></span>
			<?php $social = get_field('social_links', 'option');
			if($social):
				?>
				<div class="social-links">
					<div class="social-links-container">
						<a class="social-link" target="_blank" href="<?= $social['telegram'] ?>">
							<svg class="telegram-icon" width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M30.5586 0C31.5447 0 32.2886 1.03104 31.8907 2.94878L27.064 30.0652C26.7266 31.9933 25.7491 32.4572 24.3997 31.5602L12.8865 21.4251C12.8419 21.3869 12.8055 21.3366 12.7804 21.2783C12.7553 21.22 12.7422 21.1555 12.7422 21.09C12.7422 21.0245 12.7553 20.9599 12.7804 20.9017C12.8055 20.8434 12.8419 20.7931 12.8865 20.7549L26.1816 6.44402C26.7872 5.80477 26.0519 5.49546 25.2561 6.07284L8.57016 18.6206C8.51955 18.66 8.4621 18.6851 8.40215 18.694C8.3422 18.7029 8.28133 18.6955 8.22416 18.6722L1.13977 16.0018C-0.434537 15.4553 -0.434537 14.1665 1.49442 13.2489L29.8406 0.216519C30.0654 0.0879697 30.3095 0.0143508 30.5586 0Z"  fill="#EDEDFF"/>
							</svg>
						</a>
						<a class="social-link" target="_blank" href="<?= $social['instagram'] ?>">
							<svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M9.39145 0.196366C6.78684 0.313886 4.5293 0.950678 2.70639 2.76589C0.877112 4.59063 0.248226 6.8571 0.130413 9.43461C0.0571782 11.0434 -0.371063 23.1972 0.870746 26.3846C1.70817 28.5348 3.35751 30.1882 5.52748 31.0283C6.54004 31.4221 7.6959 31.6887 9.39145 31.7666C23.5688 32.4082 28.8241 32.0589 31.0403 26.3846C31.4335 25.3745 31.7042 24.2197 31.779 22.5283C32.427 8.3147 31.674 5.23382 29.2031 2.76589C27.2432 0.810919 24.9379 -0.519871 9.39145 0.196366ZM9.52197 28.908C7.96971 28.8381 7.12752 28.5795 6.56552 28.3619C5.15177 27.8124 4.08987 26.7549 3.54379 25.3494C2.59811 22.9275 2.91176 11.4248 2.99614 9.56352C3.07892 7.74036 3.44828 6.07412 4.73466 4.78776C6.32672 3.19963 8.38365 2.42131 22.389 3.05339C24.2167 3.13596 25.8868 3.50456 27.1764 4.78776C28.7684 6.37586 29.5581 8.44861 28.9149 22.4002C28.8448 23.9486 28.5853 24.7888 28.3672 25.3494C26.9264 29.0418 23.6117 29.5543 9.52197 28.908ZM22.5435 7.50337C22.5435 8.55471 23.3984 9.40961 24.454 9.40961C25.5095 9.40961 26.366 8.55471 26.366 7.50337C26.366 6.45205 25.5095 5.59791 24.454 5.59791C23.3984 5.59791 22.5435 6.45205 22.5435 7.50337ZM7.78027 15.9807C7.78027 20.4846 11.4404 24.1361 15.9555 24.1361C20.4706 24.1361 24.1308 20.4846 24.1308 15.9807C24.1308 11.4768 20.4706 7.82759 15.9555 7.82759C11.4404 7.82759 7.78027 11.4768 7.78027 15.9807ZM10.6492 15.9807C10.6492 13.0586 13.0245 10.6877 15.9555 10.6877C18.8865 10.6877 21.2619 13.0586 21.2619 15.9807C21.2619 18.9044 18.8865 21.276 15.9555 21.276C13.0245 21.276 10.6492 18.9044 10.6492 15.9807Z" fill="#EDEDFF"/>
							</svg>
						</a>
						<a class="social-link" target="_blank" href="<?= $social['facebook'] ?>">
							<svg width="19" height="22" viewBox="0 0 15 29" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M3.39167 14.6208V28.6375C3.39167 28.8792 3.5125 29 3.75417 29H9.3125C9.55417 29 9.675 28.8792 9.675 28.6375V14.3792H13.7833C14.025 14.3792 14.1458 14.2583 14.1458 14.0167L14.5083 9.66667C14.5083 9.425 14.3875 9.30417 14.1458 9.30417H9.675V6.28333C9.675 5.55833 10.2792 4.95417 11.125 4.95417H14.2667C14.6292 4.95417 14.75 4.83333 14.75 4.59167V0.3625C14.75 0.120834 14.6292 0 14.3875 0H9.07083C5.92917 0 3.39167 2.29583 3.39167 5.19583V9.30417H0.6125C0.370834 9.30417 0.25 9.425 0.25 9.66667V14.0167C0.25 14.2583 0.370834 14.3792 0.6125 14.3792H3.39167V14.6208Z" fill="#fff"/>
							</svg>
						</a>
						<a class="social-link" target="_blank"  href="<?= $social['other_social']?>">
							<svg width="30" height="35" viewBox="0 0 30 35" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M16.7382 0C17.9444 0.23491 19.1753 0.381146 20.3521 0.720287C25.5371 2.21842 28.4861 5.87274 30 11.0268L27.133 11.8248C26.966 11.3581 26.8129 10.9303 26.6536 10.5009C24.9201 5.78718 21.4098 3.50965 16.565 3.13317C14.2857 2.95582 12.0326 3.16117 9.89857 4.06659C6.75632 5.40915 4.88674 7.89359 3.95737 11.0952C2.74733 15.1664 2.71943 19.5008 3.87695 23.5874C5.38158 28.9499 9.16868 31.7859 14.7016 31.8933C17.8222 31.954 20.7681 31.5106 23.1789 29.2828C25.0578 27.5451 25.9423 25.4465 25.3902 22.8656C25.0701 21.369 24.1902 20.266 22.8109 19.4151C22.6841 19.9767 22.5805 20.49 22.4506 20.9972C21.1253 26.2119 15.1826 28.4645 10.8898 25.3671C10.1584 24.8435 9.56644 24.1468 9.16604 23.3385C8.76564 22.5302 8.56915 21.6352 8.5939 20.7324C8.61866 19.8297 8.8639 18.9469 9.30799 18.1621C9.75208 17.3772 10.3814 16.7144 11.1403 16.2321C12.405 15.4188 13.8675 14.9705 15.3681 14.9362C16.8279 14.8864 18.2908 14.9253 19.7691 14.9253C19.4846 13.4085 18.8583 12.0364 17.1604 11.5215C14.9521 10.851 12.9852 11.2181 11.4248 13.1192L9.00631 11.4515C9.9929 9.91911 11.3614 8.96235 13.0687 8.4692C16.0903 7.59334 19.4011 8.50498 21.1593 10.7187C22.1351 11.9462 22.6253 13.3867 22.7722 14.93C22.8402 15.6565 23.0598 16.1045 23.765 16.4639C29.567 19.4197 29.8222 26.6397 25.9871 30.7763C23.6676 33.2856 20.7743 34.5691 17.4109 34.8647C17.1858 34.8969 16.9628 34.9421 16.7429 35H14.114C13.8372 34.9533 13.5604 34.8911 13.2805 34.8631C7.88982 34.3124 3.85995 31.7128 1.79552 26.6179C-0.571988 20.781 -0.553433 14.7946 1.58676 8.88301C3.1084 4.68264 6.08364 1.88239 10.4011 0.675173C11.6073 0.337587 12.8754 0.220909 14.1125 0.00311205L16.7382 0ZM19.865 18.1254C18.4532 18.0632 17.1387 17.8718 15.8521 17.9885C14.7584 18.0736 13.6929 18.3794 12.7192 18.8877C11.3181 19.6655 11.2022 21.5215 12.3094 22.6105C13.93 24.2019 17.4248 23.9079 18.7361 22.0551C19.5233 20.9443 19.7753 19.6671 19.865 18.1254Z" fill="#EDEDFF"/>
							</svg>
						</a>
						<a class="social-link" target="_blank" href="<?= $social['linkedin'] ?>">
							<svg width="22" height="22" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M32 32H25.6V20.8016C25.6 17.7296 24.2448 16.0156 21.8144 16.0156C19.1696 16.0156 17.6 17.8016 17.6 20.8016V32H11.2V11.2H17.6V13.5391C17.6 13.5391 19.608 10.0156 24.1328 10.0156C28.6592 10.0156 32 12.7778 32 18.493V32ZM3.9072 7.87344C1.7488 7.87344 0 6.11034 0 3.93594C0 1.76314 1.7488 0 3.9072 0C6.064 0 7.81279 1.76314 7.81279 3.93594C7.81439 6.11034 6.064 7.87344 3.9072 7.87344ZM0 32H8V11.2H0V32Z" fill="#EDEDFF"/>
							</svg>
						</a>
					</div>
					<?php if($social['email']):?>
						<a class="mail-link" href="mailto:<?= $social['email'] ?>"><?= $social['email'] ?></a>
					<?php endif; ?>
				</div>
			<?php
			endif;
			?>
		</div>
        <p class="footer-media-text-mobile">
            An informational blog Affstream devoted to affiliate marketing, traffic, and online moneymaking. Here you can find case studies and affiliate marketing success stories, guides, and manuals on how to kickstart your online business, interviews with top affiliate marketers as well as the latest industry news and so much more.
        </p>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
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
</body>
</html>
