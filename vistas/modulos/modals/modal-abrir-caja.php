<!--=====================================
MODAL ABRIR CAJA
======================================-->

  <div id="modalAbrirCaja" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Abrir Caja Diaria</h4>


          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-usd"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoMontoCaja" id="nuevoMontoCaja" placeholder="Nuevo Monto Caja" required >

                </div>

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar producto</button>

          </div>

        </form>

          <?php

            $abrirCaja = new ControladorCaja();
            $abrirCaja -> ctrAbrirCaja();

          ?>  

      </div>

    </div>

  </div>


