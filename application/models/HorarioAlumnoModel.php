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


    public function getHorariosAlumnoJoinCursoByMatricula(string $cod_matricula){

        $filtros = array(
            "ho_al.cod_matricula_fk" => $cod_matricula
        );

        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.num_ciclo_fk, doc.apellido_paterno, doc.apellido_materno, doc.nombres, au.cod_aula, ho_cu.seccion, ho_cu.turno, ho_al.vez, ho_al.periodo');
        $this->db->join('horario_curso as ho_cu', 'ho_al.cod_horario_curso_fk = ho_cu.cod_horario_curso');
        $this->db->join('docente as doc', 'ho_cu.cod_docente_fk = doc.cod_docente');
        $this->db->join('aula as au', 'ho_cu.cod_aula_fk = au.cod_aula');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $query = $this->db->get_where('horario_alumno as ho_al', $filtros);

        return $query->result();
    }

    public function getPeriodosByMatriculaAndAlumno(string $cod_alumno){

        $filtros = array(
            "al.cod_alumno" => $cod_alumno
        );

        $this->db->select('ho_al.periodo');
        $this->db->distinct();
        $this->db->join('matricula as ma', 'ma.cod_matricula = ho_al.cod_matricula_fk');
        $this->db->join('alumno as al', 'al.cod_alumno = ma.cod_alumno_fk');
        $this->db->order_by('ho_al.periodo', 'DESC');
        $query = $this->db->get_where('horario_alumno as ho_al', $filtros);

        return $query->result();
    }

    public function getHorariosAlumnoJoinCursoByPeriodo(string $periodo){

        $filtros = array(
            "ho_al.periodo" => $periodo
        );

        $this->db->select('ho_al.cod_matricula_fk, cu.cod_curso, cu.descripcion, cu.num_creditos, cu.num_ciclo_fk, pe.apellido_paterno, pe.apellido_materno, pe.nombres, au.cod_aula, ho_cu.seccion, ho_cu.turno, ho_al.vez, ho_al.periodo');
        $this->db->join('horario_curso as ho_cu', 'ho_al.cod_horario_curso_fk = ho_cu.cod_horario_curso');
        $this->db->join('docente as doc', 'ho_cu.cod_docente_fk = doc.cod_docente');
        $this->db->join('aula as au', 'ho_cu.cod_aula_fk = au.cod_aula');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->join('persona as pe', 'doc.dni_fk = pe.dni');
        $query = $this->db->get_where('horario_alumno as ho_al', $filtros);

        return $query->result();
    }

    public function deleteHorarioAlumnoByListHorarioCurso(array $listHorarioCurso){

        $listCodHorarioCurso = array();

        foreach($listHorarioCurso as $horarioCurso)
        {

            array_push($listCodHorarioCurso, $horarioCurso->cod_horario_curso);

        }

        
        $this->db->where_in('cod_horario_curso_fk', $listCodHorarioCurso);
        $this->db->delete('horario_alumno');

    }
}