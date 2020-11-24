<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Matricula | holitas</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/toastr.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/login.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/util.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-more" style="background-image: url('assets/img/sebap.png');background-size: cover">
				</div>
				<form class="login100-form" action="Singup" method="post">
					<span class="login100-form-title m-b-20">
						Registrate
					</span>
					<div class="container-date">
						<div class="form-group personal-date">
							<input class="form-control " type="number" name="dni" placeholder="DNI" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="text" name="nombres" placeholder="Nombres" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="text" name="apellido_paterno" placeholder="Apellido Paterno" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="text" name="apellido_materno" placeholder="Apellido Materno" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="date" name="anio_nacimiento" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="text" name="sexo" placeholder="Sexo" required>
						</div>
					</div>
					<div class="container-date">
						<div class="form-group personal-date">
							<input class="form-control" type="email" name="email" placeholder="Email" required>
						</div>
						<div class=" form-group personal-date">
							<select class="form-control" name="diplomado">
								<option value="" >-----------</option>
								<?php 
                       
											 foreach($listDiplomados as $diplomado)
											 {
												 
												 echo "<option value='".$diplomado->cod_carrera."'>".$diplomado->descripcion."</option>";
												 
												}
												?>
            </select>
					</div>
						<div class="form-group personal-date">
							<input class="form-control" type="password" name="pass" placeholder="Contraseña" required>
						</div>
						<div class="form-group personal-date">
							<input class="form-control" type="password" name="confirmpass" placeholder="Confirmar contraseña" required>
						</div>
					</div>
					<button class="login100-form-btn" type="submit">
						Registrarse
					</button>
					<div>
						<a href="<?php echo base_url() ?>login">¿Tienes una cuenta? Inicia sesión!!</a> 
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->

	<script src="<?php echo base_url('assets'); ?>/js/jquery-3.4.1.min.js"></script>
	<!-- Bootstrap 4.3 -->
	<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/toastr.min.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/config_toast.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/login.js"></script>
	<?php if ($show == true) : ?>
        <?php echo "<script>Show" . $tipo . "('" . $message . "');</script>"; ?>
    <?php endif; ?>
</body>
</html>