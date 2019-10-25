<div class="modal-header">
    <div>
    <h5 class="modal-title" id="modalHorariosDisponibles"><?php echo $curso->cod_curso . ' - ' . $curso->descripcion?></h5>
    <span>Créditos: <?php echo $curso->num_creditos?></span>
    <br>
        <span>Ciclo:
            <?php 
                function a_romano($integer, $upcase = true) 
                {
                    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 
                                   'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9,   
                                   'V'=>5, 'IV'=>4, 'I'=>1);
                    $return = '';
                    while($integer > 0) 
                    {
                        foreach($table as $rom=>$arb) 
                        {
                            if($integer >= $arb)
                            {
                                $integer -= $arb;
                                $return .= $rom;
                                break;
                            }
                        }
                    }
                    return $return;
                }

                echo a_romano($curso->num_ciclo);
            ?>
        </span>    
</div>
        
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        
      </div>
      <div class="modal-body">
      <div class="table-responsive-sm table-responsive-md table-responsive-lg">
        <table class="table table-hover" id="tableHorariosElegidos">
            <thead>
                <tr class="text-center">
                    <th scope="col">Acción</th>
                    <th scope="col">Sección</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miercoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                    <th scope="col">Sabado</th>
                    <th scope="col">Docente</th>
                </tr>
            </thead>
            <tbody class="text-center">
            <?php 
            
            $seccion_actual = '';
            $countSeccionActual = 0;
            $ultimo_dia = 0;
            $count_list = count($listHorariosDisponibles);

            foreach ($listHorariosDisponibles as $horarioDisponible)
                {

                    if($horarioDisponible->seccion == $seccion_actual){

                        $countSeccionActual++;

                        if($horarioDisponible->cod_dia_fk == $ultimo_dia)
                        {
                            echo "<span class='badge badge-info'>".$horarioDisponible->hora_entrada ." - " . $horarioDisponible->hora_salida."</span>";
                            continue;
                        }else
                        {
                            echo "</td>";
                        }

                        for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                        {
                            
                            if($horarioDisponible->cod_dia_fk == $dia)
                            {

                                echo "<td><span class='badge badge-info'>".$horarioDisponible->hora_entrada ." - " . $horarioDisponible->hora_salida."</span></td>";
                                $ultimo_dia = $horarioDisponible->cod_dia_fk;
                                break;

                            }else
                            {
                                echo "<td></td>";
                            }
                        }

                        foreach($listCountGroupSeccion as $groupSeccion)
                            {
                                if($horarioDisponible->seccion == $groupSeccion->seccion)
                                {
                                    if($countSeccionActual == $groupSeccion->total)
                                    {
                                        for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                                        {
                                            
                                            echo "<td></td>";

                                        }

                                        echo "<td>".$horarioDisponible->apellido_paterno." ".$horarioDisponible->apellido_materno.", ".$horarioDisponible->nombres."</td>";
                        
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
                        $countSeccionActual = 0;
                        $seccion_actual = $horarioDisponible->seccion;
                        $countSeccionActual++;

                        echo "<tr>";

                            echo "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Elegir Horario' onclick='RegistrarHorarioRectificacion(\"".base_url()."\",\"".$horarioDisponible->cod_curso."\",\"".$horarioDisponible->seccion."\")'><i class='fas fa-sign-in-alt'></i></button></td>";
                            echo "<td>".$horarioDisponible->seccion."</td>";

                                for($dia = 1; $dia <= 6; $dia++)
                                {
                                    if($horarioDisponible->cod_dia_fk == $dia)
                                    {
                                        echo "<td><span class='badge badge-info'>".$horarioDisponible->hora_entrada ." - " . $horarioDisponible->hora_salida."</span>";
                                        $ultimo_dia = $horarioDisponible->cod_dia_fk;
                                        break 1;
                                    }else
                                    {
                                        echo "<td></td>";
                                    }
                                }

                            foreach($listCountGroupSeccion as $groupSeccion)
                            {
                                if($horarioDisponible->seccion == $groupSeccion->seccion)
                                {
                                    if($countSeccionActual == $groupSeccion->total)
                                    {
                                        echo "</td>";

                                        for($dia = $ultimo_dia + 1; $dia <= 6; $dia++)
                                        {
                                            
                                            echo "<td></td>";

                                        }

                                        echo "<td>".$horarioDisponible->apellido_paterno." ".$horarioDisponible->apellido_materno.", ".$horarioDisponible->nombres."</td>";
                        
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
            ?>
            </tbody>
        </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>

