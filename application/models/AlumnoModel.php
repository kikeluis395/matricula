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

    public function getAlumnoByDni(string $dni){

        $filtros = array(
            "dni_fk" => $dni
        );

        $this->db->join('persona as pe', 'pe.dni = al.dni_fk');
        return $this->db->get_where("alumno as al", $filtros)->row();
    }
}