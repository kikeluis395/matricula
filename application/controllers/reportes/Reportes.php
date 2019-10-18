<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

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

			$listActiveLink = array("a_alumno" => "a_alumno", "a_reportes" => "a_reportes");

			$this->load->model("HorarioAlumnoModel");
			$listPeriodos = $this->HorarioAlumnoModel->getPeriodosByMatriculaAndAlumno($usuario->cod_alumno);

			if($listPeriodos)
			{

				// $listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByMatricula($matricula->cod_matricula);

				// $data = array(
				// 	"show" => true,
				// 	"message" => "Aun no hay periodos matriculados!",
				// 	"tipo" => "Warning",
				// 	"usuario" => $usuario,
				// 	"listActiveLink" => $listActiveLink,
				// 	"listAsignaturas" => array(),
				// 	"listPeriodos" => $listPeriodos
				// );

				// $this->load->view("asignaturas/asignaturas_view", $data);

			}else
			{

				$data = array(
					"show" => true,
					"message" => "Aun no hay periodos matriculados!",
					"tipo" => "Warning",
					"usuario" => $usuario,
					"listActiveLink" => $listActiveLink,
					"listPeriodos" => array()
				);

				$this->load->view("reportes/reportes_view", $data);

			}
			

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	
}