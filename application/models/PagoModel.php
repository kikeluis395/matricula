<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getPago(int $cod_pago){

        $filtros = array(
            "cod_pago" => $cod_pago
        );

        return $this->db->get_where('pago', $filtros)->row();

    }

   public function insertPago(string $cod_liquidacion){

        $fecha = round(microtime(true) * 1000);
        $monto = "0";

        $data = array(
            "cod_pago" => $cod_liquidacion,
            "fecha" => $fecha,
            "monto" => $monto
        );

        $this->db->insert('pago', $data);

   }
}