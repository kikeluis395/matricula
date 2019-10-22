<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Rectificacion</title>
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
                                    <span>Elegir horarios de acuerdo a los cursos deseados.</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="wrapper wrapper-content animated fadeInDown" style="opacity: 1;">

                        <div class="no-margins" style="opacity: 1;">
                           

                            <div class="card" style="font-size: 14px">
                                <div class="card-header">
                                    <div class="card-title">Cursos Permitidos</div>
                                </div>
                                <div class="card-body body-cursos-permitidos">

                                    <table class="table table-hover" id="tableCursosPermitidos">
                                        <thead>
                                            <tr class="text-center">
                                            <th scope="col">Acción</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Créditos</th>
                                            <th scope="col">Ciclo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($listCursosPermitidos as $cursoPermitido)
                                            {
                                                echo "<tr>".
                                                        "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Elegir curso' onclick='VerHorariosDisponibles(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\")'><i class='fas fa-sign-in-alt'></i></button></td>".
                                                        "<td>".$cursoPermitido->descripcion."</td>".
                                                        "<td class='text-center'>".$cursoPermitido->num_creditos."</td>".
                                                        "<td class='text-center'>".$cursoPermitido->num_ciclo."</td>".
                                                     "</tr>";
                                            }                                        
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalHorariosMatriculados">
                                Ver Horarios Matriculados
                            </button>

                            
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>
    <?php require_once(APPPATH . 'views/layout/_js.php'); ?>
    <!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="modalHorariosMatriculados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" id="contenedor-horarios-matriculados">
    <div class="modal-header">
    <h5 class="modal-title">Horarios Matriculados</h5>
      
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
    </div>
    <div class="modal-body body-cursos-matriculados">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg">
        <table class="table table-hover" id="tableHorariosElegidos">
            <thead>
                <tr class="text-center">
                    <th scope="col">Código</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miércoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                    <th scope="col">Sábado</th>
                    <th scope="col">Docente</th>
                    <th scope="col" colspan="2">Acción</th>
                </tr>
            </thead>
            <tbody class="text-center" style="font-size:13px">
            <?php 
            
            if(count($listHorariosMatriculados) > 0)
            {

              $curso_actual = '';
              $countCursoActual = 0;
              $ultimo_dia = 0;
              $count_list = count($listHorariosMatriculados);

              foreach ($listHorariosMatriculados as $horarioMatriculado)
                {

                  if($horarioMatriculado->cod_curso == $curso_actual)
                  {

                    $countCursoActual++;

                        if($horarioMatriculado->cod_dia_fk == $ultimo_dia)
                        {
                            echo "<span class='badge badge-info'>".$horarioMatriculado->hora_entrada ." - " . $horarioMatriculado->hora_salida."</span>";
                            continue;
                        }else
                        {
                            echo "</td>";
                        }

                        for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                        {
                            
                            if($horarioMatriculado->cod_dia_fk == $dia)
                            {

                                echo "<td><span class='badge badge-info'>".$horarioMatriculado->hora_entrada ." - " . $horarioMatriculado->hora_salida."</span></td>";
                                $ultimo_dia = $horarioMatriculado->cod_dia_fk;
                                break;

                            }else
                            {
                                echo "<td></td>";
                            }
                        }

                        foreach($listCountGroupCurso as $groupCurso)
                            {
                                if($horarioMatriculado->cod_curso == $groupCurso->cod_curso_fk)
                                {
                                    if($countCursoActual == $groupCurso->total_horarios)
                                    {
                                        for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                                        {
                                            
                                            echo "<td></td>";

                                        }

                                        echo "<td>".$horarioMatriculado->apellido_paterno." ".$horarioMatriculado->apellido_materno.", ".$horarioMatriculado->nombres."</td>";
                                        echo "<td class='text-center'><button type='button' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Dejar curso' onclick='DejarCurso(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\",\"".$horarioMatriculado->seccion."\")'><i class='fas fa-trash'></i></button></td>";
                                        echo "<td class='text-center'><button type='button' class='btn btn-info btn-sm' data-toggle='tooltip' data-placement='top' title='Cambiar horario' onclick='VerHorariosDisponiblesRectificacion(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\",\"".$horarioMatriculado->seccion."\")'><i class='fas fa-exchange-alt'></i></button></td>";
                                        echo "</tr>";

                                        break;
                                    }else
                                    {
                                        break;
                                    }
                                }
                            }



                  }else
                  {

                    $countCursoActual = 0;
                    $curso_actual = $horarioMatriculado->cod_curso;
                    $countCursoActual++;

                    echo "<tr>".
                          "<td>".$horarioMatriculado->cod_curso."</td>".
                          "<td>".$horarioMatriculado->descripcion."</td>".
                          "<td>".$horarioMatriculado->seccion."</td>";

                    for($dia = 1; $dia <= 6; $dia++)
                    {
                        if($horarioMatriculado->cod_dia_fk == $dia)
                        {
                            echo "<td><span class='badge badge-info'>".$horarioMatriculado->hora_entrada ." - " . $horarioMatriculado->hora_salida."</span>";
                            $ultimo_dia = $horarioMatriculado->cod_dia_fk;
                            break 1;
                        }else
                        {
                            echo "<td></td>";
                        }
                    }

                    foreach($listCountGroupCurso as $groupCurso)
                    {
                        if($horarioMatriculado->cod_curso == $groupCurso->cod_curso_fk)
                        {
                            if($countCursoActual == $groupCurso->total_horarios)
                            {
                                echo "</td>";

                                for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                                {
                                    
                                    echo "<td></td>";

                                }

                                echo "<td>".$horarioMatriculado->apellido_paterno." ".$horarioMatriculado->apellido_materno.", ".$horarioMatriculado->nombres."</td>";
                                echo "<td class='text-center'><button type='button' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Dejar curso' onclick='DejarCurso(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\",\"".$horarioMatriculado->seccion."\")'><i class='fas fa-trash'></i></button></td>";
                                echo "<td class='text-center'><button type='button' class='btn btn-info btn-sm' data-toggle='tooltip' data-placement='top' title='Cambiar horario' onclick='VerHorariosDisponiblesRectificacion(\"".base_url()."\",\"".$horarioMatriculado->cod_curso."\",\"".$horarioMatriculado->seccion."\")'><i class='fas fa-exchange-alt'></i></button></td>";
                                echo "</tr>";

                                break;
                            }else
                            {
                                break;
                            }
                        }
                    }


                  }
                         
                } 
            }

                                                   
            ?>
            </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <?php 
            if(count($listHorariosMatriculados) > 0)
            {
                echo "<button type='button' class='btn btn-primary' onclick='RegistrarCursosLlevados(\"".base_url()."\")'>Registrar Matrícula</button>";
            }
        ?>
      </div>
    </div>
  </div>
</div>






    
    
    <?php if($show == true) : ?>
    <?php echo "<script>Show".$tipo."('".$message."');</script>"; ?>
    <?php endif; ?>
    <script>
        // $('#tableCursosPermitidos').DataTable( {
        //     scrollY:        250,
        //     scrollCollapse: true,
        //     paging:         false,
        //     "language": {
        //         "lengthMenu": "Mostrar _MENU_ registros por página",
        //         "zeroRecords": "No hay elementos encontrados!",
        //         "info": "Mostrando _TOTAL_ registros",
        //         "infoEmpty": "No hay elementos",
        //         "infoFiltered": "(Filtrado de _MAX_ registros totales)",
        //         "search": "Buscar:",
        //     },
        //     "lengthChange": false,
        //     "searching": false,
        //     "responsive": true,
        //     "info":     false
        // });


        $('[data-toggle="tooltip"]').tooltip();
    </script>

     <!-- Modal -->
 <div class="modal fade bd-example-modal-xl" id="modalHorariosDisponibles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content" id="contenedor-horarios-disponibles">
        
    </div>
  </div>
</div>
</body>

</html>