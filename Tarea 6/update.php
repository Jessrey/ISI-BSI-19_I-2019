<?php

$id = $_POST['id'];

$aum = $_POST['aum'];



$cons_usuario="root";
$cons_contra="";
$cons_base_datos="dbtarea";
$cons_equipo="localhost";

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);



if(!$obj_conexion)
{
    echo "<h3>No se ha podido conectar PHP - MySQL, verifique sus datos.</h3><hr><br>";
}
else
{

	if ($id!=""&&$aum!="") {
$query =  "Call Increasebyany('$id','$aum');";
$result = mysqli_query($obj_conexion,$query);
echo "sucess";

}else{
$query =  "Call increaseby10('$id');";
$result = mysqli_query($obj_conexion,$query);
echo "sucess";

}



   }




   





?>