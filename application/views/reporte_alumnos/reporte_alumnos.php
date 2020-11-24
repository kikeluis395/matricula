<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Reportes</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once(APPPATH . 'views/layout/_css.php'); ?>

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
                                <li class="breadcrumb-item active">Reportes</li>
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
                                    <h2>Reporte de alumnos</h2>
                                    <span>Muestra alumnos matriculados en formato PDF por diplomado.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInDown" id="renderContent" style="opacity: 1;">

                        <div class="no-margins" style="opacity: 1;">
                           

                            <div class="card" style="padding: 10px">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="form-group-inline">
                                            <label for="exampleFormControlSelect1">Diplomado</label>
                                            <select class="form-control">
                                                <option value=""></option>
                                              <?php
                                                foreach($listDiplomados as $diplomado)
                                                {
                                                    
                                                    echo "<option value='".$diplomado->cod_carrera."'>".$diplomado->descripcion."</option>";
                                                    
                                                   }
                                                   ?>
                                              ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-center">
                                    <img src="<?php echo base_url() ?>assets/img/logo_pdf.png" class="img-circle mb-3" alt="Check Image" style="margin-top: 15px;width:100px">
                                    
                                    <button class="btn btn-primary" onclick="VerPDFAsignaturas('<?php echo base_url()?>')" target="_blank" role="button">Ver PDF</button>
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
  

</body>

</html>