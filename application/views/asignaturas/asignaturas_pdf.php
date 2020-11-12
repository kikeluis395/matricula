<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF | Asignaturas</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        
        body{
            font-size: 14px;
        }

        .table{
            border-collapse: collapse;
            width: 100%
        }

        thead{
            background-color: #3266a8;
            color: #fff;
            font-weight: bold;
        }

        tbody tr td, thead tr th{
            padding: 5px;
            border: 2px solid #000;
        }


        p{
            display: inline;
            margin-left: 20px;
        }

        .parametro{
            margin: 15px 0px;
            width: 100%
        }

        label{
            width: 400px!important
        }

    </style>

</head>

<body>
    <?php date_default_timezone_set("America/Lima");
    ?>
    <img src="./assets/img/logosebap.jpg" alt="UNFV Logo" width="150px" class="">
    <center>
    <div class="universidad">
        <span style="font-weight: bold; font-size: 18px;margin-bottom: 25px"><?php echo $universidad?></span>
    </div>

    <div class="titulo">
        <span style="font-weight: bold; font-size: 18px;margin-bottom: 25px">BOLETA DE MATRICULA</span>
    </div>
    </center>
   
    <div class="parametro">
        <label>ESPECIALIDAD:</label>
        <p>&nbsp;<?php echo strtoupper($carrera->descripcion)?></p>
    </div>

    <div class="parametro">
        <label>ALUMNO:</label>
        <p><?php echo strtoupper($usuario->apellido_paterno) . " " . strtoupper($usuario->apellido_materno) . " " . strtoupper($usuario->nombres)?></p>
    </div>

    <div class="parametro">
        <label>EMAIL:</label>
        <p>&nbsp;<?php echo strtoupper($usuario->cod_alumno)?></p>
    </div>

    <div class="parametro">
        <label>FECHA:</label>
        <p>&nbsp;<?php echo date('d') . "/" . date('m') . "/" . date('Y') . " " . date('g') . ":" . date('i') . ":" . date('s') . " " . date('A')?></p>
    </div>

    <div class="parametro">
        <label>PERIODO:</label>
        <p><?php echo strtoupper($asignatura->periodo)?></p>
    </div>

    <table class="table">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Código</th>
                <th scope="col">Asignatura</th>
                <th scope="col">Créditos</th>
                <th scope="col">Sección</th>
                <th scope="col">Ciclo</th>
            </tr>
        </thead>
        <tbody>
        <?php 

        
            $cont = 1;
            $totalCreditos = 0;
            foreach ($listAsignaturas as $asignatura)
                {
                    if($cont == 1)
                    {
                        echo "<tr>".
                                "<td style='text-align: center'>".$asignatura->cod_curso."</td>".
                                "<td>".$asignatura->descripcion."</td>".
                                "<td style='text-align: center'>".$asignatura->num_creditos."</td>".
                                "<td style='text-align: center'>".$asignatura->seccion."</td>".
                                "<td style='text-align: center'>".$asignatura->num_ciclo_fk."</td>".
                         "</tr>";

                         $asignaturaActual = $asignatura->cod_curso;

                         $cont++;
                         $totalCreditos += $asignatura->num_creditos;
                    }
                    

                    if($asignaturaActual != $asignatura->cod_curso)
                    {
                        echo "<tr>".
                                "<td style='text-align: center'>".$asignatura->cod_curso."</td>".
                                "<td>".$asignatura->descripcion."</td>".
                                "<td style='text-align: center'>".$asignatura->num_creditos."</td>".
                                "<td style='text-align: center'>".$asignatura->turno."</td>".
                                "<td style='text-align: center'>".$asignatura->num_ciclo_fk."</td>".

                         "</tr>";

                         $asignaturaActual = $asignatura->cod_curso;
                         $totalCreditos += $asignatura->num_creditos;
                    }
                    
                }     
                echo "<tr>";
                echo "<td></td>";
                echo "<td style='text-align: right'>Total de Creditos:</td>";  
                echo "<td style='text-align: center'>".$totalCreditos."</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
        ?>
        </tbody>
    </table>
                               

    
</body>

</html>