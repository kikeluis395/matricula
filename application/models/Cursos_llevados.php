<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_llevados extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getCursosLlevados(string $cod_alumno){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno
        );

        return $this->db->select('cod_curso_fk')->get_where('cursos_llevados', $filtros)->result();

        
    }

}