<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_alumnos extends CI_Controller {

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
				$this->load->model("HorarioAlumnoModel");
				$listDiplomados = $this->HorarioAlumnoModel->getDiplomados();

					$data = array(
						"show" => false,
						"message" => "",
						"tipo" => "",
						"listDiplomados" => $listDiplomados,
						"usuario" => $usuario
					);
	
					$this->load->view("reporte_alumnos/reporte_alumnos", $data);

		}else{
	
				header("Location:" . base_url() . "login");
	
		}

  }
		
}
