<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03_phan_1_bai3</title>
</head>

<body>
    <?php
    function oddForLoop()
    {
        for ($x = 0; $x < 100; $x++) {
            if ($x % 2)
                echo $x . "</br>";
        }
    }
    function oddWhileLoop()
    {
        $x = 0;
        while ($x < 100) {
            if ($x % 2)
                echo $x . "</br>";
            $x++;
        }
    }
    ?>
    <div class="wrapper" style="display:flex">
        <div class="box1">
            <p style="padding-left:200px">
                <?php
                oddForLoop();
                ?>
            </p>
        </div>
        <div class="box2">
            <p style="padding-left:200px">
                <?php
                oddWhileLoop();
                ?>
            </p>
        </div>
    </div>




</body>

</html>