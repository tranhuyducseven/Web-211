<?php
require_once('database.php');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: DELETE');
if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
    $data = json_decode(file_get_contents("php://input"));
    $sql = "DELETE FROM cars WHERE id =$data->id";
    execute($sql);
}
