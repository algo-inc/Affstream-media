<?php
if ( post_password_required() ) {
	return;
}
?>
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

<div id="comments " class="comments-area ">
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">Writing a company review</h3>
        <form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="commentform"
              class="comment-form">
			<?php if ( ! is_user_logged_in() ) : ?>
                <div class="form-flex-container">
                    <p class="comment-form">
                        <input type="text" name="author" id="author" placeholder="Your name*" required>
                    </p>
                    <p class="comment-form">
                        <input type="email" name="email" id="email" placeholder="Your email*" required>
                    </p>
                </div>
			<?php endif; ?>
            <p class="comment-form-comment">
                <textarea placeholder="Feedback" name="comment" id="comment" required></textarea>
            </p>
            <div class="comment-rating">
                <div class="rating-container">
                    <h3 class="rating-title">Support*</h3>
                    <div class="rating">
                        <input type="number" name="support" hidden required>
                        <i class='bx bx-star star' style="--i: 0;"></i>
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                    </div>
                </div>
                <div class="rating-container">
                    <h3 class="rating-title">Quality*</h3>
                    <div class="rating">
                        <input type="number" name="quality" hidden required>
                        <i class='bx bx-star star' style="--i: 0;"></i>
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                    </div>
                </div>
                <div class="rating-container">
                    <h3 class="rating-title">Interface*</h3>
                    <div class="rating">
                        <input type="number" name="interface" hidden required>
                        <i class='bx bx-star star' style="--i: 0;"></i>
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                    </div>
                </div>
                <div class="rating-container">
                    <h3 class="rating-title">Price*</h3>
                    <div class="rating">
                        <input type="number" name="price" hidden required>
                        <i class='bx bx-star star' style="--i: 0;"></i>
                        <i class='bx bx-star star' style="--i: 1;"></i>
                        <i class='bx bx-star star' style="--i: 2;"></i>
                        <i class='bx bx-star star' style="--i: 3;"></i>
                        <i class='bx bx-star star' style="--i: 4;"></i>
                    </div>
                </div>
            </div>
            <p class="form-submit">
                <input type="submit" name="submit" id="submit" value="Post Comment" disabled>
            </p>
        </form>
    </div>
</div>

