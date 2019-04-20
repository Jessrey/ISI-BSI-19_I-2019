<?php
$val1 = $_GET['valor1'];
$val2 = $_GET['valor2'];
$op = $_GET['operacion'];

if($op == 'sumar'){
	echo $val1 + $val2;
}else if($op == 'restar'){
	echo $val1 - $val2;
}else if($op == 'multiplicar'){
	echo $val1 * $val2;
}else if($op == 'dividir'){
	echo $val1 / $val2;
}
if(isset($_GET['valor2'])){
	
}

?>