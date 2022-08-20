<?php

	$item = null;
	$valor = null;
	$orden = "id";

	$ventas = ControladorVentas::ctrSumaTotalVentas();

	$gastos = ControladorGastos::ctrSumaTotalGastos();

	$totalCaja = $ventas["total"] - $gastos["total"];

	$categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);
	$totalCategorias = count($categorias);

	$clientes = ControladorClientes::ctrMostrarClientes($item, $valor);
	$totalClientes = count($clientes);

	$productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
	$totalProductos = count($productos);


	?>


<div class="row">

	<div class="co-xs-12">
		
		<!-- Crear ventas -->

	  <div class="col-lg-2 col-xs-2" onclick="location.href='crear-venta';" style="cursor: pointer;">

	    <div class="small-box bg-green">
	      
	      <div class="inner">
	      
	        <!-- <h3><?php echo number_format($ventas["ventas"]); ?></h3> -->
	        
	        <h3>Crear <br> Venta</h3>
	                                         
	      </div>
	      
	      <div class="icon">
	      
	        <i class="ion ion-cash"></i>
	      
	      </div>
	      
	    </div>

	  </div>

	  <!-- Ver ventas -->

	  <div class="col-lg-2 col-xs-2" onclick="location.href='ventas';" style="cursor: pointer;">

	    <div class="small-box bg-yellow">
	      
	      <div class="inner">
	      
	        <h3>Ver <br> Ventas</h3>
	                                         
	      </div>
	      
	      <div class="icon">
	      
	        <i class="ion ion-clipboard"></i>
	      
	      </div>
	      
	    </div>

	  </div>

	  <!-- Ventas del día -->

	  <div class="col-lg-2 col-xs-2" onclick="location.href='ventas-dia';" style="cursor: pointer;">

	    <div class="small-box bg-red">
	      
	      <div class="inner">
	      
	        <h3>Ventas <br> de Día</h3>
	                                         
	      </div>
	      
	      <div class="icon">
	      
	        <i class="ion ion-calculator"></i>
	      
	      </div>
	      
	    </div>

	  </div>

	</div>
 
</div> 


