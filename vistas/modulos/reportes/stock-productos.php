<!--=====================================
GRAFICA DE STOCK DE PRODUCTOS - BARRAS
======================================-->

    <?php

    $item = null;
    $valor = null;
    $orden = "stock";

    $productos = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);

    ?>


    <!--=====================================
    STOCK DE PRODUCTOS
    ======================================-->

      <div class="box-header">
        
        <h3 class="box-title">Stock de Productos</h3>

      </div>

      <div class="box-body">
          
        <div class="chart-responsive">
          
          <div class="chart" id="bar-chart1" style="height: 300px;">
            
          </div>

        </div>

        <br>

      </div>

    <script>
      
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart1',
      resize: true,
      data: [

      <?php
        
        foreach($productos as $key => $value){

          echo "{y:'".$value["descripcion"]."', a: '".$value["stock"]."'}, ";

        }

      ?>
      ],
      barColors: ['#0af'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['stock'],
      hideHover: 'auto'
    });


    </script>