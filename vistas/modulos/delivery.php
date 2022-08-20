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
      
      <i class="fa fa-bicycle"></i> - Administrar Delivery
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Delivery</li>
    
    </ol>

  </section>

  <section class="content">

    
  <!--=====================================
  TABLA DE OPERACIONES
  ======================================-->

    <div class="row">

      <div class="col-xs-12">
        
        <div class="box box-danger">

          <div class="box-body">

            <hr>
           
              <table class="table table-bordered table-striped dt-responsive tablaDelivery" width="100%">
                
                <thead>

                  <tr>
           
                     <th style="width:10px">#</th>
                     <th>Fecha de Delivery</th>
                     <th>Conductor</th>
                     <th>Productos</th>
                     <th>Monto Total</th>
                     <th>Estado</th> 
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

                    $respuesta = ControladorDelivery::ctrRangoFechasDelivery($fechaInicial, $fechaFinal);

                    foreach ($respuesta as $key => $value) {
                     
                     echo '<tr>

                            <td>'.($key+1).'</td>

                            <td>'.$value["fecha"].'</td>

                            <td>'.$value["conductor"].'</td>
                          
                            <td><button class="btn btn-info btn-xs btnVerProductos" data-toggle="modal" data-target="#modalVerProductos" idDelivery="'.$value["id"].'">Ver Productos</button></td>

                            <td>Gs '.number_format($value["total"]).'</td>';

                            if($value["estado"] == 1){

                            echo '<td><button class="btn btn-success btn-xs btnActivar" idDelivery="'.$value["id"].'" estadoDelivery="1">Entregado</button></td>';

                          }else{

                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idDelivery="'.$value["id"].'" estadoDelivery="2">Pendiente</button></td>';

                          }    

                            echo '<td>

                                 <div class="btn-group">

                                 <button class="btn btn-warning btnEditarDelivery" idDelivery="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarDelivery"><i class="fa fa-pencil"></i></button>

                                <button class="btn btn-danger btnEliminarDelivery" idDelivery="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                              

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
MODAL EDITAR EDITAR DELIVERY
======================================-->

  <div id="modalEditarDelivery" class="modal fade" role="dialog">
    
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

                  <input type="text" class="form-control input-lg" name="editarConductor" id="editarConductor" >
                  
                  <input type="hidden"  name="idDelivery" id="idDelivery" >

                </div>

              </div>

              

              <!-- ENTRADA PARA EL TOTAL -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-sort-amount-asc"></i></span> 

                  <input type="number" class="form-control input-lg" name="editarTotal" id="editarTotal" >

                </div>

              </div>
                
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar delivery</button>

          </div>

        </form>

        <?php

          $editarDelivery = new ControladorDelivery();
          $editarDelivery -> ctrEditarDelivery();

        ?>

      </div>

    </div>

  </div>



<?php

  $eliminarDelivery = new ControladorDelivery();
  $eliminarDelivery -> ctrEliminarDelivery();

?>





