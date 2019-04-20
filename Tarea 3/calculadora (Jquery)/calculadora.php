<?php
$val1 = $_POST['valor1'];
$val2 = $_POST['valor2'];
$op = $_POST['opera'];

if($op == 'sumar'){
	echo $val1 + $val2;
}else if($op == 'restar'){
	echo $val1 - $val2;
}else if($op == 'multiplicar'){
	echo $val1 * $val2;
}else if($op == 'dividir'){
	echo $val1 / $val2;
}
if(isset($_POST['valor2'])){
	
}

?>