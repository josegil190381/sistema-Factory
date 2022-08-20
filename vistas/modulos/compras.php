<?php

if($_SESSION["perfil"] == 3){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

// $xml = ControladorVentas::ctrDescargarXML();

// if($xml){

//   rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

//   echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

// }

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Compras de Productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Compras Productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

            <?php 

              $ventas = ControladorVentas::ctrSumaTotalVentas();

              $gastos = ControladorGastos::ctrSumaTotalGastos();

              $totalCaja = $ventas["total"] - $gastos["total"];

            ?>

            <h2>Total Efectivo en Caja: <strong>Gs <?php echo number_format($totalCaja,0,",",".") ?></strong></h2>
                       

      </div>

    <!--=====================================
    TABLA DE COMPRAS
    ======================================-->

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablasCompra" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>No. Factura</th>
           <th>Producto</th>           
           <th>Precio Compra</th>
           <th>Cantidad</th>
           <th>Total</th> 
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

          <?php

            if(isset($_GET["fechaInicial"])){

              $fechaInicial = $_GET["fechaInicial"];
              $fechaFinal = $_GET["fechaFinal"];

            }else{

              $fechaInicial = null;
              $fechaFinal = null;

            }

            $respuesta = ControladorCompras::ctrRangoFechasCompras($fechaInicial, $fechaFinal);

            foreach ($respuesta as $key => $value) {
             
             echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["factura"].'</td>

                    <td>'.$value["productos"].'</td>
                    
                    <td>Gs '.$value["precio_compra"].'</td>

                    <td>'.$value["cantidad"].'</td>

                    <td>Gs '.number_format($value["total"],0,",",".").'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">

                        <!--<a class="btn btn-success" href="index.php?ruta=ventas&xml='.$value["codigo"].'">xml</a>-->
                          
                        <!--<button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'">

                          <i class="fa fa-print"></i>

                        </button>-->';

                        if($_SESSION["perfil"] == 1){

                        echo '<!--<button class="btn btn-warning btnEditarCompra" idCompra="'.$value["id"].'"><i class="fa fa-pencil"></i></button>-->

                        <button class="btn btn-danger btnEliminarCompra" codigo="'.$value["codigo"].'" idCompra="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
              }

          ?>
               
        </tbody>

        <tfoot>

          <tr>
         
             <th style="width:10px"></th>
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

       <?php

      $eliminarCompra = new ControladorCompras();
      $eliminarCompra -> ctrEliminarCompra();
      
      ?>
       

      </div>

    </div>

  </section>

</div>


  




