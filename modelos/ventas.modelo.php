<?php

require_once "conexion.php";

class ModeloVentas{

	/*=============================================
	MOSTRAR VENTAS
	=============================================*/

		static public function mdlMostrarVentas($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY codigo ASC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetch();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY codigo ASC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR VENTAS DEL DIA
	=============================================*/



		static public function mdlMostrarVentasDia($tabla){

			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  ORDER BY codigo ASC");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
			
			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	MOSTRAR OPERACIONES DE CLIENTES
	=============================================*/

		static public function mdlMostrarOperaciones($tabla, $item, $valor){

			if($item != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha DESC");

				$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

				$stmt -> execute();

				return $stmt -> fetchAll();

			}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id ASC");

				$stmt -> execute();

				return $stmt -> fetchAll();

			}
			
			$stmt -> close();

			$stmt = null;

		}
	
	/*=============================================
	REGISTRO DE VENTA
	=============================================*/

		static public function mdlIngresarVenta($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo, factura, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :factura, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
			$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
			$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
			$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
			$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
			$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	REGISTRO DE VENTA DEL DIA
	=============================================*/

		static public function mdlIngresarVentaDia($tablaDia, $datosDia){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaDia(codigo, factura, id_cliente, id_vendedor, productos, impuesto, neto, total, metodo_pago) VALUES (:codigo, :factura, :id_cliente, :id_vendedor, :productos, :impuesto, :neto, :total, :metodo_pago)");

			$stmt->bindParam(":codigo", $datosDia["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":factura", $datosDia["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":id_cliente", $datosDia["id_cliente"], PDO::PARAM_INT);
			$stmt->bindParam(":id_vendedor", $datosDia["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":productos", $datosDia["productos"], PDO::PARAM_STR);
			$stmt->bindParam(":impuesto", $datosDia["impuesto"], PDO::PARAM_STR);
			$stmt->bindParam(":neto", $datosDia["neto"], PDO::PARAM_STR);
			$stmt->bindParam(":total", $datosDia["total"], PDO::PARAM_STR);
			$stmt->bindParam(":metodo_pago", $datosDia["metodo_pago"], PDO::PARAM_STR);
			

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	FACTURAR VENTA
	=============================================*/

		static public function mdlFacturarVenta($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_cliente, id_vendedor, total, metodo_pago) VALUES (:id_cliente, :id_vendedor, :total, :metodo_pago)");

			// $stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
			$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":total", $datos["total"], PDO::PARAM_INT);
			$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);
			// $stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
			// $stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
			// $stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
			// $stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
			// $stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	EDITAR VENTA
	=============================================*/

		static public function mdlEditarVenta($tabla, $datos){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_cliente = :id_cliente, factura = :factura, id_vendedor = :id_vendedor, productos = :productos, impuesto = :impuesto, neto = :neto, total= :total, metodo_pago = :metodo_pago WHERE codigo = :codigo");

			$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_INT);
			$stmt->bindParam(":id_cliente", $datos["id_cliente"], PDO::PARAM_INT);
			$stmt->bindParam(":factura", $datos["factura"], PDO::PARAM_STR);
			$stmt->bindParam(":id_vendedor", $datos["id_vendedor"], PDO::PARAM_INT);
			$stmt->bindParam(":productos", $datos["productos"], PDO::PARAM_STR);
			$stmt->bindParam(":impuesto", $datos["impuesto"], PDO::PARAM_STR);
			$stmt->bindParam(":neto", $datos["neto"], PDO::PARAM_STR);
			$stmt->bindParam(":total", $datos["total"], PDO::PARAM_STR);
			$stmt->bindParam(":metodo_pago", $datos["metodo_pago"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "ok";

			}else{

				return "error";
			
			}

			$stmt->close();
			$stmt = null;

		}

	/*=============================================
	ELIMINAR VENTA
	=============================================*/

		static public function mdlEliminarVenta($tabla, $datos){

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
	ELIMINAR VENTA DIA
	=============================================*/

		static public function mdlEliminarVentaDia($tablaDia){

			$stmt = Conexion::conectar()->prepare("TRUNCATE TABLE $tablaDia");
			
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

		static public function mdlRangoFechasVentas($tabla, $fechaInicial, $fechaFinal){

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
	SUMAR EL TOTAL DE VENTAS
	=============================================*/

		static public function mdlSumaTotalVentas($tabla){	

			$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;

		}

	/*=============================================
	SUMAR MONTO DE VENTAS EN EL DIA
	=============================================*/

		static public function mdlSumaTotalVentasDia($tabla){	

			

			$stmt = Conexion::conectar()->prepare("SELECT SUM(total) as total FROM $tabla ORDER BY codigo ASC");

			$stmt -> execute();

			return $stmt -> fetch();
					
			$stmt -> close();

			$stmt = null;

			
		}

	/*=============================================
	SUMAR CANTIDAD DE VENTAS EN EL DIA
	=============================================*/

		static public function mdlSumaCantidadVentasDia($tabla){	

			$stmt = Conexion::conectar()->prepare("SELECT count(total) as cantidad FROM $tabla ORDER BY codigo ASC");
		
			$stmt -> execute();

			return $stmt -> fetch();
			
			$stmt -> close();

			$stmt = null;

		}
	
}