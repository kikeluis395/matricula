<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PDF | REGISTRO DE ALUMNOS</title>
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
    <img src="./assets/img/logosebap.jpg" alt="SEBAP Logo" width="150px" class="">
    <center>
    <div class="universidad">
        <span style="font-weight: bold; font-size: 18px;margin-bottom: 25px"><?php echo $universidad?></span>
    </div>

    <div class="titulo">
        <span style="font-weight: bold; font-size: 18px;margin-bottom: 25px">REGISTRO DE ALUMNOS</span>
    </div>
    </center>
   
    <div class="parametro">
        <label>ADMINISTRADOR:</label>
        <p><?php echo strtoupper($usuario->apellido_paterno) . " " . strtoupper($usuario->apellido_materno) . " " . strtoupper($usuario->nombres)?></p>
    </div>

    <div class="parametro">
        <label>EMAIL:</label>
        <p>&nbsp;<?php echo strtoupper($usuario->cod_administrador)?></p>
    </div>

    <div class="parametro">
        <label>FECHA:</label>
        <p>&nbsp;<?php echo date('d') . "/" . date('m') . "/" . date('Y') . " " . date('g') . ":" . date('i') . ":" . date('s') . " " . date('A')?></p>
    </div>

    <div class="parametro">
        <label>DIPLOMADO:</label>
        <p><?php echo strtoupper($diplomado)?></p>
    </div>

    <table class="table">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Email</th>
                <th scope="col">DNI</th>
                <th scope="col">Nombres y Apellidos</th>
                <th scope="col">Año de ingreso</th>
                <th scope="col">Iglesia</th>
            </tr>
        </thead>
        <tbody>
        <?php 

        
            $cont = 1;
            if(!empty($listAlumnos)){
              foreach ($listAlumnos as $alumno)
                  {
                      if($cont == 1)
                      {
                          echo "<tr>".
                                  "<td style='text-align: center'>".$alumno->cod_alumno."</td>".
                                  "<td style='text-align: center'>".$alumno->dni_fk."</td>".
                                  "<td>".$alumno->apellido_paterno. $alumno->apellido_materno. $alumno->nombres."</td>".
                                  "<td style='text-align: center'>".$alumno->anio_ingreso."</td>".
                                  "<td style='text-align: center'>".$alumno->iglesia."</td>".
                          "</tr>";

                          $alumnoActual = $alumno->cod_alumno;
                          $cont++;
                      }
                      

                      if($alumnoActual != $alumno->cod_alumno)
                      {
                          echo "<tr>".
                                  "<td style='text-align: center'>".$alumno->cod_alumno."</td>".
                                  "<td style='text-align: center'>".$alumno->dni_fk."</td>".
                                  "<td>".$alumno->apellido_paterno. $alumno->apellido_materno. $alumno->nombres."</td>".
                                  "<td style='text-align: center'>".$alumno->anio_ingreso."</td>".
                                  "<td style='text-align: center'>".$alumno->iglesia."</td>".
                          "</tr>";

                          $alumnoActual = $alumno->cod_alumno;
                      }
                      
                  }
            }     
        ?>
        </tbody>
    </table>
                               

    
</body>

</html>