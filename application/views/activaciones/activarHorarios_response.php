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

                                if ($activacionHorarios->estado == 1) {

                                    echo "ACTIVADO";
                                } else {

                                    echo "DESACTIVADO";
                                }

                                ?>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Periodo actual:</label>
                        <div class="col-sm-5">
                            <label class="col-form-label">
                                <?php

                                if ($activacionHorarios->periodo == 1) {

                                    echo "I";
                                } else {

                                    echo "II";
                                }

                                ?>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Elegir periodo:</label>
                        <select class="form-control col-sm-5" id="selectPeriodo">
                            <?php

                            if ($activacionHorarios->periodo == 1) {

                                echo "<option value='1'selected>I</option>";
                                echo "<option value='2'>II</option>";
                            } else {

                                echo "<option value='1'>I</option>";
                                echo "<option value='2' selected>II</option>";
                            }
                            ?>
                        </select>
                        <div class="col-sm-4">
                            <?php

                                if($activacionHorarios->estado == 1)
                                {

                                    echo "<button type='button' class='btn btn-warning' onclick='CambiarEstado(\"".base_url()."\",\"".$activacionHorarios->estado."\",\"Horarios\")'>Desactivar</button>";

                                }else
                                {

                                    echo "<button type='button' class='btn btn-success' onclick='CambiarEstado(\"".base_url()."\",\"".$activacionHorarios->estado."\",\"Horarios\")'>Activar</button>";

                                }

                            ?>
                        </div>
                    </div>
                </div>

            </div>





        </div>

    </div>

</div>