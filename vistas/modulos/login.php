<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="vistasfonts/icomoon/style.css">

    <link rel="stylesheet" href="vistas/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vistas/css/bootstrap.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="vistas/css/style.css">

    
  </head>

  <body>
  
  <div class="d-lg-flex half">

    <div class="bg order-1 order-md-2" style="background-image: url('vistas/img//bg_1.jpg');"></div>

    <div class="contents order-2 order-md-1">

      <div class="container">

        <div class="row align-items-center justify-content-center">

          <div class="col-md-7">

            <?php 

                  $item = "id";
                  $valor = 1;

                  $configuracion = ControladorConfiguracion::ctrMostrarConfiguracion($item, $valor);

              ?>

            <span class="logo-lg">

              <img src="<?php echo $configuracion["logo"]?>" class="img-responsive" style="padding:10px 0px">

            </span>

            <br>

            <h3>Entrar al Sistema</h3>


            <br>
            
            <form action="#" method="post">

              <div class="form-group first">

                <!-- <label for="ingUsuario" style="font-size: 15px;">Usuario</label> -->
               
                <input type="text" class="form-control" placeholder="Usuario" id="ingUsuario" name="ingUsuario">

              </div>


              <br>

              <div class="form-group last mb-3">

                <!-- <label for="ingPassword" style="font-size: 15px;">Contraseña</label> -->
                
                <input type="password" class="form-control" placeholder="Contraseña" id="ingPassword" name="ingPassword">

              </div>

              <br>
              
              <button type="submit"  value="Ingresar" class="btn btn-primary btn-block btn-flat login-submit">Ingresar</button>

              <?php

                $login = new ControladorUsuarios();
                $login -> ctrIngresoUsuario();
                
              ?>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>
    
    <script src="vistas/js/login/jquery-3.3.1.min.js"></script>
    <script src="vistas/js/login/popper.min.js"></script>
    <script src="vistas/js/login/bootstrap.min.js"></script>
    <script src="vistas/js/login/main.js"></script>

  </body>

</html>