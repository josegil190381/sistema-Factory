<?php 

class ControladorCaja{

	/*=============================================
	MOSTRAR CAJA
	=============================================*/

		static public function ctrMostrarCaja($item, $valor, $orden){

			$tabla = "caja";

			$respuesta = ModeloCaja::mdlMostrarCaja($tabla, $item, $valor, $orden);

			return $respuesta;
		}

	/*=============================================
	MOSTRAR ESTADO CAJA
	=============================================*/

		static public function ctrMostrarEstadoCaja($item, $valor){

			$tabla = "estado_caja";

			$respuesta = ModeloCaja::mdlMostrarEstadoCaja($tabla, $item, $valor);

			return $respuesta;
		}

	/*=============================================
	MOSTRAR ULTIMA OPERACION DE CAJA
	=============================================*/

		static public function ctrMostrarUltimaCaja($item, $valor){

			$tabla = "caja";

			$respuesta = ModeloCaja::mdlMostrarUltimaCaja($tabla, $item, $valor);

			json_encode($respuesta);

			return $respuesta;
		}

	/*=============================================
	ABRIR CAJA
	=============================================*/

		static public function ctrAbrirCaja(){

			if(isset($_POST["nuevoMontoApertura"])){

				$tabla = "caja";
				
				$datos = array("montoCaja" => $_POST["nuevoMontoApertura"]);

				$respuesta = ModeloCaja::mdlAbrirCaja($tabla, $datos);

				$tablaEstadoCaja = "estado_caja";
				$datosEstadoCaja = 1;

				$abrirEstadoCaja = ModeloCaja::mdlAbrirEstadoCaja($tablaEstadoCaja, $datosEstadoCaja);


				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La Caja se ha abierto correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "caja";

						}

					});
				

					</script>';


				}	

			}
		}

	/*=============================================
	CERRAR CAJA
	=============================================*/

		static public function ctrCerrarCaja(){

			if(isset($_POST["idCaja"])){

				date_default_timezone_set('America/Asuncion');

				$fecha = date('Y-m-d');
				$hora = date('H:i:s');

				$fechaActual = $fecha.' '.$hora;

				$ventasDia = ControladorVentas::ctrSumaTotalVentasDia();

            	
            	$cantidadDia = ControladorVentas::ctrSumaCantidadVentasDia();
				

				$tabla = "caja";

				$datos = array("id"=>$_POST["idCaja"],
			   				   "monto_cierre"=>$_POST["nuevoMontoCierre"],
			   				   "monto_ventas"=>$ventasDia["total"],
			   				   "ventas_totales"=>$cantidadDia["cantidad"],
			   				   "fecha_cierre"=>$fechaActual);

				$cerrarCaja = ModeloCaja::mdlCerrarCaja($tabla, $datos);


				$tablaEstadoCaja = "estado_caja";
				$datosEstadoCaja = 1;

				$cerrarEstadoCaja = ModeloCaja::mdlCerrarEstadoCaja($tablaEstadoCaja, $datosEstadoCaja);

				if($cerrarCaja == "ok"){

					$tablaDia = "ventas_dia";

					$eliminarVentaDia = ModeloVentas::mdlEliminarVentaDia($tablaDia);

					echo '<script>

					swal({

						type: "success",
						title: "¡La Caja se ha cerrado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "caja";

						}

					});
				

					</script>';

				}				
				
			}
		}
	
	/*=============================================
	BORRAR OPERACION CAJA
	=============================================*/

		static public function ctrBorrarCaja(){

			if(isset($_GET["idCaja"])){

				$tabla ="caja";
				$datos = $_GET["idCaja"];
				
				$respuesta = ModeloCaja::mdlBorrarCaja($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La operación de caja ha sido borrada",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result) {
									if (result.value) {

									window.location = "caja";

									}
								})

					</script>';

				}		

			}
		}



}
	
