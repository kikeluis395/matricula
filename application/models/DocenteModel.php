<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocenteModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getDocentes(){

        $this->db->join('persona as pe', 'pe.dni = do.dni_fk');
        $this->db->order_by('pe.apellido_paterno', 'ASC');
        return $this->db->get("docente as do")->result();
    }

    
}