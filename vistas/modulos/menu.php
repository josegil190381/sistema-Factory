<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu tree">

		
			<?php 

				$notificaciones = ControladorNotificaciones::ctrMostrarNotificaciones();

				$totalNotificaciones = $notificaciones["nuevas_ventas"] + $notificaciones["nuevas_cargas"] + $notificaciones["nuevos_clientes"] + $notificaciones["nuevos_eventos"];

				if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

				//Inicio
					echo'<li class="active">

						<a href="inicio">

							<i class="fa fa-home"></i>
							<span>Escritorio</span>

						</a>

					</li>';

				}

				if($_SESSION["perfil"] == 1){

				// Usuarios
					echo'<li>

						<a href="usuarios">

							<i class="fa fa-user"></i>
							<span>Usuarios</span>

						</a>

					</li>

				}				

				<!-- Clientes -->
				
					<li>

						<a href="clientes">

							<i class="fa fa-users"></i>
							<span>Clientes</span>
							
						</a>

					</li>';

				}

				

				if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

				//Menu Almacen

					echo'<li class="treeview active">
						
						<a href="#">

							<i class="fa fa-archive"></i>

							<span>Almacen</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<!-- Sub Menu -->
							<ul class="treeview-menu">
			
								<!-- Lista Proveedores -->
									<li>

										<a href="proveedores">

											<i class="fa fa-circle-o"></i>
											<span>Proveedores</span>

										</a>

										

									</li>

								<!-- Lista Categorias -->
									<li>

										<a href="categorias">

											<i class="fa fa-circle-o"></i>
											<span>Categorías</span>
											
										</a>

										

									</li>

								<!-- Listas Productos -->
									<li>

										<a href="productos">

											<i class="fa fa-circle-o"></i>
											<span>Productos</span>
									
										</a>



									</li>


							</ul>

					</li>';

				}
					
				//Menu Operaciones

					echo'<li class="treeview active">
						
						<a href="#">

							<i class="fa fa-university"></i>

							<span>Operaciones</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<!-- Sub Menu -->
							<ul class="treeview-menu">';


								if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

								//Lista de Compras de Productos -->
									echo'<li>

										<a href="compras">

											<i class="fa fa-circle-o"></i>
											<span>Lista Compras Productos</span>

										</a>

									</li>

									<!-- Lista de Compras de Productos -->
									
									<li>

										<a href="compras-otros">

											<i class="fa fa-circle-o"></i>
											<span>Lista Compras Varios</span>

										</a>

									</li>';

								}

								//Lista Camion -->
									echo'<li>

										<a href="camion">

											<i class="fa fa-circle-o"></i>
											<span>Lista Camión</span>

										</a>

									</li>';

									//Lista Delivery -->
									echo'<li>

										<a href="delivery">

											<i class="fa fa-circle-o"></i>
											<span>Lista Delivery</span>

										</a>

									</li>';

								if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

								//Lista de Gastos -->
									echo'<li>

										<a href="gastos">
											
											<i class="fa fa-circle-o"></i> 
											<span>Lista de Gastos</span>

										</a>

									</li>';
								}	

							echo'</ul>

					</li>

					

				<!-- Menu Ventas -->
					<li class="treeview active">

						<a href="#">

							<i class="fa fa-usd"></i>
							
							<span>Ventas</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>
	
						</a>

						<!-- Sub Menu -->
							<ul class="treeview-menu">';

								if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2 || $_SESSION["perfil"] == 4){

								//Todas las Ventas -->
									echo'<li>

										<a href="ventas">
											
											<i class="fa fa-circle-o"></i>
											<span>Todas las Ventas</span>
											
										</a>

									</li>';
								}

								//Ventas del Días -->
									echo'<li>

										<a href="ventas-dia">
											
											<i class="fa fa-circle-o"></i>
											<span>Ventas del Día</span>

										</a>

									</li>
								
								<!-- Crear Ventas -->
									<li>

										<a href="crear-venta">
											
											<i class="fa fa-circle-o"></i>
											<span>Crear venta</span>

										</a>

									</li>

								<!-- Caja -->
									<li>

										<a href="caja">
											
											<i class="fa fa-circle-o"></i>
											<span>Caja</span>

										</a>

									</li>

								</ul>

					</li>

					

				<!--Calendario-->
					<li>

						<a href="calendario">
							
							<i class="fa fa-calendar"></i>
							<span>Calendario</span>

						</a>

					</li>

					<hr>';

			

				if($_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 2){

				//Menu Reportes -->
					echo'<li class="treeview">
						
						<a href="#">
							
							<i class="fa fa-bar-chart"></i>
							
							<span>Reportes</span>
							
							<span class="pull-right-container">
							
								<i class="fa fa-angle-left pull-right"></i>

							</span>

						</a>

						<!-- Sub Menu -->

							<ul class="treeview-menu">
								
								<!--Reportes de Ventas -->
									<li>

										<a href="reportes-ventas">
											
											<i class="fa fa-circle-o"></i>
											<span>Reportes Ventas</span>

										</a>

									</li>

								<!--Reportes de Compras -->
									<!--<li>

										<a href="reportes-compras">
											
											<i class="fa fa-circle-o"></i>
											<span>Reportes Compras</span>

										</a>

									</li>-->

							</ul>

					</li>

					<hr>
					
					<li>

						<a href="configuracion">
							
							<i class="fa fa-cogs"></i>
							<span>Configuraciones</span>

						</a>

					</li>';

				}

			?>

		</ul>

	 </section>

</aside>