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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Car - Delete Tran Huy Duc 1911071</title>
</head>

<body>
    <div class="container" style="padding-top: 50px;">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title" style="text-align: center; color: #333">
                    Management Car's Detail Information
                </h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">YEAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM cars";
                        $result = executeResult($sql);
                        $no = 1;
                        foreach ($result as $row)
                            echo '<tr>
                                <th scope="row">' . $no++ . '</th>
                                        <td>' . $row["name"] . '</td>
                                        <td>' . $row["year"] . '</td> 
                                        <td style="width:60px"><a  class="btn btn-danger" href="?delete_id=' . $row['id'] . '"> Delete</a> </td>                                       
                                        </tr>';
                        ?>
                    </tbody>

                </table>
            </div>

        </div>

    </div>
</body>

</html>