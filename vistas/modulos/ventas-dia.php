<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
            
      
      Ventas de Hoy, <strong><?php echo date('d-m-Y'); ?></strong>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Ventas del Día</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <a href="inicio">

          <button class="btn btn-warning">Inicio</button>

        </a>
  
        <a href="crear-venta">

          <button class="btn btn-primary">
            
            Agregar venta

          </button>

        </a>

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

        <?php 

            
            $respuesta = ControladorVentas::ctrSumaTotalVentasDia();

            $cantidad = ControladorVentas::ctrSumaCantidadVentasDia();


         ?>

         <h3 style="font-size: 30px;">Monto Total de Ventas del Día: <strong style="color: red; font-size: 40px;"><?php echo number_format($respuesta["total"],0,",",".") ?></strong> Gs</h3>

         <h3 style="font-size: 30px;">Cantidad Total de Ventas del Día: <strong style="color: green; font-size: 40px;"><?php echo $cantidad["cantidad"] ?></strong></h3>

         <br>

         

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th hidden="" style="width:10px">#</th>
           <th hidden="">Código</th>
           <th>Factura</th>
           <th>Cliente</th>
           <th>Vendedor</th>
           <th>Forma de pago</th>
           <th>Total Vendidos</th>
           <th>Neto</th>
           <th>Total</th> 
           <th>Fecha</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          
          $respuesta = ControladorVentas::ctrMostrarVentasDia();

          foreach ($respuesta as $key => $value) {
           
           echo '<tr>

                  <td hidden>'.($key+1).'</td>

                  <td hidden>'.$value["codigo"].'</td>

                  <td>'.$value["factura"].'</td>';

                  $itemCliente = "id";
                  $valorCliente = $value["id_cliente"];

                  $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                  echo '<td>'.$respuestaCliente["nombre"].'</td>';

                  $itemUsuario = "id";
                  $valorUsuario = $value["id_vendedor"];

                  $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                  echo '<td>'.$respuestaUsuario["nombre"].'</td>

                  <td>'.$value["metodo_pago"].'</td>';

                  $listaProducto = json_decode($value["productos"],true);

                  $total = 0;

                  foreach ($listaProducto as $row => $data) {
                    
                      $total += $data["cantidad"];
 
                  }

                 // echo "<pre>";  print_r($listaProducto); echo "</pre>";  

                  echo '<td>'.$total.'</td>

                  <td>Gs. '.number_format($value["neto"],0,",",".").'</td>

                  <td>Gs. '.number_format($value["total"],0,",",".").'</td>

                  <td>'.date_format(new DateTime($value["fecha"]), 'd-m-Y').'</td>

                  <td>

                    <div class="btn-group">';

                      if($_SESSION["perfil"] == "1"){

                      echo '<button class="btn btn-info btn-sm btnImprimirFactura" idVenta="'.$value["id"].'"><i class="fa fa-print"></i></button>

                            <button class="btn btn-success btn-sm btnVerVenta" idVenta="'.$value["id"].'"><i class="fa fa-eye"></i></button>

                            <button class="btn btn-warning btn-sm btnEditarVenta" idVenta="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                            <button class="btn btn-danger btn-sm btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                    }

                    echo '</div>  

                  </td>

                </tr>';
            }

        ?>
               
        </tbody>

       </table>

       <?php

      $eliminarVenta = new ControladorVentas();
      $eliminarVenta -> ctrEliminarVenta();

      ?>
       

      </div>

    </div>

  </section>

</div>




