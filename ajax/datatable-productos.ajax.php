<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/categorias.controlador.php";
require_once "../modelos/categorias.modelo.php";


class TablaProductos{

 	/*=============================================
 	 MOSTRAR LA TABLA DE PRODUCTOS
  	=============================================*/ 

		public function mostrarTablaProductos(){

			$item = null;
	    	$valor = null;
	    	$orden = "id";

	  		$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);	

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
	 	 		TRAEMOS LA CATEGORÍA
	  			=============================================*/ 

			  	$item = "id";
			  	$valor = $productos[$i]["id_categoria"];

			  	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

			  	

			  	/*=============================================
	 	 		STOCK
	  			=============================================*/ 


	  			if ($productos[$i]["stock"] == 0) {
	  				
	  				$stock = "<button class='btn btn-danger btnNuevoStock' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalNuevoStock' data-toggle='tooltip' title='Agregar Compra de Producto'>Agotado</button>";
	  			

	  			}else if($productos[$i]["stock"] <= 5){

	  				$stock = "<button class='btn btn-danger btnNuevoStock' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalNuevoStock' data-toggle='tooltip' title='Agregar Compra de Producto'>".$productos[$i]["stock"]."</button>";

	  			}else if($productos[$i]["stock"] >= 6 && $productos[$i]["stock"] <= 10){

	  				$stock = "<button class='btn btn-warning btnNuevoStock' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalNuevoStock' data-toggle='tooltip' title='Agregar Compra de Producto'>".$productos[$i]["stock"]."</button>";

	  			}else{

	  				$stock = "<button class='btn btn-success btnNuevoStock' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalNuevoStock' data-toggle='tooltip' title='Agregar Compra de Producto'>".$productos[$i]["stock"]."</button>";

	  			}

			  	/*=============================================
	 	 		TRAEMOS LAS ACCIONES
	  			=============================================*/ 

	  			if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Especial"){

	  				$botones =  "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto' data-toggle='tooltip' title='Editar el Producto'><i class='fa fa-pencil'></i></button>";
	  				
	  			}else{

	  				 $botones =  "<div class='btn-group'><button class='btn btn-warning btn-sm btnEditarProducto' idProducto='".$productos[$i]["id"]."' data-toggle='modal' data-target='#modalEditarProducto' data-toggle='tooltip' title='Editar el Producto'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btn-sm btnEliminarProducto' idProducto='".$productos[$i]["id"]."' codigo='".$productos[$i]["codigo"]."' imagen='".$productos[$i]["imagen"]."' idDescripcion='".$productos[$i]["descripcion"]."' data-toggle='tooltip' title='Borrar el Producto'><i class='fa fa-times'></i></button></div>"; 

	  			}

			 
			  	$datosJson .='[
				      "'.($i+1).'",
				      "'.$productos[$i]["codigo"].'",
				      "'.$productos[$i]["factura"].'",
				      "'.$productos[$i]["descripcion"].'",
				      "'.$categorias["categoria"].'",
				      "'.$stock.'",
				      "'.$productos[$i]["ventas"].'",
				      "Gs. '.$productos[$i]["precio_compra"].'",
				      "Gs. '.$productos[$i]["precio_venta"].'",
					  "'.$productos[$i]["fecha_vencimiento"].'",
					  "'.$productos[$i]["fecha"].'",
				      "'.$botones.'"
				    ],';

			  }

			  $datosJson = substr($datosJson, 0, -1);

			 $datosJson .=   '] 

			 }';
			
			echo $datosJson;


		}



}

/*=============================================
ACTIVAR TABLA DE PRODUCTOS
=============================================*/ 
$activarProductos = new TablaProductos();
$activarProductos -> mostrarTablaProductos();

