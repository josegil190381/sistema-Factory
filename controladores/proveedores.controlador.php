<?php 

class ControladorProveedores{

	/*=============================================
	CREAR PROVEEDOR
	=============================================*/

		static public function ctrCrearProveedores(){

			if(isset($_POST["nuevoProveedor"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"])){

				   	$tabla = "proveedores";

				   	$datos = array("nombre"=>$_POST["nuevoProveedor"],
				   				   "contacto"=>$_POST["nuevoContacto"],
						           "documento"=>$_POST["nuevoDocumentoId"],
						           "email"=>$_POST["nuevoEmail"],
						           "telefono"=>$_POST["nuevoTelefono"],
						           "direccion"=>$_POST["nuevaDireccion"]);

				   	$respuesta = ModeloProveedores::mdlIngresarProveedores($tabla, $datos);


				   	$tablaEventos = "eventos";

				   	$datosEventos = array("titulo"=>$_POST["nuevoContacto"],
				   						  "start"=>$_POST["nuevaFechaNacimiento"],
				   						  "documentoId"=>$_POST["nuevoDocumentoId"]);

				   	$respuestaEventos = ModeloClientes::mdlIngresarEvento($tablaEventos, $datosEventos);


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
							  title: "El Proveedor ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "proveedores";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El Proveedor no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	CREAR PROVEEDOR PRODUCTO
	=============================================*/

		static public function ctrCrearProveedoresProducto(){

			if(isset($_POST["nuevoProveedor"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
				   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoContacto"]) &&
				   preg_match('/^[0-9-]+$/', $_POST["nuevoDocumentoId"]) &&
				   // preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
				   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
				   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

				   	$tabla = "proveedores";

				   	$datos = array("nombre"=>$_POST["nuevoProveedor"],
				   				   "contacto"=>$_POST["nuevoContacto"],
						           "documento"=>$_POST["nuevoDocumentoId"],
						           "email"=>$_POST["nuevoEmail"],
						           "telefono"=>$_POST["nuevoTelefono"],
						           "direccion"=>$_POST["nuevaDireccion"]);

				   	$respuesta = ModeloProveedores::mdlIngresarProveedores($tabla, $datos);


				   	// $tablaEventos = "eventos";

				   	// $datosEventos = array("titulo"=>$_POST["nuevoContacto"],
				   	// 					  "start"=>$_POST["nuevaFechaNacimiento"],
				   	// 					  "documentoId"=>$_POST["nuevoDocumentoId"]);

				   	// $respuestaEventos = ModeloClientes::mdlIngresarEvento($tablaEventos, $datosEventos);


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
							  title: "El Proveedor ha sido guardado correctamente",
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
							  title: "¡El Proveedor no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	MOSTRAR PROOVEEDORES
	=============================================*/

		static public function ctrMostrarProveedores($item, $valor){

			$tabla = "proveedores";

			$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

			return $respuesta;

		}

	/*=============================================
	EDITAR PROVEEDORES
	=============================================*/

		static public function ctrEditarProveedores(){

			if(isset($_POST["editarProveedor"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
				   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
				   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
				   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){

				   	$tabla = "proveedores";

				   	$datos = array("id"=>$_POST["idProveedor"],
				   				   "nombre"=>$_POST["editarProveedor"],
				   				   "contacto"=>$_POST["editarContacto"],
						           "documento"=>$_POST["editarDocumentoId"],
						           "email"=>$_POST["editarEmail"],
						           "telefono"=>$_POST["editarTelefono"],
						           "direccion"=>$_POST["editarDireccion"]);

				   	$respuesta = ModeloProveedores::mdlEditarProveedores($tabla, $datos);

				   	if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El proveedor ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "proveedores";

										}
									})

						</script>';

					}

				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡Loos datos del Proveedor no pueden ir vacíos o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "proveedores";

								}
							})

				  	</script>';



				}

			}

		}

	/*=============================================
	ELIMINAR PROVEEDOR
	=============================================*/

		static public function ctrEliminarProveedores(){

			if(isset($_GET["idProveedor"])){

				$tabla ="proveedores";

				$datos = $_GET["idProveedor"];

				$respuesta = ModeloProveedores::mdlEliminarProveedores($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Proveedor ha sido borrado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar",
						  closeOnConfirm: false
						  }).then(function(result){
									if (result.value) {

									window.location = "proveedores";

									}
								})

					</script>';

				}		

			}

		}

}