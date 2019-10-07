
<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">



		<!--	 <?php // if ($_SESSION['id_usuario'] == 1) {?> -->

				<nav>
					<ul class="nav">



						<li>
							<a href="#subPages3" data-toggle="collapse" class="collapsed"><i class="fa fa-id-card-o"></i> <span><strong>Usuario: <?php echo "   " . $_SESSION['nombre'] . "_" . $_SESSION['nivel']; ?> </strong></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>

							<div id="subPages3" class="collapse ">
								<ul class="nav">

									<li><a href="RegistroUser.php" class="lnr lnr-users"> Registro Usuario</a></li>
									<li><a href="Usuarios.php" class="fa fa-address-card"> Usuarios</a></li>
									<li><a href="ConsultaBitacora.php" class="fa fa-book"> Auditoria</a></li>
									<li><a href="ConsultaBitacora.php" class="fa fa fa-bar-chart"> Estadistica</a></li>
								</ul>
							</div>
						</li>




						<li>
						<a href="#subPages1" data-toggle="collapse" class="collapsed"><i class="fa fa-inbox"></i> <span><strong>Envios</strong></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages1" class="collapse ">
								<ul class="nav">
									<li><a href="#" class="fa fa-envelope"> Nuevo Envio</a></li>
									<li><a href="#" class="fa fa-envelope-open"> Historial de Envios</a></li>
								</ul>
							</div>
						</li>


						<li>
							<a href="#subPages2" data-toggle="collapse" class="collapsed"><i class="fa fa-shopping-cart"></i><span><strong>Inventario</strong></span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages2" class="collapse ">
								<ul class="nav">
									<li><a href="Productos.php" class="fa fa-cart-plus"> Listado de Productos</a></li>
									<li><a href="RegistroCodigo.php" class="fa fa-cart-plus"> Nuevo Codigo</a></li>
									<li><a href="Codigos.php" class="fa fa-cart-plus"> Administrar</a></li>
								</ul>
							</div>
						</li>

						<li>
							<a href="#archivo" data-toggle="collapse" class="collapsed"><i class="lnr lnr-briefcase"></i><span><strong>Archivos</strong></span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="archivo" class="collapse ">
								<ul class="nav">


								</ul>
							</div>
						</li>



						<li><a href="Exitsesion.php"><i class="lnr lnr-exit"></i> <span><strong>Salir</strong></span></a></li>

					</ul>
				</nav>


				<?php// } else {?>



				<?php // }?>







</script>

			</div>

		</div>
