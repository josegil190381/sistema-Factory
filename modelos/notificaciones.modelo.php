<?php 

require_once "conexion.php";


Class ModeloNotificaciones{

/*=============================================
=            MOSTRAR NOTIFICACIONES            =
=============================================*/

	static public function mdlMostrarNotificaciones($tabla){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = 1");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

/*=============================================
=            ACTUALIZAR NOTIFICACIONES            =
=============================================*/

	static public function mdlActualizarNotificaciones($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			return "error";
		}

		
		$stmt -> close();

		$stmt = null;

	}

}





