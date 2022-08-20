<?php 

require_once "conexion.php";

class ModeloCompras{

	/*=============================================
	MOSTRAR COMPRAS
	=============================================*/

		static public function mdlMostrarCompras($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item WHERE estado = 1 ORDER BY fecha DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY fecha DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR COMPRAS OTROS
	=============================================*/

		static public function mdlMostrarComprasOtros($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  ORDER BY fecha DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	CREAR COMPRA
	=============================================*/

		static public function mdlCrearCompra($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_comprador, factura, codigo, productos, precio_compra, cantidad, total) VALUES (:id_comprador, :factura, :codigo, :productos, :precio_compra, :cantidad, :total)");

			$stmt->bindParam(":id_comprador", $datos["id_comprador"], PDO::PARAM_INT);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
			$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
			$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	CREAR COMPRA OTROS
	=============================================*/

		static public function mdlCrearCompraOtros($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_usuario, nombre, factura, monto, detalle) VALUES (:id_usuario, :nombre, :factura, :monto, :detalle)");

			$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
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
	RANGO FECHAS
	=============================================*/	

		static public function mdlRangoFechasCompras($tabla, $fechaInicial, $fechaFinal){

			if($fechaInicial == null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY fecha DESC");

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

	/*=============================================
	ELIMINAR COMPRA
	=============================================*/

		static public function mdlEliminarCompra($tabla, $datos){

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