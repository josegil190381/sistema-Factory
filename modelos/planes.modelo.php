<?php 

require_once "conexion.php";

class ModeloPlanes{

	/*=============================================
	CREAR PLAN
	=============================================*/

		static public function mdlCrearPlan($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(plan, monto, tiempo, aportes) VALUES (:plan, :monto, :tiempo, :aportes)");

			$stmt->bindParam(":plan", $datos["plan"], PDO::PARAM_STR);
			$stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
			$stmt->bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
			$stmt->bindParam(":aportes", $datos["aportes"], PDO::PARAM_STR);
			
			if($stmt->execute()){

				return "ok";	

			}else{

				return "error";
			
			}

			$stmt->close();
			
			$stmt = null;

		}

	/*=============================================
	MOSTRAR PLANES
	=============================================*/

		static public function mdlMostrarPlanes($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item  and estado = 1");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where estado = 1");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	EDITAR PLAN
	=============================================*/

		static public function mdlEditarPlan($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET plan = :plan, monto = :monto, tiempo = :tiempo, aportes = :aportes WHERE id = :id");

			$stmt -> bindParam(":plan", $datos["plan"], PDO::PARAM_STR);
			$stmt -> bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
			$stmt -> bindParam(":tiempo", $datos["tiempo"], PDO::PARAM_STR);
			$stmt -> bindParam(":aportes", $datos["aportes"], PDO::PARAM_STR);
			$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}


	/*=============================================
	BORRAR PLAN
	=============================================*/

		static public function mdlBorrarPlan($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 0 WHERE id = :id");

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