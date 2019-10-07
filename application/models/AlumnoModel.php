<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AlumnoModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAlumnos(){

        return $this->db->query("SELECT * FROM ALUMNO")->result();

    }

    public function getAlumno(string $cod_alumno_fk){

        $filtros = array(
            "cod_alumno" => $cod_alumno_fk
        );

        return $this->db->get_where("alumno", $filtros)->row();
    }
}