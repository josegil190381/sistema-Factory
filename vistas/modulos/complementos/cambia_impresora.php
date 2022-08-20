<?php  
if ( !isset( $_POST["nombre"] ) ) exit();
// if ( !defined("RAIZ") ) define("RAIZ", dirname(__FILE__));
$resultado = file_put_contents("/impresora.ini", $_POST["nombre"]);
if ( $resultado !== FALSE ) echo json_encode(true);
?>