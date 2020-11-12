<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarreraModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getCarreraJoinFacultad(string $cod_carrera){

        $filtros = array(
            "ca.cod_carrera" => $cod_carrera
        );

        $this->db->reset_query();
        $this->db->select('ca.descripcion, ca.escuela, ca.cod_facultad_fk, fa.descripcion as descripcion_facultad');
        $this->db->join('facultad as fa', 'ca.cod_facultad_fk = fa.cod_facultad');
        $query = $this->db->get_where('diplomado as ca', $filtros);

        return $query->row();
        
    }

}