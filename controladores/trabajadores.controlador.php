<?php

class ControladorTrabajadores{

	/*=============================================
	MOSTRAR TRABAJADOR
	=============================================*/

		static public function ctrMostrarTrabajadores($item, $valor){

			$tabla = "trabajador";

			$respuesta = ModeloTrabajadores::MdlMostrarTrabajadores($tabla, $item, $valor);

			return $respuesta;
		}

	/*=============================================
	MOSTRAR CARGOS
	=============================================*/

		static public function ctrMostrarCargos($item, $valor){

			$tabla = "cargo";

			$respuesta = ModeloTrabajadores::MdlMostrarCargos($tabla, $item, $valor);

			return $respuesta;
		}




















}