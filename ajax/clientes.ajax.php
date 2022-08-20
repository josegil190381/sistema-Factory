<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";



class AjaxClientes{

// Clases

/*=============================================
EDITAR CLIENTE
=============================================*/	

		public $idCliente;

		public function ajaxEditarCliente(){

			$item = "id";
			$valor = $this->idCliente;

			$respuesta = ControladorClientes::ctrMostrarClientes($item, $valor);

			echo json_encode($respuesta);


		}

	

}

// Ejecutar las Clases

/*=============================================
EDITAR CLIENTE
=============================================*/	

	if(isset($_POST["idCliente"])){

		$cliente = new AjaxClientes();
		$cliente -> idCliente = $_POST["idCliente"];
		$cliente -> ajaxEditarCliente();

	}

