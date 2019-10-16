<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

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

			$this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

			$listActiveLink = array("a_alumno" => "a_alumno", "a_perfil" => "a_perfil");

			$this->load->model("CarreraModel");
        	$carrera = $this->CarreraModel->getCarreraJoinFacultad($alumno->cod_carrera_fk);

			$data = array(
				"show" => false,
				"message" => "",
				"tipo" => "",
				"alumno" => $alumno,
				"listActiveLink" => $listActiveLink,
				"carrera" => $carrera,
				"universidad" => "UNIVERSIDAD NACIONAL FEDERICO VILLARREAL",
			);

			$this->load->view("perfil/perfil_view", $data);

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	
}