 <?php
  require_once('database.php');
  header('Access-Control-Allow-Origin:*');
  ?>
 <?php
  $sql = "SELECT * FROM cars";
  $result = executeResult($sql);
  echo json_encode($result);
  ?>
   