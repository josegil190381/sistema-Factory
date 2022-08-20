<?php 

require_once "conexion.php";

class ModeloCamion{

	/*=============================================
	MOSTRAR CARGA CAMION
	=============================================*/

		static public function mdlMostrarCarga($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1 ORDER BY fecha DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estado = 1 ORDER BY fecha DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	CREAR CARGA CAMION
	=============================================*/

		static public function mdlCrearCarga($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(conductor, productos, cantidad) VALUES (:conductor, :productos, :cantidad)");

			$stmt->bindParam(":conductor", $datos["nuevoConductor"], PDO::PARAM_STR);
			$stmt->bindParam(":productos", $datos["nuevoProducto"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datos["nuevaCantidad"], PDO::PARAM_STR);
			
			
			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	EDITAR CAMION
	=============================================*/

		static public function mdlEditarCarga($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET conductor = :conductor, productos = :productos, cantidad = :cantidad WHERE id = :id");

			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":conductor", $datos["conductor"], PDO::PARAM_STR);
			$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_INT);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	ELIMINAR CAMION
	=============================================*/

		static public function mdlEliminarCarga($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

			$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR CARGA POR RANGO DE FECHAS
	=============================================*/	

		static public function mdlRangoFechasCamion($tabla, $fechaInicial, $fechaFinal){

			if($fechaInicial == null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estado = 1 ORDER BY fecha DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();	


			}else if($fechaInicial == $fechaFinal){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' and estado = 1");

				$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$fechaActual = new DateTime();
				$fechaActual ->add(new DateInterval("P1D"));
				$fechaActualMasUno = $fechaActual->format("Y-m-d");

				$fechaFinal2 = new DateTime($fechaFinal);
				$fechaFinal2 ->add(new DateInterval("P1D"));
				$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

				if($fechaFinalMasUno == $fechaActualMasUno){

					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

				}else{


					$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'");

				}
			
				$stmt -> execute();

				return $stmt -> fetchAll();

			}

		}










}