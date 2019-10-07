<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if(!$this->session->userdata('usuario')){

			$data = array(
				"found" => false,
				"trial" => false,
				"message" => ""
			);

			$this->load->view('login', $data);

		}else{

			header("Location:" . base_url() . "home");

		}
		
	}

	public function SignIn(){

		$this->load->model("UsuarioModel");

		$codigo = $_POST["codigo"];
		$clave = $_POST["pass"];

		$usuario = $this->UsuarioModel->getUser($codigo, $clave);

		if($usuario){

			$this->session->set_userdata('usuario', $usuario);
			header("Location:" . base_url() . "home");

		}else{

			$data = array(
				"found" => false,
				"trial" => true,
				"message" => "El usuario o clave son incorrectos"
			);

			$this->load->view('login', $data);

		}
	}
}
