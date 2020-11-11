<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrarseModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }
    public function insertPersona(string $dni, string $apellido_paterno, string $apellido_materno, string $nombres,  string $anio_nacimiento, string $sexo){

      $data = array(
          "dni" => $dni,
          "apellido_paterno" => $apellido_paterno,
          "apellido_materno" => $apellido_materno,
          "nombres" => $nombres,
          "anio_nacimiento" => $anio_nacimiento,
          "sexo" => $sexo
      );

      $this->db->insert('persona', $data);
    }
    public function insertUsuario(string $dni, string $email, string $pass, int $cod_nivel_fk){

        $data = array(
            "dni_fk" => $dni,
            "codigo" => $email,
            "clave" => $pass,
            "cod_nivel_fk" => $cod_nivel_fk
        );

        $this->db->insert('usuario', $data);
    }  
    public function insertAlumno(string $email, string $dni, string $anio_ingreso, string $cod_carrera_fk){

        $data = array(
            "cod_alumno" => $email,
            "dni_fk" => $dni,
            "anio_ingreso" => $anio_ingreso,
            "cod_carrera_fk" => $cod_carrera_fk
        );

        $this->db->insert('alumno', $data);
    } 
}