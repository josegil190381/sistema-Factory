<?php

require_once "../controladores/gastos.controlador.php";
require_once "../modelos/gastos.modelo.php";

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


class AjaxGastos{

// Clases


/*=============================================
VERIFICAR EL TOTAL DE CAPITAL ANTES DE HACER EL GASTO
=============================================*/
	
		



}

// Ejecutar las Clases


/*=============================================
VERIFICAR EL TOTAL DE CAPITAL ANTES DE HACER EL GASTO
=============================================*/

	if(isset($_POST["monto"])){

	 	$cliente = new AjaxGastos();
	 	$cliente -> monto = $_POST["monto"];
	 	$cliente -> ajaxCalcularMonto();

	}