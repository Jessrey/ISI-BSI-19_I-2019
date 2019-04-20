<?php 

$url = "http://www.dneonline.com/calculator.asmx?WSDL";
$cliente = new SoapClient($url);

$op = $_POST['opera'];


if($op == 'sumar'){
	$num1 = $_POST['valor1'];
	$num2 = $_POST['valor2'];
	
	$resultado = $cliente->Add(array("intA" => $num1, "intB" => $num2));
	$resultado = ($resultado->AddResult);
}

if($op == 'restar'){
	$num1 = $_POST['valor1'];
	$num2 = $_POST['valor2'];
	
	$resultado = $cliente->Subtract(array("intA" => $num1, "intB" => $num2));
	$resultado = ($resultado->SubtractResult);
}

if($op == 'multiplicar'){
	$num1 = $_POST['valor1'];
	$num2 = $_POST['valor2'];
	
	$resultado = $cliente->Multiply(array("intA" => $num1, "intB" => $num2));
	$resultado = ($resultado->MultiplyResult);
}

if($op == 'dividir'){
	$num1 = $_POST['valor1'];
	$num2 = $_POST['valor2'];
	
	$resultado = $cliente->Divide(array("intA" => $num1, "intB" => $num2));
	$resultado = ($resultado->DivideResult);
}

if(isset($_POST['valor2'])){
	
}

echo $resultado;

?>