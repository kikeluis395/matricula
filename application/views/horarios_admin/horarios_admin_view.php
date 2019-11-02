<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Horarios</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once(APPPATH . 'views/layout/_css.php'); ?>
    <link rel="stylesheet" href="<?php echo base_url('assets'); ?>/css/jquery.timepicker.min.css">
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
                                <li class="breadcrumb-item active">Horarios</li>
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
                                    <h2>Horarios</h2>
                                    <span>Administrar los horarios según la disponibilidad.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInDown" style="opacity: 1;">

                        <div class="no-margins" style="opacity: 1;" id="contenedor-horarios-admin">


                            <div class="card" style="font-size: 14px">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="row justify-content-between">
                                            <div class="col-4">
                                                <span>Lista de Horarios</span>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarHorarioAdmin">
                                                    <i class="fas fa-plus"></i> Agregar Horario
                                                </button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="card-body body-horarios-admin">
                                    <div class="table-responsive-lg table-responsive-md table-responsive-sm">
                                        <table class="table table-hover" id="tableHorariosAdmin" style="height: 400px;">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Docente</th>
                                                    <th scope="col">Curso</th>
                                                    <th scope="col">Aula</th>
                                                    <th scope="col">Sección</th>
                                                    <th scope="col">Día</th>
                                                    <th scope="col">Entrada</th>
                                                    <th scope="col">Salida</th>
                                                    <th scope="col">Turno</th>
                                                    <th scope="col">Cupos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listHorariosAdmin as $horarioAdmin) {
                                                    echo "<tr>" .
                                                        "<td>" . $horarioAdmin->apellido_paterno_docente . " " . $horarioAdmin->apellido_materno_docente . ", " . $horarioAdmin->nombres_docente . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->descripcion_curso . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->cod_aula . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->seccion . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->descripcion_dia . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->hora_entrada . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->hora_salida . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->turno . "</td>" .
                                                        "<td class='text-center'>" . $horarioAdmin->cupos . "</td>" .
                                                        "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
    <script src="<?php echo base_url('assets'); ?>/js/jquery.timepicker.min.js"></script>
    <!-- Modal -->
    <div class="modal fade bd-example-modal" id="modalAgregarHorarioAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar horario</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Docente</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="selectDocente">
                                    <?php 
                                        foreach($listDocentes as $docente)
                                        {

                                            echo "<option value='".$docente->cod_docente."'>".$docente->apellido_paterno." ".$docente->apellido_materno.", ".$docente->nombres."</option>";

                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Curso</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="selectCurso">
                                    <?php 
                                        foreach($listCursos as $curso)
                                        {

                                            echo "<option value='".$curso->cod_curso."'>".$curso->descripcion."</option>";

                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Aula</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="selectAula">
                                    <?php 
                                        foreach($listAulas as $aula)
                                        {

                                            echo "<option value='".$aula->cod_aula."'>".$aula->cod_aula."</option>";

                                        }
                                    ?>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Sección</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputSeccion">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Día</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="selectDia">
                                    <?php 
                                        foreach($listDias as $dia)
                                        {

                                            echo "<option value='".$dia->cod_dia."'>".$dia->descripcion."</option>";

                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Entrada</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="timeEntrada"/>
                            </div>
                            <label class="col-sm-2 col-form-label">Salida</label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control"id="timeSalida"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Turno</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="selectTurno">
                                    <option value="M" selected>M</option>
                                    <option value="T">T</option>
                                    <option value="N">N</option>
                                </select>
                            </div>
                            <label class="col-sm-2 col-form-label">Cupos</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputCupos">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <?php echo "<button type='button' class='btn btn-success' onclick='RegistrarHorarioAdmin(\"".base_url()."\")'>Aceptar</button>"?>
                </div>
            </div>
        </div>
    </div>








    <?php if ($show == true) : ?>
        <?php echo "<script>Show" . $tipo . "('" . $message . "');</script>"; ?>
    <?php endif; ?>
   
    <script>
        $('#timeEntrada').timepicker({
            timeFormat: 'hh:mm p',
            interval: 50,
            minTime: '07:10',
            maxTime: '09:20pm',
            defaultTime: '07:10',
            startTime: '07:10',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('#timeSalida').timepicker({
            timeFormat: 'hh:mm p',
            interval: 50,
            minTime: '08:00',
            maxTime: '10:10pm',
            defaultTime: '08',
            startTime: '08:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('#tableHorariosAdmin').DataTable({
            scrollY: 250,
            scrollCollapse: true,
            paging: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No hay elementos encontrados!",
                "info": "Mostrando _TOTAL_ registros",
                "infoEmpty": "No hay elementos",
                "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
            },
            "lengthChange": false,
            "searching": false,
            "responsive": true,
            "info": false
        });
        $('[data-toggle="tooltip"]').tooltip();
    </script>

</body>

</html>