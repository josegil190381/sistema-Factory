<?php 

class ControladorPlanes{

	/*=============================================
	CREAR PLANE
	=============================================*/

		static public function ctrCrearPlan(){

			if(isset($_POST["nuevoPlan"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoPlan"])){

					$tabla = "planes";

					$datos = array("plan" => $_POST["nuevoPlan"],
						           "monto" => $_POST["nuevoMonto"],
						           "tiempo" => $_POST["nuevoTiempo"],
						       	   "aportes" => $_POST["nuevoAporte"]);

					$respuesta = ModeloPlanes::mdlCrearPlan($tabla, $datos);
				
					if($respuesta == "ok"){

						echo '<script>

						swal({

							type: "success",
							title: "¡El Plan ha sido guardado correctamente!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "planes";

							}

						});
					
						</script>';

					}	
			
				}else{

					echo '<script>

						swal({

							type: "error",
							title: "¡El Plan no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"

						}).then(function(result){

							if(result.value){
							
								window.location = "planes";

							}

						});
					
					</script>';

				}

			}

		}


	/*=============================================
	MOSTRAR PLANES
	=============================================*/

		static public function ctrMostrarPlanes($item, $valor){

			$tabla = "planes";

			$respuesta = ModeloPlanes::mdlMostrarPlanes($tabla, $item, $valor);

			return $respuesta;
		
		}


	/*=============================================
	EDITAR PLAN
	=============================================*/

		static public function ctrEditarPlan(){

			if(isset($_POST["editarPlan"])){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPlan"])){

					$tabla = "planes";

					$datos = array(	"plan"=>$_POST["editarPlan"],
									"monto"=>$_POST["editarMonto"],
									"tiempo"=>$_POST["editarTiempo"],
									"aportes"=>$_POST["editarAporte"],
								   	"id"=>$_POST["idPlan"]);

					$respuesta = ModeloPlanes::mdlEditarPlan($tabla, $datos);

					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Plan ha sido cambiada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "planes";

										}
									})

						</script>';

					}


				}else{

					echo'<script>

						swal({
							  type: "error",
							  title: "¡El Plan no puede ir vacío o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "planes";

								}
							})

				  	</script>';

				}

			}

		}


	/*=============================================
	BORRAR PLAN
	=============================================*/

		static public function ctrBorrarPlan(){

			if(isset($_GET["idPlan"])){

				$tabla ="planes";
				
				$datos = $_GET["idPlan"];

				$respuesta = ModeloPlanes::mdlBorrarPlan($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

						swal({
							  type: "success",
							  title: "EL Plan ha sido borrada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "planes";

										}
									})

						</script>';
				}
			}
			
		}




}