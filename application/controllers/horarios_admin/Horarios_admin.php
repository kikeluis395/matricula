<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarios_admin extends CI_Controller {

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

			$listActiveLink = array("a_matricula_admin" => "a_matricula_admin", "a_horarios_admin" => "a_horarios_admin");

            $this->load->model("Plan_curricular");
            $plan_curricular = $this->Plan_curricular->getPlanCurricularByCarrera($usuario->cod_carrera_fk);

            $this->load->model("HorariosModel");
            $listHorariosAdmin = $this->HorariosModel->getHorariosByPlanCurricular($plan_curricular->cod_plan_curricular);

            $this->load->model("DocenteModel");
            $listDocentes = $this->DocenteModel->getDocentes();

            $this->load->model("CursoModel");
            $listCursos = $this->CursoModel->getCursosToAdmin($plan_curricular->cod_plan_curricular);

            $this->load->model("AulaModel");
            $listAulas = $this->AulaModel->getAula();

            $this->load->model("DiaModel");
            $listDias = $this->DiaModel->getDias();

			$data = array(
				"show" => false,
				"message" => "",
				"tipo" => "",
                "usuario" => $usuario,
                "listHorariosAdmin" => $listHorariosAdmin,
                "listDocentes" => $listDocentes,
                "listCursos" => $listCursos,
                "listAulas" => $listAulas,
                "listDias" => $listDias,
				"listActiveLink" => $listActiveLink
			);

			$this->load->view("horarios_admin/horarios_admin_view", $data);

		}else{

			header("Location:" . base_url() . "login");

		}

		
    }
    
    
	public function RegistrarHorarioAdmin(){

		$cod_docente = (string)$this->input->post('cod_docente');
		$cod_curso = (string)$this->input->post('cod_curso');
		$cod_aula = (string)$this->input->post('cod_aula');
		$seccion = (string)$this->input->post('seccion');
		$cod_dia = (int)$this->input->post('cod_dia');
		$hora_entrada = (string)$this->input->post('hora_entrada');
		$hora_salida = (string)$this->input->post('hora_salida');
		$turno = (string)$this->input->post('turno');
		$cupos = (int)$this->input->post('cupos');

		// INSERTANDO EL HORARIO
		$this->load->model("HorariosModel");
        $this->HorariosModel->insertHorarioCurso($cod_docente, $cod_curso, $cod_aula, $seccion, $cod_dia, $hora_entrada, $hora_salida, $turno, $cupos);

		$usuario = $this->session->userdata('usuario');

		$listActiveLink = array("a_matricula_admin" => "a_matricula_admin", "a_horarios_admin" => "a_horarios_admin");

		$this->load->model("Plan_curricular");
		$plan_curricular = $this->Plan_curricular->getPlanCurricularByCarrera($usuario->cod_carrera_fk);

		$listHorariosAdmin = $this->HorariosModel->getHorariosByPlanCurricular($plan_curricular->cod_plan_curricular);

		$this->load->model("DocenteModel");
		$listDocentes = $this->DocenteModel->getDocentes();

		$this->load->model("CursoModel");
		$listCursos = $this->CursoModel->getCursosToAdmin($plan_curricular->cod_plan_curricular);

		$this->load->model("AulaModel");
		$listAulas = $this->AulaModel->getAula();

		$this->load->model("DiaModel");
		$listDias = $this->DiaModel->getDias();

		$data = array(
			"show" => true,
			"message" => "El horario se inserto correctamente!",
			"tipo" => "Success",
			"usuario" => $usuario,
			"listHorariosAdmin" => $listHorariosAdmin,
			"listDocentes" => $listDocentes,
			"listCursos" => $listCursos,
			"listAulas" => $listAulas,
			"listDias" => $listDias,
			"listActiveLink" => $listActiveLink
		);

		$this->load->view("horarios_admin/horarios_admin_table_view", $data);
	}




    

	
}