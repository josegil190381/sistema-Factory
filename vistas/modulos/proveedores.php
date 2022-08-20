

<!--=====================================
TABLA DE PROVEEDORES
======================================-->

  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        
        Administrar Proveedores Comerciales
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Proveedores</li>
      
      </ol>

    </section>

    <section class="content" >

      <div class="box" id="tablaProveedores">

        <div class="box-header with-border">
    
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">
            
            Agregar Proveedor

          </button>

        </div>

        <div class="box-body">
          
         <table class="table table-bordered table-striped dt-responsive tablasProveedor" width="100%">
           
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Cliente</th>
             <th>Contacto</th>
             <th>Cédula</th>
             <th>Email</th>
             <th>Teléfono</th>
             <th>Dirección</th>
             <th>Fecha de ingreso</th>
             <th>Acciones</th>

           </tr> 

          </thead>

          <tbody>

          <?php

            $item = null;
            $valor = null;

            $proveedor = ControladorProveedores::ctrMostrarProveedores($item, $valor);

            foreach ($proveedor as $key => $value) {

              

            
              echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["nombre"].'</td>

                      <td>'.$value["contacto"].'</td>

                      <td>'.$value["documento"].'</td>

                      <td>'.$value["email"].'</td>

                      <td>'.$value["telefono"].'</td>

                      <td>'.$value["direccion"].'</td>
                      
                      <td>'.$value["fecha"].'</td>

                      <td>

                         <div class="btn-group">';

                            if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

                           echo' <button class="btn btn-primary btnVerProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-search"></i></button>

                           <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                            }

                            if($_SESSION["perfil"] == 1){

                            echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                           }

                          echo '</div>  

                      </td>

                    </tr>';
            
              }

          ?>
     
          </tbody>

         </table>

        </div>

      </div>
      
    </section>

  </div>

<!--=====================================
MODAL AGREGAR PROVEEDOR
======================================-->

  <div id="modalAgregarProveedor" class="modal fade" role="dialog">
    
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

                  <input type="text" class="form-control input-lg" name="nuevoProveedor" placeholder="Nombre del Proveedor" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL NOMBRE CONTACTO -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoContacto" placeholder="Nombre del Contacto">

                </div>

              </div>

              <!-- ENTRADA PARA EL DOCUMENTO ID -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Cédula">

                </div>

              </div>

              <!-- ENTRADA PARA EL TELEFONO -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(9999) 999-999'" data-mask>

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

                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección">

                </div>

              </div>
               
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Proveedor</button>

          </div>

        </form>

        <?php

          $crearProveedor = new ControladorProveedores();
          $crearProveedor -> ctrCrearProveedores();

        ?>

      </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

  <div id="modalEditarProveedor" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar Proveedor</h4>

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

                  <input type="text" class="form-control input-lg" name="editarProveedor" id="editarProveedor" required>


                  <input type="hidden" id="idProveedor" name="idProveedor">

                </div>

              </div>

              <!-- ENTRADA PARA EL NOMBRE DEL CONTACTO-->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarContacto" id="editarContacto" required>
                  
                </div>

              </div>

              <!-- ENTRADA PARA EL DOCUMENTO ID -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="number" min="0" class="form-control input-lg" name="editarDocumentoId" id="editarDocumentoId" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL EMAIL -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                  <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail" required>

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

          $editarProveedor = new ControladorProveedores();
          $editarProveedor -> ctrEditarProveedores();

        ?>

      

      </div>

    </div>

  </div>



<?php

  $eliminarProveedor = new ControladorProveedores();
  $eliminarProveedor -> ctrEliminarProveedores();

?>


