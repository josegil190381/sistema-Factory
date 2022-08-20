<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/camion.controlador.php";
require_once "controladores/notificaciones.controlador.php";
require_once "controladores/gastos.controlador.php";
require_once "controladores/permisos.controlador.php";
require_once "controladores/configuracion.controlador.php";
require_once "controladores/delivery.controlador.php";
require_once "controladores/caja.controlador.php";



require_once "modelos/usuarios.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/camion.modelo.php";
require_once "modelos/notificaciones.modelo.php";
require_once "modelos/gastos.modelo.php";
require_once "modelos/permisos.modelo.php";
require_once "modelos/configuracion.modelo.php";
require_once "modelos/delivery.modelo.php";
require_once "modelos/caja.modelo.php";


require_once "extensiones/vendor/autoload.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();