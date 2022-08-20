<?php

require_once "../controladores/planes.controlador.php";
require_once "../modelos/planes.modelo.php";

class AjaxPlanes{

	// Clases

	/*=============================================
	EDITAR PLAN
	=============================================*/	

		public $idPlan;

		public function ajaxEditarPlan(){

			$item = "id";
			$valor = $this->idPlan;

			$respuesta = ControladorPlanes::ctrMostrarPlanes($item, $valor);

			echo json_encode($respuesta);

		}

}

// Ejecucion de Clases

/*=============================================
EDITAR PLAN
=============================================*/

	if(isset($_POST["idPlan"])){

		$editar = new AjaxPlanes();
		$editar -> idPlan = $_POST["idPlan"];
		$editar -> ajaxEditarPlan();

	}