<?php

// if($_SESSION["perfil"] == "Especial"){

//   echo '<script>

//     window.location = "inicio";

//   </script>';

//   return;

// }

// $xml = ControladorVentas::ctrDescargarXML();

// if($xml){

//   rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

//   echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

// }

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Todas las ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Todas las ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="inicio">

          <button class="btn btn-warning">Inicio</button>

        </a>

        <a href="crear-venta">

          <?php

            $item = "id";
            $valor = 1;

            $caja = ControladorCaja::ctrMostrarEstadoCaja($item, $valor);

            if($caja["estado"] != 1){

              echo '<a href=""><button class="btn btn-primary hidden">Agregar venta</button></a>';
              
            }else{

              echo '<a href="crear-venta"><button class="btn btn-primary">Agregar venta</button></a>';

            }

          ?>

        </a>

         <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           
            <span>
              <i class="fa fa-calendar"></i> 

              <?php

                if(isset($_GET["fechaInicial"])){

                  echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
                
                }else{
                 
                  echo 'Rango de fecha';

                }

              ?>
            </span>

            <i class="fa fa-caret-down"></i>

         </button>


         <?php 

            $item = null;
            $valor = null;

            $respuesta = ControladorVentas::ctrSumaTotalVentas($item, $valor);


         ?>

         <h3 style="font-size: 30px;">Total de Ventas: <strong style="color: red; font-size: 40px;"><?php echo number_format($respuesta["total"],0,",",".") ?></strong> Gs</h3>
 
      </div>

      <div class="box-body">
 
       <table class="table table-bordered table-striped dt-responsive tablasVentasTotales" width="100%">
                 
          <thead>
           
           <tr>
                          
             <th style="width:10px">#</th>
             <th>Código Venta</th>
             <th>Factura / Ticket</th>
             <th>Cliente</th>
             <th>Vendedor</th>
             <th>Forma de pago</th>
             <th>Total</th> 
             <th>Fecha</th>
             <th>Acciones</th>
           
           </tr> 

          </thead>

          <tfoot>

            <tr>
           
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th> 
               <th></th>
               <th></th>

            </tr>
            
          </tfoot>
         
       </table>

       <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

      </div>

    </div>

  </section>

</div>

<?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>






