<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursoPreRequisitoModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getCursosPreRequisito(string $cod_curso){

        $filtros = array(
            "cod_curso_fk" => $cod_curso
        );

        $query = $this->db->get_where('cursos_pre_requisitos', $filtros);

        return $query->result();
        
    }

    

}