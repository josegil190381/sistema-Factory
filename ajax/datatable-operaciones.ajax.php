<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";


class TablaOperaciones{

	// Clases

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

		public function mostrarTablaOperaciones(){

			$item = "id_cliente";
	    	$valor = "3";
	    	
	  		$ventas = ControladorVentas::ctrMostrarOperaciones($item, $valor);
	 		
	  		if(count($ventas) == 0){

	  			echo '{"data": []}';

			  	return;
	  		}	
			
	  		$datosJson = '{
			  "data": [';

			  for($i = 0; $i < count($ventas); $i++){


			  	$datosJson .='[
				      "'.($i+1).'",
				      "'.$ventas[$i]["codigo"].'",
				      "'.$ventas[$i]["id_vendedor"].'",
				      "'.$ventas[$i]["metodo_pago"].'",
				      "'.$ventas[$i]["neto"].'",
				      "'.$ventas[$i]["total"].'",
				      "'.$ventas[$i]["fecha"].'"
				      ],';

			  }

			  $datosJson = substr($datosJson, 0, -1);

			 $datosJson .=   '] 

			 }';
			
			echo $datosJson;


		}


}

// Ejecutar las Clases

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 

	$mostrarOperaciones = new TablaOperaciones();
	$mostrarOperaciones -> mostrarTablaOperaciones();

