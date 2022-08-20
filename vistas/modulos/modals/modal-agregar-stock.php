<!--=====================================
MODAL COMPRA STOCK
======================================-->

  <div id="modalNuevoStock" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" >

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Comprar Nuevo Stock</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">


              <!-- ENTRADA PARA LA DESCRIPCIÓN -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg" id="descripcionProducto" name="descripcionProducto" required readonly>
                  
                </div>

              </div>

              <!-- ENTRADA PARA EL CÓDIGO -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-lg" id="codigoProducto" name="codigoProducto" readonly required>

                </div>

              </div>

              <div class="form-group row">

                <div class="col-xs-6">

                  <!-- ENTRADA PARA STOCK -->
                  
                    <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoStockProducto" name="nuevoStockProducto" min="0" placeholder="Nuevo Stock" required>

                  </div>

                </div>

                <div class="col-xs-6">

                  <!-- ENTRADA DE FACTURA DE COMPRA -->
                  
                    <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevaFacturaStock" name="nuevaFacturaStock" min="0" placeholder="Factura de Compra" required>

                    <input type="hidden"  id="nuevoPrecioCompraStock" name="nuevoPrecioCompraStock">

                    <input type="hidden" name="idComprador" id="idComprador" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div>
                
              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>

          </div>

        </form>

          <?php

            $nuevoStock = new ControladorCompras();
            $nuevoStock -> ctrNuevoStock();

          ?>      

      </div>

    </div>

  </div>