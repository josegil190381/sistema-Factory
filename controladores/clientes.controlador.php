<?php

class ControladorClientes{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

		static public function ctrCrearCliente(){

			if(isset($_POST["nuevoCliente"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
				   preg_match('/^[0-9-]+$/', $_POST["nuevoDocumentoId"]) &&
				   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])){


				   	$tabla = "clientes";

				   	$datos = array("nombre"=>$_POST["nuevoCliente"],
				   				   "documento"=>$_POST["nuevoDocumentoId"],
						           "email"=>$_POST["nuevoEmail"],
						           "telefono"=>$_POST["nuevoTelefono"],
						           "direccion"=>$_POST["nuevaDireccion"]);

				   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
		   	

				   	if($respuesta == "ok"){

				   		/*=============================================
						CREAR NUEVA NOTIFICACION
						=============================================*/

						$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

						$nuevoCliente = $traerNotificaciones["nuevos_clientes"] + 1;

						ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevos_clientes", $nuevoCliente);

						echo'<script>

						swal({
							  type: "success",
							  title: "El cliente ha sido guardado correctamente",
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
	CREAR CLIENTES DESDE LA PAGINA DE VENTAS
	=============================================*/

		static public function ctrCrearClienteVentas(){

			if(isset($_POST["nuevoCliente"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
				   preg_match('/^[0-9-]+$/', $_POST["nuevoDocumentoId"]) &&
				   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"])){


				   	$tabla = "clientes";

				   	$datos = array("nombre"=>$_POST["nuevoCliente"],
				   				   "documento"=>$_POST["nuevoDocumentoId"],
						           "email"=>$_POST["nuevoEmail"],
						           "telefono"=>$_POST["nuevoTelefono"],
						           "direccion"=>$_POST["nuevaDireccion"]);

				   	$respuesta = ModeloClientes::mdlIngresarClienteVentas($tabla, $datos);
		   	

				   	if($respuesta == "ok"){

				   		/*=============================================
						CREAR NUEVA NOTIFICACION
						=============================================*/

						$traerNotificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

						$nuevoCliente = $traerNotificaciones["nuevos_clientes"] + 1;

						ModeloNotificaciones::mdlActualizarNotificaciones("notificaciones", "nuevos_clientes", $nuevoCliente);

						echo'<script>

						swal({
							  type: "success",
							  title: "El cliente ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "crear-venta";

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

								window.location = "crear-venta";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

		static public function ctrMostrarClientes($item, $valor){

			$tabla = "clientes";

			$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

		static public function ctrEditarCliente(){

			if(isset($_POST["editarCliente"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
				   preg_match('/^[0-9-]+$/', $_POST["editarDocumentoId"]) &&
				   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"])){

				   	$tabla = "clientes";

				   	$datos = array("id"=>$_POST["idCliente"],
				   				   "nombre"=>$_POST["editarCliente"],
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
	ELIMINAR CLIENTE
	=============================================*/

		static public function ctrEliminarCliente(){

			if(isset($_GET["idCliente"])){

				$tabla ="clientes";
				$datos = $_GET["idCliente"];

				$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									
									}
								})

					</script>';

				}		

			}

		}

}

