<?php

class ControladorProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

		static public function ctrMostrarProductos($item, $valor, $orden){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

			return $respuesta;

		}

	/*=============================================
	MOSTRAR TEMPORALES
	=============================================*/

		static public function ctrMostrarTemporal($item, $valor, $orden){

			$tabla = "temporal";

			$respuesta = ModeloProductos::mdlMostrarTemporal($tabla, $item, $valor, $orden);

			return $respuesta;

		}

	/*=============================================
	MOSTRAR PRODUCTOS VENTAS
	=============================================*/

		static public function ctrMostrarProductosVentas($item, $valor, $orden){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarProductosVentas($tabla, $item, $valor, $orden);

			return $respuesta;

		}

	/*=============================================
	MOSTRAR PRODUCTOS PROVEEDOR
	=============================================*/

		static public function ctrMostrarProductosProveedor($item, $valor){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarProductosProveedor($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	MOSTRAR STOCK PRODUCTOS
	=============================================*/

		static public function ctrMostrarStockProductos($item, $valor){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarStockProductos($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	MOSTRAR PRODUCTOS CAMION
	=============================================*/

		static public function ctrMostrarProductosCamion($item, $valor){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarProductosCamion($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	CREAR PRODUCTO
	=============================================*/

		static public function ctrCrearProducto(){

			if(isset($_POST["nuevaDescripcion"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				   preg_match('/^[0-9]+$/', $_POST["nuevoStock"]) &&	
				   preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioCompra"]) &&
				   preg_match('/^[0-9.]+$/', $_POST["nuevoPrecioVenta"])  &&
				   preg_match('/^[0-9.]+$/', $_POST["nuevoCodigoBarras"])  &&
				   preg_match('/^[a-zA-Z0-9.]+$/', $_POST["nuevaFacturaCompra"])){

			   		/*=============================================
					VALIDAR IMAGEN
					=============================================*/

				   	$ruta = "vistas/img/productos/default/anonymous.png";

				   	if(isset($_FILES["nuevaImagen"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["nuevaImagen"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/

						$directorio = "vistas/img/productos/".$_POST["nuevoCodigo"];

						mkdir($directorio, 0755);

						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["nuevaImagen"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["nuevaImagen"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $ruta);

						}

						if($_FILES["nuevaImagen"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["nuevoCodigo"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["nuevaImagen"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $ruta);

						}

					}

					$tabla = "productos";

					$datos = array("id_categoria" => $_POST["nuevaCategoria"],
								   "id_proveedor" => $_POST["nuevoProveedor"],
								   "codigo" => $_POST["nuevoCodigo"],
								   "codigo_barras" => $_POST["nuevoCodigoBarras"],
								   "descripcion" => $_POST["nuevoNombre"],
								   "stock" => $_POST["nuevoStock"],
								   "precio_compra" => $_POST["nuevoPrecioCompra"],
								   "precio_venta" => $_POST["nuevoPrecioVenta"],
								   "factura" => $_POST["nuevaFacturaCompra"],
								   "fecha_vencimiento" => $_POST["nuevaFechaVencimiento"],
								   "imagen" => $ruta);

					$respuesta = ModeloProductos::mdlIngresarProducto($tabla, $datos);


					/*=============================================
					AGREGAR EN COMPRAS AL CARGAR LOS PRODUCTOS
					=============================================*/

					$totalCompras = $_POST["nuevoPrecioCompra"]*$_POST["nuevoStock"];

					$tablaCompras = "compras";

					$datosCompras = array( "id_comprador" => $_POST["idComprador"],
										   "codigo" => $_POST["nuevoCodigo"],
										   "codigo_barras" => $_POST["nuevoCodigoBarras"],
										   "productos" => $_POST["nuevoNombre"]." - "."(Nuevo Producto)",
										   "cantidad" => $_POST["nuevoStock"],
										   "precio_compra" => $_POST["nuevoPrecioCompra"],
										   "factura" => $_POST["nuevaFacturaCompra"],
										   "total"=> $totalCompras);

					$respuestaCompras = ModeloCompras::mdlCrearCompra($tablaCompras, $datosCompras);


					/*=============================================
					AGREGAR EN EVENTO EN EL CALENDARIO
					=============================================*/

					$tablaEventos = "eventos";

					$datosEventos = array( "title" => $_POST["nuevoNombre"],
										   "descripcion" => $_POST["nuevaDescripcion"],
										   "start" => $_POST["nuevaFechaVencimiento"]);
										   

					$respuestaEventos = ModeloProductos::mdlCrearEvento($tablaEventos, $datosEventos);

					
					
					/*=============================================
					AGREGAR EN GASTOS AL COMPRAR UN PRODUCTO
					=============================================*/

					// $tablaGastos = "gastos";

					// $datosGastos = array("usuario" => $_SESSION["id"],
					// 					 "nombre" => $_SESSION["nombre"],
					// 					 "nombre" => $_SESSION["nombre"],
					// 					 "factura" => $_POST["nuevaFacturaCompra"],
					// 					 "monto" => $_POST["nuevoPrecioCompra"],
					// 					 "detalle" => $_POST["nuevaDescripcion"]);

					// $respuestaGastos = ModeloGastos::mdlCrearGastos($tablaGastos, $datosGastos);

					if($respuesta == "ok"){

						echo'<script>

							swal({
								  type: "success",
								  title: "El producto ha sido guardado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {

											window.location = "productos";

											}
										})

							</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
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
	EDITAR PRODUCTO
	=============================================*/

		static public function ctrEditarProducto(){

			if(isset($_POST["editarDescripcion"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDescripcion"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarStock"]) &&	
				   preg_match('/^[0-9.]+$/', $_POST["editarPrecioCompra"]) &&
				   preg_match('/^[0-9.]+$/', $_POST["editarCodigoBarras"]) &&
				   preg_match('/^[0-9.]+$/', $_POST["editarPrecioVenta"])){

			   		/*=============================================
					VALIDAR IMAGEN
					=============================================*/

				   	$ruta = $_POST["imagenActual"];

				   	if(isset($_FILES["editarImagen"]["tmp_name"]) && !empty($_FILES["editarImagen"]["tmp_name"])){

						list($ancho, $alto) = getimagesize($_FILES["editarImagen"]["tmp_name"]);

						$nuevoAncho = 500;
						$nuevoAlto = 500;

						/*=============================================
						CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
						=============================================*/

						$directorio = "vistas/img/productos/".$_POST["editarCodigo"];

						/*=============================================
						PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
						=============================================*/

						if(!empty($_POST["imagenActual"]) && $_POST["imagenActual"] != "vistas/img/productos/default/anonymous.png"){

							unlink($_POST["imagenActual"]);

						}else{

							mkdir($directorio, 0755);	
						
						}
						
						/*=============================================
						DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						=============================================*/

						if($_FILES["editarImagen"]["type"] == "image/jpeg"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".jpg";

							$origen = imagecreatefromjpeg($_FILES["editarImagen"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagejpeg($destino, $ruta);

						}

						if($_FILES["editarImagen"]["type"] == "image/png"){

							/*=============================================
							GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							=============================================*/

							$aleatorio = mt_rand(100,999);

							$ruta = "vistas/img/productos/".$_POST["editarCodigo"]."/".$aleatorio.".png";

							$origen = imagecreatefrompng($_FILES["editarImagen"]["tmp_name"]);						

							$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

							imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

							imagepng($destino, $ruta);

						}

					}

					$tabla = "productos";

					$datos = array("id_categoria" => $_POST["editarCategoria"],
								   "id_proveedor" => $_POST["editarProveedor"],
								   "codigo" => $_POST["editarCodigo"],
								   "codigo_barras" => $_POST["editarCodigoBarras"],
								   "factura" => $_POST["editarFacturaCompra"],
								   "descripcion" => $_POST["editarDescripcion"],
								   "stock" => $_POST["editarStock"],
								   "precio_compra" => $_POST["editarPrecioCompra"],
								   "precio_venta" => $_POST["editarPrecioVenta"],
								   "fecha_vencimiento" => $_POST["editarFechaVencimiento"],
								   "imagen" => $ruta);

					$respuesta = ModeloProductos::mdlEditarProducto($tabla, $datos);

					if($respuesta == "ok"){

						echo'<script>

							swal({
								  type: "success",
								  title: "El producto ha sido editado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {

											window.location = "productos";

											}
										})

							</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El producto no puede ir con los campos vacíos o llevar caracteres especiales!",
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
	BORRAR PRODUCTO
	=============================================*/
	
		static public function ctrEliminarProducto(){

			if(isset($_GET["idProducto"])){

				$tabla ="productos";
				$datos = $_GET["idProducto"];

				if($_GET["imagen"] != "" && $_GET["imagen"] != "vistas/img/productos/default/anonymous.png"){

					unlink($_GET["imagen"]);
					rmdir('vistas/img/productos/'.$_GET["codigo"]);

				}

				$respuesta = ModeloProductos::mdlEliminarProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido borrado correctamente",
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
	MOSTRAR SUMA VENTAS
	=============================================*/

		static public function ctrMostrarSumaVentas(){

			$tabla = "productos";

			$respuesta = ModeloProductos::mdlMostrarSumaVentas($tabla);

			return $respuesta;

		}

	/*=============================================
	AGREGAR PESO
	=============================================*/

		static public function ctrAgregarPeso(){

			if(isset($_POST["guardarPeso"])){

				$tablaPeso = "config_producto";

				$descripcion = $_POST['descripcionPeso'];
				$simbolo = $_POST['simboloPeso'];

				foreach ($descripcion as $index => $descripciones)
				{

					// echo $descripciones." - ".$simbolo[$index];	

					$s_desc = $descripciones;
					$s_simb = $simbolo[$index];
					$s_tipo = "peso";

					$respuesta = ModeloProductos::mdlAgregarPeso($tablaPeso, $s_desc, $s_simb, $s_tipo);

				}

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Peso ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										
									})

						</script>';

				}

			}

		}

	/*=============================================
	AGREGAR TALLA
	=============================================*/

		static public function ctrAgregarTalla(){

			if(isset($_POST["guardarTalla"])){

				$tablaTalla = "config_producto";

				$descripcionTalla = $_POST['descripcionTalla'];
				$simboloTalla = $_POST['simboloTalla'];

				foreach ($descripcionTalla as $indexTalla => $descripcionesTalla)
				{

					// echo $descripciones." - ".$simbolo[$index];	

					$s_descTalla = $descripcionesTalla;
					$s_simbTalla = $simboloTalla[$indexTalla];
					$s_tipoTalla = "talla";

					$respuestaTalla = ModeloProductos::mdlAgregarTalla($tablaTalla, $s_descTalla, $s_simbTalla, $s_tipoTalla);

				}

				if($respuestaTalla == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "La Talla ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										
									})

						</script>';

				}

			}

		}

	/*=============================================
	AGREGAR COLOR
	=============================================*/

		static public function ctrAgregarColor(){

			if(isset($_POST["guardarColor"])){

				$tablaColor = "config_producto";

				$descripcionColor = $_POST['descripcionColor'];
				$simboloColor = $_POST['simboloColor'];

				foreach ($descripcionColor as $indexColor => $descripcionesColor)
				{

					// echo $descripciones." - ".$simbolo[$index];	

					$s_descColor = $descripcionesColor;
					$s_simbColor = $simboloColor[$indexColor];
					$s_tipoColor = "color";

					$respuestaColor = ModeloProductos::mdlAgregarColor($tablaColor, $s_descColor, $s_simbColor, $s_tipoColor);

				}

				if($respuestaColor == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "El Color ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										
									})

						</script>';

				}

			}

		}

	/*=============================================
	MOSTRAR CONFIG PRODUCTO
	=============================================*/

		static public function ctrMostrarConfigProducto($item, $valor){

			$tabla = "config_producto";

			$respuesta = ModeloProductos::mdlMostrarConfigProducto($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/
	
		static public function ctrBorrarConfigProducto(){

			if(isset($_GET["idConfigProducto"])){

				$tabla ="config_producto";
				$datos = $_GET["idConfigProducto"];

				
				$respuesta = ModeloProductos::mdlBorrarConfigProducto($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El producto ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "config-productos";

									}
								})

					</script>';

				}		
			}


		}

	/*=============================================
	MOSTRAR TIPO CONFIG PRODUCTO
	=============================================*/

		static public function ctrMostrarTipoConfigProducto($item, $valor){

			$tabla = "tipo_config_producto";

			$respuesta = ModeloProductos::mdlMostrarTipoConfigProducto($tabla, $item, $valor);

			return $respuesta;

		}




	

}