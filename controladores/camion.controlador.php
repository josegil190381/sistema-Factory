<?php 

class ControladorCamion{

	/*=============================================
	MOSTRAR CARGA CAMION
	=============================================*/

		static public function ctrMostrarCarga($item, $valor){

			$tabla = "camion";

			$respuesta = ModeloCamion::mdlMostrarCarga($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	CREAR CARGA CAMION
	=============================================*/

		static public function ctrCrearCarga(){

			if(isset($_POST["nuevoConductor"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoConductor"])){


					$tabla = "camion";

					$datos = array("nuevoConductor" => $_POST["nuevoConductor"],
								   "nuevoProducto" => $_POST["seleccionarProductoCamion"],
								   "nuevaCantidad" => $_POST["nuevaCantidad"]);

					$respuesta = ModeloCamion::mdlCrearCarga($tabla, $datos);

					
					if($respuesta == "ok"){

						/*=============================================
						CREAR NUEVA NOTIFICACION
						=============================================*/

						$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

						$nuevaCarga = $traerNotificaciones["nuevas_cargas"] + 1;

						ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevas_cargas", $nuevaCarga);



						echo'<script>

							swal({
								  type: "success",
								  title: "La carga se ha agregado correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {

											window.location = "camion";

											}
										})

							</script>';

					}

				}else{

					echo'<script>

							swal({
								  type: "error",
								  title: "El nombre del conductor no puede ir vacío o con carcateres especiales",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
											if (result.value) {

											window.location = "camion";

											}
										})

							</script>';




				}
				
			}

		}

	/*=============================================
	EDITAR CAMION
	=============================================*/

		static public function ctrEditarCarga(){

			if(isset($_POST["editarConductor"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarConductor"]) 
				   ){

				   	$tabla = "camion";

				   	$datos = array("id"=>$_POST["idCarga"],
				   				   "conductor"=>$_POST["editarConductor"],
				   				   "productos"=>$_POST["editarProductoCamion"],
						           "cantidad"=>$_POST["editarCantidad"]);

				   	$respuesta = ModeloCamion::mdlEditarCarga($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "La operación ha sido editada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "camion";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El cliente no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	ELIMINAR CAMION
	=============================================*/

		static public function ctrEliminarCarga(){

			if(isset($_GET["idCarga"])){

				$tabla ="camion";
				$datos = $_GET["idCarga"];

				$respuesta = ModeloCamion::mdlEliminarCarga($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La operación ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "camion";

									}
								})

					</script>';

				}		

			}

		}

	/*=============================================
	MOSTRAR CARGA POR RANGO DE FECHAS
	=============================================*/	

		static public function ctrRangoFechasCamion($fechaInicial, $fechaFinal){

			$tabla = "camion";

			$respuesta = ModeloCamion::mdlRangoFechasCamion($tabla, $fechaInicial, $fechaFinal);

			return $respuesta;
			
		}

}