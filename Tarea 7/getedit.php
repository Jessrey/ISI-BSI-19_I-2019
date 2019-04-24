<?php

$cons_usuario="root";
$cons_contra="";
$cons_base_datos="dbtarea";
$cons_equipo="localhost";

$obj_conexion = mysqli_connect($cons_equipo,$cons_usuario,$cons_contra,$cons_base_datos);

if(!$obj_conexion)
{
    echo "<h4>Error al verificar informació - MySQL, verifique sus datos.</h4><hr><br>";
}
else
{

$query =  "Call Geteditorials();";

  $result = mysqli_query($obj_conexion,$query);
  $dbdata = array();

  while ( $row = $result->fetch_assoc())  {
	$dbdata[]=$row;
  }

 echo json_encode($dbdata);
 }
 



?>