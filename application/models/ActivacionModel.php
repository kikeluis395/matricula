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

}