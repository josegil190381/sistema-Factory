

<!--=====================================
TABLA DE CLIENTES
======================================-->

  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        
        Administrar Clientes
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Clientes</li>
      
      </ol>

    </section>

    <section class="content">

      <div class="box">

        <div class="box-header with-border">

          <a href="inicio">

            <button class="btn btn-warning">Inicio</button>

          </a>
    
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
            
            Agregar Cliente

          </button>

        </div>

        <div class="box-body">
          
         <table class="table table-bordered table-striped dt-responsive tablasCliente" width="100%">
           
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Cliente</th>
             
             <th>Documento / RUC</th>
             <th>Teléfono</th>
             <th>Dirección</th>
             <th>Compras</th>
             <th>Última Compra</th>
             <th>Fecha de ingreso</th>
             <th>Acciones</th>

           </tr> 

          </thead>

         </table>

        </div>

      </div>

    </section>

  </div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

  <div id="modalAgregarCliente" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Nuevo Cliente</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE CLIENTE -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Nombre de Cliente" required>

                </div>

              </div>

              
              <!-- ENTRADA PARA EL DOCUMENTO ID -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Cédula" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL TELÉFONO -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(9999) 999-999'" data-mask >

                </div>

              </div>

              
              <!-- ENTRADA PARA EL EMAIL -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Correo">

                </div>

              </div>

              

              <!-- ENTRADA PARA LA DIRECCIÓN -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" >

                </div>

              </div>
               
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cliente</button>

          </div>

        </form>

        <?php

          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearCliente();

        ?>

      </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR CLIENTE
======================================-->

  <div id="modalEditarCliente" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title" >Editar cliente:  <strong><span id="tituloCliente"></span></strong></h4>            

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE DEL CLIENTE-->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarCliente" id="editarCliente" required>


                  <input type="hidden" id="idCliente" name="idCliente">

                </div>

              </div>
              

              <!-- ENTRADA PARA EL DOCUMENTO ID -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL EMAIL -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                  <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" >

                </div>

              </div>

              <!-- ENTRADA PARA EL TELÉFONO -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

                </div>

              </div>

              <!-- ENTRADA PARA LA DIRECCIÓN -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  required>

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

          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();

        ?>

      

      </div>

    </div>

  </div>


<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>


