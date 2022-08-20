<?php

if($_SESSION["perfil"] == 3){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

        <div class="col-lg-12 col-xs-12">
          
          <div class="box box-warning">

            <div class="box-header with-border">

              <a href="inicio"><button class="btn btn-warning">Inicio</button></a>
    
              <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">Agregar Producto Nuevo</button> -->

              <a data-toggle="modal" href="#modalAgregarProducto" class="btn btn-primary">Agregar Producto Nuevo</a>

              <a href="config-productos" class="btn btn-danger pull-right">Configuración de Productos</a>

            <div class="box-body">

               <div class="box">

                  <div class="box-body">
        
                     <table class="table table-bordered table-striped dt-responsive tablaProductos " width="100%">
                       
                      <thead>
                       
                       <tr>
                         
                         <th style="width:10px">#</th>
                         <th style="width:20px">Código</th>
                         <th style="width:50px">Factura</th>
                         <th>Descripción</th>
                         <th>Categoría</th>
                         <th>Stock Actual</th>
                         <th>Vendidos</th>
                         <th>Precio de compra</th>
                         <th>Precio de venta</th>
                         <th>Fecha Vencimiento</th>
                         <th>Agregado</th>
                         <th data-priority="1">Acciones</th>
                         
                       </tr> 

                      </thead>      

                     </table>

                     <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">

                    </div>

               </div>

            </div>

          </div>

        </div>

    </div>

  </section>

</div>



<?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

?>      

<?php require_once("modals/modal-agregar-producto.php");?>

<?php require_once("modals/modal-agregar-stock.php");?>

<?php require_once("modals/modal-editar-producto.php");?>



