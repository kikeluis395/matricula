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

    public function getCursosByAnio(int $anio){

        $filtros = array(
            "ci.num_anio" => $anio
        );

        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, ci.num_ciclo, ci.num_anio');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $query = $this->db->get_where('curso as cu', $filtros);

        return $query->result();

    }

    public function getCursosByCiclo(int $ciclo){

        $filtros = array(
            "ci.num_ciclo" => $ciclo
        );

        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, ci.num_ciclo, ci.num_anio');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $query = $this->db->get_where('curso as cu', $filtros);

        return $query->result();

    }

    public function getCurso(string $cod_curso){

        $filtros = array(
            "cu.cod_curso" => $cod_curso
        );

        $this->db->reset_query();
        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, ci.num_ciclo, ci.num_anio');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $query = $this->db->get_where('curso as cu', $filtros);

        return $query->row();
        
    }

    public function getCursoMaxAnioByPlanCurricular(int $cod_plan_curricular){

        $filtros = array(
            "cod_plan_curricular_fk" => $cod_plan_curricular
        );

        $this->db->reset_query();
        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, ci.num_ciclo, ci.num_anio');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $this->db->limit(1);
        $query = $this->db->get_where('curso as cu', $filtros);

        return $query->row();
    }

    public function getCursosByListAniosNotPre(array $listAnios){

        $this->db->reset_query();
        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, ci.num_ciclo, ci.num_anio');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $this->db->where_in('ci.num_anio', $listAnios);
        $this->db->where('cu.cod_curso NOT IN (SELECT cod_curso_fk FROM cursos_pre_requisitos)', NULL, FALSE);
        $query = $this->db->get('curso as cu');

        return $query->result();
    }

}