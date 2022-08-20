<?php 

require_once "conexion.php";

class ModeloTemporal{

	/*=============================================
	MOSTRAR TEMPORALES
	=============================================*/

		static public function mdlMostrarTemporal($tabla, $item, $valor, $orden){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	AGREGAR TEMPORAL
	=============================================*/

		static public function mdlAgregarTemporal($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_categoria, id_proveedor, codigo, factura, descripcion, imagen, stock, precio_compra, precio_venta, fecha_vencimiento, stock_inicial, codigo_barras) VALUES (:id_categoria, :id_proveedor, :codigo, :factura, :descripcion, :imagen, :stock, :precio_compra, :precio_venta, :fecha_vencimiento, :stock_inicial, :codigo_barras)");

			$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
			$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":stock_inicial", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo_barras", $datos["codigo_barras"], PDO::PARAM_INT);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}










}