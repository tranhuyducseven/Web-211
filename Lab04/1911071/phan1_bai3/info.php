<?php
const USERNAME = 'admin';
const PASSWORD = 'admin';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .card {
            margin: 100px 100px;
            text-align: center;
        }

        h1 {
            font-weight: 500;
            text-align: center;
        }

        h1 span {
            color: orangered;
            font-weight: 600;
        }
    </style>
    <title>Info</title>
</head>

<body>
    <?php
    if (isset($_SESSION['username'])) {
        echo '<script>alert("Successfully login!")</script>';
        echo '
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Welcome <span>@' . $_SESSION['username'] . '</span>!</h1>
                <a href="./logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        ';
    } else {
        header("Location:./login.php");
    }
    ?>
</body>

</html>