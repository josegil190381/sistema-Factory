<?php

require_once "../controladores/configuracion.controlador.php";
require_once "../modelos/configuracion.modelo.php";

class AjaxConfiguracion{

	// Clases

	/*=============================================
	EDITAR CONFIGURACION
	=============================================*/	

		public $idConfiguracion;

		public function ajaxEditarConfiguracion(){

			$item = "id";
			$valor = $this->idConfiguracion;

			$respuesta = ControladorConfiguracion::ctrMostrarConfiguracion($item, $valor);

			echo json_encode($respuesta);

		}

}

// Ejecutar las Clases

/*=============================================
EDITAR CONFIGURACION
=============================================*/	

	if(isset($_POST["idConfiguracion"])){

		$editar = new AjaxConfiguracion();
		$editar -> idConfiguracion = $_POST["idConfiguracion"];
		$editar -> ajaxEditarConfiguracion();

	}