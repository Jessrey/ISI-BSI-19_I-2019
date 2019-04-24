window.onload=function () {




Getlibros();

GetEnt ();
}
function Getlibros () {
var load = document.getElementById('progress');
load.src = "loader.gif" ;

$.ajax({
        url: "gettable.php",
        type: 'Get',
        dataType: 'json',
        success: function( result ) {
console.log(result);

Loadtable(result);
var load = document.getElementById('progress');
load.src = "" ;
         
        }

      });

}


function Loadtable(result) {
var tbl = document.getElementById('Tbl');


var size =result.length;



for (var i = 0; i < size; i++) {

var row = tbl.insertRow(tbl.rows.length);
var cell1 = row.insertCell(0);
var cell2 = row.insertCell(0);
var cell3 = row.insertCell(0);
var cell4 = row.insertCell(0);
var cell5 = row.insertCell(0);

cell5.innerHTML = result[i].ID;
cell4.innerHTML =  result[i].Nombre;
cell3.innerHTML =  result[i].Autor;
cell1.innerHTML =  result[i].Precio;
cell2.innerHTML =  result[i].NombreEd;	


}
var load = document.getElementById('progress');
load.src = "" ;


}

function GetEnt (){


$.ajax({
        url: "getedit.php",
        type: 'Get',
        dataType: 'json',
        success: function( result ) {



var select = document.getElementById('select');

for (var i = 0; i < result.length; i++) {

var option = document.createElement("option");
option.text = result[i].NombreEd;
option.value = result[i].CodigoEd;
select.appendChild(option);


}


        }

      });



}


document.getElementById("update").addEventListener("click", function(){


var select = document.getElementById('select');
//editorial seleccionada
var options = select.options[select.selectedIndex].value;
var input = document.getElementById('aumento').value;
   var regex     = new RegExp("^[0-9]*$");

if (input!=0&&regex.test(input)) {



var load = document.getElementById('progress');
load.src = "loader.gif" ;
$.ajax({
        url: "update.php",
        type: 'POST',
        Type: 'text',
        data:{
        	id:options,
        	aum:input
        },
        success: function( result ) {

if (result="success") {
var tbl =document.getElementById("Tbl");


var rowCount = tbl.rows.length;
        for (var i = rowCount - 1; i > 0; i--) {
            tbl.deleteRow(i);
        }

Getlibros();



}else{
	alert("Errpr");
}
   
        }

      });






}else {

	alert("No siguio el patron establecido");
}


});


