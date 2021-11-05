 <?php
    require_once('database.php');
    ?>


 <?php
    $data = "";
    $data .= '<div class="card-body">
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <th scope="col">NO</th>
              <th scope="col">ID</th>
              <th scope="col">NAME</th>
              <th scope="col">YEAR</th>
              
          </tr>
      </thead>
      <tbody> ';
    $sql = "SELECT * FROM cars";
    $result = executeResult($sql);
    $no = 1;
    foreach ($result as $row) {
        $data .= '
     <tr>
         <th scope="row">' . $no++ . '</th>
         <td class="data-cell">' . $row["id"] . '</td>
         <td class="data-cell">' . $row["name"] . '</td>
         <td class="data-cell">' . $row["year"] . '</td>
         <td style="display:flex; justify-content: space-around">
             <a class="btn btn-warning edit-btn" value="' . $row["id"] . '">Edit a car</a>
             <a class="btn btn-danger del-btn " value="' . $row["id"] . '">Delete a car</a>
         </td>
     </tr>';
    }
    $data .= '</tbody></table></div>';
    echo $data;
    ?>
   