<?php 
  $cont = 1;
  foreach ($listCursosPermitidos as $cursoPermitido) {
        if ($cont == 1) {
          echo "<tr>".
                  "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Elegir curso' onclick='VerHorariosDisponibles(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\")'><i class='fas fa-sign-in-alt'></i></button></td>".
                  "<td>".$cursoPermitido->descripcion."</td>".
                  "<td class='text-center'>".$cursoPermitido->num_creditos."</td>".
                  "<td class='text-center'>".$cursoPermitido->num_ciclo."</td>".
               "</tr>";
               $cursoActual = $cursoPermitido->cod_curso;

              $cont++;
        }
        if ($cursoActual != $cursoPermitido->cod_curso) {
          echo "<tr>".
                  "<td class='text-center'><button type='button' class='btn btn-primary btn-sm' data-toggle='tooltip' data-placement='top' title='Elegir curso' onclick='VerHorariosDisponibles(\"".base_url()."\",\"".$cursoPermitido->cod_curso."\")'><i class='fas fa-sign-in-alt'></i></button></td>".
                  "<td>".$cursoPermitido->descripcion."</td>".
                  "<td class='text-center'>".$cursoPermitido->num_creditos."</td>".
                  "<td class='text-center'>".$cursoPermitido->num_ciclo."</td>".
               "</tr>";
               $cursoActual = $cursoPermitido->cod_curso;
        }
  }                                        
  ?>