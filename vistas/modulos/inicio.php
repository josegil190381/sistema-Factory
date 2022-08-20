<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">
      
    <?php

    if($_SESSION["perfil"] == 1  || $_SESSION["perfil"] ==  2 ){

      include "inicio/cajas-superiores.php";

    }

    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){
          
           include "reportes/grafico-ventas.php";

          }

          ?>

        </div>

        <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){
          
           include "reportes/stock-productos.php";

          }

          ?>

        </div>

        <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){
          
           include "reportes/productos-mas-vendidos.php";

         }

          ?>

        </div>

         <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){
          
           include "inicio/productos-recientes.php";

         }

          ?>

        </div>

         <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] == 3){

             // echo '<div class="box box-success">

             // <div class="box-header">

             // <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             // </div>

             // </div>';

            include "inicio2.php";

          }

          ?>

         </div>

     </div>

  </section>
 
</div>
