const siteUrl = 'stage-cp.affstream.com';
jQuery.noConflict();
jQuery(document).ready(function ($) {
  function apiLogin(email, password) {
    var apiUrl = 'https://' + siteUrl + '/api/account/login';
    var data = {
      'Email': email,
      'Password': password
    };
    $.ajax({
      type: 'POST',
      url: apiUrl,
      data: JSON.stringify(data),
      contentType: 'application/json',
      xhrFields: {
        withCredentials: true
      },
      success: function (response) {
        authDesignUpdate(response.success);
        if (response.success) {
          window.location.href = 'https://' + siteUrl;
        } else {
          var errorMessage = response.message || 'An error occurred during login.';
          $('#error-message').text(errorMessage);
        }
      },
      error: function (xhr, status, error) {
        console.error('Деталі помилки:', error);
        var errorMessage = 'An error occurred during login.';
        $('#error-message').text(errorMessage);
      }
    });
  }

  $('#login-form').on('submit', function (event) {
    event.preventDefault();
    var email = $('#email').val();
    var password = $('#password').val();
    apiLogin(email, password);
  });
});

function isExternalApiAuthorized() {
  return new Promise(function (resolve, reject) {
    if (!('externalApiAuthResolvers' in window)) {
      window.externalApiAuthResolvers = [];
    }
    if (!window.externalApiAuthFinished) {
      if (window.externalApiAuthStarted) {
        window.externalApiAuthResolvers.push({resolve, reject});
      } else {
        window.externalApiAuthStarted = true;
        jQuery.ajax({
          type: 'GET',
          url: 'https://' + siteUrl + '/api/account/me',
          xhrFields: {
            withCredentials: true
          },
          success: function (response) {
            console.log(response.isAuthenticated);
            window.externalApiAuthorized = response.isAuthenticated;
            window.externalApiAuthFinished = true;
            resolve(response.isAuthenticated);
            window.externalApiAuthResolvers.forEach((item) => item.resolve(response.isAuthenticated));
          },
          error: function (xhr, status, error) {
            reject(error);
            console.error(error);
            window.externalApiAuthFinished = true;
            window.externalApiAuthResolvers.forEach((item) => item.reject(error));
          }
        });
      }
    } else {
      resolve(window.externalApiAuthorized);
    }
  });
}

function authDesignUpdate(isAuthenticated) {
  if (isAuthenticated) {
    jQuery('.buttons-container').hide();
    jQuery('.logout-container').show();
    jQuery('.intro-button').hide()
  } else {
    jQuery('.buttons-container').show();
    jQuery('.logout-container').hide();
    jQuery('.intro-button').show();
  }
}

jQuery(document).ready(function ($) {
  isExternalApiAuthorized().then(function (isAuthenticated) {
    authDesignUpdate(isAuthenticated);
  });
  $('.logout-btn').on('click', function () {
    var logoutUrl = 'https://' + siteUrl + '/api/account/logout';
    $.ajax({
      type: 'GET',
      url: logoutUrl,
      xhrFields: {
        withCredentials: true
      },
      success: function (response) {
        console.log('Logged out successfully');
        $('.buttons-container').show();
        $('.logout-container').hide();
      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  });
});











