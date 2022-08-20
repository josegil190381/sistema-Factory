<?php

if($_SESSION["perfil"] == 4){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

// $xml = ControladorVentas::ctrDescargarXML();

// if($xml){

//   rename($_GET["xml"].".xml", "xml/".$_GET["xml"].".xml");

//   echo '<a class="btn btn-block btn-success abrirXML" archivo="xml/'.$_GET["xml"].'.xml" href="ventas">Se ha creado correctamente el archivo XML <span class="fa fa-times pull-right"></span></a>';

// }

?>
<div class="content-wrapper">

  <section class="content-header">

    <?php 


        $item = "id";
        $valor = $_GET["idVenta"];

        $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

        $itemCliente = "id";
        $valorCliente = $venta["id_cliente"];

        $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

    ?>
    
    <h1>

      Ver venta No. <strong><?php echo $venta["codigo"]?></strong> del Cliente: <strong><?php echo $cliente["nombre"]?></strong>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Detalles de Venta</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        
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
        
       <table class="table table-bordered table-striped dt-responsive tablasVerVentas" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Producto</th>
             <th>Cantidad</th>
             <th>Precio Unidad</th>
             <th>Total</th>
             

           </tr> 

          </thead>

          <tbody>

           <?php

                $listaProducto = json_decode($venta["productos"], true);

                           
                foreach ($listaProducto as $key => $value) {

                  // $item = "id";
                  // $valor = $value["id"];
                  // $orden = "id";

                  // $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor, $orden);
                
                   echo'<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["descripcion"].'</td>

                          <td>'.$value["cantidad"].'</td>

                          <td>'.number_format($value["precio"],0,",",".").'</td>

                          <td>'.number_format($value["total"],0,",",".").'</td>
                        
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
             

           </tr> 


          </tfoot>

       </table>



      </div>

    </div>

    <a href="ventas" class="btn btn-warning">Atras</a>

  </section>

</div>




