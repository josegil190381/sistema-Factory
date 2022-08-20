<?php

$item = "id";
$valor = 1;

$caja = ControladorCaja::ctrMostrarEstadoCaja($item, $valor);

if($caja["estado"] != 1){

  echo '<script>

    window.location = "caja";

  </script>';

  return;

}

?>


<div class="content-wrapper">

  <section class="content-header">

    <div class="row">

      <div class="col-lg-2">
        
        <h3>Crear Venta</h3>

      </div>

      <div class="col-lg-5">
        
        <h2>SubTotal: <strong id="guaranies" style="font-size: 40px; color: red;"></strong></h2>

      </div>

      <div class="col-lg-5">
       
        <h2>Devolución: <strong id="devolucion" style="font-size: 40px; color: blue;"></strong></h2>

      </div>
      
    </div>
 
    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Todas las ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <!--=====================================
    EL FORMULARIO
    ======================================-->
      
        <div class="col-lg-5 col-xs-12">
          
          <div class="box box-success">
            
            <div class="box-header with-border">
              
              <a href="inicio"><button class="btn btn-warning">Inicio</button></a>
              <a href="ventas"><button class="btn btn-primary">Todas las Ventas</button></a>
              <button class="btn btn-danger" data-toggle="modal" data-target="#modalBuscarProductosVentas" data-dismiss="modal">Buscar Productos</button>
              
            </div>
     
              <div class="col-lg-7 col-xs-12" >
                
                <!--=====================================
                ENTRADA DEL CÓDIGO DE BARRAS
                ======================================-->

                <div class="form-group">
                  
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span>

                    <input type="text" class="form-control" id="codigoBarras" name="codigoBarras" >
                                        
                  </div>
                
                </div>
              
              </div>
              
            <form role="form" method="post" class="formularioVenta">

              <div class="box-body">
    
                <div class="">

                  <div class="row">
                      
                    <div class="col-xs-6" hidden>
                      
                      <!--=====================================
                      ENTRADA DEL VENDEDOR
                      ======================================-->
                  
                      <div class="form-group">
                      
                        <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                          <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                          <input type="hidden" name="idVendedor" value="<?php echo $_SESSION["id"]; ?>">

                        </div>

                      </div> 

                    </div>

                    <div class="col-xs-6" hidden>
                      
                      <!--=====================================
                      ENTRADA DEL CÓDIGO
                      ======================================-->

                      <div class="form-group">
                        
                        <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>

                          <?php

                          $item = null;
                          $valor = null;

                          $ventas = ControladorVentas::ctrMostrarVentas($item, $valor);

                          if(!$ventas){

                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="10001" readonly>';
                        

                          }else{

                            foreach ($ventas as $key => $value) {
                              
                              
                            
                            }

                            $codigo = $value["codigo"] + 1;


                            echo '<input type="text" class="form-control" id="nuevaVenta" name="nuevaVenta" value="'.$codigo.'" readonly>';
                        

                          }

                          ?>
                          
                          
                        </div>
                      
                      </div>

                    </div>

                  </div>

                  <div class="row">

                    <!--=====================================
                    SELECCION SI FACTURAR
                    ======================================--> 

                      <!-- CHECKBOX PARA PORCENTAJE -->

                    <div class="col-xs-6">

                      <div class="form-group">
                        
                        <label>
                          
                          <input type="checkbox" class="minimal facturacion" id="facturacion"> Utilizar Factura

                        </label>

                      </div>

                    </div>

                    
                    <!--=====================================
                    ENTRADA LA FACTURA
                    ======================================--> 

                      <div class="col-xs-6" id="facturaLegal" hidden>
                        
                        <div class="form-group">
                      
                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            
                             <input type="text" class="form-control" id="nuevaFactura" name="nuevaFactura" readonly placeholder="Número de Factura">
                           
                          </div>
                        
                        </div>

                      </div>

                  </div>

                  
                  <!--=====================================
                  ENTRADA DEL CLIENTE
                  ======================================--> 

                  <div class="form-group">
                    
                    <div class="input-group">
                      
                      <span class="input-group-addon"><i class="fa fa-users"></i></span>
                      
                      <select class="form-control select2" id="seleccionarCliente" name="seleccionarCliente" required>
                      
                      <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);


                         foreach ($categorias as $key => $value) {

                           echo '<option value="'.$value["id"].'">'.$value["documento"].' - '.$value["nombre"].'</option>';

                         }

                      ?>

                      </select>
                      
                      <span class="input-group-addon"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">Agregar cliente</button></span>
                    
                    </div>
                  
                  </div>

                  <input type="hidden" id="listaProductos" name="listaProductos">

                  

                  <!--=====================================
                  BOTÓN PARA AGREGAR PRODUCTO
                  ======================================-->

                  <button type="button" class="btn btn-default hidden-lg btnAgregarProducto">Agregar producto</button>

                  
                  <div class="row">

                    <!--=====================================
                    ENTRADA IMPUESTOS Y TOTAL
                    ======================================-->
                    
                    <div class="col-xs-12 ">
                      
                      <table class="table hidden">

                        <thead>

                          <tr>
                            <th>IVA (Includido)</th>
                            <th>Total</th>      
                          </tr>

                        </thead>

                        <tbody>
                        
                          <tr>
                            
                            <td style="width: 30%">
                              
                              <div class="input-group">
                             
                                <input type="number" class="form-control input-lm" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="10" iva="11" disabled required>

                                 <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" required>

                                 <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" required>

                                <span class="input-group-addon"><i class=""><strong>%</strong></i></span>
                          
                              </div>

                            </td>

                             <td style="width: 70%">
                              
                              <div class="input-group">
                             
                                <span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>

                                <input type="text" class="form-control input-sm" id="nuevoTotalVenta" name="nuevoTotalVenta" total="" placeholder="00000" disabled required>

                                <input type="hidden" name="totalVenta" id="totalVenta">
                                
                          
                              </div>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                      <table class="table">

                        <thead>

                          <tr>
                            <th>Efectivo Entregado</th>
                            <th>Cambio a Devolver</th>      
                          </tr>

                        </thead>

                        <tbody>
                        
                          <tr class="cajasMetodoPago">
                            
                            <td style="width: 50%">
                              
                              <div class="input-group">
                             
                                <span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span> 

                          <input type="text" class="form-control input-lg" id="nuevoValorEfectivo" placeholder="0000" >
                          
                              </div>

                            </td>

                             <td style="width: 50%" id="capturarCambioEfectivo">
                              
                              <div class="input-group">
                             
                                <span class="input-group-addon"><i class=""><strong>Gs.</strong></i></span>

                                <input type="text" class="form-control input-lg" id="nuevoCambioEfectivo" placeholder="0000"  readonly>
                         
                              </div>

                            </td>

                          </tr>

                        </tbody>

                      </table>

                    </div>

                    <div class="col-xs-6"hidden="">
                        
                        <div class="form-group">
                      
                          <div class="input-group">
                            
                             <input type="text" class="form-control input-lg" id="nuevoMetodoPago" name="nuevoMetodoPago" value="Efectivo">
                           
                          </div>
                        
                        </div>

                      </div>

                  </div>

                </div>

                <div class="row">
                  
                  <!--=====================================
                  SELECCION SI DELIVERY
                  ======================================--> 
  
                    <div class="col-xs-5">

                      <div class="form-group">
                        
                        <label>
                          
                          <input type="checkbox" class="minimal" id="delivery" name="delivery"> ¿Es para Delivery?

                        </label>

                      </div>

                    </div>

                  <!--=====================================
                  ENTRADA LA FACTURA
                  ======================================--> 

                    <div class="col-xs-7" id="conductor" hidden >
                      
                      <div class="form-group">
                    
                        <div class="input-group">
                          
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                          
                           <input type="text" class="form-control" id="nuevoConductor" name="nuevoConductor" placeholder="Nombre Conductor">
                         
                        </div>
                      
                      </div>

                    </div>
                    
                </div>
                              
              </div>

              <div class="box-footer">
   
                <button type="submit" class="btn btn-primary pull-right" id="btnGuardarVenta">Guardar Venta (|)</button>

              </div>

            </form>
          
            <?php

              $guardarVenta = new ControladorVentas();
              $guardarVenta -> ctrCrearVenta();
              
           ?>

          </div>
  
        </div>

    <!--=====================================
    LA TABLA DE PRODUCTOS
    ======================================-->

        <div class="col-lg-7 hidden-md hidden-sm hidden-xs">          
          <div class="box box-warning">
            <div class="box-header with-border"></div>
            <div class="box-body">

              <!--=====================================
              ENTRADA PARA AGREGAR PRODUCTO
              ======================================--> 

              <div class="form-group row nuevoProducto tablaVenta">
                
              </div>

              
                            
            </div>
          </div>
        </div>    
   
  </section>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

  <div id="modalAgregarCliente" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Nuevo Cliente</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">

              <!-- ENTRADA PARA EL NOMBRE CLIENTE -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoCliente" placeholder="Nombre de Cliente" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL EMAIL -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                  <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Correo">

                </div>

              </div>

              
              <!-- ENTRADA PARA EL DOCUMENTO ID -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoDocumentoId" placeholder="Cédula" required>

                </div>

              </div>

              <!-- ENTRADA PARA EL TELÉFONO -->
              
              <div class="form-group col-xs-6">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Teléfono" data-inputmask="'mask':'(9999) 999-999'" data-mask required>

                </div>

              </div>

              
              <!-- ENTRADA PARA LA DIRECCIÓN -->
              
              <div class="form-group col-xs-12">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" required>

                </div>

              </div>
               
            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cliente</button>

          </div>

        </form>

        <?php

          $crearCliente = new ControladorClientes();
          $crearCliente -> ctrCrearClienteVentas();

        ?>

      </div>

    </div>

  </div>

<!--=====================================
MODAL BUSCAR PRODUCTOS VENTAS
======================================-->

  <div id="modalBuscarProductosVentas" class="modal fade" role="dialog">
    
    <div class="modal-dialog modal-lg">

      <div class="modal-content">

      <!--=====================================
      LA TABLA DE PRODUCTOS
      ======================================-->

        <div class="col-xs-12 hidden-md hidden-sm hidden-xs">
          
          <div class="box">

            <div class="box-body">
              
              <table class="table table-bordered table-striped dt-responsive tablaVentas" id="tablaVentas" style="width: 100%;">
                
                 <thead>

                   <tr>
                    <th style="width: 10px">#</th>
                    <!-- <th>Imagen</th> -->
                    <th style="width: 100px">Código</th>
                    <th style="width: 70px">Precio</th>
                    <th>Descripcion</th>
                    <th style="width: 50px">Stock</th>
                    <th style="width: 50px">Acciones</th>
                  </tr>

                </thead>

              </table>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>





