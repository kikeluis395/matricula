<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DiaModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getDias(){

        return $this->db->query("SELECT * FROM DIA")->result();

    }

    
}