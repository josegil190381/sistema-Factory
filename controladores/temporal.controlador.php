<?php 

class ControladorTemporal{


	/*=============================================
	MOSTRAR TEMPORALES
	=============================================*/

		static public function ctrMostrarTemporal($item, $valor, $orden){

			$tabla = "temporal";

			$respuesta = ModeloProductos::mdlMostrarTemporal($tabla, $item, $valor, $orden);

			return $respuesta;

			if ($respuesta == "") {

				static public function ctrMostrarProductos($item, $valor, $orden){

					$tabla = "temporal";

					$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor, $orden);

					return $respuesta;
				
			}

		}

	/*=============================================
	AGREGAR TEMPORAL
	=============================================*/

		static public function ctrAgregarTemporal(){

			if(isset($_POST["nuevaDescripcion"])){

							   						   	
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
							
			}

		}























}
