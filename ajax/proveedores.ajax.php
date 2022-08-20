<?php

require_once "../controladores/proveedores.controlador.php";
require_once "../modelos/proveedores.modelo.php";

class AjaxProveedores{

// Clases

/*=============================================
EDITAR PROVEEDOR
=============================================*/	

		public $idProveedor;

		public function ajaxEditarProveedor(){

			$item = "id";
			$valor = $this->idProveedor;

			$respuesta = ControladorProveedores::ctrMostrarProveedores($item, $valor);

			echo json_encode($respuesta);


		}

	

}

// Ejecutar las Clases

/*=============================================
EDITAR PROVEEDOR
=============================================*/	

	if(isset($_POST["idProveedor"])){

		$proveedor = new AjaxProveedores();
		$proveedor -> idProveedor = $_POST["idProveedor"];
		$proveedor -> ajaxEditarProveedor();

	}