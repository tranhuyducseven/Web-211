 <?php
   require_once('database.php');
   header('Access-Control-Allow-Origin:*');
   header('Content-Type: application/json');
   ?>
 <?php
   if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      $json = array();
      $sql = "SELECT * FROM cars";
      $result = executeResult($sql);
      $json['data'] = $result;
      $json['message'] = 'Successfully get the information of cars!';
      $json['status'] = 200;
      echo json_encode($json);
   }
