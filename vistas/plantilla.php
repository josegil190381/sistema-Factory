<?php 

  session_start();

  // if (!defined("RAIZ")) define("RAIZ", dirname(__FILE__));

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>F.A.C.T.O.R.Y - Sistema</title>
  <!-- Tell the browser to be responsive to screen width -->
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <link rel="icon" type="text/css" href="vistas/img/plantilla/icono-factory.png">


  <!--=====================================
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Other Css -->
  <link rel="stylesheet" href="vistas/css/other.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net/css/buttons.dataTables.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="vistas/bower_components/select2/dist/css/select2.min.css">

  <!-- fullCalendar -->
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- ClockPicker -->
  <link rel="stylesheet" href="vistas/plugins/clockpicker/dist/bootstrap-clockpicker.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

  <!-- Toast CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <!-- Calculadora CSS -->
  <!-- <link rel="stylesheet" href="vistas/css/calculadora.css"> -->







  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
  <script src="vistas/bower_components/datatables.net/js/buttons.colVis.min.js"></script>
  
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/Chart.js/Chart.js"></script>

    <!-- Select2 -->
  <script src="vistas/bower_components/select2/dist/js/select2.full.min.js"></script>

  <!-- fullCalendar -->
  <script src="vistas/bower_components/moment/moment.js"></script>
  <script src="vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
  <script src="vistas/bower_components/fullcalendar/dist/locale/es.js"></script>

  <!-- ClockPicker -->
  <script src="vistas/plugins/clockpicker/dist/bootstrap-clockpicker.js"></script>

  <!-- bootstrap datepicker -->
  <script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- Toast -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    
</head>


  <!--=====================================
  =            CUERPO DEL DOCUMENTO      =
  ======================================-->

<body class="hold-transition skin-black sidebar-collapse login-page">

  <?php 

    if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

      echo '<div class="wrapper">';

        /*=============================================
        =            CABEZOTE            =
        =============================================*/
        
        include "modulos/cabezote.php";

        /*=============================================
        =            MENU            =
        =============================================*/

        if ($_SESSION["perfil"] == 1) {
          
          include "modulos/menu.php";

        }


        /*=============================================
        =            CONTENIDO            =
        =============================================*/

        if (isset($_GET["ruta"])) {
          
          if($_GET["ruta"] == "inicio" ||
             $_GET["ruta"] == "usuarios" ||
             $_GET["ruta"] == "proveedores" ||
             $_GET["ruta"] == "operaciones-proveedor" ||
             $_GET["ruta"] == "categorias" ||
             $_GET["ruta"] == "productos" ||
             $_GET["ruta"] == "config-productos" ||
             $_GET["ruta"] == "clientes" ||
             $_GET["ruta"] == "ventas" ||
             $_GET["ruta"] == "ventas-dia" ||
             $_GET["ruta"] == "compras" ||
             $_GET["ruta"] == "compras-otros" ||
             $_GET["ruta"] == "camion" ||
             $_GET["ruta"] == "crear-venta" ||
             $_GET["ruta"] == "editar-venta" ||
             $_GET["ruta"] == "operaciones" ||
             $_GET["ruta"] == "reportes-ventas" ||
             $_GET["ruta"] == "reportes-compras" ||
             $_GET["ruta"] == "calendario" ||
             $_GET["ruta"] == "eventos" ||
             $_GET["ruta"] == "gastos" ||
             $_GET["ruta"] == "permisos" ||
             $_GET["ruta"] == "ver-ventas" ||
             $_GET["ruta"] == "delivery" ||
             $_GET["ruta"] == "configuracion" ||
             $_GET["ruta"] == "inicio2" ||
             $_GET["ruta"] == "caja" ||
             $_GET["ruta"] == "salir"){

            include "modulos/".$_GET["ruta"].".php";

          }else{

            include "modulos/404.php";
          }

        }else{

          include "modulos/inicio.php";
        }

       
        /*=============================================
        =            FOOTER            =
        =============================================*/

        include "modulos/footer.php";

        echo '</div>';

     }else{

      include "modulos/login.php";

     }

  ?>
  
</div>
<!-- ./wrapper -->

<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/caja.js"></script>
<script src="vistas/js/proveedores.js"></script>
<script src="vistas/js/categorias.js"></script>
<script src="vistas/js/productos.js"></script>
<script src="vistas/js/compras.js"></script>
<script src="vistas/js/camion.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/clientes.js"></script>
<script src="vistas/js/operaciones.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/calendario.js"></script>
<script src="vistas/js/gestorNotificaciones.js"></script>
<script src="vistas/js/gastos.js"></script>
<script src="vistas/js/delivery.js"></script>
<script src="vistas/js/calculadora.js"></script>






</body>
</html>
