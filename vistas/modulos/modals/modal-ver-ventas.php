<!--=====================================
MODAL VER VENTAS
======================================-->

  <div id="modalVerVentas" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog">
    
    <div class="modal-dialog modal-xl">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Ver Operaciones de:       con código: </h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                 
                <thead>
                 
                 <tr>
                                      
                   <th style="width:10px">#</th>
                   <th>Total</th>
                   <th>Fecha</th>
                   <th>Productos</th>
                   
                 </tr> 

                </thead>

                <tbody>

                  <?php 

                      $item = "id";
                      $valor = $_GET["idVenta"];

                      $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                  ?>
        
                </tbody>
                
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