<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./main.css" type="text/css">
  <title>Tran Huy Duc 1911071 Lab02_phan2_bai2</title>

</head>

<body>
  <div class="calculator-wrapper">
    <h1>Calculator</h1>
    <form method="post">
      <label for="num1">The first number :</label><br>
      <input name="num1" value="<?php if (($_POST['num1'])!='') echo $_POST['num1']; ?>" type="text" id="num1" placeholder="The first number" /><br>
      <label for="num2">The second number :</label><br>
      <input name="num2" value="<?php if (($_POST['num2'])!='') echo $_POST['num2']; ?>" type="text" id="num2" placeholder="The second number" /><br>
      <span>Operator: </span>
      <select name="operator" id="operator">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>^</option>
        <option>Inverse</option>
      </select>
      <button type="submit" class="button" name="submit">Submit</button>
    </form>
    <h1 style="margin-top:50px;"> The answer is:</h1>
    <div class="answer">

      <?php
      if (isset($_POST['submit'])) {
        $result = "";
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        if ($num1 == '' || $num2 == '') {
          if ($num1 != '') {
            if ($operator == "Inverse") {
              if (is_numeric($num1))
                if ($num1 == 0)
                  echo "<h4>Can not inverse zero</h4>";
                else
                  $result = 1 / $num1;
              else
                echo "<h4>Please input number</h4>";
            } else
              echo "<h4>Invalid operator</h4>";
          } else
            echo "<h4>Please input number</h4>";
        } else {
          if (is_numeric($num1) && is_numeric($num2)) {
            switch ($operator) {
              case "+":
                $result = $num1 + $num2;
                break;
              case "-":
                $result = $num1 - $num2;
                break;
              case "*":
                $result = $num1 * $num2;
                break;
              case "/":
                if ($num2 == 0)
                  echo "<h4>The second number is invalid</h4>";
                else $result = $num1 / $num2;
                break;
              case "^":
                $result = $num1 ** $num2;
                break;
              case "Inverse":
                if ($num1 == 0)
                  echo "<h4>Can not inverse zero</h4>";
                else
                  $result = 1 / $num1;
                break;
            }
          } else
            echo "<h4>Please input number</h4>";
        }
        echo $result;
      }
      ?>
    </div>
    <p>Note: No need to input number 2 for Inversing</p>
    <p> The result for inversion takes number 1 as input</p>

  </div>

</body>

</html>