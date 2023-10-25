<?php
/*
Template Name: Change password
*/
?>
<?php get_header() ?>
<section class="login-page change-password" style="background-image: url('<?= get_template_directory_uri() . '/img/login-bg.png' ?>')">
	<form>
		<h2>change password</h2>
		<div class="input-field">
			<input type="password" id="password" required placeholder="Enter password">
			<label for="password">Password</label>
		</div>

		<div class="input-field">
			<input type="password" id="confirm-password" required placeholder="Confirm password">
			<label for="confirm-password">Confirm Password</label>
		</div>
		<button class="btn  forms-button" type="submit">submit
			<svg class="forms-button-svg" width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M14.1253 9.86691C15.1781 9.25906 15.1781 7.73942 14.1253 7.13157L2.87311 0.635132C1.82027 0.0272768 0.504231 0.787094 0.504231 2.0028L0.504231 14.9957C0.504231 16.2114 1.82027 16.9712 2.87311 16.3633L14.1253 9.86691Z"
				      fill="#100F0F"/>
			</svg>
		</button>
	</form>
</section>
<?php get_footer() ?>



