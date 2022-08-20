<?php 

class ControladorPermisos{

	/*=============================================
	MOSTRAR PERMISOS
	=============================================*/

		static public function ctrMostrarPermisos(){

			$tabla = "permisos";

			$respuesta = ModeloPermisos::mdlMostrarPermisos($tabla);

			return $respuesta;

		}




}