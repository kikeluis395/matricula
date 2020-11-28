<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrarse extends CI_Controller {

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
			$this->load->model("HorarioAlumnoModel");
			$listDiplomados = $this->HorarioAlumnoModel->getDiplomados();
			$data = array(
				"show" => false,
				"message" => "",
				"listDiplomados" => $listDiplomados,
				"tipo" => "",
			);

			$this->load->view('registrarse', $data);
		
	}
	public function Singup(){

		$this->load->model("HorarioAlumnoModel");
		$listDiplomados = $this->HorarioAlumnoModel->getDiplomados();
		$this->load->model("RegistrarseModel");
		

		$dni = (string)$this->input->post('dni');
		$apellido_paterno = (string)$this->input->post('apellido_paterno');
		$apellido_materno = (string)$this->input->post('apellido_materno');
		$nombres = (string)$this->input->post('nombres');
		$anio_nacimiento = (string)$this->input->post('anio_nacimiento');
		$sexo = (string)$this->input->post('sexo');
		$email = (string)$this->input->post('email');
		$diplomado = (string)$this->input->post('diplomado');
		$pass = (string)$this->input->post('pass');
		$confirmpass = (string)$this->input->post('confirmpass');
		$cod_nivel_fk = 3;
		$anio_ingreso = (string)date('Y');

		
     

		if($pass != $confirmpass){
			$data = array(
				"show" => true,
				"message" => "Las contraseñas no coinciden",
				"listDiplomados" => $listDiplomados,
				"tipo" => "Error",
			);
		}else {
			$newpersona = $this->RegistrarseModel->insertPersona($dni, $apellido_paterno, $apellido_materno,$nombres, $anio_nacimiento, $sexo);
			$newuser = $this->RegistrarseModel->insertUsuario($dni, $email, $pass, $cod_nivel_fk);
			$newAlumno = $this->RegistrarseModel->insertAlumno($email, $dni, $anio_ingreso, $diplomado);
			$data = array(
				"show" => true,
				"message" => "Registro insertado correctamente",
				"listDiplomados" => $listDiplomados,
				"tipo" => "Success",
			);
		}
		$this->load->view('registrarse', $data);
		
		
	}
}