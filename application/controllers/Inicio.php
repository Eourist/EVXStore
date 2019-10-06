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
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('carrusel');
		$this->load->view('evx_portal_row_paneles');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function perfil_usuario()
	{
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_perfil');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function tienda()
	{
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_tienda');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function juegos()
	{
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_area_juego');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function juego()
	{	
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_juego_calabozo');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function cerrar_sesion()
	{
		$this->session->sess_destroy();
		redirect('inicio');
	}

	public function sesion()
	{
        $this->load->model('usuario_model');
		$f_nombre = $this->input->post('f_nombre');
		$f_clave = $this->input->post('f_clave');
		$f_correo = $this->input->post('f_correo');

		// Si llega el correo por POST quiere decir que es un registro (Alta)
		if($f_correo)
		{
			$data = array (
				'nombre' => $f_nombre,
				'clave'  => $f_clave,
				'correo' => $f_correo
			);

			if ($this->usuario_model->obtener('correo', $f_correo)){
				redirect('inicio');
			} else {
				$this->usuario_model->alta($data);
				$usuario = (array) $this->usuario_model->obtener('correo', $f_correo);
				$this->session->set_userdata($usuario);
				$userdata = $this->session->userdata();

				$this->load->view('header', $userdata);
				$this->load->view('evx_navbar');
				$this->load->view('carrusel');
				$this->load->view('evx_portal_row_paneles');
				$this->load->view('footer');
				$this->load->view('responsive');
			}
		// Si no llega quiere decir que se esta intentando iniciar sesión
		} else {
			$usuario = (array) $this->usuario_model->obtener('nombre', $f_nombre);
			if ($f_clave == $usuario['clave']){
				$this->session->set_userdata($usuario);
				$userdata = $this->session->userdata();

				$this->load->view('header', $userdata);
				$this->load->view('evx_navbar');
				$this->load->view('carrusel');
				$this->load->view('evx_portal_row_paneles');
				$this->load->view('footer');
				$this->load->view('responsive');
			} else {
				redirect('inicio');
			}
		}
	}
}