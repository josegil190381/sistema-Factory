<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";



class AjaxVentas{

// Clases

/*=============================================
IMPRIMIR TICKET
=============================================*/	

		public $idVenta;

		public function ajaxImprimirTicket(){

			$item = "id";
			$valor = $this->idVenta;

			$respuesta = ControladorVentas::ctrImprimirTicket($item, $valor);

			
		}

	

}

// Ejecutar las Clases

/*=============================================
IMPRIMIR TICKET
=============================================*/	

	if(isset($_POST["idVenta"])){

		$venta = new AjaxVentas();
		$venta -> idVenta = $_POST["idVenta"];
		$venta -> ajaxImprimirTicket();

	}

