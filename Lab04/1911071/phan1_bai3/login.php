<?php
const USERNAME = 'admin';
const PASSWORD = 'admin';
session_start();
?>

<!DOCTYPE  html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .main {
            width: 500px;
            margin: 200px auto;
        }

        h2 {
            margin-bottom: 40px;
            font-weight: 600;
        }

        form {
            padding: 20px;
        }
    </style>
    <title>Login</title>
</head>


<body>
    <?php
    if ($_SESSION['username'] == USERNAME) {
        header("Location:./info.php");
    } else {
        echo '<div class="main">
            <form class="border border-success" method="post">
                <h2>Login form:</h2>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Username"required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>';
       
    }
        if(isset($_POST['username'])){
             if ($_POST['username'] == USERNAME && $_POST["password"] == PASSWORD) {
            $_SESSION['username'] = USERNAME;          
             header("Location:./info.php");
            
        } else {
            echo '<script>alert("Invalid username or password!")</script>';
        }
        }
       
    ?>
</body>

</html>