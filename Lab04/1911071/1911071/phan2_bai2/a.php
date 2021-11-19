 <?php
  require_once('database.php');
  header('Access-Control-Allow-Origin:*');
  header('Content-Type: application/json');
  ?>
 <?php
  $json = array();
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM cars";
    $result = executeResult($sql);
    $json['data'] = $result;
    $json['message'] = 'Successfully get the information of cars!';
    $json['status'] = 200;
    $json['flag'] = true;
  } else {
    $json['message'] = 'Not Implemented!';
    $json['status'] = 501;
    $json['flag'] = false;

  }
  echo json_encode($json);
