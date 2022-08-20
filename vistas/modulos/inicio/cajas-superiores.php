<?php

  $item = null;
  $valor = null;
  $orden = "id";

  $ventas = ControladorVentas::ctrSumaTotalVentas();

  $gastos = ControladorGastos::ctrSumaTotalGastos();

  $caja = ControladorCaja::ctrMostrarCaja($item, $valor, $orden);

  $totalCaja = $ventas["total"] - $gastos["total"];

  $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
  $totalCategorias = count($categorias);

  $clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
  $totalClientes = count($clientes);

  $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
  $totalProductos = count($productos);

  $ultimaCaja = ControladorCaja::ctrMostrarUltimaCaja($item, $valor);

  if ($ultimaCaja[0]["monto_cierre"] != 1) {
    
    $efectivoCaja = $ultimaCaja[0]["monto_apertura"];

  }else{

    $efectivoCaja = $ultimaCaja[0]["monto_cierre"];

  }

      

?>

<!--=====================================
= FILA 1            =
======================================-->

  <div class="row col-xs-12">


    <!-- Total de ventas -->
    
      <div class="col-lg-4 col-xs-12" >

        <div class="small-box bg-aqua" onclick="location.href='ventas';" style="cursor: pointer;">
          
          <div class="inner">
            
            <h3>Gs. <?php echo number_format($ventas["total"],0,",","."); ?></h3>

            <p>Total de Ventas</p>
          
          </div>
          
          <div class="icon">
            
            <i class="ion ion-social-usd"></i>
          
          </div>
          
          <a href="ventas" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

    <!-- Efectivo en caja -->
    
      <div class="col-lg-4 col-xs-12" >

        <div class="small-box bg-blue" onclick="location.href='caja';" style="cursor: pointer;">
          
          <div class="inner">

            <?php 

              if ($totalCaja > 0) {

                echo' <h3>Gs. '.number_format($efectivoCaja,0,",",".").'</h3>';
                
              }else{

                echo' <h3 style="color: red;">Gs. '.number_format($totalCaja,0,",",".").'</h3>';

              }

            ?>

            <p>Efectivo en Caja</p>
          
          </div>
          
          <div class="icon">
            
            <i class="ion ion-social-usd"></i>
          
          </div>
          
          <a href="ventas" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

    <!-- Gastos -->
    
      <div class="col-lg-4 col-xs-12" >

        <div class="small-box bg-orange" onclick="location.href='gastos';" style="cursor: pointer;">
          
          <div class="inner">

            <h3>Gs. <?php echo number_format($gastos["total"],0,",","."); ?></h3>

            <p>Total de Gastos</p>
          
          </div>
          
          <div class="icon">
            
            <i class="ion ion-social-usd"></i>
          
          </div>
          
          <a href="gastos" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

  </div>

<!--=====================================
= FILA 2           =
======================================-->

  <div class="row col-xs-12">

    <!-- Categorías -->
    
      <div class="col-lg-4 col-xs-4" >

        <div class="small-box bg-green" onclick="location.href='categorias';" style="cursor: pointer;">
          
          <div class="inner">
          
            <h3><?php echo number_format($totalCategorias); ?></h3>

            <p>Categorías</p>
          
          </div>
          
          <div class="icon">
          
            <i class="ion ion-clipboard"></i>
          
          </div>
          
          <a href="categorias" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

    <!-- Productos -->

      <div class="col-lg-4 col-xs-4" >

        <div class="small-box bg-red" onclick="location.href='productos';" style="cursor: pointer;">
        
          <div class="inner">
          
            <h3><?php echo number_format($totalProductos); ?></h3>

            <p>Productos</p>
          
          </div>
          
          <div class="icon">
            
            <i class="ion ion-ios-cart"></i>
          
          </div>
          
          <a href="productos" class="small-box-footer">
            
            Más info <i class="fa fa-arrow-circle-right"></i>
          
          </a>

        </div>

      </div>

    <!-- Clientes -->

      <div class="col-lg-4 col-xs-4" >

        <div class="small-box bg-yellow" onclick="location.href='clientes';" style="cursor: pointer;">
          
          <div class="inner">
          
            <h3><?php echo number_format($totalClientes); ?></h3>

            <p>Clientes</p>
        
          </div>
          
          <div class="icon">
          
            <i class="ion ion-person-add"></i>
          
          </div>
          
          <a href="clientes" class="small-box-footer">

            Más info <i class="fa fa-arrow-circle-right"></i>

          </a>

        </div>

      </div>

  </div>

<!--=====================================
= FILA 3           =
======================================-->



  <!-- <div class="row col-xs-12">

    <hr>

    <h3 class="text-center">Cantidad de Productos Vendidos</h3>

    <?php 

      foreach ($productos as $key => $value) 
      {
        
        echo '<div class="col-lg-4 col-xs-12">

                <div class="small-box bg-purple">
                  
                  <div class="inner">

                    <h4 class="pull-right">'.number_format($value["ventas"]/$value["unidades"],0).' <span class="text-orange">Packs</span></h4>
                                     
                    <h3>'.$value["ventas"].' <span class="text-yellow">Botellas</span></h3>
                    
                    <p>'.$value["descripcion"].'</p>
                  
                  </div>
                  
                  <a href="ventas" class="small-box-footer">
                    
                    Más info <i class="fa fa-arrow-circle-right"></i>
                  
                  </a>

                </div>

              </div>';

      }





    ?>

  </div> -->

