<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HorariosModel extends CI_Model{

    function __construct()
    {
        parent::__construct();
    }

    public function getHorariosByCurso(string $cod_curso){

        $filtros = array(
            "cu.cod_curso" => $cod_curso
        );

        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, cu.num_ciclo_fk, ho_cu.seccion, di.descripcion, ho_cu.cod_dia_fk, pe.apellido_paterno, pe.apellido_materno, pe.nombres, ho_cu.hora_entrada, ho_cu.hora_salida');
        $this->db->join('docente as doc', 'ho_cu.cod_docente_fk = doc.cod_docente');
        $this->db->join('aula as au', 'ho_cu.cod_aula_fk = au.cod_aula');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->join('dia as di', 'ho_cu.cod_dia_fk = di.cod_dia');
        $this->db->join('persona as pe', 'doc.dni_fk = pe.dni');
        $this->db->order_by('ho_cu.seccion', 'ASC');
        $this->db->order_by('ho_cu.cod_dia_fk', 'ASC');
        $query = $this->db->get_where('horario_curso as ho_cu', $filtros);

        return $query->result();

    }

    public function getHorariosByCursoRectificacion(string $cod_curso, string $seccion){


        $this->db->select('cu.cod_curso, cu.descripcion, cu.num_creditos, cu.cod_plan_curricular_fk, cu.num_ciclo_fk, ho_cu.seccion, di.descripcion, ho_cu.cod_dia_fk, pe.apellido_paterno, pe.apellido_materno, pe.nombres, ho_cu.hora_entrada, ho_cu.hora_salida');
        $this->db->join('docente as doc', 'ho_cu.cod_docente_fk = doc.cod_docente');
        $this->db->join('aula as au', 'ho_cu.cod_aula_fk = au.cod_aula');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->join('dia as di', 'ho_cu.cod_dia_fk = di.cod_dia');
        $this->db->join('persona as pe', 'doc.dni_fk = pe.dni');
        $this->db->order_by('ho_cu.seccion', 'ASC');
        $this->db->order_by('ho_cu.cod_dia_fk', 'ASC');
        $this->db->where('ho_cu.cod_curso_fk', $cod_curso);
        $this->db->where('ho_cu.seccion !=', $seccion);
        $query = $this->db->get('horario_curso as ho_cu');

        return $query->result();

    }

    public function getCountGroupByCurso(string $cod_curso){

        $filtros = array(
            "cod_curso_fk" => $cod_curso
        );

        $this->db->select('seccion, count(*) as total');
        $this->db->group_by('seccion'); 
        $query = $this->db->get_where('horario_curso', $filtros);

        return $query->result();

    }

    public function getCuposByCursoAndSeccion(string $cod_curso, string $seccion){

        $filtros = array(
            "cod_curso_fk" => $cod_curso,
            "seccion" => $seccion
        );

        $this->db->reset_query();
        $this->db->select('cupos');
        $this->db->limit(1);
        $query = $this->db->get_where('horario_curso', $filtros);

        return $query->row();
    }

    public function getHorariosCursosByCursoAndSeccion(string $cod_curso, string $seccion){

        $filtros = array(
            "cod_curso_fk" => $cod_curso,
            "seccion" => $seccion
        );

        $this->db->reset_query();
        $query = $this->db->get_where('horario_curso', $filtros);

        return $query->result();
    }

    public function modifiyCuposByListHorariosCurso(array $list_horario_curso, int $cupos){

        $cupos_actual = $cupos - 1;
        $listIDHorarioCurso  =  array ();

        foreach($list_horario_curso as $horario_curso)
        {
            array_push($listIDHorarioCurso, $horario_curso->cod_horario_curso);
        }

        $data = array(
            "cupos" => $cupos_actual
        );

        $this->db->reset_query();
        $this->db->where_in('cod_horario_curso', $listIDHorarioCurso);
        $this->db->update('horario_curso',$data);

    }

    public function modifiyCuposByListHorariosCursoRectificacion(array $list_horario_curso, int $cupos){

        $cupos_actual = $cupos + 1;
        $listIDHorarioCurso  =  array ();

        foreach($list_horario_curso as $horario_curso)
        {
            array_push($listIDHorarioCurso, $horario_curso->cod_horario_curso);
        }

        $data = array(
            "cupos" => $cupos_actual
        );

        $this->db->reset_query();
        $this->db->where_in('cod_horario_curso', $listIDHorarioCurso);
        $this->db->update('horario_curso',$data);

    }

    public function getHorariosByHorarioCurso(array $list_horario_curso, string $periodoActual){

        $listIDHorarioCurso  =  array ();

        foreach($list_horario_curso as $horario_curso)
        {
            array_push($listIDHorarioCurso, $horario_curso->cod_horario_curso_fk);
        }

        $this->db->select('cu.cod_curso, cu.descripcion, ho_cu.hora_entrada, ho_cu.seccion, ho_cu.hora_salida, ho_cu.cod_dia_fk,di.descripcion as descripcion_dia, pe.apellido_paterno, pe.apellido_materno, pe.nombres');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->join('docente as doc', 'ho_cu.cod_docente_fk = doc.cod_docente');
        $this->db->join('dia as di', 'ho_cu.cod_dia_fk = di.cod_dia');
        $this->db->join('persona as pe', 'doc.dni_fk = pe.dni');
        $this->db->join('horario_alumno as ho_al', 'ho_al.cod_horario_curso_fk = ho_cu.cod_horario_curso');
        $this->db->where_in('ho_cu.cod_horario_curso', $listIDHorarioCurso);
        $this->db->where('ho_al.periodo', $periodoActual);
        $this->db->order_by('cu.cod_curso', 'ASC');
        $this->db->order_by('di.cod_dia', 'ASC');
        $query = $this->db->get('horario_curso as ho_cu');

        return $query->result();
    }

    public function getCountGroupByMatricula(string $cod_matricula){

        $filtros = array(
            "cod_matricula_fk" => $cod_matricula
        );

        $this->db->select('ho_cu.cod_curso_fk, count(*) as total_horarios');
        $this->db->join('horario_curso as ho_cu', 'ho_cu.cod_horario_curso = ho_al.cod_horario_curso_fk');
        $this->db->group_by('ho_cu.cod_curso_fk'); 
        $query = $this->db->get_where('horario_alumno as ho_al', $filtros);

        return $query->result();

    }

    public function getHorariosByHorarioCursoDistinct(array $list_horario_curso){

        $listIDHorarioCurso  =  array ();

        foreach($list_horario_curso as $horario_curso)
        {
            array_push($listIDHorarioCurso, $horario_curso->cod_horario_curso_fk);
        }

        
        $this->db->select('cu.cod_curso');
        $this->db->distinct();
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->where_in('ho_cu.cod_horario_curso', $listIDHorarioCurso);
        $query = $this->db->get('horario_curso as ho_cu');

        return $query->result();
    }

    public function getHorariosByCursoAndPeriodoAndSeccionRectificacion(string $cod_curso, string $seccion, string $periodo){


        $this->db->select('ho_cu.cod_horario_curso, ho_cu.cod_curso_fk, ho_cu.seccion, ho_al.periodo, ho_cu.cupos');
        $this->db->join('horario_alumno as ho_al', 'ho_cu.cod_horario_curso = ho_al.cod_horario_curso_fk');
        $this->db->where('ho_cu.cod_curso_fk', $cod_curso);
        $this->db->where('ho_cu.seccion', $seccion);
        $this->db->where('ho_al.periodo', $periodo);
        $query = $this->db->get('horario_curso as ho_cu');

        return $query->result();

    }

    public function getHorariosByPlanCurricular(string $cod_plan_curricular){

        $this->db->select('pe.apellido_paterno as apellido_paterno_docente, pe.apellido_materno as apellido_materno_docente, pe.nombres as nombres_docente, cu.descripcion as descripcion_curso, au.cod_aula, ho_cu.seccion, di.descripcion as descripcion_dia, ho_cu.hora_entrada, ho_cu.hora_salida, ho_cu.turno, ho_cu.cupos');
        $this->db->join('docente as do', 'ho_cu.cod_docente_fk = do.cod_docente');
        $this->db->join('curso as cu', 'ho_cu.cod_curso_fk = cu.cod_curso');
        $this->db->join('aula as au', 'ho_cu.cod_aula_fk = au.cod_aula');
        $this->db->join('dia as di', 'ho_cu.cod_dia_fk = di.cod_dia');
        $this->db->join('persona as pe', 'do.dni_fk = pe.dni');
        $this->db->where('cu.cod_plan_curricular_fk', $cod_plan_curricular);
        $query = $this->db->get('horario_curso as ho_cu');

        return $query->result();

    }

    public function insertHorarioCurso(string $cod_docente, string $cod_curso, string $cod_aula, string $seccion,  int $cod_dia, string $hora_entrada, string $hora_salida, string $turno, int $cupos){

        $data = array(
            "cod_docente_fk" => $cod_docente,
            "cod_curso_fk" => $cod_curso,
            "cod_aula_fk" => $cod_aula,
            "seccion" => $seccion,
            "cod_dia_fk" => $cod_dia,
            "hora_entrada" => $hora_entrada,
            "hora_salida" => $hora_salida,
            "turno" => $turno,
            "cupos" => $cupos
        );

        $this->db->insert('horario_curso', $data);
    }
}