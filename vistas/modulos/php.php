<?php 

require_once "conexion.php";

if(isset($_POST['guardarPeso']))
{
	$descripion = $_POST['descripcionPeso'];
	$simbolo = $_POST['simboloPeso'];

	foreach ($descripion as $index => $descripciones)
	{
		echo $descripciones." - ".$simbolo[$index];	
	}

}

