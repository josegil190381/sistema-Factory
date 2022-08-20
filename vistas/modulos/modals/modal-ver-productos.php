<!--=====================================
MODAL VER VENTAS
======================================-->

  <div id="modalVerProductos" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
    
    <div class="modal-dialog modal-xl">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <?php 

              $item = "id";
              $valor = $_GET["idDelivery"];

              $delivery = ControladorCamion::ctrMostrarDelivery($item, $valor);

              print_r($_GET);

          ?>

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Ver Operaciones de:       con código: </h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Producto</th>
                          

           </tr> 

          </thead>

          <tbody>

           <?php

                $listaProducto = json_decode($delivery["productos"], true);

                           
                foreach ($listaProducto as $key => $value) {

                  $item = "id";
                  $valor = $value["id"];
                  $orden = "id";

                  $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
                
                   echo'<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["descripcion"].'</td>

                          <td>'.$value["cantidad"].'</td>

                          <td>'.number_format($value["precio"],0,",",".").'</td>

                          <td>'.number_format($value["total"],0,",",".").'</td>
                        
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
             

           </tr> 


          </tfoot>

       </table>
 
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <!-- <button type="submit" class="btn btn-primary">Guardar cliente</button> -->

          </div>

        </form>

        <?php

          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente();

        ?>

      </div>

    </div>

  </div>