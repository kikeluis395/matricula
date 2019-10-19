<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class activarPago extends CI_Controller {

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

            $listActiveLink = array("a_activaciones" => "a_activaciones", "a_pago" => "a_pago");

            $cod_activacion = 3;
            $this->load->model("ActivacionModel");
            $activacionPago = $this->ActivacionModel->getActivacionByCodigo($cod_activacion);

            $data = array(
                "show" => false,
                "message" => "",
                "tipo" => "",
                "usuario" => $usuario,
                "listActiveLink" => $listActiveLink,
                "activacionPago" => $activacionPago
            );
            
            $this->load->view("activaciones/activarPago_view", $data);

			

			

		}else{

			header("Location:" . base_url() . "login");

		}

		
	}

	public function CambiarEstado(){

		$estado = (string)$this->input->post('estado');

		$cod_activacion = 3;
		$this->load->model("ActivacionModel");
		$this->ActivacionModel->modifyActivacionNoPeriodo($cod_activacion, $estado);

		$activacionPago = $this->ActivacionModel->getActivacionByCodigo($cod_activacion);

		$data = array(
			"activacionPago" => $activacionPago
		);
		
		$this->load->view("activaciones/activarPago_response", $data);

	}
}
