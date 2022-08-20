<?php

if($_SESSION["perfil"] != 1){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">    
    <h1>Administrar Ajustes del Sistema</h1>
    <ol class="breadcrumb">      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>      
      <li class="active">Ajustes del Sistema</li>    
    </ol>
  </section>

  <section class="content">

    <div class="box">     
     
      <div class="box-body configuracion">

        <form role="form" method="post">

          <?php 

            $item = "id";
            $valor = 1;

            $configuracion = ControladorConfiguracion::ctrMostrarConfiguracion($item, $valor);

          ?>
          
          <div class="row text-center">
            <div class="col-xs-12">
                <h3 class="text-center">Datos de la empresa <i class="fa fa-building"></i></h3>
                <p>Si no tienes algún dato o no quieres ponerlo, no importa, deja el campo vacío.</p>
            </div>
          </div>
          <br>  
          <div class="row">
            <div class="col-xs-3">
              <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input placeholder="Nombre" type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $configuracion["nombre"]?>">
                  <input type="hidden" id="id" name="id" value="<?php echo $configuracion["id"]?>">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input placeholder="Teléfono" type="tel" id="telefono" name="telefono" class="form-control" data-inputmask="'mask':'(9999) 999-999'" data-mask value="<?php echo $configuracion["telefono"]?>">
              </div>
            </div>

            <div class="col-xs-3">
              <div class="form-group">
                  <label for="email">Email</label>
                  <input placeholder="Email" type="email" id="email" name="email" class="form-control" value="<?php echo $configuracion["email"]?>">
              </div>
            </div>
            <div class="col-xs-3">
              <div class="form-group">
                  <label for="ruc">RUC</label>
                  <input placeholder="RUC" type="tel" id="ruc" name="ruc" class="form-control" value="<?php echo $configuracion["ruc"]?>">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-6">
              <div class="form-group">
                  <label for="razon">Razón Social</label>
                  <textarea placeholder="Razón Social del Negocio" id="razon" name="razon" class="form-control"><?php echo $configuracion["razon_social"]?></textarea>
              </div>
            </div>

            <div class="col-xs-6">
              <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <textarea placeholder="Dirección del Negocio" id="direccion" name="direccion" class="form-control"><?php echo $configuracion["direccion"]?></textarea>
              </div>
            </div>

            <!-- <div class="col-xs-6">                
              <div class="form-group"></div>
                <input type="file" class="nuevaFoto" name="editarFoto">
                <p class="help-block">Peso máximo de la foto 2MB</p>
                <img src="<?php echo $configuracion["logo"]?>" class="img-thumbnail" width="100px">
                <input type="hidden" name="fotoActual" id="fotoActual">
              </div>
            </div> -->

          </div>

          <button type="submit" class="btn btn-primary" id="guardarConfiguracion" idConfiguracion="<?php echo $configuracion["id"]?>">Guardar</button>

          <?php

            $editarConfiguracion = new ControladorConfiguracion();
            $editarConfiguracion -> ctrEditarConfiguracion();

          ?>

        </form>

      </div>

    </div>

  </section>

</div>

