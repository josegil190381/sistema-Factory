<?php 

class ControladorConfiguracion{

/*=============================================
MOSTRAR CONFIGURACIONES
=============================================*/

		static public function ctrMostrarConfiguracion($item, $valor){

			$tabla = "configuracion";

			$respuesta = ModeloConfiguracion::mdlMostrarConfiguracion($tabla, $item, $valor);

			return $respuesta;

		}

/*=============================================
EDITAR CONFIGURACION
=============================================*/

	static public function ctrEditarConfiguracion(){

		if(isset($_POST["nombre"])){

			
			   	$tabla = "configuracion";

			   	$datos = array("id"=>$_POST["id"],
			   				   "nombre"=>$_POST["nombre"],
					           "ruc"=>$_POST["ruc"],
					           "razon_social"=>$_POST["razon"],
					           "telefono"=>$_POST["telefono"],
					           "email"=>$_POST["email"],
					           "direccion"=>$_POST["direccion"],
					       	   "email"=>$_POST["email"]);

			   	$respuesta = ModeloConfiguracion::mdlEditarConfiguracion($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La Configuración ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "configuracion";

									}
								})

					</script>';

				}

			
		}

	}

}


