<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function index()
	{
		
		if($this->session->has_userdata('usuario')){

			$usuario = $this->session->userdata('usuario');

			$this->load->model("AlumnoModel");
			$alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);

			$listActiveLink = array("a_matricula" => "a_matricula", "a_horarios" => "a_horarios");

			$this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

			if($matricula)
			{

                $this->load->model("Cursos_llevados");
                $listCursosLlevados = $this->Cursos_llevados->getCursosLlevados($alumno->cod_alumno);
                
                if(empty($listCursosLlevados))
                {

                    $anio = 1;

                    $this->load->model("CursoModel");
                    $listCursosPermitidos = $this->CursoModel->getCursosByAnio($anio);

                    $this->load->model("HorarioAlumnoModel");
                    $listHorariosAlumno = $this->HorarioAlumnoModel->getHorariosAlumnoByMatricula($matricula->cod_matricula);

                    $listHorariosMatriculados = array();
                    $listCountGroupCurso = array();

                    if($listHorariosAlumno)
                    {
                        $this->load->model("HorariosModel");
                        $listHorariosMatriculados = $this->HorariosModel->getHorariosByHorarioCurso($listHorariosAlumno);
                        $listCountGroupCurso = $this->HorariosModel->getCountGroupByMatricula($matricula->cod_matricula);
                    }
                    
                    $data = array(
                        "show" => false,
                        "message" => "",
                        "tipo" => "",
                        "alumno" => $alumno,
                        "listActiveLink" => $listActiveLink,
                        "listCursosPermitidos" => $listCursosPermitidos,
                        "listHorariosMatriculados" => $listHorariosMatriculados,
                        "listCountGroupCurso" => $listCountGroupCurso
                    );
    
                    $this->load->view("horarios/horarios_view", $data);

                }else
                {

                    $curso_llevado = $this->Cursos_llevados->getUltimoAnio($alumno->cod_alumno);

                    $anio = $curso_llevado->num_anio + 1;

                    $this->load->model("CursoModel");
                    $listCursosPermitidos = $this->CursoModel->getCursosByAnio($anio);

                    if($listCursosPermitidos)
                    {

                        foreach($listCursosPermitidos as $cursoPermitido)
                        {

                            $this->load->model("CursoPreRequisitoModel");
                            $listCursosPreRequisitos = $this->CursoPreRequisitoModel->getCursosPreRequisito($cursoPermitido->cod_curso);

                            if($listCursosPreRequisitos)
                            {

                                foreach($listCursosPreRequisitos as $cursoPreRequisito)
                                {

                                    $this->load->model("Cursos_llevados");
                                    $curso_llevado_pre = $this->Cursos_llevados->getCursoLlevadoByCurso($cursoPreRequisito->cod_curso_requisito_fk);

                                    if($curso_llevado_pre)
                                    {

                                        if($curso_llevado_pre->estado == 'REPROBADO')
                                        {

                                            unset($listCursosPermitidos[$cursoPermitido]);
                                            break 1;

                                        }

                                    }
                                }
                                

                                

                            }
                        }

                    }

                    $this->load->model("HorarioAlumnoModel");
                    $listHorariosAlumno = $this->HorarioAlumnoModel->getHorariosAlumnoByMatricula($matricula->cod_matricula);

                    $listHorariosMatriculados = array();
                    $listCountGroupCurso = array();

                    if($listHorariosAlumno)
                    {
                        $this->load->model("HorariosModel");
                        $listHorariosMatriculados = $this->HorariosModel->getHorariosByHorarioCurso($listHorariosAlumno);
                        $listCountGroupCurso = $this->HorariosModel->getCountGroupByMatricula($matricula->cod_matricula);
                    }
                    
                    $data = array(
                        "show" => false,
                        "message" => "",
                        "tipo" => "",
                        "alumno" => $alumno,
                        "listActiveLink" => $listActiveLink,
                        "listCursosPermitidos" => $listCursosPermitidos,
                        "listHorariosMatriculados" => $listHorariosMatriculados,
                        "listCountGroupCurso" => $listCountGroupCurso
                    );
    
                    $this->load->view("horarios/horarios_view", $data);

                }
                
            }else
            {
                $data = array(
					"show" => true,
					"message" => "Usted aún no se ha matriculado!",
					"tipo" => "Error",
					"alumno" => $alumno,
					"listActiveLink" => $listActiveLink
				);

                $this->load->view("horarios/horarios_view", $data);
            }
		}else{

			header("Location:" . base_url() . "login");

		}

		
    }
    
    public function VerHorariosDisponibles()
    {

        $cod_curso = (string)$_POST["cod_curso"];

        $this->load->model("CursoModel");
        $curso = $this->CursoModel->getCurso($cod_curso);

        $this->load->model("HorariosModel");
        $listHorariosDisponibles = $this->HorariosModel->getHorariosByCurso($cod_curso);
        $listCountGroupSeccion = $this->HorariosModel->getCountGroupByCurso($cod_curso);

        $data = array(
            "listHorariosDisponibles" => $listHorariosDisponibles,
            "listCountGroupSeccion" => $listCountGroupSeccion,
            "curso" => $curso
        );
        
        $this->load->view("horarios/horarios_disponibles_view", $data);

    } 

    public function RegistrarHorarios()
    {
        $cod_curso = (string)$this->input->post('cod_curso');
        $seccion = (string)$this->input->post('seccion');
        //$cod_curso = (string)$_POST["cod_curso"];
        //$seccion = (string)$_POST["seccion"];

        $this->load->model("HorariosModel");
        $horario_curso = $this->HorariosModel->getCuposByCursoAndSeccion($cod_curso, $seccion);

        if($horario_curso->cupos == 0)
        {

            $usuario = $this->session->userdata('usuario');

			$this->load->model("AlumnoModel");
            $alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);
            
            $this->load->model("MatriculaModel");
            $matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);
            
            $this->load->model("HorarioAlumnoModel");
            $listHorariosAlumno = $this->HorarioAlumnoModel->getHorariosAlumnoByMatricula($matricula->cod_matricula);
            

            $listHorariosMatriculados = array();
            $listCountGroupCurso = array();
                    
            if($listHorariosAlumno)
            {

                $listHorariosMatriculados = $this->HorariosModel->getHorariosByHorarioCurso($listHorariosAlumno);
                $listCountGroupCurso = $this->HorariosModel->getCountGroupByMatricula($matricula->cod_matricula);

            }

            $data = array(
                "show" => true,
                "message" => "Se ha terminado los cupos!",
                "tipo" => "Error",
                "listHorariosMatriculados" => $listHorariosMatriculados,
                "listCountGroupCurso" => $listCountGroupCurso
            );

            $this->load->view("horarios/horarios_matriculados_view", $data);

        }else
        {
            $usuario = $this->session->userdata('usuario');

			$this->load->model("AlumnoModel");
            $alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);
            
            $list_horario_curso = $this->HorariosModel->getHorariosCursosByCursoAndSeccion($cod_curso, $seccion);
        
            $this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);
        
            $this->load->model("CursoModel");
            $curso = $this->CursoModel->getCurso($cod_curso);

            $periodo = '';
            $vez = 0;

            if($curso->num_ciclo_fk == 1)
            {
                $periodo = $matricula->anio . "-I";

            }else
            {
                if($curso->num_ciclo_fk % 2 == 0)
                {
                    $periodo = $matricula->anio . "-II";
                }else
                {
                    $periodo = $matricula->anio . "-I";
                }
            }

            $this->load->model("Cursos_llevados");
            $curso_llevado = $this->Cursos_llevados->getCursoLlevadoByCurso($cod_curso);

            if($curso_llevado)
            {
                $vez = $curso_llevado->num_intentos + 1;
            }else
            {
                $vez = $vez + 1;
            }

            $this->load->model("HorarioAlumnoModel");
            $this->HorarioAlumnoModel->insertHorarioAlumno($list_horario_curso, $matricula->cod_matricula, $periodo, $vez);
            
            $listHorariosAlumno = $this->HorarioAlumnoModel->getHorariosAlumnoByMatricula($matricula->cod_matricula);

            $this->HorariosModel->modifiyCuposByListHorariosCurso($list_horario_curso, $horario_curso->cupos);

            $listHorariosMatriculados = array();
            $listCountGroupCurso = array();
                    
            if($listHorariosAlumno)
            {

                $listHorariosMatriculados = $this->HorariosModel->getHorariosByHorarioCurso($listHorariosAlumno);
                $listCountGroupCurso = $this->HorariosModel->getCountGroupByMatricula($matricula->cod_matricula);

            }

            $data = array(
                "show" => true,
                "message" => "El horario se ha registrado!",
                "tipo" => "Success",
                "listHorariosMatriculados" => $listHorariosMatriculados,
                "listCountGroupCurso" => $listCountGroupCurso
            );

            $this->load->view("horarios/horarios_matriculados_view", $data);
        }


    } 

    public function RegistrarCursosLlevados()
    {

        $usuario = $this->session->userdata('usuario');

        $this->load->model("AlumnoModel");
        $alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);
        
        $this->load->model("MatriculaModel");
        $matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);
        
        $this->load->model("HorarioAlumnoModel");
        $listHorariosAlumno = $this->HorarioAlumnoModel->getHorariosAlumnoByMatricula($matricula->cod_matricula);

        $listHorariosMatriculados = array();

        if($listHorariosAlumno)
        {

            $this->load->model("HorariosModel");
            $listHorariosMatriculados = $this->HorariosModel->getHorariosByHorarioCursoDistinct($listHorariosAlumno);
        
        }

        $this->load->model("Cursos_llevados");

        foreach($listHorariosMatriculados as $horarioMatriculado)
        {

            $curso_llevado = $this->Cursos_llevados->getCursoLlevadoByCurso($horarioMatriculado->cod_curso);
        
            if($curso_llevado)
            {
                $estado = 'EN CURSO';
                $intentos = $curso_llevado->num_intentos + 1;

                $this->Cursos_llevados->modifyCursoLlevado($alumno->cod_alumno, $horarioMatriculado->cod_curso, $estado, $intentos);

            }else
            {

                $estado = 'EN CURSO';
                $intentos = 1;

                $this->Cursos_llevados->insertCursoLlevado($alumno->cod_alumno, $horarioMatriculado->cod_curso, $estado, $intentos);

            }
        
        }

        


    }

	
}