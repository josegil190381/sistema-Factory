
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Caja
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Caja</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <a href="inicio"><button class="btn btn-warning">Inicio</button></a>

        <a data-toggle="modal" href="#modalAbrirCaja" class="btn btn-primary">Abrir Nueva Caja</a>

        <?php

          $item = "id";
          $valor = 1;

          $caja = ControladorCaja::ctrMostrarEstadoCaja($item, $valor);

          if($caja["estado"] != 1){

            echo '<a href=""><button class="btn btn-primary hidden">Agregar venta</button></a>';
            
          }else{

            echo '<a href="crear-venta"><button class="btn btn-primary">Agregar venta</button></a>';

          }

        ?>
        
        <br>
        <br>

        <p>Nota: abrir caja antes de comenzar las ventas</p>


        
        <!-- <button type="button" class="btn btn-default pull-right" id="daterange-btn">
           
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

        </button> -->
         
      </div>

      <div class="box-body">
 
       <table class="table table-bordered table-striped dt-responsive tablaCaja" width="100%">
                 
          <thead>
           
           <tr>
                          
             <th style="width:10px" hidden>#</th>
             <th>Fecha Apertura</th>
             <th>Monto Apertura</th>
             <th>Fecha Cierre</th>
             <th>Monto Cierre</th>
             <th>Total de Ventas</th>
             <th>Monto de Ventas</th>
             <th>Estado</th>
             <th>Acciones</th>
           
           </tr> 

          </thead>

          <?php

        $item = null;
        $valor = null;
        $orden = "id";

        $caja = ControladorCaja::ctrMostrarCaja($item, $valor, $orden);

        foreach ($caja as $key => $value){
         
          echo ' <tr>
                  <td hidden>'.($key+1).'</td>
                  <td>'.date_format(new DateTime($value["fecha_apertura"]), 'd-m-Y H:m:s').'</td>
                  <td>Gs. '.number_format($value["monto_apertura"],0,",",".").'</td>';

                  if($value["estado"] == 2 ){

                    echo '<td>'.date_format(new DateTime($value["fecha_cierre"]), 'd-m-Y H:m:s').'</td>';
                  
                  }else{


                    echo '<td><strong style="color: red;">(Caja Abierta)</strong></td>';

                  }

                  echo '<td>Gs. '.number_format($value["monto_cierre"],0,",",".").'</td>
                  <td>'.$value["ventas_totales"].'</td>
                  <td>Gs. '.number_format($value["monto_ventas"],0,",",".").'</td>';


                  if($value["estado"] == 1){

                    echo '<td><button class="btn btn-success btn-xs">Abierta</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs">Cerrada</button></td>';

                  }

                  if ($value["estado"] == 1) {
                    
                    echo '<td>

                            <div class="btn-group">                        
                              
                              <button class="btn btn-danger btnCerrarCaja" idCaja="'.$value["id"].'" data-toggle="modal" href="#modalCerrarCaja">Cerrar Caja</button>

                            </div>  

                          </td>

                        </tr>';

                  }

                  
        }


        ?>
                   
       </table>
       
      </div>

    </div>

  </section>

</div>

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

                  <input type="number" class="form-control input-lg" name="nuevoMontoApertura" id="nuevoMontoApertura" placeholder="Monto Apertura de Caja" required >

                </div>

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Abrir Caja</button>

          </div>

        </form>

          <?php

            $abrirCaja = new ControladorCaja();
            $abrirCaja -> ctrAbrirCaja();

          ?>  

      </div>

    </div>

  </div>

<!--=====================================
MODAL CERRAR CAJA
======================================-->

  <div id="modalCerrarCaja" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#D73925; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Cerrar Caja Diaria</h4>


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

                  <input type="number" class="form-control input-lg" name="nuevoMontoCierre" id="nuevoMontoCierre" placeholder="Monto Cierre de Caja" required >

                  <input type="number" id="idCaja" name="idCaja" hidden>
                  <input type="number" id="montoCaja" hidden>

                </div>

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Cerrar Caja</button>

          </div>

        </form>

          <?php

            $cerrarCaja = new ControladorCaja();
            $cerrarCaja -> ctrCerrarCaja();

          ?>  

      </div>

    </div>

  </div>




<?php

  $borrarCaja = new ControladorCaja();
  $borrarCaja -> ctrBorrarCaja();

?> 








