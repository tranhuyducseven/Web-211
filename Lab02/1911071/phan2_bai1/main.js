var btnCreate = document.querySelector(".button--createTable");
var btnInsertRow = document.querySelector(".button--insertRow");
var btnInsertCol = document.querySelector(".button--insertCol");
var btnRemove = document.querySelector(".button--removeTable");
var rowInput = document.getElementById("rowInput");
var colInput = document.getElementById("colInput");
var rowRemoveBtn = document.querySelector(".rowRemoveBtn");
var colRemoveBtn = document.querySelector(".colRemoveBtn");
var myTable = document.getElementById("mytable");

btnCreate.addEventListener("click", function () {
  if (document.querySelector("table")) {
    alert("A table exists");
  } else {
    var table = document.createElement("table");
    for (var i = 0; i < 2; i++) {
      var row = document.createElement("tr");
      for (var j = 0; j < 2; j++) {
        var cell = document.createElement("td");
        row.appendChild(cell);
      }
      table.appendChild(row);
    }
    myTable.appendChild(table);
  }
});
btnInsertRow.addEventListener("click", function () {
  if (document.querySelector("table")) {
    var table = document.querySelector("table");
    var numCols = table.rows[0].cells.length;
    var row = document.createElement("tr");
    for (var i = 0; i < numCols; i++) {
      var cell = document.createElement("td");
      row.appendChild(cell);
    }
    table.appendChild(row);
  } else {
    alert("The table does not  exist");
  }
});
btnInsertCol.addEventListener("click", function () {
  if (document.querySelector("table")) {
    var table = document.querySelector("table");
    var numRows = table.rows.length;
    for (var i = 0; i < numRows; i++) {
      var cell = document.createElement("td");
      table.rows[i].appendChild(cell);
    }
  } else {
    alert("The table does not  exist");
  }
});
btnRemove.addEventListener("click", function () {
  if (document.querySelector("table")) {
    var table = document.querySelector("table");
    myTable.removeChild(table);
  } else {
    alert("The table does not  exist");
  }
});

rowRemoveBtn.addEventListener("click", function () {
  if (document.querySelector("table")) {
    var table = document.querySelector("table");
    var rowIndex = rowInput.value;
    var numRows = table.rows.length;
    if (rowIndex < 1 || rowIndex > numRows) {
      alert("Invalid index");
    } else {
      if (numRows == 1) myTable.removeChild(table);
      table.removeChild(table.rows[rowIndex - 1]);
    }
  } else {
    alert("The table does not  exist");
  }
});
colRemoveBtn.addEventListener("click", function () {
  if (document.querySelector("table")) {
    var table = document.querySelector("table");
    var colIndex = colInput.value;
    var numCols = table.rows[0].cells.length;
    if (colIndex < 1 || colIndex > numCols) {
      alert("Invalid index");
    } else {
      if (numCols == 1) myTable.removeChild(table);
      for (var i = 0; i < table.rows.length; i++) {
        table.rows[i].removeChild(table.rows[i].cells[colIndex - 1]);
      }
    }
  } else {
    alert("The table does not  exist");
  }
});
