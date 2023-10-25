<?php
/*
Template Name: Restore password Email
*/
?>

<?php get_header() ?>
<section class="login-page restore-password " style="background-image: url('<?= get_template_directory_uri() . '/img/login-bg.png' ?>')">
	<form id="resetPasswordForm">
		<h2><?php the_title() ?></h2>
		<div class="input-field">
			<input type="email" id="restore-password-email" required placeholder="Enter email">
			<label for="email">Email</label>
		</div>
        <div class="message"></div>
		<button class="btn  forms-button" type="submit">
            submit
			<svg class="forms-button-svg" width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M14.1253 9.86691C15.1781 9.25906 15.1781 7.73942 14.1253 7.13157L2.87311 0.635132C1.82027 0.0272768 0.504231 0.787094 0.504231 2.0028L0.504231 14.9957C0.504231 16.2114 1.82027 16.9712 2.87311 16.3633L14.1253 9.86691Z"
				      fill="#100F0F"/>
			</svg>
		</button>
        <div class="flex-container">
            <a class="form-links" href="/registration">Sign up
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.316 7.31061C11.0194 6.9045 11.0194 5.88923 10.316 5.48312L2.79843 1.14283C2.09503 0.736724 1.21578 1.24436 1.21578 2.05658L1.21578 10.7371C1.21578 11.5494 2.09503 12.057 2.79843 11.6509L10.316 7.31061Z" stroke="#EDEDFF" stroke-width="1.11132"/>
                </svg>
            </a>
            <a class="form-links" href="/login">Log in
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.316 7.31061C11.0194 6.9045 11.0194 5.88923 10.316 5.48312L2.79843 1.14283C2.09503 0.736724 1.21578 1.24436 1.21578 2.05658L1.21578 10.7371C1.21578 11.5494 2.09503 12.057 2.79843 11.6509L10.316 7.31061Z" stroke="#EDEDFF" stroke-width="1.11132"/>
                </svg>
            </a>
        </div>
	</form>
</section>
<script id="resetPasswordScript">
  function saveEmailToLocalStorage(email) {
    localStorage.setItem("savedEmail", email);
  }

  document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
    event.preventDefault();
    const email = document.getElementById("restore-password-email").value;
    const data = {
      Email: email
    };
    fetch("https://cp.affstream.com/api/account/reset-password-confirmation-email", {
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(data)
    })
      .then(response => {
        if (response.ok) {
          return response.json();
        } else {
          throw new Error("Мережева відповідь некоректна.");
        }
      })
      .then(responseData => {
        console.log(responseData);
        const messageDiv = document.querySelector(".message");
        messageDiv.textContent = responseData.message;
        saveEmailToLocalStorage(email); // Зберегти електронну пошту у локальному сховищі
      })
      .catch(error => {
        console.error("Помилка:", error);
      });
  });
</script>
<?php get_footer() ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  M.AutoInit();
</script>


