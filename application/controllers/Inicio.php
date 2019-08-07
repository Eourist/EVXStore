<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('agenda_model');
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->mostrar_tabla();
		$this->load->view('footer');
	}

	// Mostrar formulario de creacion de contacto
	public function crear_contacto()
	{
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('creacion_contacto');
		$this->mostrar_tabla();
		$this->load->view('footer');
	}

	public function mostrar_reclamos($id)
	{
		$this->load->view('header');
		$this->load->view('navbar');

		$reclamos = $this->agenda_model->baja_todos_por_id($id);
		if (count($reclamos) > 0)
		{
			foreach ($reclamos as $r) 
			{
				$this->load->view('plantilla_reclamo', $r);
			}
		} else
		{
			$this->load->view('plantilla_mensaje');
		}
		
		$this->load->view('footer');
	}

	public function crear_reclamo($id)
	{ 
		$f_titulo      = $this->input->post('f_asunto');
		$f_descripcion = $this->input->post('f_descripcion');
		$f_tipo        = $this->input->post('f_tipo');

		$data_reclamo = array(
			'id_contacto'         => $id,
			'tipo_reclamo'   	  => $f_tipo,
			'estado_reclamo'      => 'pendiente',
			'titulo_reclamo'      => $f_titulo,
			'descripcion_reclamo' => $f_descripcion
		);

		$this->agenda_model->alta_reclamo($data_reclamo);
		redirect('inicio');
	}

	public function estado_reclamo($id)
	{
		$data_reclamo = $this->agenda_model->baja_por_id($id);

		$data_reclamo ['estado_reclamo']= $this->input->POST('estado_reclamo');

		$this->agenda_model->modificar_reclamos($data_reclamo, $id);

		redirect('inicio/mostrar_todos_reclamos');
	}

	public function mostrar_todos_reclamos()
	{
		$this->load->view('header');
		$this->load->view('navbar');

		$reclamos = $this->agenda_model->baja_todos_reclamos();

		if (count($reclamos) > 0)
		{
			foreach ($reclamos as $c) 
			{
				$this->load->view('plantilla_reclamo', $c);
			}
		} 
		else
		{
			$this->load->view('plantilla_mensaje');
		}

		$this->load->view('footer');
	}

	// Crear un nuevo contacto con la informacion del formulario
	public function registrar_contacto()
	{
		// Ocultar formulario de creacion de contactos
		$this->index();

		// Input del formulario
		$f_nombre   = $this->input->post('f_nombre');
		$f_apellido = $this->input->post('f_apellido');
		$f_edad     = $this->input->post('f_edad');
		$f_correo   = $this->input->post('f_correo');
		$f_telefono = $this->input->post('f_telefono');

		$f_input = array(
			'nombre'   => $f_nombre,
			'apellido' => $f_apellido,
			'edad'     => $f_edad,
			'correo'   => $f_correo,
			'telefono' => $f_telefono
		);

		// Si no existe una entrada en la base de datos con el mismo correo
		$fila = $this->agenda_model->baja_por_atributo('correo', $f_correo);
		if(empty($fila)) 
		{
			// Crear el nuevo contacto y subirlo
			$this->agenda_model->alta($f_input);
			redirect('inicio');
		} 
		// Si ese correo ya esta asociado a otro contacto
		else 
		{
			// Error
		}
	}

	// Mostrar una plantilla de contacto por cada elemento de la base de datos
	public function mostrar_tabla()
	{
		// Obtener todos los elementos de la base de datos y cargar las filas de la tabla   
		$contactos = $this->agenda_model->obtener_todos();
		if (count($contactos) > 0)
		{
			foreach ($contactos as $c) 
			{
				$this->load->view('plantilla_contacto', $c);
			}
		} else
		{
			$this->load->view('plantilla_mensaje');
		}
	}

	// Editar el contacto seleccionado con la informacion del formulario
	public function confirmar_edicion($id)
	{
		// Datos del formulario de edicion
		$f_nombre   = $this->input->post('f_nombre');
		$f_apellido = $this->input->post('f_apellido');
		$f_edad     = $this->input->post('f_edad');
		$f_correo   = $this->input->post('f_correo');
		$f_telefono = $this->input->post('f_telefono');

		$f_input = array(
			'nombre'   => $f_nombre,
			'apellido' => $f_apellido,
			'edad'     => $f_edad,
			'correo'   => $f_correo,
			'telefono' => $f_telefono
		);

		// Si el usuario no ingreso nada en algun campo, dejarlo como estaba antes
		$fila = $this->agenda_model->baja_por_atributo('id', $id);
		foreach ($f_input as $key => $value) 
		{
			if (!$value)
			{
				$f_input[$key] = $fila[$key];
			}
		}

		if ($_FILES['f_img']['name'])
		{
			//echo 'subiendo imagen';

			$config['file_name']     = 'imagen_'.$id;
			$config['upload_path']   = './upload/';
			$config['quality']       = '10%';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']      = '9000';
			$config['overwrite']     = TRUE;

			$this->load->library('upload', $config);
			$this->upload->do_upload('f_img');
			$this->upload->data();
		}

		// Aplicar los cambios en la base de datos y recargar la pagina inicial
		$this->agenda_model->modificacion($f_input, $id);
		//redirect('inicio');
		$this->index();
	}

	public function borrar_contacto($id)
	{
		$this->agenda_model->eliminar($id);
		redirect('inicio');
	}	

	public function buscar_en_modelo()
	{
		$busqueda = $this->input->post('f_busqueda');
		$coincidencias = $this->agenda_model->buscar($busqueda);

		$this->load->view('header');
		$this->load->view('navbar');

		if (count($coincidencias) > 0)
		{
			foreach ($coincidencias as $c) 
			{
				$this->load->view('plantilla_contacto', $c);
			}
		} else
		{
			$this->load->view('plantilla_mensaje');
		}

		$this->load->view('footer');
	}

	public function prueba_ajax()
	{
		$data = $this->input->post('data');
		$this->agenda_model->alta($data);
	}
}