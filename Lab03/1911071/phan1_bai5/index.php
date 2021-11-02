<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style.css">
  <title>Tran Huy Duc 1911071 Lab02_phan2_bai2</title>
</head>

<body>
  <div class="calculator-wrapper">
    <h1>Calculator</h1>
    <form method="post">
      <label for="num1">The first number :</label><br>
      <input type="text" name="num1" id="num1" placeholder="The first number" /><br>
      <label for="num2">The second number :</label><br>
      <input type="text" name="num2" id="num2" placeholder="The second number" /><br>
      <span>Operator: </span>
      <select name="operator" id="operator">
        <option>NONE</option>
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
        <option>^</option>
        <option>Inverse</option>
      </select>
      <button type="submit" class="button" name="submit">Submit</button>
    </form>
    
    <div class="answer">
    <p> The answer is:</p>
      <?php
      if (isset($_POST['submit'])) {
        $result = "";
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operator = $_POST['operator'];
        if (empty($num1) || empty($num2)) {
          if (!empty($num1)) {
            if ($operator == "Inverse") {
              $result = 1 / $num1;
            }
          } else
            echo "<h4>Please input number</h4>";
        } else {
          switch ($operator) {
            case "NONE":
              echo "<h4>Please select an operator</h4>";
              break;
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
        }
        echo $result;
      }
      ?>
    </div>
  </div>

</body>

</html>