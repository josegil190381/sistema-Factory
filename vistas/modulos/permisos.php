<?php

if($_SESSION["perfil"] != 1){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Permisos del Sistema
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Permisos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          
          Agregar Nuevo Permiso

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre</th>
           

         </tr> 

        </thead>

        <tbody>

        <?php

        
        $permisos = ControladorPermisos::ctrMostrarPermisos();

       foreach ($permisos as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["nombre"].'</td>
                  
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarPermiso"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarPermiso"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>

                </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

    <a href="usuarios" class="btn btn-warning">Atras</a>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

  <div id="modalAgregarUsuario" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar usuario</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              
              
              <div class="form-group row">

                <!-- ENTRADA PARA EL NOMBRE -->

                <div class="col-xs-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

                  </div>

                </div>

                <!-- ENTRADA PARA EL USUARIO -->

                <div class="col-xs-6">

                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

                  </div>

                </div>

              </div>

              


              <!-- ENTRADA PARA LA CONTRASE??A -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contrase??a" required>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <select class="form-control input-lg" name="nuevoPerfil">
                    
                    <option value="">Selecionar perfil</option>

                    <option value="Administrador">Administrador</option>

                    <option value="Especial">Especial</option>

                    <option value="Vendedor">Vendedor</option>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

               <div class="form-group">
                
                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" name="nuevaFoto">

                <p class="help-block">Peso m??ximo de la foto 2MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar usuario</button>

          </div>

          <?php

            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();

          ?>

        </form>

      </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

  <div id="modalEditarUsuario" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar usuario</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL USUARIO -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

                </div>

              </div>

              <!-- ENTRADA PARA LA CONTRASE??A -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contrase??a">

                  <input type="hidden" id="passwordActual" name="passwordActual">

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                  <select class="form-control input-lg" name="editarPerfil">
                    
                    <option value="" id="editarPerfil"></option>

                    <option value="Administrador">Administrador</option>

                    <option value="Especial">Especial</option>

                    <option value="Vendedor">Vendedor</option>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

               <div class="form-group">
                
                <div class="panel">SUBIR FOTO</div>

                <input type="file" class="nuevaFoto" name="editarFoto">

                <p class="help-block">Peso m??ximo de la foto 2MB</p>

                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

                <input type="hidden" name="fotoActual" id="fotoActual">

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Modificar usuario</button>

          </div>

       <?php

            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();

          ?> 

        </form>

      </div>

    </div>

  </div>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 


