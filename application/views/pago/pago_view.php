<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Pago</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once(APPPATH . 'views/layout/_css.php'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/util.css">
    <style>
        .login100-form{
            width: 100%;
            min-height: inherit;
            background-color: #fff;
            padding-top: 40px;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom mb-2">
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
                                <li class="breadcrumb-item"><a href="<?php echo base_url() ?>home">Home</a></li>
                                <li class="breadcrumb-item active">Pago</li>
                            </ol>
                        </div><!-- /.container-fluid -->
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->
        <!-- sidebar -->
        <?php require_once(APPPATH . 'views/layout/_sidebar.php'); ?>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->

            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid" id="contenedor-principal">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-1 col-lg-1 col-sm-1">
                                    <i class="fas fa-file-invoice-dollar text-navy mid-icon fa-3x ml-3"></i>
                                </div>
                                <div class="col-md-11 col-lg-11 col-sm-11">
                                    <h2>Pago Matricula</h2>
                                    <span> Verificación del código de liquidación.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInRight" id="renderContent" style="opacity: 1;">

                        <div class="no-margins" style="opacity: 1;">
                           

                            <div class="card" style="padding: 10px">
                                <div class="card-body">
                                    <form class="login100-form validate-form" action="VerificarPago" method="post">
                                        <div class="form-group row justify-content-center">
                                            <div class="col-sm-5">
                                                <button type="submit" class="btn btn-primary btn-block mt-2">Verificar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>

    <?php require_once(APPPATH . 'views/layout/_js.php'); ?>
    <script src="<?php echo base_url('assets'); ?>/js/login.js"></script>
    

    <?php if($show == true) : ?>
    <?php echo "<script>Show".$tipo."('".$message."');</script>"; ?>
    <?php endif; ?>

</body>

</html>