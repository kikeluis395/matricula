<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorarioAlumnoModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getHorariosAlumnoByMatricula(string $cod_matricula){

        $filtros = array(
            "cod_matricula_fk" => $cod_matricula
        );

        $query = $this->db->get_where('horario_alumno', $filtros);

        return $query->result();
    }

    public function insertHorarioAlumno($list_horario_curso, string $cod_matricula, string $periodo, int $vez){

        $data  =  array ();

        foreach($list_horario_curso as $horario_curso)
        {
            array_push($data,array(
                "cod_horario_curso_fk" => $horario_curso->cod_horario_curso,
                "cod_matricula_fk" => $cod_matricula,
                "periodo" => $periodo,
                "vez" => $vez
            ));
        }

        $this->db->insert_batch('horario_alumno', $data);
    }

}