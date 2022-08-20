<?php

if($_SESSION["perfil"] == 3){

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


        $itemCliente = "id";
        $valorCliente =$_GET["idCliente"];
        
        $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

    ?>
    
    <h1>

      Ver Operaciones de <strong><?php echo $cliente["nombre"] ?></strong>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Operaciones de Cliente</li>
    
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
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Código factura</th>
             <th>Vendedor</th>
             <th>Forma de pago</th>
             <th>Neto</th>
             <th>Total</th> 
             <th>Fecha</th>
             <th>Acciones</th>
             

           </tr> 

          </thead>

          <tbody>

           <?php


                $item = "id_cliente";
                $valor =$_GET["idCliente"];
                
                $ventas = ControladorVentas::ctrMostrarOperaciones($item, $valor);
           
                foreach ($ventas as $key => $value) {
                
                 echo'<tr>

                          <td>'.($key+1).'</td>

                          <td>'.$value["codigo"].'</td>';

                          $itemVendedor = "id";
                          $valorVendedor = $value["id_vendedor"];

                          $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

                          echo '<td>'.$vendedor["nombre"].'</td>

                          <td>'.$value["metodo_pago"].'</td>

                          <td>'.number_format($value["neto"],0,",",".").'</td>

                          <td>'.number_format($value["total"],0,",",".").'</td>

                          <td>'.$value["fecha"].'</td>

                          <td>

                            <div class="btn-group">
                              
                              <button class="btn btn-success btnVerVenta"  idVenta="'.$value["id"].'">

                                <i class="fa fa-eye"></i>

                              </button>
                            
                          </td>

                  </tr>';
                  
                  
                }


            ?>

                 
          </tbody>

       </table>



      </div>

    </div>

    <a href="clientes" class="btn btn-warning">Atras</a>

  </section>

</div>




