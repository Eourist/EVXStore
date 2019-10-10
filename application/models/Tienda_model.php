<?php

class Tienda_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
    }

	public function alta($data)
	{
		return $this->db->insert('evx_juegos', $data);
	}

	public function obtener($atributo, $valor)
	{
		$this->db->select('evx_juegos.id, evx_juegos.nombre, evx_juegos.precio, evx_juegos.descripcion, evx_juegos.imagen');
		$this->db->from('evx_juegos');
		$this->db->where('evx_juegos.'.$atributo, $valor);

		$query = $this->db->get();
		return $query->row();
	}

	public function obtener_lista()
	{
		$this->db->select('evx_juegos.id, evx_juegos.nombre, evx_juegos.precio, evx_juegos.descripcion, evx_juegos.imagen');
		$this->db->from('evx_juegos');

		$query = $this->db->get();
		return $query->result();
	}
}