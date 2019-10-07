<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Matricula | Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/animate.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- header -->
		<?php require_once(APPPATH.'views/layout/_nav.php'); ?>
		<!-- sidebar -->
		<?php require_once(APPPATH.'views/layout/_sidebar.php'); ?>

		<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Dashboard</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Dashboard v2</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid">
	        
	      </div><!-- /.container-fluid -->
	    </section>
	    <!-- /.content -->
	  </div>

		<!-- footer -->
		<!-- Control Sidebar -->
	  <aside class="control-sidebar control-sidebar-dark">
	    <!-- Control sidebar content goes here -->
	  </aside>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('assets'); ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/popper.min.js"></script>
<!-- Bootstrap 4.3 -->
<script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>

<script src="<?php echo base_url('assets'); ?>/js/toastr.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/config_toast.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/all.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/adminlte.js"></script>
</body>
</html>