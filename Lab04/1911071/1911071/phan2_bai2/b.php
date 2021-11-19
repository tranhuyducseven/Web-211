<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Content-Type: application/json');
$json = array();
$data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($data)) {
    $json['message'] = 'Successfully insert data to database!';
    $json['status'] = 200;
    $json['flag'] = true;
    $sql = "INSERT INTO cars(id, name, year) VALUES('$data->id', '$data->name', '$data->year')";
    execute($sql);
} else {
    $json['flag'] = false;    
    $json['message'] = 'Not Implemented!';
    $json['status'] = 501;
}
echo json_encode($json);
