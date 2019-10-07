<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuarioModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getUser(string $cod_alumno_fk, string $clave){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno_fk,
            "clave" => $clave
        );

        return $this->db->get_where("usuario", $filtros)->row();
    }
}