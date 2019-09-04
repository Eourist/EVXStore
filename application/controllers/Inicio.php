<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

	public function index()
	{
		if (empty($this->session->userdata())){
			$data['id'] = 0;
		} else {
			$data['id'] 	= $this->session->id;
			$data['nombre'] = $this->session->nombre;
			$data['correo'] = $this->session->correo;
		}

		$this->load->view('header');
		$this->load->view('evx_navbar', $data);
		$this->load->view('carrusel');
		$this->load->view('evx_login_modal');
		$this->load->view('evx_signup_modal');
		$this->load->view('footer');
	}

	public function cerrar_sesion()
	{
		$this->session->unset_userdata('nombre');
		$this->session->unset_userdata('correo');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('clave');
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

		if ($this->usuario_model->obtener_evx('correo', $f_correo)){
			// Ya existe una cuenta asociada a ese correo
		} else {
			$this->usuario_model->alta($data);
			$usuario = $this->usuario_model->obtener_evx('correo', $f_correo);
			$this->session->set_userdata($usuario);
		}
		redirect('inicio');
	}
} // hay un error escondido atras de la navbar