<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getUser(string $codigo, string $clave){

        $filtros = array(
            "codigo" => $codigo,
            "clave" => $clave
        );

        return $this->db->get_where("usuario", $filtros)->row();
    }

    public function getUserJoinAlumno(string $codigo, string $clave){

        $filtros = array(
            "us.codigo" => $codigo,
            "us.clave" => $clave
        );

        $this->db->reset_query();
        $this->db->join('alumno as al', 'us.dni_fk = al.dni_fk');
        $this->db->join('persona as pe', 'pe.dni = us.dni_fk');
        return $this->db->get_where("usuario as us", $filtros)->row();
    }

    public function getUserJoinAdministrador(string $codigo, string $clave){

        $filtros = array(
            "us.codigo" => $codigo,
            "us.clave" => $clave
        );

        $this->db->reset_query();
        $this->db->join('administrador as ad', 'us.dni_fk = ad.dni_fk');
        $this->db->join('persona as pe', 'pe.dni = us.dni_fk');
        return $this->db->get_where("usuario as us", $filtros)->row();
    }
}