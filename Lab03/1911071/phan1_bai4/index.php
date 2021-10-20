<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03_phan_1_bai4</title>
</head>

<body>
    <?php
    function printTable()
    {
        for ($i = 0; $i < 7; $i++) {
            for ($j = 0; $j < 7; $j++) {
                echo ($i + 1) * ($j + 1);
                if ($j < 6)
                    echo " ";
            }
            echo "</br>";
        }
    }
    ?>
    <div class="wrapper" style="display:flex">
        <p style="padding-left:200px">
            <?php
            printTable();
            ?>
        </p>
    </div>
</body>

</html>