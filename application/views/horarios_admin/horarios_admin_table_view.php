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
<?php if ($show == true) : ?>
    <?php echo "<script>Show" . $tipo . "('" . $message . "');</script>"; ?>
<?php endif; ?>

