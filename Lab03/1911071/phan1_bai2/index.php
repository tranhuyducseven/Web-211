<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab03_phan_1_bai2</title>
</head>

<body>
    <?php
    function message($data)
    {
        if ($data > 0 && is_int($data))
            switch ($data % 5) {
                case 0:
                    echo "Hello </br>";
                    break;
                case 1:
                    echo "How are you? </br>";
                    break;
                case 2:
                    echo "I’m doing well, thank you </br>";
                    break;
                case 3:
                    echo "See you later </br>";
                    break;
                case 4:
                    echo "Good-bye </br>";
                    break;
                default:
                    echo "No message </br>";
            }
    }
    ?>
    <p style="padding-left:200px">
        <?php
        message(-5);
        message(12.3);
        message(12);
        for ($x = 10; $x < 15; $x++) {
            message($x);
        }
        ?>
    </p>



</body>

</html>