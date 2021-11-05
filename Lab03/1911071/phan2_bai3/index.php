<?php
require_once('database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>Car - List Tran Huy Duc 1911071</title>
</head>

<body>
    <div class="container" style="padding-top: 50px;">       
        
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title" style="text-align: center; color: #333">
                        Management Car's Detail Information
                    </h3>
                </div>

                <div style="padding-left: 20px" class="car-body">
                    <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3" name="submit">Show a list of cars</button>
                        </div>
                    </form>
                </div>
                  
            </div>
        
    </div>
</body>

</html>