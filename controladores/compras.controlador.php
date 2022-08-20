<?php 

class ControladorCompras{

	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

		static public function ctrMostrarCompras($item, $valor){

			$tabla = "compras";

			$respuesta = ModeloCompras::mdlMostrarCompras($tabla, $item, $valor);

			return $respuesta;





		}

	/*=============================================
	MOSTRAR COMPRAS OTROS
	=============================================*/

		static public function ctrMostrarComprasOtros($item, $valor){

			$tabla = "compras_otros";

			$respuesta = ModeloCompras::mdlMostrarComprasOtros($tabla, $item, $valor);

			return $respuesta;





		}

	/*=============================================
	NUEVO STOCK
	=============================================*/

		static public function ctrNuevoStock(){

			if(isset($_POST["descripcionProducto"])){
				
				$total = $_POST["nuevoPrecioCompraStock"]*$_POST["nuevoStockProducto"];

				/*=============================================
				CREAR LA NUEVA COMPRA
				=============================================*/
				
				$tablaCompras = "compras";

				$datosCompras = array( "id_comprador"=>$_POST["idComprador"],
									   "factura"=>$_POST["nuevaFacturaStock"],
									   "codigo"=>$_POST["codigoProducto"],
									   "productos"=>$_POST["descripcionProducto"]." - "."(Agregado Stock)",
									   "precio_compra"=>$_POST["nuevoPrecioCompraStock"],
									   "cantidad"=>$_POST["nuevoStockProducto"],
									   "total"=>$total);

				$respuestaCompras = ModeloCompras::mdlCrearCompra($tablaCompras, $datosCompras);

				/*=============================================
				AGREGAR LAS NUEVAS COMPRAS EN GASTOS
				=============================================*/

				// $tablaGastos = "gastos";

				// $datosGastos = array(  "usuario"=>$_SESSION["id"],
				// 					   "nombre"=>$_SESSION["nombre"],
				// 					   "factura"=>$_POST["nuevaFacturaStock"],
				// 					   "codigo"=>$_POST["codigoProducto"],
				// 					   "monto"=>$total,
				// 					   "detalle"=>$_POST["descripcionProducto"]);

				// $respuestaGastos = ModeloGastos::mdlCrearGastos($tablaGastos, $datosGastos);



				$tablaProductos = "productos";

				$item = "codigo";
			    $valor = $_POST["codigoProducto"];
			    $orden = "id";

			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

				$nuevoStock = $_POST["nuevoStockProducto"]+$traerProducto["stock"];

				$item1 = "stock";
				$valor1 = $nuevoStock;
				$valor = $_POST["codigoProducto"];

				$actualizarStock = ModeloProductos::mdlActualizarStockProducto($tablaProductos, $item1, $valor1, $valor);


				if($actualizarStock == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El stock se ha agregado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "productos";

										}
									})

						</script>';

				}

			}

		}

	/*=============================================
	NUEVA COMPRA
	=============================================*/

		static public function ctrNuevaCompra(){

			if(isset($_POST["nuevoProducto"])){
				
				$total = $_POST["nuevoPrecioCompraStock"]*$_POST["nuevoStockProducto"];

				/*=============================================
				CREAR LA NUEVA COMPRA
				=============================================*/
				
				$tablaCompras = "compras";

				$datosCompras = array( "id_comprador"=>$_POST["idComprador"],
									   "factura"=>$_POST["nuevaFacturaStock"],
									   "codigo"=>$_POST["codigoProducto"],
									   "productos"=>$_POST["nuevoProducto"],
									   "precio_compra"=>$_POST["nuevoPrecioCompraStock"],
									   "cantidad"=>$_POST["nuevoStockProducto"],
									   "total"=>$total);

				$respuestaCompras = ModeloCompras::mdlCrearCompra($tablaCompras, $datosCompras);

				/*=============================================
				AGREGAR LAS NUEVAS COMPRAS EN GASTOS
				=============================================*/

				$tablaGastos = "gastos";

				$datosGastos = array(  "usuario"=>$_SESSION["id"],
									   "nombre"=>$_SESSION["nombre"],
									   "factura"=>$_POST["nuevaFacturaStock"],
									   "codigo"=>$_POST["codigoProducto"],
									   "monto"=>$total,
									   "detalle"=>$_POST["nuevoProducto"]);

				$respuestaGastos = ModeloGastos::mdlCrearGastos($tablaGastos, $datosGastos);



				$tablaProductos = "productos";

				$item = "codigo";
			    $valor = $_POST["codigoProducto"];
			    $orden = "id";

			    $traerProducto = ModeloProductos::mdlMostrarProductos($tablaProductos, $item, $valor, $orden);

				$nuevoStock = $_POST["nuevoStockProducto"]+$traerProducto["stock"];

				$item1 = "stock";
				$valor1 = $nuevoStock;
				$valor = $_POST["codigoProducto"];

				$actualizarStock = ModeloProductos::mdlActualizarStockProducto($tablaProductos, $item1, $valor1, $valor);


				if($actualizarStock == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El stock se ha agregado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "compras";

										}
									})

						</script>';

				}

			}

		}

	/*=============================================
	NUEVA COMPRA OTROS
	=============================================*/

		static public function ctrNuevaCompraOtros(){

			if(isset($_POST["nombre"])){
				
				
				/*=============================================
				CREAR LA NUEVA COMPRA
				=============================================*/
				
				$tablaComprasOtros = "compras_otros";

				$datosComprasOtros = array( "id_usuario"=>$_POST["idUsuario"],
											"nombre"=>$_POST["nombre"],
										    "factura"=>$_POST["factura"],
										    "monto"=>$_POST["monto"],
										    "detalle"=>$_POST["detalle"]);

				$respuestaComprasOtros = ModeloCompras::mdlCrearCompraOtros($tablaComprasOtros, $datosComprasOtros);

				

				if($respuestaComprasOtros == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La Compra se ha agregado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "compras-otros";

										}
									})

						</script>';

				}

			}

		}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

		static public function ctrRangoFechasCompras($fechaInicial, $fechaFinal){

			$tabla = "compras";

			$respuesta = ModeloCompras::mdlRangoFechasCompras($tabla, $fechaInicial, $fechaFinal);

			return $respuesta;
			
		}

	/*=============================================
	ELIMINAR COMPRA
	=============================================*/

		static public function ctrEliminarCompra(){

			if(isset($_GET["idCompra"])){

				$tabla ="compras";
				$datos = $_GET["idCompra"];

				$respuesta = ModeloCompras::mdlEliminarCompra($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Compra ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "compras";

									}
								})

					</script>';

				}		

			}

		}








}