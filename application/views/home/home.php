<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Matricula | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php require_once(APPPATH.'views/layout/_css.php'); ?>
  
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
		</li>
		
    </ul>
    

    <!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		
		<li class="nav-item">
        <div class="content-header">
	      <div class="container-fluid">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item active">Home</li>
	            </ol>
	      </div><!-- /.container-fluid -->
	    </div>
		</li>
	</ul>

</nav>
<!-- /.navbar -->
		<!-- sidebar -->
		<?php require_once(APPPATH.'views/layout/_sidebar.php'); ?>

		<div class="content-wrapper">
	    

	    <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid" id="contenedor-principal">
	        
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- /.content -->
	  </div>

</div>

<?php require_once(APPPATH.'views/layout/_js.php'); ?>
<script>
	$( document ).ready(function() {
		<?php foreach($listActiveLink as $activeid) 
		{
			echo "$('#" . $activeid . "').addClass('active');";
		}
	?>
});
	
</script>
</body>
</html>