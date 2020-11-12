<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_curricular extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getCursosFromPlan(int $cod_plan_curricular){

        $filtros = array(
            "cod_plan_curricular_fk" => $cod_plan_curricular
        );

        return $this->db->get_where('curso', $filtros)->result();

        
    }

    public function getCodPlan(string $usuario){

        $filtros = array(
            "al.cod_alumno" => $usuario
        );

        $this->db->select('al.cod_alumno, pc.cod_plan_curricular, pc.cod_carrera_fk');
        $this->db->join('plan_curricular as pc', 'al.cod_carrera_fk = pc.cod_carrera_fk');
        $this->db->join('curso as cu', 'cu.cod_plan_curricular_fk = pc.cod_plan_curricular');
        $this->db->limit(1);
        $query = $this->db->get_where('alumno as al', $filtros);

        return $query->row();

        
    }


    public function getPlanCurricularByCarrera(string $cod_carrera_fk){

    	$filtros = array(
            "cod_carrera_fk" => $cod_carrera_fk
        );

        
        $this->db->order_by('anio','DESC')->limit(1);
        $query = $this->db->get_where('plan_curricular', $filtros);
        return $query->row();
    }
}