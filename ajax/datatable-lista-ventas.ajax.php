<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";


class TablaVentas{

	// Clases

 	/*=============================================
 	 MOSTRAR LA TABLA DE VENTAS
  	=============================================*/ 

		public function mostrarTablaVentas(){

			if(isset($_GET["fechaInicial"])){

			$fechaInicial = $_GET["fechaInicial"];
			$fechaFinal = $_GET["fechaFinal"];

			}else{

			$fechaInicial = null;
			$fechaFinal = null;

			}

			$ventas = ControladorVentas::ctrRangoFechasVentas($fechaInicial, $fechaFinal);

			// $item = null;
	  // 		$valor = null;
	    	

	 	// 	$ventas = ControladorVentas::ctrMostrarVentas($item, $valor);
	 		
	  		if(count($ventas) == 0){

	  			echo '{"data": []}';

			  	return;
	  		}	
			
	  		$datosJson = '{
			  "data": [';

			  for($i = 0; $i < count($ventas); $i++){

			  	/*=============================================
	 	 		TRAEMOS EL CLIENTE
	  			=============================================*/ 

			  	$item = "id";
			  	$valor = $ventas[$i]["id_cliente"];

			  	$cliente = ControladorClientes::ctrMostrarClientes($item, $valor);


			  	/*=============================================
	 	 		TRAEMOS EL VENDEDOR
	  			=============================================*/ 

			  	$item = "id";
			  	$valor = $ventas[$i]["id_vendedor"];

			  	$usuario = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

			  	/*=============================================
	 	 		TRAEMOS LAS ACCIONES
	  			=============================================*/ 

	  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == 3){

	  				$botones =  "<div class='btn-group'><button class='btn btn-info btn-sm btnImprimirFactura' idVenta='".$ventas[$i]["id"]."'><i class='fa fa-print'></i></button><button class='btn btn-success btn-sm btnVerVenta' idVenta='".$ventas[$i]["id"]."' data-toggle='tooltip' title='Ver detalle de la Venta'><i class='fa fa-eye'></i></button></div>"; 
	  			
	  			}else{

	  				$botones =  "<div class='btn-group'><button class='btn btn-info btn-sm btnImprimirFactura' idVenta='".$ventas[$i]["id"]."'><i class='fa fa-print'></i></button><button class='btn btn-success btn-sm btnVerVenta' idVenta='".$ventas[$i]["id"]."' data-toggle='tooltip' title='Ver detalle de la Venta'><i class='fa fa-eye'></i></button><button class='btn btn-warning btn-sm btnEditarVenta' idVenta='".$ventas[$i]["id"]."' data-toggle='tooltip' title='Editar la Venta'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-sm btnEliminarVenta' idVenta='".$ventas[$i]["id"]."' data-toggle='tooltip' title='Borrar la Venta'><i class='fa fa-times'></i></button></div>";

	  			}

	  			$fecha = date('d-m-Y',strtotime($ventas[$i]["fecha"]));				  	

			  	$datosJson .='[
				      "'.($i+1).'",
				      "'.$ventas[$i]["codigo"].'",
				      "'.$ventas[$i]["factura"].'",
				      "'.$cliente["nombre"].'",
				      "'.$usuario["nombre"].'",
				      "'.$ventas[$i]["metodo_pago"].'",
				      "'.number_format($ventas[$i]["total"],0,",",".").'",
				      "'.$fecha.'",
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
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 

	$activarVentas = new TablaVentas();
	$activarVentas -> mostrarTablaVentas();

