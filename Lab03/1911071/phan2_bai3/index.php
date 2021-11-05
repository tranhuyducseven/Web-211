<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
    .form-control {
      margin: 10px 0 20px;
    }


    .border-orange {
      border: 2px solid orange !important;
    }
  </style>
  <title>Car - List Tran Huy Duc 1911071</title>
</head>

<body>

  <div class="container" style="padding-top: 50px;">
    <div id="add-form" class="card" style="margin-bottom: 50px;">
      <div class="card-body">
        <h3 class="card-title" style="text-align: center; color: #333">
          Add Car's Information
        </h3>
        <form method="post" id="insert-form">
          <div class="form-group">
            <label>ID: </label>
            <input type="number" class="form-control" placeholder="Enter id with integer number type" id="car-id">
          </div>
          <div class="form-group">
            <label>NAME: </label>
            <input type="text" class="form-control" placeholder="Enter name of the car" id="car-name">
          </div>
          <div class="form-group">
            <label>YEAR: </label>
            <input type="number" class="form-control" placeholder="Enter year" id="car-year">
          </div>
          <div id="add-btn" class="btn btn-success" style="width:100px;margin-top:20px;">Add</div>
        </form>
      </div>

    </div>

    <div id="edit-form" class="card" style="margin-bottom: 50px;">
      <div class="card-body">
        <h3 class="card-title" style="text-align: center; color: #333">
          Edit Car's Information
        </h3>
        <form method="post" id="update-form">
          <div class="form-group">
            <label>ID: </label>
            <input type="number" class="form-control" placeholder="Enter id with integer number type" id="car-id-edit">
          </div>
          <div class="form-group">
            <label>NAME: </label>
            <input type="text" class="form-control" placeholder="Enter name of the car" id="car-name-edit">
          </div>
          <div class="form-group">
            <label>YEAR: </label>
            <input type="number" class="form-control" placeholder="Enter year" id="car-year-edit">
          </div>
          <div id="update-btn" class="btn btn-warning" style="width:100px;margin-top:20px;">Update</div>
        </form>
      </div>
    </div>

    <div class="card" id="table-info">
      <div class="card-body">
        <h3 id="table-heading" class="card-title" style="text-align: center">
          Management Car's Detail Information
        </h3>
      </div>

      <div style="padding-left: 20px; display:flex;justify-content:space-around;" class="car-body">
        <button type="submit" class="btn btn-primary mb-3" id="show-btn">Show the list of cars</button>
        <button type="submit" class="btn btn-success mb-3" id="show-form-btn">Show/hide insert form</button>
        <button type="submit" class="btn btn-warning mb-3" id="show-update-btn">Show/hide update form</button>
        <button type="submit" class="btn btn-danger mb-3">Remove a cars</button>
      </div>
      <div class="card-body" id="load-data">
      </div>
    </div>
    <b></b>
    <div class="card" style="margin: 100px 0;">
      <div class="card-body">
        <p style="font-size:30px">
          <strong>Note:</strong><br />
          Press <b>Show list</b> button to watch list of cars.<br />
          Press <b>Show/hide form</b> button if you want to add or edit data of cars.<br />
          Press <b>Add</b> or <b>Update</b> button to submit form. <br />
          Press <b>Edit a car</b> before you want to edit data of a car.<br />
          Press <b>Remove a car</b> to delete a car
        </p>
      </div>
    </div>
  </div>


  <script src="./main.js"> </script>

</body>

</html>