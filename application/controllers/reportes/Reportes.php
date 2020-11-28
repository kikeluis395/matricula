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

				$data = array(
					"show" => false,
					"message" => "",
					"tipo" => "",
					"usuario" => $usuario,
					"listActiveLink" => $listActiveLink,
					"listPeriodos" => $listPeriodos
				);

				$this->load->view("reportes/reportes_view", $data);

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


	public function PdfAsignaturas(){

		$periodo = (string)$this->input->get('periodo');

		$usuario = $this->session->userdata('usuario');

		$this->load->model("HorarioAlumnoModel");
        $listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByPeriodo($periodo, $usuario->dni_fk);

        $this->load->model("CarreraModel");
        $carrera = $this->CarreraModel->getCarreraJoinFacultad($usuario->cod_carrera_fk);

		$asignatura = reset($listAsignaturas);

		$data = array(
			"usuario" 					=> $usuario,
			"listAsignaturas" 	=> $listAsignaturas,
			"carrera" 					=> $carrera,
			"universidad" 			=> "SEMINARIO BÍBLICO ALIANZA DEL PERÚ",
			"asignatura" 				=> $asignatura
		);
		
		$this->load->view("asignaturas/asignaturas_pdf", $data);
        
        // Get output html
        $html = $this->output->get_output();
        
        // Load pdf library
        $this->load->library('pdf');
        
        // Load HTML content
        $this->pdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4');
        
        // Render the HTML as PDF
        $this->pdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
		$file = $this->pdf->stream("asignaturas.pdf", array("Attachment"=>1));
		
	}

	
}