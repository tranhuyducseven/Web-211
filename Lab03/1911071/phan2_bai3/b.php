<?php
require_once('database.php');
?>

<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    echo $name.$year;
    $sql = "INSERT INTO cars(id, name, year) VALUES('$id', '$name', '$year')";
    execute($sql);
}
?>
