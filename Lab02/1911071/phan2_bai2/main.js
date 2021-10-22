var btnSubmit = document.querySelector(".button");
btnSubmit.addEventListener("click", function () {
  var num1 = document.getElementById("num1").value;
  var num2 = document.getElementById("num2").value;
  if (isNaN(num1) || isNaN(num2)) {
    alert("Must input numbers");
  } else if (num1 == "" || num2 == "") {
    alert("Empty inputs");
  } else {
    var result = document.getElementById("result");
    var operator = document.getElementById("operator").value;
    switch (operator) {
      case "+":
        result.value = parseFloat(num1) + parseFloat(num2);
        break;
      case "-":
        result.value = parseFloat(num1) - parseFloat(num2);
        break;
      case "*":
        result.value = parseFloat(num1) * parseFloat(num2);
        break;
      case "/":
        if (num2 == 0) alert("The second number is invalid!");
        else result.value = parseFloat(num1) / parseFloat(num2);
        break;
      case "^":
        result.value = Math.pow(parseFloat(num1), parseFloat(num2));
        break;
    }
  }
});
