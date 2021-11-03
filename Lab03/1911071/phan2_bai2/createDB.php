<?php
$sql = "CREATE DATABASE CAR";

$sqlTable = "CREATE TABLE `cars` (
    `id` int UNIQUE NOT NULL,
    `name` varchar(40),
    `year` varchar(50),
    PRIMARY KEY(id)
 );
 ";
$sqlData = "INSERT INTO cars VALUES(1,'Mercedes','2000');
 INSERT INTO cars VALUES(2,'BMW','2004');
 INSERT INTO cars VALUES(3,'Audi','2001');";
$conn = new mysqli('localhost', 'root', '');
if (!$conn) {
    die('Not connected : ' . mysqli_error($conn));
}
$db = mysqli_select_db($conn, "CAR");
if (!$db)
    mysqli_query($conn, $sql);
mysqli_query($conn, $sqlTable);
mysqli_query($conn, $sqlData);
mysqli_close($conn);
