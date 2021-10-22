function Validator(options) {
  // Get form
  var formElement = document.querySelector(options.form);
  if (formElement) {
    options.rules.forEach(function (rule) {
      var inputElement = formElement.querySelector(rule.selector);
      if (inputElement) {
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
      }
    });
  }
}

//define rules
Validator.isValidLength = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.length > 1 && value.length < 31
        ? undefined
        : "Please enter minimum 2 characters and maximum 30 characters";
    },
  };
};
Validator.isEmail = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return regex.test(value)
        ? undefined
        : "You will use this when you log in and if you ever need to reset password.";
    },
  };
};
Validator.isRequiredBirthday = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value && parseInt(value) > 0
        ? undefined
        : "Please chose your birthday!";
    },
  };
};
Validator.isRequiredCountry = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      var genderInputs = document.querySelectorAll(".form-check-input[name='gender']");
      if(!genderInputs[0].checked&&!genderInputs[1].checked&&!genderInputs[2].checked){
        alert("You must select your gender!")
      }
      return value && parseInt(value) > 0
        ? undefined
        : "Please chose your country!";
    },
  };
};
Validator.isValidAbout = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return  value.length < 1001
        ? undefined
        : "Your paragraph is limited to 1000 characters";
    },
  };
};

//Alert Error
function validate(inputElement, rule) {
  var errorMessage = rule.test(inputElement.value);
  if (errorMessage) alert(errorMessage);
}
