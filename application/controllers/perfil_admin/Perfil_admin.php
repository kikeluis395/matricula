<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_admin extends CI_Controller {

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

			$listActiveLink = array("a_admin" => "a_admin", "a_perfil" => "a_perfil");


			$data = array(
				"show" => false,
				"message" => "",
				"tipo" => "",
				"usuario" => $usuario,
				"listActiveLink" => $listActiveLink
			);

			$this->load->view("perfil_admin/perfil_admin_view", $data);

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	
}