<?php if ( have_comments() ) : ?>
    <h2 class="comments-title">
		<?php
		$comment_count = get_comments_number();
		if ( $comment_count === 1 ) {
			echo ' Feedback about the company ' . esc_html( $comment_count );
		} else {
			echo ' Feedback about the company ' . esc_html( $comment_count );
		}
		?>
    </h2>

    <div class="custom-comments">
		<?php
		$comments = get_comments( array( 'post_id' => get_the_ID() ) );
		foreach ( $comments as $comment ) {
			$support_rating   = get_comment_meta( $comment->comment_ID, 'support', true );
			$quality_rating   = get_comment_meta( $comment->comment_ID, 'quality', true );
			$interface_rating = get_comment_meta( $comment->comment_ID, 'interface', true );
			$price_rating     = get_comment_meta( $comment->comment_ID, 'price', true );
			?>
            <div class="feedback">
                <div class="flex-container">
                    <div class="comment-avatar">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="101" viewBox="0 0 100 101" fill="none">
                            <g clip-path="url(#clip0_4470_15995)">
                                <rect y="0.978516" width="100" height="100" rx="50" fill="#100F0F"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M39.3801 27.6878C38.8112 27.3587 38.1663 27.1848 37.5095 27.1832C36.8526 27.1816 36.2069 27.3525 35.6365 27.6788C35.0661 28.0051 34.591 28.4754 34.2586 29.0429C33.9262 29.6104 33.748 30.2552 33.7419 30.9132V71.058C33.748 71.716 33.9262 72.3608 34.2586 72.9283C34.591 73.4958 35.0661 73.9661 35.6365 74.2924C36.2069 74.6187 36.8526 74.7896 37.5095 74.788C38.1663 74.7864 38.8112 74.6125 39.3801 74.2835L59.6665 62.5307C60.4857 62.0644 61.0863 61.2913 61.3364 60.3814C61.5865 59.4714 61.4655 58.4993 61.0001 57.6787C60.5346 56.8582 59.7628 56.2564 58.8544 56.0059C57.9461 55.7554 56.9756 55.8766 56.1565 56.3429L49.2469 60.2743C48.2006 60.8952 47.0402 61.2988 45.835 61.4612C44.6297 61.6236 43.4041 61.5413 42.2312 61.2194C41.0583 60.8975 39.9621 60.3425 39.0078 59.5874C38.0534 58.8323 37.2605 57.8926 36.6762 56.8242C36.0919 55.7558 35.7282 54.5805 35.6067 53.3684C35.4852 52.1563 35.6084 50.932 35.969 49.7686C36.3296 48.6051 36.9202 47.5263 37.7056 46.5962C38.4911 45.6661 39.4553 44.9039 40.5409 44.3548L48.1414 40.2988C48.4762 40.117 48.8435 40.003 49.2223 39.9634C49.601 39.9238 49.9839 39.9594 50.349 40.068C50.7141 40.1766 51.0542 40.3562 51.35 40.5965C51.6458 40.8368 51.8914 41.1331 52.0729 41.4685C52.2544 41.8039 52.3681 42.1718 52.4077 42.5513C52.4472 42.9307 52.4117 43.3142 52.3033 43.6799C52.1949 44.0457 52.0156 44.3864 51.7757 44.6827C51.5358 44.979 51.24 45.2251 50.9052 45.4069L43.3047 49.449C42.8936 49.6316 42.5242 49.8967 42.2194 50.2279C41.9145 50.5591 41.6808 50.9494 41.5325 51.3747C41.3842 51.8 41.3246 52.2512 41.3573 52.7005C41.39 53.1498 41.5143 53.5876 41.7226 53.9869C41.9309 54.3862 42.2187 54.7384 42.5682 55.0218C42.9178 55.3053 43.3216 55.5139 43.7548 55.6348C44.188 55.7557 44.6414 55.7863 45.0869 55.7248C45.5324 55.6632 45.9605 55.5108 46.3449 55.277L53.2544 51.3455C54.317 50.7374 55.4887 50.345 56.7026 50.1905C57.9166 50.036 59.149 50.1225 60.3296 50.4452C61.5102 50.7678 62.6157 51.3203 63.5832 52.0709C64.5506 52.8216 65.361 53.7557 65.968 54.8201C66.5751 55.8845 66.9669 57.0582 67.1211 58.2743C67.2753 59.4904 67.1889 60.7249 66.8668 61.9075C66.5447 63.0902 65.9932 64.1976 65.2439 65.1668C64.4945 66.1359 63.562 66.9477 62.4994 67.5557L42.1992 79.3223C40.7475 80.1587 39.1016 80.5973 37.427 80.594C35.7524 80.5908 34.1081 80.1458 32.6597 79.3039C31.2113 78.462 30.0097 77.2528 29.176 75.7979C28.3422 74.3431 27.9057 72.694 27.9102 71.0165V30.8717C27.9178 29.2 28.3631 27.5596 29.2018 26.1144C30.0405 24.6693 31.2432 23.4699 32.6896 22.6361C34.136 21.8024 35.7755 21.3635 37.4442 21.3633C39.113 21.3631 40.7526 21.8016 42.1992 22.635L77.0924 42.6936C78.5427 43.5244 79.748 44.7244 80.5864 46.1721C81.4247 47.6197 81.8662 49.2636 81.8662 50.9372C81.8662 52.6107 81.4247 54.2546 80.5864 55.7022C79.748 57.1499 78.5427 58.3499 77.0924 59.1807C76.4321 59.5189 75.6673 59.5898 74.9563 59.3786C74.2453 59.1674 73.6426 58.6903 73.2732 58.0462C72.9037 57.402 72.7957 56.6402 72.9716 55.9185C73.1475 55.1968 73.5938 54.5706 74.2181 54.1695C74.7867 53.8437 75.2592 53.3732 75.5879 52.8055C75.9166 52.2379 76.0897 51.5934 76.0897 50.9372C76.0897 50.281 75.9166 49.6364 75.5879 49.0688C75.2592 48.5012 74.7867 48.0306 74.2181 47.7048L39.3801 27.6878Z" fill="#00E291"/>
                                <circle cx="50.0002" cy="50.9787" r="50.0002" fill="#100F0F"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M39.9155 29.8716C39.3669 29.5587 38.7449 29.3933 38.1114 29.3916C37.478 29.39 36.8551 29.5523 36.3049 29.8624C35.7547 30.1725 35.2963 30.6196 34.9754 31.1591C34.6544 31.6986 34.4822 32.3117 34.4758 32.9374V71.029C34.4814 71.6546 34.653 72.2678 34.9734 72.8074C35.2938 73.3471 35.7518 73.7943 36.3018 74.1045C36.8519 74.4147 37.4746 74.5771 38.108 74.5754C38.7413 74.5736 39.3632 74.4079 39.9114 74.0948L59.4365 62.9412C60.2239 62.4972 60.8005 61.7624 61.0395 60.8985C61.2784 60.0346 61.1602 59.1123 60.7107 58.3345C60.2612 57.5567 59.5173 56.9872 58.6427 56.7512C57.768 56.5151 56.8343 56.632 56.0469 57.0759L49.337 60.8113C48.3311 61.3729 47.2222 61.7314 46.0747 61.8662C44.9273 62.0009 43.7642 61.9091 42.6529 61.5961C41.5417 61.2832 40.5045 60.7552 39.6016 60.043C38.6986 59.3307 37.9479 58.4484 37.3931 57.4472C36.8383 56.446 36.4904 55.3459 36.3696 54.2108C36.2488 53.0757 36.3575 51.9282 36.6895 50.8349C37.0214 49.7417 37.57 48.7244 38.3032 47.8423C39.0365 46.9602 39.9399 46.2308 40.961 45.6964L48.2671 41.8481C48.9137 41.5384 49.6567 41.4884 50.3399 41.7086C51.0231 41.9287 51.5933 42.4019 51.9307 43.0286C52.2681 43.6554 52.3463 44.3869 52.149 45.0695C51.9517 45.752 51.4941 46.3325 50.8726 46.6888L43.5543 50.533C42.8167 50.9364 42.2715 51.6126 42.0387 52.413C41.8058 53.2133 41.9044 54.0723 42.3128 54.8008C42.7211 55.5294 43.4057 56.0679 44.216 56.2979C45.0263 56.5279 45.8959 56.4305 46.6335 56.0271L53.3433 52.2958C55.3974 51.2853 57.7651 51.0894 59.9608 51.7484C62.1565 52.4074 64.0136 53.8712 65.1514 55.8396C66.2891 57.8081 66.6212 60.132 66.0794 62.3345C65.5377 64.5371 64.1633 66.4515 62.238 67.685L42.6844 78.8466C36.5912 82.3036 28.9258 77.9995 28.9258 71.029V32.9374C28.9258 25.9628 36.5912 21.6426 42.6844 25.1157L76.2744 44.1636C77.6697 44.9516 78.8293 46.0899 79.6358 47.4631C80.4424 48.8363 80.8672 50.3956 80.8672 51.9832C80.8672 53.5708 80.4424 55.1301 79.6358 56.5033C78.8293 57.8766 77.6697 59.0148 76.2744 59.8028C75.6373 60.1429 74.891 60.2237 74.1945 60.0281C73.498 59.8324 72.9064 59.3758 72.5458 58.7556C72.1852 58.1353 72.0842 57.4005 72.2642 56.7077C72.4443 56.0149 72.8911 55.4189 73.5096 55.0469C74.0572 54.7389 74.5125 54.2932 74.8292 53.7551C75.1459 53.217 75.3127 52.6056 75.3127 51.9832C75.3127 51.3608 75.1459 50.7494 74.8292 50.2113C74.5125 49.6732 74.0572 49.2275 73.5096 48.9195L39.9155 29.8716Z" fill="#00E291"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_4470_15995">
                                    <rect y="0.978516" width="100" height="100" rx="50" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="comment-content">
                        <div class="name-and-date">
                            <div class="comment-author"><?php comment_author(); ?></div>
                            <div class="comment-date"><?php echo get_comment_date() . ' ' . get_comment_time(); ?></div>
                        </div>
                        <div class="comment-text"><?php comment_text(); ?></div>
	                    <?php if ( ! empty( $support_rating ) || ! empty( $quality_rating ) || ! empty( $interface_rating ) || ! empty( $price_rating ) ) : ?>
                            <div class="comment-rating">
			                    <?php if ( ! empty( $support_rating ) ) : ?>
				                    <?php render_rating_block( 'Support', $support_rating, null ); ?>
			                    <?php endif; ?>

			                    <?php if ( ! empty( $quality_rating ) ) : ?>
				                    <?php render_rating_block( 'Quality', $quality_rating, null ); ?>
			                    <?php endif; ?>

			                    <?php if ( ! empty( $interface_rating ) ) : ?>
				                    <?php render_rating_block( 'Interface', $interface_rating, null ); ?>
			                    <?php endif; ?>

			                    <?php if ( ! empty( $price_rating ) ) : ?>
				                    <?php render_rating_block( 'Price', $price_rating, null ); ?>
			                    <?php endif; ?>
                            </div>
	                    <?php endif; ?>
                    </div>
                </div>
            </div>
			<?php
		}
		?>
    </div>

<?php endif; ?>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const ratingContainers = document.querySelectorAll('.rating-container');
    const submitButton = document.getElementById('submit');

    ratingContainers.forEach((container) => {
      const stars = container.querySelectorAll('.rating .star');
      const ratingValue = container.querySelector('.rating input');

      stars.forEach((star, idx) => {
        star.addEventListener('click', function () {
          ratingValue.value = idx + 1;

          stars.forEach((s, i) => {
            s.classList.replace('bxs-star', 'bx-star');
            s.classList.remove('active');
          });

          for (let i = 0; i <= idx; i++) {
            stars[i].classList.replace('bx-star', 'bxs-star');
            stars[i].classList.add('active');
          }

          checkIfAllRatingsSelected();
        });
      });
    });

    function checkIfAllRatingsSelected() {
      const allContainers = Array.from(ratingContainers);
      const allRatingsSelected = allContainers.every(container => {
        return container.querySelector('.rating .star.active') !== null;
      });
      submitButton.disabled = !allRatingsSelected;
    }

    checkIfAllRatingsSelected();
  });

</script>


