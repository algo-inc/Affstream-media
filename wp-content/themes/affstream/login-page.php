<?php
/*
Template Name: Login
*/
?>
<?php
$video_url = get_field('video_loader', 'option');
$server = $_SERVER['HTTP_HOST'];
if (!empty($video_url) && !wp_is_mobile()) {
	if (strpos($server, 'localhost') === false) {
		echo '<video class="video-loader" src="' . esc_url($video_url) . '" autoplay muted></video>';
	}
}

?>
<?php get_header() ?>
<style>
    .autofilled {
        color: #000000;
        background-color: #D3D3D3;
    }
</style>
<section class="login-page" style="background-image: url('<?= get_template_directory_uri() . '/img/login-bg.png' ?>')">
    <form id="login-form" method="post">
        <h2><?php the_title() ?></h2>
        <div class="input-field">
            <input type="email" id="email" name="email" required placeholder="Enter email">
            <label for="email">Email</label>
        </div>
        <div class="input-field" style="margin-bottom: 0">
            <input type="password" id="password" name="password" style="background: #0c0c0c" required
                   placeholder="Enter password">
            <label for="password">Password</label>
        </div>
        <div id="error-message" class="error-message"></div>
        <button class="btn  forms-button" type="submit" name="login"> submit
            <svg class="forms-button-svg" width="15" height="17" viewBox="0 0 15 17" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1253 9.86691C15.1781 9.25906 15.1781 7.73942 14.1253 7.13157L2.87311 0.635132C1.82027 0.0272768 0.504231 0.787094 0.504231 2.0028L0.504231 14.9957C0.504231 16.2114 1.82027 16.9712 2.87311 16.3633L14.1253 9.86691Z"
                      fill="#100F0F"/>
            </svg>
        </button>
        <div class="form-links-container">
            <a class="form-links"  href="/registration"> Sign up
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
                    <path d="M8.52272 6.54193C9.11679 6.19894 9.11679 5.34148 8.52272 4.99849L2.17361 1.33283C1.57954 0.989847 0.836956 1.41858 0.836956 2.10455L0.836956 9.43587C0.836956 10.1218 1.57954 10.5506 2.17361 10.2076L8.52272 6.54193Z"
                          stroke="#EDEDFF" stroke-width="0.938587"/>
                </svg>
            </a>
            <a class="form-links" href="/restore-password">Forgot your password?
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="11" viewBox="0 0 10 11" fill="none">
                    <path d="M8.52272 6.54193C9.11679 6.19894 9.11679 5.34148 8.52272 4.99849L2.17361 1.33283C1.57954 0.989847 0.836956 1.41858 0.836956 2.10455L0.836956 9.43587C0.836956 10.1218 1.57954 10.5506 2.17361 10.2076L8.52272 6.54193Z"
                          stroke="#EDEDFF" stroke-width="0.938587"/>
                </svg>
            </a>
        </div>
    </form>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const emailInput = document.getElementById('email');
        const passwordInput = document.getElementById('password');
        function checkAutofill(inputElement) {
          if (inputElement.value !== '') {
            inputElement.classList.add('autofill');
          }
        }

        checkAutofill(emailInput);
        checkAutofill(passwordInput);
        emailInput.addEventListener('input', function () {
          checkAutofill(emailInput);
        });

        passwordInput.addEventListener('input', function () {
          checkAutofill(passwordInput);
        });
      });
    </script>
</section>

<?php get_footer() ?>

<script>
  M.AutoInit();
</script>

</body>
</html>
