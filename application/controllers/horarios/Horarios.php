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

            $listActiveLink = array("a_matricula" => "a_matricula", "a_horarios" => "a_horarios");
            
            $this->load->model("MatriculaModel");
            $matricula = $this->MatriculaModel->getMatriculaFromAlumno($usuario->cod_alumno);

            if($matricula)
            {
                // ------------- SI TIENE MATRICULA ----------------------

                $cod_activacion = 1;
                $this->load->model("ActivacionModel");
                $activacionHorarios = $this->ActivacionModel->getActivacionByCodigo($cod_activacion);

                if($activacionHorarios->estado == 1)
			    {

                   // ------------- SI ESTAN ACTIVADOS LOS HORARIOS ----------------------

                    $this->load->model("Cursos_llevados");
                    $listCursosLlevados = $this->Cursos_llevados->getCursosLlevados($usuario->cod_alumno);
                    
                    if(empty($listCursosLlevados))
                    {

                        $ciclo = 1;

                        $this->load->model("CursoModel");
                        $listCursosPermitidos = $this->CursoModel->getCursosByCiclo($ciclo);

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
                            "usuario" => $usuario,
                            "listActiveLink" => $listActiveLink,
                            "listCursosPermitidos" => $listCursosPermitidos,
                            "listHorariosMatriculados" => $listHorariosMatriculados,
                            "listCountGroupCurso" => $listCountGroupCurso
                        );
        
                        $this->load->view("horarios/horarios_view", $data);

                    }else
                    {



                        $cursoMaxAnio = $this->CursoModel->getCursoMaxAnioByPlanCurricular($matricula->cod_plan_curricular_fk);

                        $anioActual = ($matricula->anio - $usuario->anio_ingreso) + 1;

                        $anioAlumno = $anioActual;

                        if($anioActual > $cursoMaxAnio->num_anio)
                        {
                            $anioAlumno = $cursoMaxAnio->num_anio;
                        }

                        $listCursosLlevadosAprobados = $this->Cursos_llevados->getCursosLlevadosAprobados($usuario->cod_alumno);

                        if($listCursosLlevadosAprobados)
                        {

                            $listCursosPermitidos = array();
                            $this->load->model("CursoPreRequisitoModel");
                            $this->load->model("CursoModel");

                            foreach($listCursosLlevadosAprobados as $cursoLllevadoAprobado)
                            {

                                $listCursosSiguientes = $this->CursoPreRequisitoModel->getCursosSiguientes($cursoLllevadoAprobado->cod_curso_fk);

                                if($listCursosSiguientes)
                                {

                                    foreach($listCursosSiguientes as $cursoSiguiente)
                                    {

                                        $curso_llevado = $this->Cursos_llevados->getCursoLlevadoByCurso($cursoSiguiente->cod_curso_fk);
                                        
                                        if($curso_llevado)
                                        {

                                            if($curso_llevado->estado != 'APROBADO')
                                            {

                                                if($cursoSiguiente->num_ciclo_fk == 1)
                                                {

                                                    if($activacionHorarios->periodo == 1)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }else
                                                {

                                                    if($cursoSiguiente->num_ciclo_fk % 2 == 0)
                                                    {

                                                        if($activacionHorarios->periodo == 2)
                                                        {

                                                            $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                            array_push($listCursosPermitidos, $cursoPermitido);

                                                        }

                                                    }else
                                                    {

                                                        if($activacionHorarios->periodo == 1)
                                                        {

                                                            $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                            array_push($listCursosPermitidos, $cursoPermitido);

                                                        }

                                                    }

                                                }
                                                

                                            }

                                        }else
                                        {

                                            if($cursoSiguiente->num_ciclo_fk == 1)
                                            {

                                                if($activacionHorarios->periodo == 1)
                                                {

                                                    $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                    array_push($listCursosPermitidos, $cursoPermitido);

                                                }

                                            }else
                                            {

                                                if($cursoSiguiente->num_ciclo_fk % 2 == 0)
                                                {

                                                    if($activacionHorarios->periodo == 2)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }else
                                                {

                                                    if($activacionHorarios->periodo == 1)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoSiguiente->cod_curso_fk);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }

                                            }

                                        }

                                    }


                                }

                            }

                            // -------------- LOS QUE NO TIENEN RELACION ------------------

                            $listCiclos = array();

                            $numCicloMax = ($anioAlumno * 2) - 1;

                            if($activacionHorarios->periodo == 2)
                            {

                                $numCicloMax++;

                            }

                            for($ciclo = 1; $ciclo <=$$numCicloMax; $anio+=2)
                            {

                                array_push($listCiclos, $ciclo);

                            }

                            $listCursosByAniosNotPre = $this->CursoModel->getCursosByListAniosNotPre($aniosParameter);

                            if($listCursosByAniosNotPre)
                            {

                                foreach($listCursosByAniosNotPre as $cursoNotPre)
                                {

                                    $curso_llevado_not_pre = $this->Cursos_llevados->getCursoLlevadoByCurso($cursoNotPre->cod_curso);

                                    if($curso_llevado_not_pre)
                                    {

                                        if($curso_llevado_not_pre->estado == 'DESAPROBADO')
                                        {

                                            if($cursoNotPre->num_ciclo_fk == 1)
                                            {

                                                if($activacionHorarios->periodo == 1)
                                                {

                                                    $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                    array_push($listCursosPermitidos, $cursoPermitido);

                                                }

                                            }else
                                            {

                                                if($cursoSiguiente->num_ciclo_fk % 2 == 0)
                                                {

                                                    if($activacionHorarios->periodo == 2)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }else
                                                {

                                                    if($activacionHorarios->periodo == 1)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }

                                            }

                                        }

                                    }else
                                    {

                                        if($cursoNotPre->num_ciclo_fk == 1)
                                            {

                                                if($activacionHorarios->periodo == 1)
                                                {

                                                    $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                    array_push($listCursosPermitidos, $cursoPermitido);

                                                }

                                            }else
                                            {

                                                if($cursoSiguiente->num_ciclo_fk % 2 == 0)
                                                {

                                                    if($activacionHorarios->periodo == 2)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }else
                                                {

                                                    if($activacionHorarios->periodo == 1)
                                                    {

                                                        $cursoPermitido = $this->CursoModel->getCurso($cursoNotPre->cod_curso);
                                                        array_push($listCursosPermitidos, $cursoPermitido);

                                                    }

                                                }

                                            }

                                    }

                                }

                            }

                            // -------------- FIN DE LA LISTA DE PERMITIDOS ------------------


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

                            $ciclo = 1;

                            $this->load->model("CursoModel");
                            $listCursosPermitidos = $this->CursoModel->getCursosByCiclo($ciclo);

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
                                "usuario" => $usuario,
                                "listActiveLink" => $listActiveLink,
                                "listCursosPermitidos" => $listCursosPermitidos,
                                "listHorariosMatriculados" => $listHorariosMatriculados,
                                "listCountGroupCurso" => $listCountGroupCurso
                            );
            
                            $this->load->view("horarios/horarios_view", $data);

                        }
                    
                    }
                }else
                {
    
                    // -------------- NO ESTAN ACTIVADO LOS HORARIOS -----------------
    
                    $data = array(
                        "usuario" => $usuario,
                        "listActiveLink" => $listActiveLink
                    );
    
                    $this->load->view("horarios/horarios_activacion", $data);
                }
            }else
            {

                // ------------- NO TIENE MATRICULA ----------------------

                $data = array(
                    "usuario" => $usuario,
                    "listActiveLink" => $listActiveLink
                );

                $this->load->view("horarios/horarios_no_matricula_view", $data);
            }

            

			
		}else{

			header("Location:" . base_url() . "login");

		}

		
    }
    
    public function VerHorariosDisponibles()
    {

        $cod_curso = (string)$this->input->post('cod_curso');

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

        $this->load->model("HorariosModel");
        $horario_curso = $this->HorariosModel->getCuposByCursoAndSeccion($cod_curso, $seccion);

        if($horario_curso->cupos <= 0)
        {

            $usuario = $this->session->userdata('usuario');
            
            $this->load->model("MatriculaModel");
            $matricula = $this->MatriculaModel->getMatriculaFromAlumno($usuario->cod_alumno);
            
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
            
            $list_horario_curso = $this->HorariosModel->getHorariosCursosByCursoAndSeccion($cod_curso, $seccion);
        
            $this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($usuario->cod_alumno);
        
            $this->load->model("CursoModel");
            $curso = $this->CursoModel->getCurso($cod_curso);

            $periodo = '';
            $vez = 0;

            if($curso->num_ciclo == 1)
            {
                $periodo = $matricula->anio . "-I";

            }else
            {
                if($curso->num_ciclo % 2 == 0)
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
        $alumno = $this->AlumnoModel->getAlumno($usuario->cod_fk);
        
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