<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago_matricula extends CI_Controller {

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

			$listActiveLink = array("a_alumno" => "a_alumno","a_pago_matricula" => "a_pago_matricula");

			$this->load->model("HorarioAlumnoModel");
			$listPeriodos = $this->HorarioAlumnoModel->getPeriodosByMatriculaAndAlumno($usuario->cod_alumno);

			if($listPeriodos)
			{
        $creditos=0;
        $listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByPeriodo($listPeriodos[0]->periodo, $usuario->dni_fk);
        
        foreach($listAsignaturas as $asignatura){
          $creditos += intval($asignatura->num_creditos);
        }
        $total= $creditos*25;
            
				$data = array(
					"show" => false,
					"message" => "",
					"tipo" => "",
          "usuario" => $usuario,
          "creditos" => $creditos,
          "total"    => $total,
					"listActiveLink" => $listActiveLink,
					"listAsignaturas" => $listAsignaturas,
					"listPeriodos" => $listPeriodos
				);

				$this->load->view("pago_matricula/pago_matricula_view", $data);

			}else
			{

				$data = array(
					"show" => true,
					"message" => "Aun no has escogido cursos!",
					"tipo" => "Warning",
					"usuario" => $usuario,
					"listActiveLink" => $listActiveLink,
					"listAsignaturas" => array(),
					"listPeriodos" => array()
				);

				$this->load->view("pago_matricula/pago_matricula_view", $data);

			}

			

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}


	public function VerAsignaturas(){

		$periodo = (string)$this->input->post('periodo');

		$this->load->model("HorarioAlumnoModel");
		$listAsignaturas = $this->HorarioAlumnoModel->getHorariosAlumnoJoinCursoByPeriodo($periodo);

		$data = array(
			"listAsignaturas" => $listAsignaturas
		);

		$this->load->view("asignaturas/asignaturas_periodo_view", $data);

		
	}
}