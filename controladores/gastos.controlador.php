<?php

class ControladorGastos{

	/*=============================================
	CREAR GASTO
	=============================================*/

		static public function ctrCrearGastos(){

			if(isset($_POST["nuevoNombre"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

				   	$tabla = "gastos";

				   	$datos = array("usuario"=>	$_SESSION["id"],
				   				   "nombre"=>	$_POST["nuevoNombre"],
				   				   "factura"=>	$_POST["nuevaFactura"],
						           "monto"=>	$_POST["nuevoMonto"],
						       	   "detalle"=>	$_POST["nuevoDetalle"]);

				   	$respuesta = ModeloGastos::mdlCrearGastos($tabla, $datos);
		   	
				   	if($respuesta == "ok"){

				   		/*=============================================
						CREAR NUEVA NOTIFICACION
						=============================================*/

						// $traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

						// $nuevoCliente = $traerNotificaciones["nuevos_clientes"] + 1;

						// ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevos_clientes", $nuevoCliente);

						echo'<script>

						swal({
							  type: "success",
							  title: "El Gasto ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "gastos";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Los datos no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "gastos";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	MOSTRAR GASTOS
	=============================================*/

		static public function ctrMostrarGastos($item, $valor){

			$tabla = "gastos";

			$respuesta = ModeloGastos::mdlMostrarGastos($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

		static public function ctrEditarCliente(){

			if(isset($_POST["editarCliente"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
				   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
				   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
				   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

				   	$tabla = "clientes";

				   	$datos = array("id"=>$_POST["idCliente"],
				   				   "nombre"=>$_POST["editarCliente"],
				   				   "contacto"=>$_POST["editarContacto"],
						           "documento"=>$_POST["editarDocumentoId"],
						           "email"=>$_POST["editarEmail"],
						           "telefono"=>$_POST["editarTelefono"],
						           "direccion"=>$_POST["editarDireccion"]);

				   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El cliente ha sido cambiado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "clientes";

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
	ELIMINAR GASTO
	=============================================*/

		static public function ctrEliminarGastos(){

			if(isset($_GET["idGasto"])){

				$tabla ="gastos";

				$datos = $_GET["idGasto"];

				$respuesta = ModeloGastos::mdlEliminarGastos($tabla, $datos);

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

									window.location = "gastos";

									}
								})

					</script>';

				}		

			}

		}

	/*=============================================
	ELIMINAR GASTO COMPRA
	=============================================*/

		static public function ctrEliminarGastosCompra(){

			if(isset($_GET["idCompra"])){

				$tabla ="gastos";

				$datos = $_GET["idCompra"];

				$respuesta = ModeloGastos::mdlEliminarGastosCompra($tabla, $datos);

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

									window.location = "gastos";

									}
								})

					</script>';

				}		

			}

		}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

		static public function ctrRangoFechasGastos($fechaInicial, $fechaFinal){

			$tabla = "gastos";

			$respuesta = ModeloGastos::mdlRangoFechasGastos($tabla, $fechaInicial, $fechaFinal);

			return $respuesta;
			
		}

	/*=============================================
	SUMA TOTAL GASTOS
	=============================================*/

		static public function ctrSumaTotalGastos(){

			$tabla = "gastos";

			$respuesta = ModeloGastos::mdlSumaTotalGastos($tabla);

			return $respuesta;

		}

}

