<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asignaturas extends CI_Controller {

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

			$listActiveLink = array("a_alumno" => "a_alumno","a_asignaturas" => "a_asignaturas");

			$this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

			$this->load->model("HorarioAlumnoModel");
            $listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByMatricula($matricula->cod_matricula);

			$data = array(
				"alumno" => $alumno,
				"listActiveLink" => $listActiveLink,
				"listAsignaturas" => $listAsignaturas,
				"matricula" => $matricula
			);
			
			$this->load->view("asignaturas/asignaturas_view", $data);

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	public function PdfAsignaturas(){

		$usuario = $this->session->userdata('usuario');

		$this->load->model("AlumnoModel");
		$alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);

		$listActiveLink = array("a_alumno" => "a_alumno","a_asignaturas" => "a_asignaturas");

		$this->load->model("MatriculaModel");
		$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

		$this->load->model("HorarioAlumnoModel");
        $listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByMatricula($matricula->cod_matricula);

        $this->load->model("CarreraModel");
        $carrera = $this->CarreraModel->getCarreraJoinFacultad($alumno->cod_carrera_fk);

        $periodo = $listAsignaturas[0]->periodo;

		$data = array(
			"alumno" => $alumno,
			"listActiveLink" => $listActiveLink,
			"listAsignaturas" => $listAsignaturas,
			"matricula" => $matricula,
			"carrera" => $carrera,
			"universidad" => "UNIVERSIDAD NACIONAL FEDERICO VILLARREAL",
			"periodo" => $periodo
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
        $this->pdf->stream("asignaturas.pdf", array("Attachment"=>1));
	}
}
