import '@felte/element/felte-form';
import {prepareForm} from '@felte/element';
import {create, test, enforce} from 'vest';
import {validator} from '@felte/validator-vest';
import 'vest/enforce/email';
import {AutoInit} from 'materialize-css'
import {test1} from './functions/function1';

document.addEventListener('DOMContentLoaded', () => {
  AutoInit(document.body);
});
const suite = create('registerFormValidator', (data) => {
  test('Name', 'Enter user name', () => {
    enforce(data.Name).isNotEmpty().condition(value => {
      return /^[\p{Letter}\p{Mark}\s]+$/u.test(value);
    });
  });
  test('Email', 'Enter email', () => {
    enforce(data.Email).isNotEmpty().isEmail();
  });
  test('Password', 'Enter password', () => {
    const password = data.Password;
    const confirmPassword = data.ConfirmPassword;
    const isLengthValid = password.length >= 8;
    const hasUpperCase = /[A-Z]/.test(password);
    if (!isLengthValid) {
      throw new Error('Пароль повинен містити не менше 8 символів.');
    }
    if (!hasUpperCase) {
      throw new Error('Пароль повинен містити хоча б одну велику літеру.');
    }
    enforce(password).equals(confirmPassword);
  });
  test('ConfirmPassword', 'Enter password', () => {
    enforce(data.ConfirmPassword).isNotEmpty().equals(data.Password);
  });
  test('MessengerType', 'Enter contact method', () => {
    enforce(data.MessengerType).isNotEmpty();
  });
  test('Messenger', 'Enter contact ', () => {
    enforce(data.Messenger).isNotEmpty();
  });
  test('Country', 'Enter country', () => {
    enforce(data.Country).isNotEmpty();
  });
  test('HowDidYouKnow', 'Enter traffic sources', () => {
    enforce(data.HowDidYouKnow).isNotEmpty();
  });
  test('TrafficSources', 'Enter traffic sources', () => {
    enforce(data.TrafficSources).isNotEmpty();
  });
  test('TermsConditions', 'I accept the terms and conditions ', () => {
    enforce(data.TermsConditions).isTruthy();
  });
  test('PrivacyPolicy', 'i agree with private polisy', () => {
    enforce(data.PrivacyPolicy).isTruthy();
  });
});

function sendAjaxRequest(url, method, data) {
  return new Promise(function (resolve, reject) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.withCredentials = true;
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          if (response.errors && response.errors.length > 0) {
            reject(response);
            openModal('error' , response.errors[0])
            console.log(response.errors[0])
          }
          else {
            openModal('Congratulations!' , 'You sign up for an affiliate network Affstream   Confirm your email and let\'s get started.')
          }
          resolve(response);
        } else {
          reject({status: xhr.statusText});
        }
      }
    };
    xhr.send(JSON.stringify(data));
  });
}

prepareForm('register-form', {
  extend: validator({suite}),
  onSubmit: function (values) {
    console.log(values);
    sendAjaxRequest('https://stage-cp.affstream.com/api/account/register/affiliate', 'POST', values)
      .then(function (response) {
        console.log('Запит успішно відправлено:', response);
      })
      .catch(function (error) {
        console.error('Помилка відправки запиту:', error.message);
      });
  }
}).then(function (felteForm) {
  console.log(felteForm);
});

const advertiserForm = create('advertiserFormValidator', (data) => {
  test('Name', 'Enter name', () => {
    enforce(data.Name).isNotEmpty();
  });
  test('CompanyName', 'Enter Company Name', () => {
    enforce(data.CompanyName).isNotEmpty();
  });
  test('Email', 'Enter Email', () => {
    enforce(data.Email).isEmail();
  });
  test('JobTitle', 'Enter JobTitle', () => {
    enforce(data.JobTitle).isNotEmpty();
  });
  test('Message', 'Enter Message', () => {
    enforce(data.Message).isNotEmpty();
  });
  test('AgreeToReceiveCommunication', 'Enter name', () => {
    enforce(data.AgreeToReceiveCommunication).isTruthy();
  });
});

prepareForm('advertiser-form-validator', {
  extend: validator({suite: advertiserForm}),
  onSubmit: (values) => {
    console.log(values);
    sendAjaxRequest('https://stage-cp.affstream.com/api/account/register/advertiser', 'POST', values)
      .then(function (response) {
        openModal('Congratulations!', 'You sign up for an affiliate network Affstream n/' +
          'Confirm your email and let\'s get started.');
        console.log('Запит успішно відправлено:', response);
      })
      .catch(function (error) {
        openModal(error.message, 'errors')
        console.error('Помилка відправки запиту:', error.message);
      });
  },
}).then((felteForm) => {
  console.log(felteForm);
});
