<?php 


require_once "conexion.php";

class ModeloPermisos{


	/*=============================================
	MOSTRAR PERMISOS
	=============================================*/

		static public function mdlMostrarPermisos($tabla){

			

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

				$stmt -> execute();

				return $stmt -> fetchAll();

			
			
			$stmt -> close();

			$stmt = null;

		}





}