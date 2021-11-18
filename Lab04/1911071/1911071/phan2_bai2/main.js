$(document).ready(function() {
    //---------------------LOAD DATA
    function viewData() {
        $.get("./a.php", function(data) {
            $("#load-data").html(render(JSON.parse(data)));
        });
    }

    $("#show-btn").click(function() {
        viewData();
    });

    //---------------------ADD DATA

    $("#show-form-btn").click(function() {
        $("#add-form").toggle();
    });
    $("#add-btn").on("click", function() {
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
                    type: "POST",
                    data: JSON.stringify({
                        id: id,
                        name: name,
                        year: year,
                    }),
                    contentType: "application/json",
                    success: function() {
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

    $("#show-update-btn").click(function() {
        $("#edit-form").toggle();
    });
    var curID = 0;
    $(document).on("click", ".edit-btn", function() {
        curID = $(this).attr("value");
        $("#car-id-edit").val(curID);
    });

    $("#update-btn").on("click", function() {
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
                var msgConfirm =
                    (curID === id) ?
                    "Are you sure to edit the data of this car?" :
                    "Are you sure to edit this car with id: " + curID + " to " + id + " ?";
                var checkConfirm = confirm(msgConfirm);
                if (checkConfirm) {
                    $.ajax({
                        url: "./c.php",
                        type: "PUT",
                        data: JSON.stringify({
                            curID: curID,
                            id: id,
                            name: name,
                            year: year,
                        }),
                        contentType: "application/json",

                        success: function() {
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

    $(document).on("click", ".del-btn", function() {
        var id = $(this).attr("value");
        var check = confirm("Are you sure to delete this car?");
        if (check) {
            $.ajax({
                url: "./d.php",
                type: "DELETE",
                data: JSON.stringify({ id: id }),
                success: function() {
                    alert("Successfully  remove a car!");                    
                    viewData();
                },
            });
        }
    });
});

//---------------------RENDER DATA

function render(cars) {
    const cellGroup = cars.map((car, index) => {
        return `<tr>
    <th scope="row"> ${++index}</th>
    <td class="data-cell">${car["id"]}</td>
    <td class="data-cell">${car["name"]}</td>
    <td class="data-cell">${car["year"]}</td>
    <td style="display:flex; justify-content: space-around">
        <a class="btn btn-warning edit-btn" value="${car["id"]}">Edit a car</a>
        <a class="btn btn-danger del-btn " value="${car["id"]}">Delete a car</a>
    </td>
    </tr> `;
    });
    const headTable =
        '<div class="card-body"><table class="table table-striped table-hover"><thead><tr><th scope="col">NO</th><th scope="col">ID</th><th scope="col">NAME</th><th scope="col">YEAR</th></tr></thead><tbody>';
    return headTable + cellGroup.join("");
}