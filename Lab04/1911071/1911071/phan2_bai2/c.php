<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "UPDATE cars SET id='$data->id', name='$data->name', year='$data->year' WHERE id='$data->curID'";
    execute($sql);
}
