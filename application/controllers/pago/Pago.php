<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {

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

			$listActiveLink = array("a_matricula" => "a_matricula", "a_pago" => "a_pago");

			$data = array(
				"show" => false,
				"message" => "",
				"tipo" => "",
				"alumno" => $alumno,
				"listActiveLink" => $listActiveLink
			);

			if($matricula)
			{
				$this->load->view("pago/pago_exito", $data);
			}else
			{
				$this->load->view("pago/pago_view", $data);
			}

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	public function verificarPago(){

		if($this->session->has_userdata('usuario')){

			$usuario = $this->session->userdata('usuario');

			$this->load->model("AlumnoModel");
			$alumno = $this->AlumnoModel->getAlumno($usuario->cod_alumno_fk);

			$listActiveLink = array("a_matricula" => "a_matricula", "a_pago" => "a_pago");

			$this->load->model("MatriculaModel");
			$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

			if($matricula)
			{
				$data = array(
					"show" => true,
					"message" => "Usted se encuentra ya matriculado!",
					"tipo" => "Warning",
					"alumno" => $alumno,
					"listActiveLink" => $listActiveLink
				);

				$this->load->view("pago/pago_exito", $data);

			}else
			{
				$cod_liquidacion = $_POST["cod_liquidacion"];

				$this->load->model("LiquidacionModel");
				$liquidacion = $this->LiquidacionModel->verificarPago($cod_liquidacion);

				if($liquidacion)
				{

					$this->load->model("PagoModel");
					$this->PagoModel->insertPago($cod_liquidacion);
					$pago = $this->PagoModel->getPago($cod_liquidacion);

					$this->load->model("Plan_curricular");
					$plan_curricular = $this->Plan_curricular->getPlanCurricularByCarrera($alumno->cod_carrera_fk);

					$this->load->model("MatriculaModel");
					$this->MatriculaModel->insertMatricula((string)$alumno->cod_alumno,(string)$pago->cod_pago,(string)$plan_curricular->cod_plan_curricular );
					$matricula = $this->MatriculaModel->getMatriculaFromAlumno($alumno->cod_alumno);

					if($matricula)
					{
						$data = array(
							"show" => true,
							"message" => "El pago ha sido encontrado",
							"tipo" => "Success",
							"alumno" => $alumno,
							"listActiveLink" => $listActiveLink
						);

						$this->load->view('pago/pago_exito', $data);
					}else
					{
						$data = array(
							"show" => true,
							"message" => "No se pudo realizar el pago!",
							"tipo" => "Error",
							"alumno" => $alumno,
							"listActiveLink" => $listActiveLink
						);

						$this->load->view('pago/pago_view', $data);
					}
					
				}else{

					$data = array(
						"show" => true,
						"message" => "No se encontraron coincidencias del numero de liquidacion",
						"tipo" => "Error",
						"alumno" => $alumno,
						"listActiveLink" => $listActiveLink
					);

					$this->load->view('pago/pago_view', $data);

				}
			}

		}else{

			header("Location:" . base_url() . "login");

		}
	}
}