<?php

require_once "../controladores/camion.controlador.php";
require_once "../modelos/camion.modelo.php";


class AjaxCamion{

// Clases

/*=============================================
EDITAR CAMION
=============================================*/	

		public $idCarga;

		public function ajaxEditarCamion(){

			$item = "id";
			$valor = $this->idCarga;

			$respuesta = ControladorCamion::ctrMostrarCarga($item, $valor);

			echo json_encode($respuesta);


		}

	

}

// Ejecutar las Clases

/*=============================================
EDITAR CAMION
=============================================*/	

	if(isset($_POST["idCarga"])){

		$camion = new AjaxCamion();
		$camion -> idCarga = $_POST["idCarga"];
		$camion -> ajaxEditarCamion();

	}

