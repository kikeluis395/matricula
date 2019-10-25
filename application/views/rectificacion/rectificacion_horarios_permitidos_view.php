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
                                                        "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Elegir curso' onclick='VerHorariosDisponiblesTodosRectificacion(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\")'><i class='fas fa-sign-in-alt'></i></button></td>".
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