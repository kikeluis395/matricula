<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Malla Curricular</title>
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
                                <li class="breadcrumb-item active">Malla Curricular</li>
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
                                    <i class="fa fa-tasks text-navy mid-icon fa-3x ml-3"></i>
                                </div>
                                <div class="col-md-11 col-lg-11 col-sm-11">
                                    <h2>Malla Curricular</h2>
                                    <span> Secuencia de cursos aprobados y desaprobados.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInRight" id="renderContent" style="opacity: 1;">

                        <div class="row no-margins" id="RenderLista" style="opacity: 1;">
                            <div class="career-program">
                                <div class="career-labels">
                                    <div class="career-label">
                                        <div style="background-color: #0165df" class="career-label-color"></div>
                                        <div class="career-label-text">Aprobado</div>
                                    </div>
                                    <div class="career-label">
                                        <div style="background-color: #696969" class="career-label-color"></div>
                                        <div class="career-label-text">Por Llevar</div>
                                    </div>
                                </div>
                                <div class="career-grade">
                                    <div class="inner">PLAN DE ESTUDIO <?php echo $plan_curricular->anio?></div>
                                </div>
                                <!-- NEW PLANES-->
                                <!--ORDEN SEMESTRAL-->
                                <!--ORDEN SEMESTRAL-->
                                <?php for ($i = 1; $i <= $anios; $i++) {
                                    $cicloImpar = ($i * 2) - 1;
                                    $cicloPar = $cicloImpar + 1;
                                    $num_creditos_totalImpar = 0;
                                    $num_creditos_totalPar = 0;

                                    echo "<div class='career-year'>" .
                                        "<div class='career-year-text'><span>0" . $i . " AÑO</span></div>" .
                                        "<div class='career-semesters'>";

                                    for ($semestre = 1; $semestre <= 2; $semestre++) {
                                        echo "<div class='career-semester'>";

                                        if ($semestre % 2 != 0) {

                                            foreach ($listCursos as $curso) {

                                                if ($curso->num_ciclo_fk == $cicloImpar) {

                                                    $num_creditos_totalImpar = $num_creditos_totalImpar + $curso->num_creditos;
                                                }
                                            }

                                            echo "<div class='career-semester-text'>0" . $cicloImpar . " CIC <br><span style='font-size: 12px;'>(Total de Créditos: <strong>" . $num_creditos_totalImpar . "</strong>)</span></div>" .
                                                "<div class='career-themes'>" .
                                                "<div class='isotope' style='position: relative; height: 174px;'>";

                                            foreach ($listCursos as $curso) {

                                                if ($curso->num_ciclo_fk == $cicloImpar) {


                                                    echo "<div class='career-courses' style='top: 0px;'>";

                                                    $encontrado = 0;

                                                    foreach ($listCursosLlevados as $cursoLlevado) {

                                                        if ($curso->cod_curso == $cursoLlevado->cod_curso_fk) {
                                                            $encontrado++;
                                                        }
                                                    }

                                                    if ($encontrado == 1) {
                                                        echo "<div style='background-color: #2A8E2A' class='career-course'>";
                                                    } else {
                                                        echo "<div style='background-color: #696969' class='career-course'>";
                                                    }

                                                    echo "<div class='career-course-text'>" . $curso->cod_curso . " - " . $curso->descripcion . "</div>" .
                                                        "</div>" .
                                                        "</div>";
                                                }
                                            }

                                            echo "</div>" .
                                                "</div>";
                                        } else {

                                            foreach ($listCursos as $curso) {

                                                if ($curso->num_ciclo_fk == $cicloPar) {

                                                    $num_creditos_totalPar = $num_creditos_totalPar + $curso->num_creditos;
                                                }
                                            }

                                            echo "<div class='career-semester-text'>0" . $cicloPar . " CIC <br><span style='font-size: 12px;'>(Total de Créditos: <strong>" . $num_creditos_totalPar . "</strong>)</span></div>" .
                                                "<div class='career-themes'>" .
                                                "<div class='isotope' style='position: relative; height: 174px;'>";

                                            foreach ($listCursos as $curso) {

                                                if ($curso->num_ciclo_fk == $cicloPar) {


                                                    echo "<div class='career-courses' style='top: 0px;'>";

                                                    $encontrado = 0;

                                                    foreach ($listCursosLlevados as $cursoLlevado) {

                                                        if ($curso->cod_curso == $cursoLlevado->cod_curso_fk) {
                                                            $encontrado++;
                                                        }
                                                    }

                                                    if ($encontrado == 1) {
                                                        echo "<div style='background-color: #2A8E2A' class='career-course'>";
                                                    } else {
                                                        echo "<div style='background-color: #696969' class='career-course'>";
                                                    }

                                                    echo "<div class='career-course-text'>" . $curso->cod_curso . " - " . $curso->descripcion . "</div>" .
                                                        "</div>" .
                                                        "</div>";
                                                }
                                            }
                                            echo "</div>" .
                                                "</div>";
                                        }

                                        echo "</div>";
                                    }

                                    echo "</div>" .
                                        "</div>";
                                }
                                ?>


                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>

    <?php require_once(APPPATH . 'views/layout/_js.php'); ?>
    
</body>

</html>