<?php
require_once('database.php');
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ($_GET['delete_id']) {
        $id = $_GET['delete_id'];
        $sql = 'DELETE FROM cars WHERE id = ' . $id;
        execute($sql);
        header("Location: ./a.php");
    }
}
?>