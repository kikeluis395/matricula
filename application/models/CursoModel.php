<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CursoModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getNumMaxCiclo(int $cod_plan_curricular){

        $filtros = array(
            "cod_plan_curricular_fk" => $cod_plan_curricular
        );

        $this->db->reset_query();
        $this->db->select('num_ciclo_fk, descripcion');
        $this->db->order_by('num_ciclo_fk', 'DESC')->limit(1);
        $query = $this->db->get_where('curso', $filtros);

        return $query->row();
        
    }

    public function getCursos(int $cod_plan_curricular){

        $filtros = array(
            "cod_plan_curricular_fk" => $cod_plan_curricular
        );

        $this->db->reset_query();
        $query = $this->db->get_where('curso', $filtros);

        return $query->result();
        
    }

}