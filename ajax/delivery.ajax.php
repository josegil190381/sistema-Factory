<?php

require_once "../controladores/delivery.controlador.php";
require_once "../modelos/delivery.modelo.php";


class AjaxDelivery{

// Clases

/*=============================================
EDITAR DELIVERY
=============================================*/	

		public $idDelivery;

		public function ajaxEditarDelivery(){

			$item = "id";
			$valor = $this->idCarga;

			$respuesta = ControladorDelivery::ctrMostrarDelivery($item, $valor);

			echo json_encode($respuesta);


		}

	

}

// Ejecutar las Clases

/*=============================================
EDITAR DELIVERY
=============================================*/	

	if(isset($_POST["idDelivery"])){

		$delivery = new AjaxDelivery();
		$delivery -> idDelivery = $_POST["idDelivery"];
		$delivery -> ajaxEditarDelivery();

	}



