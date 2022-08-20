<!--=====================================
MODAL AGREGAR NUEVO PRODUCTO
======================================-->

  <div id="modalAgregarProducto" class="modal fade" role="dialog">
    
    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Nuevo Producto</h4>


          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">


              

              <div class="form-group row">

                <!-- ENTRADA PARA SELECCIONAR EL PROVEEDOR -->

                <div class="col-xs-6">
                  
                  <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control input-lg" id="nuevoProveedor" name="nuevoProveedor" required>
                      
                      <option value="">--Selecionar Proveedor--</option>

                      <?php

                        $item = null;
                        $valor = null;

                        $proveedor = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                        foreach ($proveedor as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                        }

                      ?>

                    </select>

                  </div>

                </div>

                <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                <div class="col-xs-6">

                  <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria" required>
                      
                      <option value="">--Selecionar Categoría--</option>

                      <?php

                        $item = null;
                        $valor = null;

                        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                        foreach ($categorias as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                        }

                      ?>
      
                    </select>

                  </div>

                </div>

              </div>

              <div class="form-group row">

                <!-- ENTRADA PARA EL CÓDIGO -->

                <div class="col-xs-4">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                    <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>

                  </div>

                </div>

                <!-- ENTRADA PARA STOCK -->

                  <div class="col-xs-4">
                  
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                      <input type="number" class="form-control input-lg" name="nuevoStock" min="0" placeholder="Stock" required>

                    </div>

                  </div>

                  <!-- ENTRADA PARA FACTURA DE COMPRA -->

                  <div class="col-xs-4">
                  
                    <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-file-text"></i></span> 

                        <input type="text" class="form-control input-lg" id="nuevaFacturaCompra" name="nuevaFacturaCompra" step="any" min="0" placeholder="Factura de Compra" required>

                        <input type="hidden" name="idComprador" id="idComprador" value="<?php echo $_SESSION["id"]; ?>">

                      </div>

                  </div>


              </div>

              <!-- ENTRADA PARA EL NOMBRE -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required >

                </div>

              </div>


              <div class="form-group row">
                
                <div class="col-xs-4">

                  <!-- ENTRADA PARA PRECIO COMPRA -->
                    
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                      <input type="number" class="form-control input-lg" id="nuevoPrecioCompra" name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra" required>

                    </div>

                </div>


                <div class="col-xs-4">

                  <!-- ENTRADA PARA PRECIO VENTA -->
                  
                    <div class="input-group">
                      
                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                        <input type="number" class="form-control input-lg" id="nuevoPrecioVenta" name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta" required>

                      </div>

                </div>

                <!-- CHECKBOX PARA PORCENTAJE -->

                <div class="col-xs-2">

                  <div class="form-group">
                    
                    <label>                      
                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar procentaje
                    </label>

                  </div>

                </div>

                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-2" >
                  
                  <div class="input-group">
                    
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="30" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

              <div class="form-group row">
              
                <!-- SELECT PARA CODIGO BARRAS -->

                <div class="col-xs-4">
                                  
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                    <input type="number" class="form-control input-lg" id="nuevoCodigoBarras" name="nuevoCodigoBarras" step="any" min="0" placeholder="Código de Barras" required> 
                
                  </div>
                 
                </div>

                <!-- ENTRADA PARA FECHA VENCIMIENTO -->

                <div class="col-xs-4">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="date" class="form-control input-lg" id="nuevaFechaVencimiento" name="nuevaFechaVencimiento">
                 
                  </div>

                </div>

                <!-- ENTRADA PARA LA DESCRIPCION  -->

                <div class="col-xs-4">
                
                  <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Datos de Vencimiento" >

                  </div>

                </div>

              </div>

              <!-- <div class="form-group row">
                
                <div class="col-xs-4">
                  
                  <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                    <input type="text" class="form-control input-lg" name="nuevaDescripcion" placeholder="Config Producto" >

                  </div>

                </div>

                <div class="col-xs-4">
                  
                  <div class="input-group">
                
                    <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                    <select class="form-control input-lg" id="nuevoProveedor" name="nuevoProveedor" required>
                      
                      <option value="">--Selecionar Tipo--</option>

                      <?php

                        $item = null;
                        $valor = null;

                        $proveedor = ControladorProductos::ctrMostrarTipoConfigProducto($item, $valor);

                        foreach ($proveedor as $key => $value) {
                          
                          echo '<option value="'.$value["id"].'">'.$value["tipo"].'</option>';

                        }

                      ?>

                    </select>

                  </div>

                </div>

              </div> -->


              <!-- ENTRADA PARA SUBIR FOTO -->

              <div class="form-group">
                
                <div class="panel">SUBIR IMAGEN</div>

                  <input type="file" class="nuevaImagen" name="nuevaImagen">

                  <p class="help-block">Peso máximo de la imagen 2MB</p>

                  <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                </div>

              </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar producto</button>

          </div>

        </form>

          <?php

            $crearProducto = new ControladorProductos();
            $crearProducto -> ctrCrearProducto();

          ?>  

      </div>

    </div>

  </div>


