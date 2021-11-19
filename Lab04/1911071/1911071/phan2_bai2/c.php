<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
header('Content-Type: application/json');
$json = array();
$data = json_decode(file_get_contents("php://input"));
if ($_SERVER['REQUEST_METHOD'] === 'PUT' && isset($data)) {
    $json['message'] = 'Successfully update data to database!';
    $json['status'] = 200;
    $json['flag'] = true;
    $sql = "UPDATE cars SET id='$data->id', name='$data->name', year='$data->year' WHERE id='$data->curID'";
    execute($sql);
}
else {
    $json['flag'] = false;    
    $json['message'] = 'Not Implemented!';
    $json['status'] = 501;
}
echo json_encode($json);

