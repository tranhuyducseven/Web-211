<?php
// define variables and set to empty values
$fNameErr = $lNameErr = $emailErr  = $passwordErr =  $birthdayErr = $genderErr = $countryErr = $aboutErr = "";
$fName = $lName = $email  = $password = $day = $month = $year = $gender = $country = $about = "";
$checkErr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fNameErr = "Name is required!";
        $checkErr = true;
    } else {
        $fName = test_input($_POST["fname"]);
        // check if name length in range from 2 to 30
        if (strlen($fName) < 2 || strlen($fName) > 30) {
            $fNameErr = "Must contains 2-30 characters!";
            $checkErr = true;
        }
    }
    if (empty($_POST["lname"])) {
        $lNameErr = "Name is required!";
        $checkErr = true;
    } else {
        $lName = test_input($_POST["lname"]);
        // check if name length in range from 2 to 30
        if (strlen($lName) < 2 || strlen($lName) > 30) {
            $lNameErr = "Must contains 2-30 characters!";
            $checkErr = true;
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required!";
        $checkErr = true;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        $regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
        if (!(preg_match($regex, $email))) {
            $emailErr = "Please enter a valid email address!";
            $checkErr = true;
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required!";
        $checkErr = true;
    } else {
        $password = test_input($_POST["password"]);
        // check if password length in range from 2 to 30
        if (strlen($password) < 2 || strlen($password) > 30) {
            $passwordErr = "Must contains 2-30 characters!";
            $checkErr = true;
        }
    }



    if ($_POST["day"] == 0 || $_POST["month"] == 0 || $_POST["year"] == 0) {
        $birthdayErr = "Please enter Birthday!";
        $checkErr = true;
    } else {
        $day    = $_POST["day"];
        $month  = $_POST["month"];
        $year   = $_POST["year"];
        $checkDate = checkdate($month, $day, $year);
        if (!$checkDate) {
            $birthdayErr =  "Birthday is invalid!";
            $checkErr = true;
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required!";
        $checkErr = true;
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if ($_POST["country"] == 0) {
        $countryErr = "You must enter your country! ";
        $checkErr = true;
    } else {
        $country = test_input($_POST["country"]);
    }

    if (empty($_POST["about"])) {
        $about = "";
    } else {
        $about = test_input($_POST["about"]);
        if (strlen($about) >10000) {
            $aboutErr = "Must be less than 10000 characters!";
            $checkErr = true;
        }
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
