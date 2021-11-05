<?php
require_once('database.php');
$curID = $_POST['curID'];
$id = $_POST['id'];
$name = $_POST['name'];
$year = $_POST['year'];
$sql = "UPDATE cars SET id='$id', name='$name', year='$year' WHERE id='$curID'";
execute($sql);
