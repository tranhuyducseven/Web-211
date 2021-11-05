<?php
require_once('database.php');
?>

<?php
$check = true;
if (isset($_POST['add-btn'])) {
    $id = $_POST['car-id'];
    $name = $_POST['car-name'];
    $year = $_POST['car-year'];
    if ($id == "")
        echo '<div class="toast">Please enter the car id</div>';
    if ($name == "")
        echo '<div class="toast">Please enter the car name</div>';
    if ($year == "")
        echo '<div class="toast">Please enter the car year</div>';

    if ($id != "" && $name != "" && $year != "") {
        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            echo '<div class="toast">Please enter id with integer type</div>';
            $check = false;
        }
        if (!is_string($name) || strlen($name) < 5 || strlen($name) > 40) {
            echo '<div class="toast">Please enter string type with length 5-40 characters</div>';
            $check = false;
        }
        if (!filter_var($year, FILTER_VALIDATE_INT) || $year < 1990 || $year > 2015) {
            echo '<div class="toast">Please enter year from 1995 to 2015</div>';
            $check = false;
        }
        if ($check) {
            $sql = "INSERT INTO cars(id, name, year) VALUES('$id', '$name', '$year')";
            execute($sql);
            header("Location:./a.php");
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <style>
        .form-control {
            margin: 10px 0 20px;
        }

        .toast {
            right: 32px;
            background-color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 2px;
            border-left: 4px solid #71be34;
            padding: 20px 0;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.09);
            animation: slideInLeft ease 2s, fadeOut linear 1s 10s forwards;
            height: 50px;
            width: 400px;
            margin-top: 20px;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(calc(100% + 32px));
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
            }
        }
    </style>
    <title>Car - Add Tran Huy Duc 1911071</title>
</head>

<body>
    <div class="container" style="padding-top: 50px;width:50%">
        <div class="card">

            <div class="card-body">
                <h3 class="card-title" style="text-align: center; color: #333">
                        Add Car's  Information
                </h3>
                <form method="post">
                    <div class="form-group">
                        <label>ID: </label>
                        <input type="text" class="form-control" placeholder="Enter id" name="car-id" value="<?php if(isset($_POST['car-id'])) echo $_POST['car-id'];  ?>">
                    </div>
                    <div class="form-group">
                        <label>NAME: </label>
                        <input type="text" class="form-control" placeholder="Enter name of the car" name="car-name" value="<?php if(isset($_POST['car-name'])) echo  $_POST['car-name'];  ?>">
                    </div>
                    <div class="form-group">
                        <label>YEAR: </label>
                        <input type="text" class="form-control" placeholder="Enter year" name="car-year" value="<?php if(isset($_POST['car-year']))echo $_POST['car-year'];  ?>">
                    </div>
                    <button type="submit" class="btn btn-success" name="add-btn" style="width:100px">Add</button>
                </form>
            </div>
        </div>        
        <div class="card" style="margin-top:50px">
            <div class="card-body">
                <p><b>Note:</b> Please do not enter duplicate <b>ID</b> </p>
            </div>
        </div>
    </div>


</body>

</html>