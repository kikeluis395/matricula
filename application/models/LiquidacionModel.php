<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LiquidacionModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function verificarPago(string $cod_liquidacion){

        $filtros = array(
            "cod_liquidacion" => $cod_liquidacion
        );

        return $this->db->get_where("liquidacion", $filtros)->row();
    }
}