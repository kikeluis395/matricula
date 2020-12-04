<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Matricula | Asignaturas</title>
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
                                <li class="breadcrumb-item active">Asignaturas</li>
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
                                    <h2>Pagos</h2>
                                    <span>Pagos segun la cantidad de creditos</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrapper wrapper-content animated fadeInDown" style="opacity: 1;">
                        <div class="no-margins" style="opacity: 1;">
                           
                            <?php if(count($listPeriodos)>0):?>
                            <div class="card" style="font-size: 14px">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="form-group-inline">
                                            <label for="exampleFormControlSelect1">Periodo</label>
                                            <select class="form-control" id="selectPeriodo" onchange="VerAsignaturas('<?php echo base_url()?>')">
                                                <?php 
                                                    foreach($listPeriodos as $periodo)
                                                    {

                                                        echo "<option value='".$periodo->periodo."'>".$periodo->periodo."</option>";

                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body body-asignaturas">

                                    <table class="table table-hover" id="tableAsignaturas">
                                        <thead>
                                            <tr class="text-center">
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Créditos</th>
                                            <th scope="col">Ciclo</th>
                                            <th scope="col">Aula</th>
                                            <th scope="col">Docente</th>
                                            <th scope="col">Sección</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenedor-asignaturas">
                                        <?php 

                                        
                                            $cont = 1;
                                            $credititos=0;
                                            $totalsito= 0;
                                            foreach ($listAsignaturas as $asignatura)
                                                {
                                                    if($cont == 1)
                                                    {
                                                        echo "<tr>".
                                                            "<td>".$asignatura->descripcion."</td>".
                                                            "<td class='text-center'>".$asignatura->num_creditos."</td>".
                                                            "<td class='text-center'>".$asignatura->num_ciclo_fk."</td>".
                                                            "<td class='text-center'>".$asignatura->cod_aula."</td>".
                                                            "<td class='text-center'>".$asignatura->apellido_paterno. " " . $asignatura->apellido_materno . ", " . $asignatura->nombres."</td>".
                                                            "<td class='text-center'>".$asignatura->seccion."</td>".
                                                         "</tr>";

                                                         $asignaturaActual = $asignatura->cod_curso;
                                                         $credititos+=$asignatura->num_creditos;
                                                         $totalsito=$credititos*25;
                                                         $cont++;
                                                    }
                                                    

                                                    if($asignaturaActual != $asignatura->cod_curso)
                                                    {
                                                        echo "<tr>".
                                                            "<td>".$asignatura->descripcion."</td>".
                                                            "<td class='text-center'>".$asignatura->num_creditos."</td>".
                                                            "<td class='text-center'>".$asignatura->num_ciclo_fk."</td>".
                                                            "<td class='text-center'>".$asignatura->cod_aula."</td>".
                                                            "<td class='text-center'>".$asignatura->apellido_paterno. " " . $asignatura->apellido_materno . ", " . $asignatura->nombres."</td>".
                                                            "<td class='text-center'>".$asignatura->seccion."</td>".
                                                         "</tr>";

                                                         $asignaturaActual = $asignatura->cod_curso;
                                                         $credititos+=$asignatura->num_creditos;
                                                         $totalsito=$credititos*25;
                                                    }
                                                    
                                                    
                                                }       
                                        
                                                                         
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#modalRealizarPago">
                                Realizar Pago
                            </button>
                            <?php endif; ?>


                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>
    <?php require_once(APPPATH . 'views/layout/_js.php'); ?>
    <div class="modal fade bd-example-modal-m" id="modalRealizarPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <!-- PAGO POR CREDITO -->
            <div class="modal-content" id="contenedor-horarios-matriculados">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-lg-5 col-sm-5">
                                <h5>Resumen del pago</h5>
                            </div>
                            <table class="table table-hover" id="tableAsignaturas">
                                <thead>
                                    <tr class="text-center">
                                    <th scope="col">Cantidad de creditos</th>
                                    <th scope="col">Precio por credito</th>
                                    <th scope="col">Total a pagar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td><?php echo "$credititos"?></td>
                                    <td>25 PEN</td>
                                    <td><?php echo "$totalsito"." PEN" ?></td>
                                 </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-5 col-lg-5 col-sm-5 ">
                                <form class="login100-form centrado" action="SignIn" method="post">
                                    <!-- <span class="login100-form-title p-b-20">
                                        Pago por depósito
                                    </span>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="codigo" placeholder="Numero de liquidación">
                                    </div>
                                    <div style="display:none">
                                        <input class="form-control" type="text" name="codigo" placeholder="Numero de liquidación" value="<?php echo "$totalsito"?>">
                                    </div> -->
                                    <div id="paypal-button-container"></div>
                                    <!-- <button class="login100-form-btn" type="submit">
                                        Ingresar
                                    </button> -->
                                </form>
                                <?php $totalsito=$totalsito*0.28;?>
    <script>
        paypal.Buttons({
            
            createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                purchase_units: [{
                amount: 
                    {
                        value: '<?php echo"$totalsito";?>'
                    }
                    }]
                });
            },
        onApprove: function(data, actions) {
        // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
             alert('Transaction completed by ' + details.payer.name.given_name);
            });
        }
        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.
    </script>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- FIN PAGO POR CREDITO -->
            <!-- DATOS DEL PAGO -->

        </div>
    </div>

    <script>
        $('[data-toggle="tooltip"]').tooltip();
    </script>

    <?php if($show == true) : ?>
    <?php echo "<script>Show".$tipo."('".$message."');</script>"; ?>
    <?php endif; ?>
    
</body>

</html>