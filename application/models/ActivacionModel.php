<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ActivacionModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getActivacionByCodigo(string $cod_activacion){

        $filtros = array(
            "cod_activacion" => $cod_activacion
        );

        return $this->db->get_where("activacion", $filtros)->row();
    }

    public function modifyActivacionNoPeriodo(string $cod_activacion, int $estado){

        $data = array(
            "estado" => $estado
        );

        $this->db->where('cod_activacion', $cod_activacion);
        $this->db->update('activacion',$data);

    }

    public function modifyActivacionWithPeriodo(string $cod_activacion, int $estado, string $periodo){

        $data = array(
            "estado" => $estado,
            "periodo" => $periodo
        );

        $this->db->where('cod_activacion', $cod_activacion);
        $this->db->update('activacion',$data);

    }


}