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
		$this->load->model('tienda_model');
		$juegos = $this->tienda_model->obtener_lista();
		$lista['juegos'] = $juegos;
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_tienda', $lista);
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

	public function noticias()
	{
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_noticias');
		$this->load->view('footer');
		$this->load->view('responsive');
	}

	public function juego()
	{	
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_juego_calabozo');
		$this->load->view('footer');
	}

	public function cerrar_sesion()
	{
		$url = 'inicio/'.$this->input->post('f_url');
		$this->session->sess_destroy();
		redirect($url);
	}

	public function sesion()
	{
		$url = 'inicio/'.$this->input->post('f_url');

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
				$error = array ( 'error' => 'El correo ingresado ya esta asociado con una cuenta de Evexnod' );
				$this->session->set_userdata($error);
				redirect($url);
			} else if ($this->usuario_model->obtener('nombre', $f_nombre)){
				$error = array ( 'error' => 'El nombre de usuario ingresado ya esta asociado con una cuenta de Evexnod' );
				$this->session->set_userdata($error);
				redirect($url);
			} else {
				$this->usuario_model->alta($data);
				$usuario = (array) $this->usuario_model->obtener('correo', $f_correo);
				$this->session->set_userdata($usuario);
				$userdata = $this->session->userdata();

				redirect($url);
			}
		// Si no, quiere decir que se esta intentando iniciar sesión
		} else {
			$usuario = (array) $this->usuario_model->obtener('nombre', $f_nombre);
			if ($f_clave == $usuario['clave']){
				$this->session->set_userdata($usuario);
				$userdata = $this->session->userdata();

				redirect($url);
			} else {
				redirect($url);
			}
		}
	}

	public function ver_juego()
	{
		$juego_id = $this->input->post('juego_id');
		$this->load->model('tienda_model');
		$data = $this->tienda_model->obtener('id', $juego_id);
		echo json_encode($data);
	}

	public function array_push_assoc($array, $key, $value){
		$array[$key] = $value;
		return $array;
	}
}