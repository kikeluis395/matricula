<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MatriculaModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getMatriculaFromAlumno(string $cod_alumno){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno,
            "anio" => date("Y")
        );

        return $this->db->get_where("matricula", $filtros)->row();
    }

    public function insertMatricula(string $cod_alumno, string $cod_pago, int $cod_plan_curricular){

        $anio = date("Y");
        $cod_matricula = $cod_alumno . $anio;

        $data = array(
            "cod_matricula" => $cod_matricula,
            "cod_pago_fk" => $cod_pago,
            "cod_alumno_fk" => $cod_alumno,
            "anio" => $anio,
            "cod_plan_curricular_fk" => $cod_plan_curricular
        );

        $this->db->insert('matricula', $data);

    }
}