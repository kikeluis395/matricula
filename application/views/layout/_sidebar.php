<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: auto!important;">
	<!-- Brand Logo -->
	<a href="<?php echo base_url() ?>home" class="brand-link bg_logo_unfv">
		<img src="<?php echo base_url() ?>assets/img/logo_sebap.png" alt="SEBAP Logo" width="235px" class="logo_unfv">
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url() ?>assets/img/user.png" class="img-circle elevation-2" alt="User Image" style="margin-top: 15px">
			</div>
			<div class="info" style="margin-left:15px">
				<a href="#" class="d-block">
					<span><?php echo $usuario->apellido_paterno . " " .
								$usuario->apellido_materno ?></span>
					<br>
					<span><?php echo $usuario->nombres ?></span></a>
			</div>
		</div>

		<?php if($usuario->cod_nivel_fk == 3) :?>

		<!-- Sidebar Menu Alumno-->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo base_url() ?>home" class="nav-link" id="a_inicio">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Inicio
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link" id="a_alumno">
						<i class="nav-icon fas fa-user-graduate"></i>
						<p>
							Alumno
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>perfil" class="nav-link" id="a_perfil">
								<i class="fas fa-user-circle nav-icon"></i>
								<p>Perfil</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>asignaturas" class="nav-link" id="a_asignaturas">
								<i class="fas fa-book nav-icon"></i>
								<p>Asignaturas</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>reportes" class="nav-link" id="a_reportes">
								<i class="fas fa-file-pdf nav-icon"></i>
								<p>Reportes</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link" id="a_matricula">
						<i class="nav-icon far fa-address-card"></i>
						<p>
							Matricula
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>pago" class="nav-link" id="a_pago">
								<i class="fas fa-hand-holding-usd nav-icon"></i>
								<p>Pago</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>horarios" class="nav-link" id="a_horarios">
								<i class="far fa-calendar-alt nav-icon"></i>
								<p>Horarios</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>rectificacion" class="nav-link" id="a_rectificacion">
								<i class="fas fa-exchange-alt nav-icon"></i>
								<p>Rectificacion</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<!-- <a onclick="irAjax('')" class="nav-link" style="cursor:pointer">
						<i class="nav-icon fas fa-list-alt"></i>
						<p>
							Malla Curricular
						</p>
					</a> -->

					<a href="<?php echo base_url() ?>mallaCurricular" class="nav-link" style="cursor:pointer" id="a_malla_curricular">
						<i class="nav-icon fas fa-list-alt"></i>
						<p>
							Plan de estudios
						</p>
					</a>
				</li>

				<hr>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>Login/logout" class="nav-link" id="a_inicio">
						<i class="nav-icon fas fa-power-off"></i>
						<p>
							Cerrar Sesión
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu alumno-->

		<?php endif; ?>



		<?php if($usuario->cod_nivel_fk == 1) :?>

		<!-- Sidebar Menu Administrador-->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
						 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?php echo base_url() ?>home" class="nav-link" id="a_inicio">
						<i class="nav-icon fas fa-home"></i>
						<p>
							Inicio
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link" id="a_admin">
						<i class="nav-icon fas fa-user-graduate"></i>
						<p>
							Administrador
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>perfilAdmin" class="nav-link" id="a_perfil">
								<i class="fas fa-user-circle nav-icon"></i>
								<p>Perfil</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link" id="a_activaciones">
						<i class="nav-icon fas fa-cogs"></i>
						<p>
							Activaciones
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>activarPago" class="nav-link" id="a_pago">
								<i class="fas fa-toggle-on nav-icon"></i>
								<p>Pago</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>activarHorarios" class="nav-link" id="a_horarios">
								<i class="fas fa-toggle-on nav-icon"></i>
								<p>Horarios</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() ?>activarRectificacion" class="nav-link" id="a_rectificacion">
								<i class="fas fa-toggle-on nav-icon"></i>
								<p>Rectificacion</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link" id="a_matricula_admin">
						<i class="nav-icon fas fa-folder-open"></i>
						<p>
							Matricula
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url() ?>horariosAdmin" class="nav-link" id="a_horarios_admin">
								<i class="far fa-calendar-alt nav-icon"></i>
								<p>Horarios</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview">
					<li class="nav-item">
								<a href="<?php echo base_url() ?>reporte_alumnos" class="nav-link" id="a_reportes">
									<i class="fas fa-file-pdf nav-icon"></i>
									<p>
										Reportes
									<i class="right fa fa-angle-left"></i>
									</p>
								</a>
					</li>
				</li>

				
				<hr>

				<li class="nav-item">
					<a href="<?php echo base_url() ?>Login/logout" class="nav-link" id="a_inicio">
						<i class="nav-icon fas fa-power-off"></i>
						<p>
							Cerrar Sesión
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu Administrador -->

		<?php endif; ?>

	</div>
	<!-- /.sidebar -->
</aside>