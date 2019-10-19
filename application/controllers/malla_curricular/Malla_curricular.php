<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Malla_curricular extends CI_Controller {

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

				$this->load->model("Plan_curricular");
				$plan_curricular = $this->Plan_curricular->getPlanCurricularByCarrera($usuario->cod_carrera_fk);

				$this->load->model("CursoModel");

				$curso = $this->CursoModel->getNumMaxCiclo($plan_curricular->cod_plan_curricular);
				$listCursos = $this->CursoModel->getCursos($plan_curricular->cod_plan_curricular);

				$anios = $curso->num_ciclo_fk / 2;

				$this->load->model("Cursos_llevados");
				$listCursosLlevados = $this->Cursos_llevados->getCursosLlevadosAprobados($usuario->cod_alumno);

				$listActiveLink = array("a_malla_curricular" => "a_malla_curricular");

				$data = array(
					"usuario" => $usuario,
					"anios" => $anios,
					"listCursos" => $listCursos,
					"listCursosLlevados" => $listCursosLlevados,
					"plan_curricular" => $plan_curricular,
					"listActiveLink" => $listActiveLink
				);
				
				$this->load->view("malla_curricular/malla_curricular_view", $data);


		}else{

			header("Location:" . base_url() . "login");

		}

		
	}
}