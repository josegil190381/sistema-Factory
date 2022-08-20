<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	MOSTRAR PRODUCTOS
	=============================================*/

		static public function mdlMostrarProductos($tabla, $item, $valor, $orden){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1 ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}
	
	/*=============================================
	MOSTRAR TEMPORALES
	=============================================*/

		static public function mdlMostrarTemporal($tabla, $item, $valor, $orden){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1 ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR PRODUCTOS EN VENTAS
	=============================================*/

		static public function mdlMostrarProductosVentas($tabla, $item, $valor, $orden){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1 and vendible = 1 ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 and vendible = 1 ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR PRODUCTOS DE PROVEEDORES
	=============================================*/

		static public function mdlMostrarProductosProveedor($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1 ORDER BY id DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY $orden DESC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR STOCK PRODUCTOS
	=============================================*/

		static public function mdlMostrarStockProductos($tabla, $item, $valor){

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
	MOSTRAR PRODUCTOS CAMION
	=============================================*/

		static public function mdlMostrarProductosCamion($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item and estado = 1");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE estado = 1 ");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	REGISTRO DE PRODUCTO
	=============================================*/

		static public function mdlIngresarProducto($tabla, $datos){

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

	/*=============================================
	EDITAR PRODUCTO
	=============================================*/
		static public function mdlEditarProducto($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, id_proveedor = :id_proveedor, descripcion = :descripcion, imagen = :imagen, stock = :stock, precio_compra = :precio_compra, precio_venta = :precio_venta, fecha_vencimiento = :fecha_vencimiento, codigo_barras = :codigo_barras, factura = :factura WHERE codigo = :codigo");

			$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
			$stmt->bindParam(":id_proveedor", $datos["id_proveedor"], PDO::PARAM_INT);
			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$stmt->bindParam(":stock", $datos["stock"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_compra", $datos["precio_compra"], PDO::PARAM_STR);
			$stmt->bindParam(":precio_venta", $datos["precio_venta"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha_vencimiento", $datos["fecha_vencimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":codigo_barras", $datos["codigo_barras"], PDO::PARAM_INT);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	BORRAR PRODUCTO
	=============================================*/

		static public function mdlEliminarProducto($tabla, $datos){

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
	ACTUALIZAR PRODUCTO
	=============================================*/

		static public function mdlActualizarProducto($tabla, $item1, $valor1, $valor){

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
	ACTUALIZAR STOCK PRODUCTO EN COMPRA
	=============================================*/

		static public function mdlActualizarStockProducto($tabla, $item1, $valor1, $valor){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE codigo = :codigo");

			$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
			$stmt -> bindParam(":codigo", $valor, PDO::PARAM_STR);

			if($stmt -> execute()){

				return "ok";
			
			}else{

				return "error";	

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	

		static public function mdlMostrarSumaVentas($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;
		}

	/*=============================================
	AGREGAR FECHA VENCIMIENTO AL CALENDARIO
	=============================================*/

		static public function mdlCrearEvento($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(title, descripcion, start) VALUES (:title, :descripcion, :start)");

			$stmt->bindParam(":title", $datos["title"], PDO::PARAM_STR);
			$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$stmt->bindParam(":start", $datos["start"], PDO::PARAM_STR);
			
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	AGREGAR PESO
	=============================================*/

		static public function mdlAgregarPeso($tablaPeso, $s_desc, $s_simb, $s_tipo){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaPeso(descripcion, simbolo, tipo) VALUES (:descripcion, :simbolo, :tipo)");

			$stmt->bindParam(":descripcion", $s_desc, PDO::PARAM_STR);
			$stmt->bindParam(":simbolo", $s_simb, PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $s_tipo, PDO::PARAM_STR);
			
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	AGREGAR TALLA
	=============================================*/

		static public function mdlAgregarTalla($tablaTalla, $s_descTalla, $s_simbTalla, $s_tipoTalla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaTalla(descripcion, simbolo, tipo) VALUES (:descripcionTalla, :simboloTalla, :tipoTalla)");

			$stmt->bindParam(":descripcionTalla", $s_descTalla, PDO::PARAM_STR);
			$stmt->bindParam(":simboloTalla", $s_simbTalla, PDO::PARAM_STR);
			$stmt->bindParam(":tipoTalla", $s_tipoTalla, PDO::PARAM_STR);
			
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	AGREGAR COLOR
	=============================================*/

		static public function mdlAgregarColor($tablaColor, $s_descColor, $s_simbColor, $s_tipoColor){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaColor(descripcion, simbolo, tipo) VALUES (:descripcionColor, :simboloColor, :tipoColor)");

			$stmt->bindParam(":descripcionColor", $s_descColor, PDO::PARAM_STR);
			$stmt->bindParam(":simboloColor", $s_simbColor, PDO::PARAM_STR);
			$stmt->bindParam(":tipoColor", $s_tipoColor, PDO::PARAM_STR);
			
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	MOSTRAR CONFIG PRODUCTO
	=============================================*/

		static public function mdlMostrarConfigProducto($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	BORRAR CONFIG PRODUCTO
	=============================================*/

		static public function mdlBorrarConfigProducto($tabla, $datos){

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
	MOSTRAR TIPO CONFIG PRODUCTO
	=============================================*/

		static public function mdlMostrarTipoConfigProducto($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}

			$stmt -> close();

			$stmt = null;

		}





}