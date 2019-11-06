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
		$this->load->view('header', $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('carrusel');
		$this->load->view('evx_portal_row_paneles');
		$this->load->view('footer');
		//$this->load->view('responsive');
	}

	public function perfil_usuario()
	{
		$juegos = $this->usuario_model->obtener_juegos($this->session->userdata('id'));
		$data = array( 'juegos' => $juegos ); // SE PASAN MAL
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_perfil', $data);
		$this->load->view('footer');
		//$this->load->view('responsive');
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
		//$this->load->view('responsive');
	}

	public function cargar_puntaje()
	{
		$puntaje = $this->input->post('puntaje');

		$data = array(
			'usuario_id' 	=> $this->session->userdata('id'),
			'juego_id' 		=> 6,
			'puntaje'		=> $puntaje,
			'fecha'			=> date('Y-m-d') 
		);
		$this->usuario_model->alta_puntaje($data);
	}

	public function juegos()
	{
		$this->load->model('tienda_model');
		$puntajes = $this->tienda_model->obtener_puntajes_juego(6);

		$data = array('puntajes' => $puntajes);

		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_area_juego', $data);
		$this->load->view('footer');
		//$this->load->view('responsive');
	}

	public function noticias()
	{
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_noticias');
		$this->load->view('footer');
		//$this->load->view('responsive');
	}

	public function juego()
	{	
		$this->load->view('header', $userdata = $this->session->userdata());
		$this->load->view('evx_navbar');
		$this->load->view('evx_juego_calabozo');
		$this->load->view('footer');
		//$this->load->view('responsive');
	}

	public function mejora_premium()
	{
		$url 		= 'inicio/'.$this->input->post('f_url');
		$usuario_id = $this->session->userdata('id');
		$creditos 	= $this->session->userdata('creditos');

		if ($creditos >= 1200){
			$data = array(
				'premium' 	=> 1,
				'creditos' 	=> $creditos - 1200
			);
			$this->usuario_model->modifica($data, $usuario_id);
			$usuario_actualizado = $this->usuario_model->obtener('id', $usuario_id);
			$this->session->set_userdata('premium', $usuario_actualizado->premium);

			$this->session->set_userdata('alerta', 'Compra exitosa, ¡Disfruta de los beneficios del Evexnod Club!');
			$this->session->set_userdata('alerta_color', 'linear-gradient(#2cc9bf, #38fff2)');
		} else {
			$this->session->set_userdata('alerta', 'No tienes créditos suficientes para unirte al Evexnod Club');
			$this->session->set_userdata('alerta_color', 'red');
		}
		redirect($url);
	}

	public function comprar_monedas()
	{
		$cantidad 	= $this->input->post('cantidad');
		$usuario_id	= $this->session->userdata('id');
		$creditos 	= $this->session->userdata('creditos');

		$data = array( 'creditos' => $creditos + $cantidad );
		$this->usuario_model->modifica($data, $usuario_id);
		$usuario_actualizado = $this->usuario_model->obtener('id', $usuario_id);
		$this->session->set_userdata('creditos', $usuario_actualizado->creditos);

		echo json_encode($usuario_actualizado);
	}

	public function comprar_juego()
	{
		$precio 	= $this->input->post('precio');
		$juego_id 	= $this->input->post('juego_id');

		$usuario_id = $this->session->userdata('id');
		$creditos 	= $this->session->userdata('creditos');

		if ($usuario_id){
			if ($this->usuario_model->obtener_juego($juego_id, $usuario_id)){
				$data = array( 'error' => 'Este juego ya está en tu biblioteca');
			} else {
				if ($creditos < $precio){
					$data = array( 'error' => 'Créditos insuficientes');
				} else {
					$data_creditos = array( 'creditos' => $creditos - $precio );
					$this->usuario_model->modifica($data_creditos, $usuario_id);
					$puntaje = ($juego_id == 6) ? 0 : rand(18, 1230);
					$data_juego = array(
						'usuario_id' 	=> $usuario_id,
						'juego_id'		=> $juego_id,
						'fecha_compra'	=> date('Y-m-d'),
						'puntaje_maximo'=> $puntaje
					);
					$data_puntaje = array(
						'usuario_id'=> $usuario_id,
						'juego_id'	=> $juego_id,
						'fecha'		=> date('Y-m-d'),
						'puntaje'	=> $puntaje
					);
					$this->usuario_model->alta_puntaje($data_puntaje);
					$this->usuario_model->alta_juego($data_juego);

					$data = $this->usuario_model->obtener('id', $usuario_id);
					$this->session->set_userdata('creditos', $data->creditos);
				}
			}
		} else {
			$data = array( 'error' => 'Es necesario iniciar sesión para realizar compras');
		}
		echo json_encode($data);
	}

	public function comprar_pocion()
	{
		$creditos = $this->session->userdata('creditos');

		$data = array('creditos' => $creditos);
		if ($creditos >= 10){
			$data['creditos'] = (int)$creditos - 10;
			$this->usuario_model->modifica($data, $this->session->userdata('id'));
			$this->session->set_userdata('creditos', $creditos - 10);
			$this->session->set_userdata('pociones', $this->input->post('pociones') + 1);
		} else {
			$data['error'] = 1;
		}
		echo json_encode($data);
	}

	public function gastar_pociones()
	{
		$this->session->unset_userdata('pociones');
		echo json_encode(0);
	}

	public function cerrar_sesion()
	{
		$url = ($this->input->post('f_url') == 'perfil_usuario') ? 'inicio' : 'inicio/'.$this->input->post('f_url');
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
				$error = array ( 'error' => 'El correo ingresado ya esta asociado con una cuenta de Evexnod');
				$this->session->set_userdata($error);
				redirect($url);
			} else if ($this->usuario_model->obtener('nombre', $f_nombre)){
				$error = array ( 'error' => 'El nombre de usuario ingresado ya esta asociado con una cuenta de Evexnod');
				$this->session->set_userdata($error);
				redirect($url);
			} else {
				$this->usuario_model->alta($data);
				$usuario = (array) $this->usuario_model->obtener('correo', $f_correo);
				$this->session->set_userdata($usuario);
				//$userdata = $this->session->userdata();

				redirect($url);
			}
		// Si no, quiere decir que se esta intentando iniciar sesión
		} else {
			$usuario = (array) $this->usuario_model->obtener('nombre', $f_nombre);
			if ($f_clave == $usuario['clave']){
				$this->session->set_userdata($usuario);
				//$userdata = $this->session->userdata();

				redirect($url);
			} else {
				$error = array ( 'error' => 'Credenciales de inicio de sesión incorrectos');
				$this->session->set_userdata($error);

				redirect($url);
			}
		}
	}

	public function editar_usuario()
	{
		$usuario_id 	= $this->session->userdata('id');
		$nuevo_nombre 	= $this->input->post('f_nuevo_nombre');
		$nuevo_correo 	= $this->input->post('f_nuevo_correo');

		$data = array(
			'nombre' => $nuevo_nombre,
			'correo' => $nuevo_correo
		);

		$this->usuario_model->modifica($data, $usuario_id);
		$usuario = $this->usuario_model->obtener('id', $usuario_id);

		//$this->session->set_userdata($usuario);
		$this->session->set_userdata('nombre', $usuario->nombre);
		$this->session->set_userdata('correo', $usuario->correo);

		$this->session->set_userdata('alerta', 'Datos de usuario editados correctamente');
		$this->session->set_userdata('alerta_color', 'linear-gradient(#2cc9bf, #38fff2)');

		redirect('inicio/perfil_usuario');
	}

	public function ver_juego()
	{
		$juego_id = $this->input->post('juego_id');
		$this->load->model('tienda_model');
		$data = (array)$this->tienda_model->obtener('id', $juego_id);
		$data['premium'] = $this->session->userdata('premium');

		echo json_encode($data);
	}

	public function array_push_assoc($array, $key, $value)
	{
		$array[$key] = $value;
		return $array;
	}

	// Funciones de debug
	public function prem()
	{
		$usuario_id = $this->session->userdata('id');
		$premium = $this->session->userdata('premium');

		if ($premium == 1){
			$data = array('premium' => 0);
		} else {

			$data = array('premium' => 1);
		}

		$this->usuario_model->modifica($data, $usuario_id);
		$usuario = $this->usuario_model->obtener('id', $usuario_id);
		$this->session->set_userdata('premium', $usuario->premium);
		redirect('inicio');
	}
}