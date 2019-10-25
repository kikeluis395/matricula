<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos_llevados extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getCursosLlevados(string $cod_alumno){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno
        );

        return $this->db->select('cod_curso_fk')->get_where('cursos_llevados', $filtros)->result();

        
    }

    public function getCursoLlevadoByCurso(string $cod_curso){

        $filtros = array(
            "cod_curso_fk" => $cod_curso
        );

        return $this->db->get_where('cursos_llevados', $filtros)->row();

    }

    public function insertCursoLlevado(string $cod_alumno, string $cod_curso, string $estado, int $intentos){

        $data = array(
            "cod_alumno_fk" => $cod_alumno,
            "cod_curso_fk" => $cod_curso,
            "estado" => $estado,
            "num_intentos" => $intentos
        );

        $this->db->insert('cursos_llevados', $data);
    }

    public function modifyCursoLlevado(string $cod_alumno, string $cod_curso, string $estado, int $intentos){

        $data = array(
            "estado" => $estado,
            "num_intentos" => $intentos
        );

        $this->db->where('cod_alumno_fk', $cod_alumno);
        $this->db->where('cod_curso_fk', $cod_curso);
        $this->db->update('cursos_llevados',$data);
    }

    public function getUltimoAnio(string $cod_alumno){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno
        );

        $this->db->select('cu.cod_curso, ci.num_anio');
        $this->db->join('curso as cu', 'cu_ll.cod_curso_fk = cu.cod_curso');
        $this->db->join('ciclo as ci', 'cu.num_ciclo_fk = ci.num_ciclo');
        $this->db->order_by('ci.num_anio', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get_where('cursos_llevados as cu_ll', $filtros);

        return $query->row();
    }

    public function getCursosLlevadosAprobados(string $cod_alumno){

        $filtros = array(
            "cod_alumno_fk" => $cod_alumno,
            "estado" => "APROBADO"
        );

        $query = $this->db->get_where('cursos_llevados', $filtros);

        return $query->result();
    }

    public function deleteCursosLlevadosByListHorarioCurso(array $listHorarioCurso, string $cod_alumno){

        $listCodCursoDeleted = array();
        $encontrado = false;

        foreach($listHorarioCurso as $horarioCurso)
        {

            

                array_push($listCodCursoDeleted, $horarioCurso->cod_curso_fk);

            
            
        }

        
        $this->db->where_in('cod_curso_fk', $listCodCursoDeleted);
        $this->db->where('cod_alumno_fk', $cod_alumno);
        $this->db->where('estado', 'EN CURSO');
        $this->db->delete('cursos_llevados');

    }

}