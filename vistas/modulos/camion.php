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
      
      <i class="fa fa-truck"></i> - Administrar Camión
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Camión</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box-header with-border">
    
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarga">
            
            Agregar nueva carga de Camión

          </button>

    </div>

  <!--=====================================
  TABLA DE OPERACIONES
  ======================================-->

    <div class="row">

      <div class="col-xs-12">
        
        <div class="box box-danger">

          <div class="box-body">

            <hr>
           
              <table class="table table-bordered table-striped dt-responsive tablaCargaCamion" width="100%">
                
                <thead>

                  <tr>
           
                     <th style="width:10px">#</th>
                     <th>Fecha de carga</th>
                     <th>Conductor</th>
                     <th>Producto</th>
                     <th>Catidad Total</th>
                     <th>Monto Total</th> 
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

                    $respuesta = ControladorCamion::ctrRangoFechasCamion($fechaInicial, $fechaFinal);

                    foreach ($respuesta as $key => $value) {
                     
                     echo '<tr>

                            <td>'.($key+1).'</td>

                            <td>'.$value["fecha"].'</td>

                            <td>'.$value["conductor"].'</td>

                            <td>'.$value["productos"].'</td>

                            <td>'.$value["cantidad"].'</td>';

                            /*=============================================
                            TRAEMOS EL PRECIO DEL PRODUCTO
                            =============================================*/ 

                            $item = "descripcion";
                            $valor = $value["productos"];

                            $productos = ControladorProductos::ctrMostrarProductosCamion($item, $valor);

                            $precioTotal = $productos["precio_venta"]*$value["cantidad"];

                            echo '<td>Gs '.number_format($precioTotal).'</td>

                            <td>

                              <div class="btn-group">';

                                

                                echo '<button class="btn btn-warning btnEditarCarga" idCarga="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCarga"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarCarga" idCarga="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                              

                              echo '</div>  

                            </td>

                          </tr>';
                      }

                  ?>
                  
                </tbody>
                                
              </table>

          </div>
          
        </div>

      </div>
      
    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR CARGA CAMION
======================================-->

  <div id="modalAgregarCarga" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar nueva carga de Camión</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE CONDUCTOR -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoConductor" id="nuevoConductor" placeholder="Nombre de Conductor" required>

                </div>

              </div>

              <!-- ENTRADA DEL PRODUCTO --> 

                  <div class="form-group">
                    
                    <div class="input-group">
                      
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                      
                      <select class="form-control input-lg" id="seleccionarProductoCamion" name="seleccionarProductoCamion" required>

                        <option value="">Seleccionar producto</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $producto = ControladorProductos::ctrMostrarProductosCamion($item, $valor);

                           foreach ($producto as $key => $value) {

                             echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].'</option>';

                           }

                        ?>

                      </select>
                      
                    </div>
                  
                  </div>

              

              <!-- ENTRADA PARA LA CANTIDAD DE PRODUCTO -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span> 

                  <input type="number" class="form-control input-lg" name="nuevaCantidad" id="nuevaCantidad" placeholder="Cantidad del Producto" required>

                </div>

              </div>
                
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar carga Camión</button>

          </div>

        </form>

        <?php

          $crearCarga = new ControladorCamion();
          $crearCarga -> ctrCrearCarga();

        ?>

      </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR CARGA CAMION
======================================-->

  <div id="modalEditarCarga" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar nueva carga de Camión</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE CONDUCTOR -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="editarConductor" id="editarConductor" required>
                  

                  <input type="hidden"  name="idCarga" id="idCarga" >

                </div>

              </div>

              <!-- ENTRADA DEL PRODUCTO --> 

                  <div class="form-group">
                    
                    <div class="input-group">
                      
                      <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>
                      
                      <select class="form-control input-lg" id="editarProductoCamion" name="editarProductoCamion" required>

                        <option value="">Seleccionar producto</option>

                        <?php

                          $item = null;
                          $valor = null;

                          $producto = ControladorProductos::ctrMostrarProductosCamion($item, $valor);

                           foreach ($producto as $key => $value) {

                             echo '<option value="'.$value["descripcion"].'">'.$value["descripcion"].'</option>';

                           }

                        ?>

                      </select>
                      
                    </div>
                  
                  </div>

              

              <!-- ENTRADA PARA LA CANTIDAD DE PRODUCTO -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span> 

                  <input type="number" class="form-control input-lg" name="editarCantidad" id="editarCantidad" required>

                </div>

              </div>
                
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar carga Camión</button>

          </div>

        </form>

        <?php

          $editarCarga = new ControladorCamion();
          $editarCarga -> ctrEditarCarga();

        ?>

      </div>

    </div>

  </div>

<?php

  $eliminarCamion = new ControladorCamion();
  $eliminarCamion -> ctrEliminarCarga();

?>




