<?php

require_once "conexion.php";

class ModeloCaja{

	/*=============================================
	MOSTRAR CAJA
	=============================================*/

		static public function mdlMostrarCaja($tabla, $item, $valor, $orden){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR ESTADO CAJA
	=============================================*/

		static public function mdlMostrarEstadoCaja($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR ULTIMA CAJA
	=============================================*/

		static public function mdlMostrarUltimaCaja($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC LIMIT 1");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 1");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	ABRIR CAJA
	=============================================*/

		static public function mdlAbrirCaja($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(monto_apertura) VALUES (:monto_apertura)");

			$stmt->bindParam(":monto_apertura", $datos["montoCaja"], PDO::PARAM_STR);
						
			if($stmt->execute()){


				return "ok";	

			}else{

				return "error";
			
			}

			$stmt->close();
			
			$stmt = null;

		}

	/*=============================================
	ABRIR ESTADO DE CAJA
	=============================================*/

		static public function mdlAbrirEstadoCaja($tablaEstadoCaja, $datosEstadoCaja){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablaEstadoCaja SET estado = 1 WHERE id = :id");
			
			$stmt->bindParam(":id", $datosEstadoCaja, PDO::PARAM_INT);
			
			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	CERRAR CAJA
	=============================================*/

		static public function mdlCerrarCaja($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET monto_cierre = :monto_cierre, monto_ventas = :monto_ventas, ventas_totales = :ventas_totales, fecha_cierre = :fecha_cierre, estado = 2 WHERE id = :id");
			
			$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
			$stmt->bindParam(":monto_cierre", $datos["monto_cierre"], PDO::PARAM_INT);
			$stmt->bindParam(":monto_ventas", $datos["monto_ventas"], PDO::PARAM_INT);
			$stmt->bindParam(":ventas_totales", $datos["ventas_totales"], PDO::PARAM_INT);
			$stmt->bindParam(":fecha_cierre", $datos["fecha_cierre"], PDO::PARAM_STR);


			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	CERRAR ESTADO DE CAJA
	=============================================*/

		static public function mdlCerrarEstadoCaja($tablaEstadoCaja, $datosEstadoCaja){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablaEstadoCaja SET estado = 2 WHERE id = :id");
			
			$stmt->bindParam(":id", $datosEstadoCaja, PDO::PARAM_INT);
			
			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	BORRAR CAJA
	=============================================*/

		static public function mdlBorrarCaja($tabla, $datos){

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























}

