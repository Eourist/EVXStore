<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('evx_navbar');
		$this->load->view('carrusel');
		$this->load->view('evx_login_modal');
		$this->load->view('evx_signup_modal');
		$this->load->view('footer');
	}

	public function registro()
	{
		$f_nombre = $this->input->post('f_nombre');
		$f_clave = $this->input->post('f_clave');
		$f_correo = $this->input->post('f_correo');

		$data = array (
			'nombre' => $f_nombre,
			'clave' => $f_clave,
			'correo' => $f_correo
		);

		$this->usuario_model->alta($data);
	}
}