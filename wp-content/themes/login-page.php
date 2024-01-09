
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/styles/registration/registration.css' ?>">
    <title>Document</title>
</head>
<body>
<?php get_header() ?>
<section class="login-page" style="background-image: url('<?= get_template_directory_uri() . '/img/login-bg.png' ?>')">
    <form class="registrationForm">
        <h2>log in</h2>
        <div class="input-field">
            <input type="email" id="email" required placeholder="Enter email">
            <label for="email">Email</label>
        </div>
        <div class="input-field">
            <input type="password" id="password" required placeholder="Enter password">
            <label for="password">Password</label>
        </div>
        <button class="btn  forms-button" type="submit">submit
            <svg class="forms-button-svg" width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M14.1253 9.86691C15.1781 9.25906 15.1781 7.73942 14.1253 7.13157L2.87311 0.635132C1.82027 0.0272768 0.504231 0.787094 0.504231 2.0028L0.504231 14.9957C0.504231 16.2114 1.82027 16.9712 2.87311 16.3633L14.1253 9.86691Z"
                      fill="#100F0F"/>
            </svg>
        </button>
        <div class="form-links-container">
            <a class="form-links" href="/registration">Sign up
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.316 7.31061C11.0194 6.9045 11.0194 5.88923 10.316 5.48312L2.79843 1.14283C2.09503 0.736724 1.21578 1.24436 1.21578 2.05658L1.21578 10.7371C1.21578 11.5494 2.09503 12.057 2.79843 11.6509L10.316 7.31061Z" stroke="#EDEDFF" stroke-width="1.11132"/>
                </svg>
            </a>
            <a class="form-links" href="/restore-password">Forgot your password?
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.316 7.31061C11.0194 6.9045 11.0194 5.88923 10.316 5.48312L2.79843 1.14283C2.09503 0.736724 1.21578 1.24436 1.21578 2.05658L1.21578 10.7371C1.21578 11.5494 2.09503 12.057 2.79843 11.6509L10.316 7.31061Z" stroke="#EDEDFF" stroke-width="1.11132"/>
                </svg>
            </a>
        </div>
    </form>
</section>
<?php get_footer() ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
  M.AutoInit();
</script>
<!--<script>-->
<!--  document.addEventListener('DOMContentLoaded', function() {-->
<!--    const registrationForm = document.getElementById('registrationForm');-->
<!--    registrationForm.addEventListener('submit', function(event) {-->
<!--      event.preventDefault();-->
<!--      const email = document.getElementById('email').value;-->
<!--      const password = document.getElementById('password').value;-->
<!--      const data = {-->
<!--        "Email": email,-->
<!--        "Password": password-->
<!--      };-->
<!--      fetch('https://cp.affstream.com/api/account/register/affiliate', {-->
<!--        method: 'POST',-->
<!--        headers: {-->
<!--          'Content-Type': 'application/json'-->
<!--        },-->
<!--        body: JSON.stringify(data)-->
<!--      })-->
<!--        .then(response => response.json())-->
<!--        .then(result => {-->
<!--          console.log(result);-->
<!--          alert('Реєстрація успішна!');-->
<!--        })-->
<!--        .catch(error => {-->
<!--          console.error(error);-->
<!--          alert('Помилка реєстрації!');-->
<!--        });-->
<!--    });-->
<!--  });-->
<!--</script>-->
</body>
</html>
