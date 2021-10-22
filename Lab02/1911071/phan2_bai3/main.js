// Đối tượng `Validator`
function Validator(options) {
  var selectorRules = {};

  // Hàm thực hiện validate
  function validate(inputElement, rule) {
    var errorMessage;
    var rules = selectorRules[rule.selector];
    for (var i = 0; i < rules.length; ++i) {
      switch (inputElement.type) {
        case "radio":
          errorMessage = rules[i](
            formElement.querySelector(rule.selector + ":checked")
          );
          break;
        default:
          errorMessage = rules[i](inputElement.value);
      }
      if (errorMessage) {
        alert(errorMessage);
        break;
      }
    }
    return !errorMessage;
  }

  // Lấy element của form cần validate
  var formElement = document.querySelector(options.form);
  formElement.addEventListener("reset", options.logReset);
  if (formElement) {
    // Khi submit form
    formElement.onsubmit = function (e) {
      e.preventDefault();

      var isFormValid = true;

      // Lặp qua từng rules và validate
      options.rules.forEach(function (rule) {
        var inputElement = formElement.querySelector(rule.selector);
        var isValid = validate(inputElement, rule);
        if (!isValid) {
          isFormValid = false;
        }
      });

      if (isFormValid) {
        // Trường hợp submit với javascript
        if (typeof options.onSubmit === "function") {
          options.onSubmit();
        }
        // Trường hợp submit với hành vi mặc định
        else {
          formElement.submit();
        }
      }
    };

    // Lặp qua mỗi rule và xử lý (lắng nghe sự kiện blur, input, ...)
    options.rules.forEach(function (rule) {
      // Lưu lại các rules cho mỗi input
      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }

      var inputElements = formElement.querySelectorAll(rule.selector);

      Array.from(inputElements).forEach(function (inputElement) {
        // Xử lý trường hợp blur khỏi input
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
      });
    });
  }
}

//define rules
Validator.isRequired = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : "Please enter your information";
    },
  };
};
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
      var genderInputs = document.querySelectorAll(
        ".form-check-input[name='gender']"
      );
      if (
        !genderInputs[0].checked &&
        !genderInputs[1].checked &&
        !genderInputs[2].checked
      ) {
        alert("You must select your gender!");
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
      return value.length < 1001
        ? undefined
        : "Your paragraph is limited to 1000 characters";
    },
  };
};
