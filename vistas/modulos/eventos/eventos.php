<?php 

header('Content-Type: application/json');

$pdo=new PDO("mysql:dbname=aquanat;host=localhost","root","");

$accion = (isset($_GET["accion"]))?$_GET["accion"]:"leer";

switch($accion){

	case "agregar":
	//Instruccion de Agregar
	
	$sentenciaSQL = $pdo->prepare("INSERT INTO eventos (title, descripcion, color, textColor, start, end) VALUES (:title, :descripcion, :color, :textColor, :start, :end)");

	$respuesta = $sentenciaSQL->execute(array(

		"title" => $_POST["title"],
		"descripcion" => $_POST["descripcion"],
		"color" => $_POST["color"],
		"textColor" => $_POST["textColor"],
		"start" => $_POST["start"],
		"end" => $_POST["end"]

	));

	echo json_encode($respuesta);

	break;

	case "eliminar":
	//Instruccion de Eliminar
	
	$respuesta = false;

	if (isset($_POST["id"])) {
		
		$sentenciaSQL=$pdo->prepare("DELETE FROM eventos WHERE id = :id");

		$respuesta = $sentenciaSQL->execute(array("id"=> $_POST["id"]));

	}

	echo json_encode($respuesta);

	break;

	case "modificar":
	//Instruccion de Modificar
	
	$sentenciaSQL = $pdo->prepare("UPDATE eventos SET title = :title, descripcion = :descripcion, color = :color, textColor = :textColor, start = :start, end = :end WHERE id = :id");

	$respuesta = $sentenciaSQL->execute(array(

		"id" => $_POST["id"],
		"title" => $_POST["title"],
		"descripcion" => $_POST["descripcion"],
		"color" => $_POST["color"],
		"textColor" => $_POST["textColor"],
		"start" => $_POST["start"],
		"end" => $_POST["end"]

	));

	echo json_encode($respuesta);

	break;

	default:
	//Seleccionar Eventos del Calendario
	$sentenciaSQL= $pdo->prepare("SELECT * FROM eventos");
	$sentenciaSQL->execute();

	$resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

	echo json_encode($resultado);

	break;

}





