<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
header('Content-Type: application/json');
$json = array();
$data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] === "DELETE" && isset($data)) {
    $json['message'] = 'Successfully delete data from database!';
    $json['status'] = 200;
    $json['flag'] = true;
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM cars WHERE id =$data->id";
    execute($sql);
} else {
    $json['flag'] = false;
    $json['message'] = 'Not Implemented!';
    $json['status'] = 501;
}
echo json_encode($json);
