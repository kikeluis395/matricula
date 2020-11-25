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

    public function getAlumnoAll(string $diplomado){

        $filtros = array(
            "di.descripcion" => $diplomado
        );

        $this->db->select('al.cod_alumno, al.dni_fk, pe.apellido_paterno, pe.apellido_materno, pe.nombres, al.anio_ingreso, al.iglesia');
        $this->db->join('persona as pe', 'al.dni_fk = pe.dni');
        $this->db->join('diplomado as di', 'al.cod_carrera_fk = di.cod_carrera');
        return $this->db->get_where("alumno as al", $filtros)->result();

    }

    public function getAlumnoByDni(string $dni){

        $filtros = array(
            "dni_fk" => $dni
        );

        $this->db->join('persona as pe', 'pe.dni = al.dni_fk');
        return $this->db->get_where("alumno as al", $filtros)->row();
    }

    public function getAlumnoJoinMatricula(string $cod_alumno){

        $this->db->select('ma.anio');
        $this->db->join('matricula as ma', 'al.cod_alumno = ma.cod_alumno_fk');
        $this->db->order_by('ma.anio', 'DESC');
        $this->db->where('al.cod_alumno', $cod_alumno);
        $query = $this->db->get('alumno as al');

        return $query->row();

    }

    public function modifyEstadoAlumno(string $cod_alumno, int $estado){

        $data = array(
            "estado" => $estado
        );

        $this->db->reset_query();
        $this->db->where('cod_alumno', $cod_alumno);
        $this->db->update('alumno',$data);

    }
}