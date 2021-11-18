<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "INSERT INTO cars(id, name, year) VALUES('$data->id', '$data->name', '$data->year')";
    execute($sql);
}
