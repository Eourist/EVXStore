<?php

class Usuario_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function alta($data)
	{
		return $this->db->insert('evx_usuarios', $data);
	}

	public function obtener($atributo, $valor)
	{
		$this->db->select('
			evx_usuarios.id, 
			evx_usuarios.nombre, 
			evx_usuarios.clave, 
			evx_usuarios.correo, 
			evx_usuarios.creditos,
			evx_usuarios.premium
			');
		$this->db->from('evx_usuarios');
		$this->db->where('evx_usuarios.'.$atributo, $valor);

		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function modifica($data, $id)
	{
		$this->db->where('evx_usuarios.id', $id);
		return $this->db->update('evx_usuarios', $data);
	}

	public function alta_juego($juego_id, $usuario_id)
	{
		$data = array(
			'juego_id'		=> $juego_id,
			'usuario_id'	=> $usuario_id
		);
		return $this->db->insert('evx_compras', $data);
	}

	public function obtener_juegos($usuario_id)
	{
		$this->db->select('
			evx_compras.id as compra_id, 
			evx_compras.puntaje_maximo as puntaje_maximo,

			evx_juegos.*,

			evx_usuarios.nombre as usuario_nombre, 
			evx_usuarios.id as usuario_id
			');
		$this->db->from('evx_compras');
		$this->db->join('evx_usuarios', 'evx_usuarios.id = evx_compras.usuario_id');
		$this->db->join('evx_juegos', 'evx_juegos.id = evx_compras.juego_id');
		$this->db->where('evx_usuarios.id', $usuario_id);

		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function obtener_juego($juego_id, $usuario_id)
	{
		$this->db->select('
			evx_compras.id as compra_id,
			evx_compras.puntaje_maximo as puntaje_maximo, 

			evx_juegos.*,

			evx_usuarios.nombre as usuario_nombre, 
			evx_usuarios.id as usuario_id
			');
		$this->db->from('evx_compras');
		$this->db->join('evx_usuarios', 'evx_usuarios.id = evx_compras.usuario_id');
		$this->db->join('evx_juegos', 'evx_juegos.id = evx_compras.juego_id');
		$this->db->where('evx_usuarios.id', $usuario_id);
		$this->db->where('evx_juegos.id', $juego_id);

		$consulta = $this->db->get();
		return $consulta->row();
	}
}