<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";


class TablaCLientes{

	// Clases

 	/*=============================================
 	 MOSTRAR LA TABLA DE CLIENTES
  	=============================================*/ 

		public function mostrarTablaClientes(){

			$item = null;
	    	$valor = null;
	    	

	  		$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
	 		
	  		if(count($clientes) == 0){

	  			echo '{"data": []}';

			  	return;
	  		}	
			
	  		$datosJson = '{
			  "data": [';

			  for($i = 0; $i < count($clientes); $i++){

			  		  	

			  	/*=============================================
	 	 		TRAEMOS LAS ACCIONES
	  			=============================================*/ 

	  			
	  				 $botones =  "<div class='btn-group'><button class='btn btn-success btn-sm btnVerCliente' idCliente='".$clientes[$i]["id"]."'><i class='fa fa-eye'></i></button><button class='btn btn-warning btn-sm btnEditarCliente' data-toggle='modal' data-target='#modalEditarCliente'  idCliente='".$clientes[$i]["id"]."'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-sm btnEliminarCliente' idCliente='".$clientes[$i]["id"]."'><i class='fa fa-times'></i></button></div>"; 

	  			

			  		  			  	

			  	$datosJson .='[
				      "'.($i+1).'",
				      "'.$clientes[$i]["nombre"].'",
				      "'.$clientes[$i]["documento"].'",
				      "'.$clientes[$i]["telefono"].'",
				      "'.$clientes[$i]["direccion"].'",
				      "'.$clientes[$i]["compras"].'",
				      "'.$clientes[$i]["ultima_compra"].'",
				      "'.$clientes[$i]["fecha"].'",
				      "'.$botones.'"
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
ACTIVAR TABLA DE CLIENTES
=============================================*/ 

	$activarClientes = new TablaClientes();
	$activarClientes -> mostrarTablaClientes();

