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
                    <th scope="col">Acción</th>
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
                                echo "<td class='text-center'><button type='button' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Dejar curso' onclick='DejarCurso(\"".base_url()."\",\"".$horarioMatriculado->cod_curso."\",\"".$horarioMatriculado->seccion."\")'><i class='fas fa-trash'></i></button></td>";
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
                echo "<button type='button' class='btn btn-success' onclick='RegistrarCursosLlevados(\"".base_url()."\")'>
                        <a href='pago_matricula/pago_matricula' style='color:white'>
                            Realizar pago
                        </a>
                    </button>";
            }
        ?>
      </div>

      <?php if($show == true) : ?>
    <?php echo "<script>Show".$tipo."('".$message."');</script>"; ?>
    <?php endif; ?>

