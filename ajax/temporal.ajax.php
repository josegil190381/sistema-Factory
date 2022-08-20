
<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

require_once "../controladores/temporal.controlador.php";
require_once "../modelos/temporal.modelo.php";


class AjaxTemporal{


  // Clases

/*=============================================
TRAER PRODUCTOS CON EL LECTOR DE CODIGOS DE BARRAS
=============================================*/
  
  public $codigo;

  public function ajaxTraerProductosTemporal(){

    $item = "codigo_barras";
    $valor = $this->codigo;
    $orden = null;

    $respuesta = ControladorTemporal::ctrMostrarTemporal($item, $valor, $orden);

    echo json_encode($respuesta);

  }



}



// Ejecutar las Clases

/*=============================================
TRAER PRODUCTOS CON EL LECTOR DE CODIGOS DE BARRAS
=============================================*/ 

  if(isset($_POST["codigo"])){

    $traerProductos = new AjaxTemporal();
    $traerProductos -> codigo = $_POST["codigo"];
    $traerProductos -> ajaxTraerProductosTemporal();

  }






