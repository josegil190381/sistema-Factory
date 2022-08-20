<!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

  <div id="modalEditarProducto" class="modal fade" role="dialog">
    
    <div class="modal-dialog">

      <div class="modal-content">

        <form role="form" method="post" enctype="multipart/form-data">

          <!--=====================================
          CABEZA DEL MODAL
          ======================================-->

          <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Editar producto</h4>

          </div>

          <!--=====================================
          CUERPO DEL MODAL
          ======================================-->

          <div class="modal-body">

            <div class="box-body">


              <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg"  name="editarCategoria" readonly required>
                    
                    <option id="editarCategoria"></option>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA SELECCIONAR PROVEEDOR -->

              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                  <select class="form-control input-lg"  name="editarProveedor" required>
                    
                    <option id="editarProveedor"></option>

                    <?php

                      $item = null;
                      $valor = null;

                      $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);

                      foreach ($proveedores as $key => $value) {
                        
                        echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                      }

                    ?>

                  </select>

                </div>

              </div>

              <!-- ENTRADA PARA EL CÓDIGO -->
              
              <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                  <input type="text" class="form-control input-lg" id="editarCodigo" name="editarCodigo" readonly required>

                </div>

              </div>

              <!-- ENTRADA PARA LA DESCRIPCIÓN -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                  <input type="text" class="form-control input-lg" id="editarDescripcion" name="editarDescripcion" required>

                </div>

              </div>

               <!-- ENTRADA PARA STOCK -->

               <div class="form-group">
                
                <div class="input-group">
                
                  <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                  <input type="number" class="form-control input-lg" id="editarStock" name="editarStock" min="0" required>

                </div>

              </div>

               <!-- ENTRADA PARA PRECIO COMPRA -->

               <div class="form-group row">

                  <div class="col-xs-6">
                  
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                      <input type="number" class="form-control input-lg" id="editarPrecioCompra" name="editarPrecioCompra" step="any" min="0" required>

                    </div>

                  </div>

                  <!-- ENTRADA PARA PRECIO VENTA -->

                  <div class="col-xs-6">
                  
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                      <input type="number" class="form-control input-lg" id="editarPrecioVenta" name="editarPrecioVenta" step="any" min="0" readonly required>

                    </div>
                  
                    <br>

                  </div>

              </div>

              <div class="form-group row">

                <div class="col-xs-6">

                <!-- ENTRADA PARA FACTURA DE COMPRA -->
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-file-text"></i></span> 

                    <input type="text" class="form-control input-lg" id="editarFacturaCompra" name="editarFacturaCompra" step="any" min="0"  required>

                    <input type="hidden" name="idComprador" id="idComprador" value="<?php echo $_SESSION["id"]; ?>">

                  </div>

                </div>

                <!-- CHECKBOX PARA PORCENTAJE -->

                <div class="col-xs-3">
                  
                  <div class="form-group">
                    
                    <label>
                      
                      <input type="checkbox" class="minimal porcentaje" checked>
                      Utilizar procentaje
                    </label>

                  </div>

                </div>

                <!-- ENTRADA PARA PORCENTAJE -->

                <div class="col-xs-3" style="padding:0">
                  
                  <div class="input-group">
                    
                    <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>
            
              <div class="row">

                <!-- SELECT PARA VENDIBLE -->

                <!-- <div class="col-xs-6">

                  <div class="form-group">
                
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                      <select class="form-control input-lg" id="editarVendible" name="editarVendible" required>
                        
                        <option value="">--Seleccionar--</option>
                        <option value="1">Vendible</option>
                        <option value="0">No Vendible</option>

                      </select>

                    </div>

                  </div>

                </div> -->

                <div class="col-xs-6">

                <!-- ENTRADA PARA FECHA VENCIMIENTO -->
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                    <input type="date" class="form-control input-lg" id="editarFechaVencimiento" name="editarFechaVencimiento">
                      
                    </div>

                </div>

                <!-- SELECT PARA CODIGO BARRAS -->

                <div class="col-xs-6">

                  <div class="form-group">
                
                    <div class="input-group">
                    
                      <span class="input-group-addon"><i class="fa fa-barcode"></i></span> 

                      <input type="number" class="form-control input-lg" id="editarCodigoBarras" name="editarCodigoBarras" min="0" required> 
                  
                    </div>

                  </div>

                </div>

              </div>

              <!-- ENTRADA PARA SUBIR FOTO -->

               <div class="form-group">
                
                <div class="panel">SUBIR IMAGEN</div>

                <input type="file" class="nuevaImagen" name="editarImagen">

                <p class="help-block">Peso máximo de la imagen 2MB</p>

                <img src="vistas/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

                <input type="hidden" name="imagenActual" id="imagenActual">

              </div>

            </div>

          </div>

          <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>

          </div>

        </form>

          <?php

            $editarProducto = new ControladorProductos();
            $editarProducto -> ctrEditarProducto();

          ?>      

      </div>

    </div>

  </div>