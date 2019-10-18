
<?php


$cont = 1;
foreach ($listAsignaturas as $asignatura) {
    if ($cont == 1) {
        echo "<tr>" .
            "<td class='text-center'>" . $asignatura->descripcion . "</td>" .
            "<td class='text-center'>" . $asignatura->num_creditos . "</td>" .
            "<td class='text-center'>" . $asignatura->num_ciclo_fk . "</td>" .
            "<td class='text-center'>" . $asignatura->cod_aula . "</td>" .
            "<td class='text-center'>" . $asignatura->apellido_paterno . " " . $asignatura->apellido_materno . ", " . $asignatura->nombres . "</td>" .
            "<td class='text-center'>" . $asignatura->seccion . "</td>" .
            "</tr>";

        $asignaturaActual = $asignatura->cod_curso;

        $cont++;
    }


    if ($asignaturaActual != $asignatura->cod_curso) {
        echo "<tr>" .
            "<td class='text-center'>" . $asignatura->descripcion . "</td>" .
            "<td class='text-center'>" . $asignatura->num_creditos . "</td>" .
            "<td class='text-center'>" . $asignatura->num_ciclo_fk . "</td>" .
            "<td class='text-center'>" . $asignatura->cod_aula . "</td>" .
            "<td class='text-center'>" . $asignatura->apellido_paterno . " " . $asignatura->apellido_materno . ", " . $asignatura->nombres . "</td>" .
            "<td class='text-center'>" . $asignatura->seccion . "</td>" .
            "</tr>";

        $asignaturaActual = $asignatura->cod_curso;
    }
}


?>
               