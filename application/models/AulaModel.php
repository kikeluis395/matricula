<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AulaModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getAula(){

        return $this->db->query("SELECT * FROM AULA")->result();

    }

    
}