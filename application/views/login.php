<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Matricula | Login</title>
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
				<form class="login100-form centrado" action="SignIn" method="post">
					<span class="login100-form-title p-b-20">
						Iniciar sesión
					</span>
					<div class="form-group">
						<input class="form-control" type="text" name="codigo" placeholder="Código">
					</div>
					<div class="form-group">
						<input class="form-control" type="password" name="pass" placeholder="Contraseña">
					</div>

					<button class="login100-form-btn" type="submit">
						Ingresar
					</button>
					<div>
						<a href="<?php echo base_url() ?>registrarse">¿No tienes una cuenta? Registrate!!</a> 
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

	<?php if($found == false && $trial == true) : ?>
		<?php echo "<script>ShowError('" . $message . "');</script>" ?>
	<?php endif; ?>
</body>
</html>