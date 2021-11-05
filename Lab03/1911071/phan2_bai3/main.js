$(document).ready(function () {
  //---------------------LOAD DATA
  function viewData() {
    $.post("./a.php", function (data) {
      $("#load-data").html(data);
    });
  }

  $("#show-btn").click(function () {
    viewData();
  });




  //---------------------ADD DATA

  $("#show-form-btn").click(function () {
    $("#add-form").toggle();
  });
  $("#add-btn").on("click", function () {
    var id = $("#car-id").val();
    var name = $("#car-name").val();
    var year = $("#car-year").val();
    var check = true;
    if (id == "") alert("Please enter the car id");
    if (name == "") alert("Please enter the car name");
    if (year == "") alert("Please enter the car year");
    if (id != "" && name != "" && year != "") {
      if (!Number.isInteger(Number(id))) {
        alert("Please enter id with integer type");
        check = false;
      }
      if (name.length < 5 || name.length > 40) {
        alert("Please enter string type with length 5-40 characters");
        check = false;
      }
      if (
        !Number.isInteger(Number(year)) ||
        Number(year) < 1990 ||
        Number(year) > 2015
      ) {
        alert("Please enter year from 1995 to 2015");
        check = false;
      }
      if (check) {
        $.ajax({
          url: "./b.php",
          method: "POST",
          data: {
            id: id,
            name: name,
            year: year,
          },
          success: function (data) {
            alert("Successfully insert data to database");
            $("#insert-form")[0].reset();
            $("#add-form").show();
            viewData();
          },
        });
      }
    }
  });
  //---------------------EDIT DATA

  $("#show-update-btn").click(function () {
    $("#edit-form").toggle();
  });
  var curID = 0;
  $(document).on("click", ".edit-btn", function () {
    curID = $(this).attr("value");
    $("#car-id-edit").val(curID);
  });

  $("#update-btn").on("click", function () {
    var id = $("#car-id-edit").val();
    var name = $("#car-name-edit").val();
    var year = $("#car-year-edit").val();

    var check = true;
    if (id == "") alert("Please enter the car id");
    if (name == "") alert("Please enter the car name");
    if (year == "") alert("Please enter the car year");
    if (id != "" && name != "" && year != "") {
      if (!Number.isInteger(Number(id))) {
        alert("Please enter id with integer type");
        check = false;
      }
      if (name.length < 5 || name.length > 40) {
        alert("Please enter string type with length 5-40 characters");
        check = false;
      }
      if (
        !Number.isInteger(Number(year)) ||
        Number(year) < 1990 ||
        Number(year) > 2015
      ) {
        alert("Please enter year from 1995 to 2015");
        check = false;
      }
      if (check) {
        var checkConfirm = confirm(
          "Are you sure to edit this car width id: " + curID + "to " + id
        );
        if (checkConfirm) {
          $.ajax({
            url: "./c.php",
            method: "POST",
            data: {
              curID: curID,
              id: id,
              name: name,
              year: year,
            },
            success: function (data) {
              alert("Successfully edit data ");
              $("#update-form")[0].reset();
              $("#edit-form").show();
              viewData();
            },
          });
        }
      }
    }
  });


  //---------------------REMOVE DATA

  $(document).on("click", ".del-btn", function () {
    var id = $(this).attr("value");
    var check = confirm("Are you sure to delete this car?");
    if (check) {
      $.post("./d.php", { id: id }, function () {
        viewData();
      });
    }
  });
});
//   function toggleTable(e) {
//     if (e.data.checkUpdate) {
//       $("#table-info").css("border", "5px solid #333");
//       $("#table-heading")
//         .html(" Update Car's Detail Information")
//         .css("color", "#ffc107");
//       const cells = document.querySelectorAll(".data-cell");
//       for (var i = 0; i < cells.length; i++) {
//         cells[i].onclick = function () {
//           this.contentEditable = "true";
//         };
//       }
//     } else {
//       $("#table-info").css("border", "none");
//       $("#table-heading")
//         .html(" Management Car's Detail Information")
//         .css("color", "#333");
//       const cells = document.querySelectorAll(".data-cell");
//       for (var i = 0; i < cells.length; i++) {
//         cells[i].contentEditable = "false";
//       }
//     }
//     e.data.checkUpdate = !e.data.checkUpdate;
//   }
//   function editData(id, text, column_name) {
//     $.ajax({
//       url: "./c.php",
//       method: "POST",
//       data: {
//         id: id,
//         text: text,
//         column_name,
//       },
//       success: function (data) {
//         alert("Successfully update data ");

//         fetchData();
//       },
//     });
//   }

//   $("#show-update").click(
//     {
//       checkUpdate: true,
//     },
//     toggleTable
//   );
