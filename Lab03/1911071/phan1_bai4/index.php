<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03_phan_1_bai4</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
        }

        table {

            border-collapse: collapse;
            background-color: yellow;
            margin: 100px auto;
        }

        td {
            text-align: center;
            width: 50px;
            height: 40px;
        }
    </style>
</head>

<body>
    <?php
    function printTable()
    {

        echo "<table>";
        for ($x = 0; $x < 7; $x++) {
            echo "<tr>";
            for ($y = 0; $y < 7; $y++)
                echo "<td>" . ($x + 1) * ($y + 1) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
    <div class="wrapper" style>
        <?php
        printTable();
        ?>
    </div>
</body>

</html>