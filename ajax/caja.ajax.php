<?php 

require_once "../controladores/caja.controlador.php";
require_once "../modelos/caja.modelo.php";

class AjaxCaja{

	// Clases

/*=============================================
CERRAR CAJA
=============================================*/	

	public $idCaja;

	public function ajaxCerrarCaja(){

		$item = "id";
		$valor = $this->idCaja;
		$orden = null;

		$respuesta = ControladorCaja::ctrMostrarCaja($item, $valor, $orden);

		echo json_encode($respuesta);

	}



}


	// Ejecucion de Clases

/*=============================================
CERRAR CAJA
=============================================*/
	
	if(isset($_POST["idCaja"])){

		$cerrar = new AjaxCaja();
		$cerrar -> idCaja = $_POST["idCaja"];
		$cerrar -> ajaxCerrarCaja();

	}