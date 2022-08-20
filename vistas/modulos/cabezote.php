 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
		<!-- <span class="logo-mini">
			
			<img src="vistas/img/plantilla/logo-prelife.png" class="img-responsive" style="padding:10px">

		</span> -->

		<!-- logo normal -->
		<?php 

	        $item = "id";
	        $valor = 1;

	        $configuracion = ControladorConfiguracion::ctrMostrarConfiguracion($item, $valor);

	    ?>

		<span class="logo-lg">
			
			<img src="<?php echo $configuracion["logo"]?>" class="img-responsive" style="padding:10px 0px">

		</span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

		<?php 

			if ($_SESSION["perfil"] == 1) {

				
				echo '<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
		        	<span class="sr-only">Toggle navigation</span>
		      	
		      	</a>';

			}

		?>

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">

				<?php 

					$notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

					$totalNotificaciones = $notificaciones["nuevas_ventas"] + $notificaciones["nuevas_cargas"] + $notificaciones["nuevos_clientes"] + $notificaciones["nuevos_eventos"];

				?>

				<!-- notificaciones -->

				<li class="dropdown notifications-menu">

		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

		              <i class="fa fa-bell-o"></i>

		              <span class="label label-warning"><?php echo $totalNotificaciones; ?></span>

		            </a>

		            <ul class="dropdown-menu">

		              <li class="header">Tienes <strong><?php echo $totalNotificaciones; ?></strong> notificaciones nuevas</li>

		              <li>
		                
		                <ul class="menu">

		                  <li>

		                    <a href="" class="actualizarNotificaciones" item="nuevos_clientes">

		                      <i class="fa fa-users text-aqua"></i><strong><?php echo $notificaciones["nuevos_clientes"]; ?></strong> Nuevos Clientes

		                    </a>

		                  </li>

		                  <li>

		                    <a href="" class="actualizarNotificaciones" item="nuevas_cargas">

		                      <i class="fa fa-warning text-yellow"></i><strong><?php echo $notificaciones["nuevas_cargas"]; ?></strong> Nuevas Cargas de Camión

		                    </a>

		                  </li>

		                  <li>

		                    <a href="" class="actualizarNotificaciones" item="nuevas_ventas">

		                      <i class="fa fa-shopping-cart text-green"></i><strong><?php echo $notificaciones["nuevas_ventas"]; ?></strong> Nuevas Ventas

		                    </a>

		                  </li>

		                  <li>

		                    <a href="" class="actualizarNotificaciones" item="nuevos_eventos">

		                      <i class="fa fa-calendar text-yellow"></i><strong><?php echo $notificaciones["nuevos_eventos"]; ?></strong> Nuevos Eventos

		                    </a>

		                  </li>

		                </ul>

		              </li>

		            </ul>

		          </li>



		         <!-- perfil de usuario -->
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{

						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}

					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						
						<li class="user-body">
							
							<div>

								<a href="salir" class="btn btn-default btn-flat pull-right">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>
		
	</nav>

 </header>