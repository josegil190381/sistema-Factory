<?php

require_once "conexion.php";

class ModeloGastos{

	/*=============================================
	CREAR GASTOS
	=============================================*/

		static public function mdlCrearGastos($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, nombre, factura, codigo, monto, detalle) VALUES (:usuario, :nombre, :factura, :codigo, :monto, :detalle)");

			$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
			$stmt->bindParam(":detalle", $datos["detalle"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	INGRESAR EVENTO
	=============================================*/

		static public function mdlIngresarEvento($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title, start, end, documentoId) VALUES (:title, :start, :end, :documentoId)");

			$stmt->bindParam(":title", $datos["titulo"], PDO::PARAM_STR);
			$stmt->bindParam(":start", $datos["start"], PDO::PARAM_STR);
			$stmt->bindParam(":end", $datos["start"], PDO::PARAM_STR);
			$stmt->bindParam(":documentoId", $datos["documentoId"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	MOSTRAR GASTOS
	=============================================*/

		static public function mdlMostrarGastos($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	EDITAR CLIENTE
	=============================================*/

		static public function mdlEditarCliente($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, contacto = :contacto, documento = :documento, email = :email, telefono = :telefono, direccion = :direccion WHERE id = :id");

			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":contacto", $datos["contacto"], PDO::PARAM_STR);
			$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
			$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	ELIMINAR GASTO
	=============================================*/

		static public function mdlEliminarGastos($tabla, $datos){

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
	ELIMINAR GASTO COMPRA
	=============================================*/

		static public function mdlEliminarGastosCompra($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_compra = :id");

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
	ACTUALIZAR CLIENTE
	=============================================*/

		static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	RANGO FECHAS
	=============================================*/	

		static public function mdlRangoFechasGastos($tabla, $fechaInicial, $fechaFinal){

			if($fechaInicial == null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();	


			}else if($fechaInicial == $fechaFinal){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha like '%$fechaFinal%' ORDER BY fecha DESC");

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


    /*=============================================
	SUMAR EL TOTAL DE GASTOS
	=============================================*/

		static public function mdlSumaTotalGastos($tabla){	

			$stmt = Conexion::conectar()->prepare("SELECT SUM(monto) as total FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;

		}



}