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
      
      Configuración de productos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Configuración de productos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="row">

      <div class="col-lg-12 col-xs-12">
          
        <div class="box box-warning">

          <div class="box-header with-border">

            <a href="productos"><button class="btn btn-warning">Anterior</button></a>
            
            <div class="box-body">

              <div class="box">

                <div class="row">

                <!--=====================================
                FORMULARIO Y TABLA DE PESO
                ======================================-->
                  
                  <div class="col-xs-4">

                    <h3>Peso</h3>

                    <button class="btn btn-primary agregarPeso">Agregar Peso</button>

                    <br><br>

                    <form role="form" method="POST">
                      
                      <div class="form-group row">
                
                        <div class="col-xs-6">

                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="descripcionPeso[]" required placeholder="Descripción">

                          </div>

                        </div>


                        <div class="col-xs-4">

                          <div class="input-group">
                              
                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="simboloPeso[]" required placeholder="Símbolo">

                          </div>

                        </div>
                      
                      </div>

                      <div class="pegar-linea-peso"></div>

                      <button type="submit" class="btn btn-success" name="guardarPeso">Guardar Peso</button>

                      <br><br>

                    </form>

                    <?php

                      $agregarPeso = new ControladorProductos();
                      $agregarPeso -> ctrAgregarPeso();

                    ?>

                    <table class="table table-bordered table-striped dt-responsive tablaPeso" width="100%">
         
                      <thead>
                       
                       <tr>
                                                  
                         <th>Descripción</th>
                         <th>Símbolo</th>
                         <th>Acciones</th>

                       </tr> 

                      </thead>

                      <tbody>

                        <?php

                        $item = "tipo";
                        $valor = "peso";

                        $peso = ControladorProductos::ctrMostrarConfigProducto($item, $valor);

                        foreach ($peso as $key => $value){
                         
                          echo ' <tr>

                                  <td>'.$value["descripcion"].'</td>
                                  <td>'.$value["simbolo"].'</td>
                                  <td>

                                    <div class="btn-group">
                                                                            
                                      <button class="btn btn-danger btnEliminarConfigProducto" idConfigProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>

                                    </div>  

                                  </td>

                                </tr>';
                        }


                        ?> 

                      </tbody>

                    </table>

                  </div>

                <!--=====================================
                FORMULARIO Y TABLA DE TALLA
                ======================================-->

                  <div class="col-xs-4">

                    <h3>Talla</h3>

                    <button class="btn btn-primary agregarTalla">Agregar Talla</button>

                    <br><br>

                    <form role="form" method="POST">
                      
                      <div class="form-group row">
                
                        <div class="col-xs-6">

                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="descripcionTalla[]" required placeholder="Descripción">

                          </div>

                        </div>


                        <div class="col-xs-4">

                          <div class="input-group">
                              
                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="simboloTalla[]" required placeholder="Símbolo">

                          </div>

                        </div>
                      
                      </div>

                      <div class="pegar-linea-talla"></div>

                      <button type="submit" class="btn btn-success" name="guardarTalla">Guardar Talla</button>

                      <br><br>

                    </form>

                    <?php

                      $agregarTalla = new ControladorProductos();
                      $agregarTalla -> ctrAgregarTalla();

                    ?>

                    <table class="table table-bordered table-striped dt-responsive tablaTalla" width="100%">
         
                      <thead>
                       
                       <tr>
                                                  
                         <th>Descripción</th>
                         <th>Símbolo</th>
                         <th>Acciones</th>

                       </tr> 

                      </thead>

                      <tbody>

                        <?php

                        $item = "tipo";
                        $valor = "talla";

                        $talla = ControladorProductos::ctrMostrarConfigProducto($item, $valor);

                        foreach ($talla as $key => $value){
                         
                          echo ' <tr>

                                  <td>'.$value["descripcion"].'</td>
                                  <td>'.$value["simbolo"].'</td>
                                  <td>

                                    <div class="btn-group">
                                                                            
                                      <button class="btn btn-danger btnEliminarConfigProducto" idConfigProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>

                                    </div>  

                                  </td>

                                </tr>';
                        }


                        ?> 

                      </tbody>

                    </table>
                    
                  </div>

                <!--=====================================
                FORMULARIO Y TABLA DE COLOR
                ======================================-->

                  <div class="col-xs-4">

                    <h3>Color</h3>

                    <button class="btn btn-primary agregarColor">Agregar Color</button>

                    <br><br>

                    <form role="form" method="POST">
                      
                      <div class="form-group row">
                
                        <div class="col-xs-6">

                          <div class="input-group">
                            
                            <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="descripcionColor[]" required placeholder="Descripción">

                          </div>

                        </div>


                        <div class="col-xs-4">

                          <div class="input-group">
                              
                            <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                            <input type="text" class="form-control input-sm" id="" name="simboloColor[]" required placeholder="Símbolo">

                          </div>

                        </div>
                      
                      </div>

                      <div class="pegar-linea-color"></div>

                      <button type="submit" class="btn btn-success" name="guardarColor">Guardar Color</button>

                      <br><br>

                    </form>

                    <?php

                      $agregarColor = new ControladorProductos();
                      $agregarColor -> ctrAgregarColor();

                    ?>

                    <table class="table table-bordered table-striped dt-responsive tablaColor" width="100%">
         
                      <thead>
                       
                       <tr>
                                                  
                         <th>Descripción</th>
                         <th>Símbolo</th>
                         <th>Acciones</th>

                       </tr> 

                      </thead>

                      <tbody>

                        <?php

                        $item = "tipo";
                        $valor = "color";

                        $color = ControladorProductos::ctrMostrarConfigProducto($item, $valor);

                        foreach ($color as $key => $value){
                         
                          echo ' <tr>

                                  <td>'.$value["descripcion"].'</td>
                                  <td>'.$value["simbolo"].'</td>
                                  <td>

                                    <div class="btn-group">
                                                                            
                                      <button class="btn btn-danger btnEliminarConfigProducto" idConfigProducto="'.$value["id"].'"><i class="fa fa-times"></i></button>

                                    </div>  

                                  </td>

                                </tr>';
                        }


                        ?> 

                      </tbody>

                    </table>
                    
                  </div>
 
                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </section>

</div>



<?php

  
  $borrarConfigProducto = new ControladorProductos();
  $borrarConfigProducto -> ctrBorrarConfigProducto();



?>      





