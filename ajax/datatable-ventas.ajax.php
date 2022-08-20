<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";


class TablaProductosVentas{

	// Clases

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

		public function mostrarTablaProductosVentas(){


			$item = null;
	    	$valor = null;
	    	$orden = "id";

	  		$productos = ControladorProductos::ctrMostrarProductosVentas($item, $valor, $orden);
	 		
	  		if(count($productos) == 0){

	  			echo '{"data": []}';

			  	return;
	  		}	
			
	  		$datosJson = '{
			  "data": [';

			  for($i = 0; $i < count($productos); $i++){

			  	/*=============================================
	 	 		TRAEMOS LA IMAGEN
	  			=============================================*/ 

			  		$imagen = "<img src='".$productos[$i]["imagen"]."' width='40px'>";

			  	/*=============================================
	 	 		STOCK
	  			=============================================*/ 

	  			
	  			if ($productos[$i]["stock"] == 0) {
	  				
	  				$stock = "<button class='btn btn-danger btnNuevoStock' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalNuevoStock''>0</button>";
	  			
	  			}else if($productos[$i]["stock"] <= 5){

	  				 $stock = "<button class='btn btn-danger'>".$productos[$i]["stock"]."</button>";

	  			}else if($productos[$i]["stock"] > 6 && $productos[$i]["stock"] <= 10){

	  				$stock = "<button class='btn btn-warning'>".$productos[$i]["stock"]."</button>";

	  			}else{

	  				$stock = "<button class='btn btn-success'>".$productos[$i]["stock"]."</button>";

	  			}

			  	/*=============================================
	 	 		TRAEMOS LAS ACCIONES
	  			=============================================*/ 

	  			if ($productos[$i]["stock"] == 0) {

	  				$botones =  "<div class='btn-group'><button class='btn btn-danger agregarProducto recuperarBoton' id='agregarProducto' idProducto='".$productos[$i]["id"]."' disabled>Agotado</button></div>";
	  				
	  			}else{

	  				$botones =  "<div class='btn-group'><button class='btn btn-primary agregarProducto recuperarBoton' id='agregarProducto' idProducto='".$productos[$i]["id"]."'>Agregar</button></div>"; 

	  			}
			  	

			  	$precio = number_format($productos[$i]["precio_venta"],0,",",".");

			  	$datosJson .='[
				      "'.($i+1).'",
				      "'.$productos[$i]["codigo_barras"].'",
				      "'.$precio.'",
				      "'.$productos[$i]["descripcion"].'",
				      "'.$stock.'",
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

	$activarProductosVentas = new TablaProductosVentas();
	$activarProductosVentas -> mostrarTablaProductosVentas();

