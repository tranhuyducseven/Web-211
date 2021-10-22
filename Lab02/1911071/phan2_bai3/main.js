function Validator(options) {
  // Get form
  var formElement = document.querySelector(options.form);
  if (formElement) {
    options.rules.forEach(function(rule) {
      var inputElement = formElement.querySelector(rule.selector);
      if (inputElement) {
        inputElement.onblur = function() {
          validate(inputElement, rule);
        }
      }
    })
  }

}
//define rules
Validator.isRequired = function(selector) {
  return {
    selector: selector,
    test: function(value) {
      return value.trim() ? undefined : "What is your name?";
    }
  }
}
Validator.isEmail = function(selector) {
  return {
    selector: selector,
    test: function(value) {
      const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      return regex.test(value)? undefined:"You will use this when you log in and if you ever need to reset password."
    }
  }
}
Validator.isPassword = function(selector){
  return {
    selector: selector,
    test: function(value) {
      return value ? undefined : "What is your password?";
    }
  }
}
Validator.isValidLength = function (selector){
  return {
    selector:selector,
    test: function(value){
      return value.length > 1 && value.length < 31?undefined: "Enter at least 2 characters and maximum 30 characters"
    }
  }
}
//Alert Error
function validate(inputElement, rule) {
  var errorMessage = rule.test(inputElement.value);
  if (errorMessage)
    alert(errorMessage);
}
