<div class="card" style="padding: 10px">
    <div class="card-body">
        <div class="text-center">


            <div class="row" style="margin-top: 15px">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Estado actual:</label>
                        <div class="col-sm-5">
                            <label class="col-form-label">
                                <?php

                                if ($activacionPago->estado == 1) {

                                    echo "ACTIVADO";
                                } else {

                                    echo "DESACTIVADO";
                                }

                                ?>
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <?php

                            if ($activacionPago->estado == 1) {

                                echo "<button type='button' class='btn btn-warning' onclick='CambiarEstado(\"" . base_url() . "\",\"" . $activacionPago->estado . "\",\"Pago\")'>Desactivar</button>";
                            } else {

                                echo "<button type='button' class='btn btn-success' onclick='CambiarEstado(\"" . base_url() . "\",\"" . $activacionPago->estado . "\",\"Pago\")'>Activar</button>";
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>

</div>