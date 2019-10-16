<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Asignaturas</title>
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
                                <li class="breadcrumb-item active">Asignaturas</li>
                            </ol>
                        </div><!-- /.container-fluid -->
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->
        <!-- sidebar -->
        <?php require_once(APPPATH . 'views/layout/_sidebar.php'); ?>

        <div class="content-wrapper" style="min-height: 0!important;">
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
                                    <h2>Asignaturas</h2>
                                    <span>Lista de cursos elegidos en la matricula.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInDown" style="opacity: 1;">

                        <div class="no-margins" style="opacity: 1;">
                           

                            <div class="card" style="font-size: 14px">
                                <div class="card-header">
                                    <div class="card-title">Matricula <?php echo $matricula->anio?></div>
                                </div>
                                <div class="card-body body-cursos-permitidos">

                                    <table class="table table-hover" id="tableCursosPermitidos">
                                        <thead>
                                            <tr class="text-center">
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Créditos</th>
                                            <th scope="col">Ciclo</th>
                                            <th scope="col">Aula</th>
                                            <th scope="col">Docente</th>
                                            <th scope="col">Sección</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 

                                        
                                            $cont = 1;
                                            foreach ($listAsignaturas as $asignatura)
                                                {
                                                    if($cont == 1)
                                                    {
                                                        echo "<tr>".
                                                            "<td class='text-center'>".$asignatura->descripcion."</td>".
                                                            "<td class='text-center'>".$asignatura->num_creditos."</td>".
                                                            "<td class='text-center'>".$asignatura->num_ciclo_fk."</td>".
                                                            "<td class='text-center'>".$asignatura->cod_aula."</td>".
                                                            "<td class='text-center'>".$asignatura->apellido_paterno. " " . $asignatura->apellido_materno . ", " . $asignatura->nombres."</td>".
                                                            "<td class='text-center'>".$asignatura->seccion."</td>".
                                                         "</tr>";

                                                         $asignaturaActual = $asignatura->cod_curso;

                                                         $cont++;
                                                    }
                                                    

                                                    if($asignaturaActual != $asignatura->cod_curso)
                                                    {
                                                        echo "<tr>".
                                                            "<td class='text-center'>".$asignatura->descripcion."</td>".
                                                            "<td class='text-center'>".$asignatura->num_creditos."</td>".
                                                            "<td class='text-center'>".$asignatura->num_ciclo_fk."</td>".
                                                            "<td class='text-center'>".$asignatura->cod_aula."</td>".
                                                            "<td class='text-center'>".$asignatura->apellido_paterno. " " . $asignatura->apellido_materno . ", " . $asignatura->nombres."</td>".
                                                            "<td class='text-center'>".$asignatura->seccion."</td>".
                                                         "</tr>";

                                                         $asignaturaActual = $asignatura->cod_curso;
                                                    }
                                                    
                                                }       
                                        
                                                                         
                                        ?>
                                        </tbody>
                                    </table>
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
    

    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    
</body>

</html>