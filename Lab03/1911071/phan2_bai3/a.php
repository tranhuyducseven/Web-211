 <?php
require_once('database.php');
?>


 <?php if (isset($_POST['submit'])) { ?>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">ID</th>
                                <th scope="col">NAME</th>
                                <th scope="col">YEAR</th>
                                <th scope="col" style="display:flex; justify-content: center;"><a class="btn btn-success " href="./b.php" name="submit" style="width: 50%">Add a car</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM cars";
                            $result = executeResult($sql);
                            $no = 1;
                            foreach ($result as $row) { ?>
                                <tr>
                                    <th scope="row"><?php echo $no++ ?></th>
                                    <td><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["year"] ?></td>
                                    <td style="display:flex; justify-content: space-around">
                                        <a class="btn btn-warning " href="./c.php?id=<?php echo  $row["id"] ?>" name="submit">Update a car</a>
                                        <a class="btn btn-danger " href="./d.php?delete_id=<?php echo  $row["id"] ?>" name="submit">Delete a car</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
              <?php } ?>