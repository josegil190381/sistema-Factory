<?php

  if($_SESSION["perfil"] == 3){

    echo '<script>

      window.location = "inicio";

    </script>';

    return;

  }

?>


<!--=====================================
CABECERA PAGINA
======================================-->

  <div class="content-wrapper">

    <section class="content-header">
      
      <h1>
        
        Administrar Gastos de la Empresa
      
      </h1>

      <ol class="breadcrumb">
        
        <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
        
        <li class="active">Administrar Gastos</li>
      
      </ol>

    </section>

    <section class="content">

      <!--=====================================
      TABLA GASTOS
      ======================================-->

        <div class="box">

          <div class="box-header with-border">

            <a href="inicio">

              <button class="btn btn-warning">Inicio</button>

            </a>

            <?php 

              $ventas = ControladorVentas::ctrSumaTotalVentas();

              $gastos = ControladorGastos::ctrSumaTotalGastos();

              $totalCaja = $ventas["total"] - $gastos["total"];

            ?>

            <h2>Total Efectivo en Caja: <strong>Gs <?php echo number_format($totalCaja,0,",",".") ?></strong></h2>
      
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGasto">
              
              Agregar Operación de Gasto

            </button>

          </div>

          <div class="box-body">
            
           <table class="table table-bordered table-striped dt-responsive tablasGastos" width="100%">
             
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Nombre</th>
               <th>Factura</th>
               <th>Detalle</th>
               <th>Monto</th>
               <th>Fecha</th>
               <th>Acciones</th>

             </tr> 

            </thead>

            <tbody>

              <?php

                $item = null;
                $valor = null;

                $clientes = ControladorGastos::ctrMostrarGastos($item, $valor);

                foreach ($clientes as $key => $value) {

                  

                
                  echo '<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["nombre"].'</td>

                          <td>'.$value["factura"].'</td>

                          <td>'.$value["detalle"].'</td>

                          <td>Gs '.number_format($value["monto"],0,",",".").'</td>

                          <td>'.$value["fecha"].'</td>

                          
                          <td>

                             <div class="btn-group">';

                                if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

                               echo' <button class="btn btn-warning btnEditarGasto" data-toggle="modal" data-target="#modalEditarGasto" idGasto="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                                }

                                if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

                                echo '<button class="btn btn-danger btnEliminarGasto" idCompra="'.$value["id_compra"].'" codigo="'.$value["codigo"].'" idGasto="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                               }

                              echo '</div>  

                          </td>

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
                 <th></th>
                 <th></th> 
                 
              </tr>
                
            </tfoot>

           </table>

          </div>

        </div>

      <!--=====================================
      GRAFICOS GASTOS
      ======================================-->

        <div class="box">

          <!-- <div class="box-header with-border">

            <div class="input-group">

              <button type="button" class="btn btn-default" id="daterange-btn4">
               
                <span>

                  <i class="fa fa-calendar"></i> 

                  <?php

                    if(isset($_GET["fechaInicial"])){

                      echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];
                    
                    }else{
                     
                      echo 'Rango de fecha';

                    }

                  ?>

                </span>

                <i class="fa fa-caret-down"></i>

              </button>

            </div>

            <div class="box-tools pull-right">

              <?php

              if(isset($_GET["fechaInicial"])){

                echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte&fechaInicial='.$_GET["fechaInicial"].'&fechaFinal='.$_GET["fechaFinal"].'">';

              }else{

                 echo '<a href="vistas/modulos/descargar-reporte.php?reporte=reporte">';

              }         

              ?>
               
               <button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

              </a>

            </div>
             
          </div> -->

          <div class="box-body">
            
            <div class="row">

              <div class="col-xs-12">
                
                <?php

                include "reportes/grafico-gastos.php";

                ?>

              </div>

            </div>

          </div>
          
        </div>

    </section>

  </div>

  

<!--=====================================
MODAL AGREGAR GASTO
======================================-->

  <div id="modalAgregarGasto" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" class="agregarGasto">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Nueva Operación de Gasto</h4>

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

                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Nombre quien hace el Gasto" required>

                </div>

              </div>

              
              <!-- ENTRADA PARA LA FACTURA -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-file-text"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevaFactura" placeholder="Factura" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL MONTO -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span> 

                  <input type="text" class="form-control input-lg nuevoMonto" name="nuevoMonto" id="nuevoMonto" placeholder="Monto" efectivo="<?php echo $totalCaja ?>" required>

                  <input type="hidden" id="totalEfectivo" name="totalEfectivo" value="<?php echo $totalCaja ?>" >

                </div>
                                
              </div>
             

              <!-- ENTRADA PARA EL DETALLE -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-file"></i></span> 

                  <textarea class="form-control" id="nuevoDetalle" name="nuevoDetalle" rows="3" placeholder="Ingresar Detalle" style="width: 100%" required></textarea>

                </div>

              </div>
               
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar Operación</button>

          </div>

        </form>

        <?php

          $crearGastos = new ControladorGastos();
          $crearGastos -> ctrCrearGastos();

        ?>

      </div>

    </div>

  </div>

<!--=====================================
MODAL EDITAR GASTO
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

            <h4 class="modal-title">Editar cliente</h4>

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

          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();

        ?>

      

      </div>

    </div>

  </div>


<?php

  $eliminarGasto = new ControladorGastos();
  $eliminarGasto -> ctrEliminarGastos();

?>




