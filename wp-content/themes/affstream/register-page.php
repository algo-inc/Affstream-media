<?php
/*
Template Name: Register
*/
?>

<?php
get_header()
?>
<body>
<div class="register-form "
     style="background-image: url('<?= get_template_directory_uri() . '/img/register-bg.png' ?>')">
    <div class="register-form-container">
        <h1 class="register-form-title">AFFSTREAM Sign up</h1>
        <felte-form id="register-form">
            <form  name="register-form" >
                <div class="first-column form-column">
                    <div class="row">
                        <div class="input-field">
                            <input name="Name"  id="user-name" type="text">
                            <label for="user-name active"><?php echo esc_html( pll__( 'NAME' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input name="Email" id="email" type="email">
                            <label for="email"><?php echo esc_html( pll__( 'EMAIL' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input name="Password" id="password" type="password" >
                            <label for="password"><?php echo esc_html( pll__( 'PASSWORD' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input name="ConfirmPassword" id="confirm-password" type="password" >
                            <label for="confirm-password"><?php echo esc_html( pll__( 'CONFIRM PASSWORD' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <select  id="contact-method"  class="select" name="MessengerType" required  aria-invalid="true" onchange="toggleContactField()" data-select="false">
                                <option value="" disabled selected ><?php echo esc_html( pll__( 'Choose your messenger' ) ); ?></option>
                                <option value="4"><?php echo esc_html( pll__( 'Skype' ) ); ?></option>
                                <option value="6"><?php echo esc_html( pll__( 'Telegram' ) ); ?></option>
                            </select>
                            <label class="select-label"><?php echo esc_html( pll__( 'MESSENGER (TELEGRAM/SKYPE)' ) ); ?></label>
                        </div>

                    </div>
                    <div class="row" id="contact-field">
                        <div class="input-field" >
                            <input name="Messenger" id="contact-account" required type="text" >
                            <label for="contact-account"  id="contact-label"><?php echo esc_html( pll__( 'messenger account' ) ); ?></label>
                        </div>
                    </div>
                </div>
                <div class="second-column form-column">
<!--                    <div class="row">-->
<!--                        <div class="input-field">-->
<!--                            <select name="Country" id="country" required  data-select="false">-->
<!--						        --><?php //= get_template_part('template-parts/country-list'); ?>
<!--                            </select>-->
<!--                            <label class="select-label">--><?php //echo esc_html( pll__( 'COUNTRY' ) ); ?><!--</label>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="row">
                        <div class="input-field">
                            <input name="TrafficSources" id="traffic-sources" required type="text"  maxlength="100">
                            <label for="traffic-sources"><?php echo esc_html( pll__( 'Describe your traffic sources' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field ">
                            <input name="HowDidYouKnow" id="how-did-you-know" required type="text"  maxlength="60">
                            <label for="how-did-you-know"><?php echo esc_html( pll__( 'How did you know about us?' ) ); ?></label>
                        </div>
                    </div>
                    <div class="row check-box">
                        <label class="checkbox">
                            <input type="checkbox" name="TermsConditions" required class="filled-in" id="termsConditions"/>
                            <span class="checkbox-name"><?php echo esc_html( pll__( 'I accept the ' ) ); ?> <a target="_blank" href="<?php the_field('terms_and_conditions'); ?>">Terms and Conditions</a></span>
                        </label>
                    </div>
                    <div class="row register-checkbox-container" >
                        <label class="checkbox">
                            <input type="checkbox" name="PrivacyPolicy" required class="filled-in" id="privatPolisy"/>
                            <span class="checkbox-name"><?php echo esc_html( pll__( 'I agree with' ) ); ?>  <a target="_blank" href="<?php the_field('privacy_policy'); ?>">Privacy Policy</a></span>
                        </label>
                    </div>
<!--                    <div class="g-recaptcha" data-theme="dark" data-size="normal"-->
<!--                         data-sitekey="6Ld1FG0nAAAAAP4ctxLKfebJvtafHewZGNZ4HT2s"></div>-->
                    <div class="row">
                        <div class="form-submit-button">
                            <button id="submit-button" class="btn waves-effect waves-light" type="submit" name="action"><?php echo esc_html( pll__( 'sign up' ) ); ?></button>
                        </div>
                    </div>
                    <div class="row form-bottom-tex">
                        <p class="">* — All fields are mandatory to fill out</p>
                        <p>Already have an account?<a href="/login">Login to your account</a> </p>
                    </div>
                </div>
                <div class="three-column form-column"></div>
            </form>
        </felte-form>
    </div>
</div>
<script>
  document.getElementById('country').addEventListener('change', function() {
    if (this.value === '') {
      this.parentNode.classList.add('invalid');
    } else {
      this.parentNode.classList.remove('invalid');
    }
  });
</script>

<script>

  function toggleContactField() {
    var contactMethodSelect = document.getElementById('contact-method');
    var contactField = document.getElementById('contact-field');
    var contactLabel = document.getElementById('contact-label');
    if (contactMethodSelect.value !== '') {
      contactField.style.display = 'block';
      contactLabel.classList.add('active');
    } else {
      contactField.style.display = 'none';
    }
  }

  var contactMethodSelect = document.getElementById('contact-method');
  contactMethodSelect.addEventListener('change', toggleContactField);
  toggleContactField();
</script>

<?php get_footer() ?>
