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
      
      Administrar Compras Varias
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Compras Varias</li>
    
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

            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCompra">
              
              Agregar Operación de Compra

            </button>
      
            

      </div>

    <!--=====================================
    TABLA DE COMPRAS
    ======================================-->

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablasCompraOtros" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>Factura</th>
           <th>Monto</th>
           <th>Detalle</th>
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

          <?php
            
            $item = null;
            $valor = null;

            $respuesta = ControladorCompras::ctrMostrarComprasOtros($item, $valor);

            foreach ($respuesta as $key => $value) {
             
             echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["nombre"].'</td>

                    <td>'.$value["factura"].'</td>

                    <td>Gs '.number_format($value["monto"],0,",",".").'</td>

                    <td>'.$value["detalle"].'</td>

                    <td>'.$value["fecha"].'</td>

                    <td>

                      <div class="btn-group">';

                        if($_SESSION["perfil"] == 1){

                        echo '<button class="btn btn-warning btnEditarCompra" idCompraOtros="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCompra" idCompraOtros="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                      }

                      echo '</div>  

                    </td>

                  </tr>';
              }

          ?>
               
        </tbody>

        

       </table>

       <?php

      // $eliminarCompra = new ControladorCompras();
      // $eliminarCompra -> ctrEliminarCompraOtros();
      
      ?>
       

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR NUEVA COMPRA
======================================-->

   <div id="modalAgregarCompra" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" class="agregarCompra">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Nueva Operación de Compra</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre quien hace la Compra" required>

                  <input type="hidden" name="idUsuario" value="<?php echo $_SESSION["id"] ?>">

                </div>

              </div>

              
              <!-- ENTRADA PARA LA FACTURA -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-file-text"></i></span> 

                  <input type="text" class="form-control input-lg" name="factura" placeholder="Factura" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL MONTO -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span> 

                  <input type="text" class="form-control input-lg" name="monto"  placeholder="Monto" required>
               
                </div>
                                
              </div>
             

              <!-- ENTRADA PARA EL DETALLE -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                  <textarea class="form-control" name="detalle" rows="3" placeholder="Ingresar Detalle de Compra" style="width: 100%" required></textarea>

                </div>

              </div>
               
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Compra</button>

          </div>

        </form>

        <?php

          $crearGastos = new ControladorCompras();
          $crearGastos -> ctrNuevaCompraOtros();

        ?>

      </div>

    </div>

  </div>




