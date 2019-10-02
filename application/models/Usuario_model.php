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
		$this->db->select('evx_usuarios.id, evx_usuarios.nombre, evx_usuarios.clave, evx_usuarios.correo, evx_usuarios.creditos');
		$this->db->from('evx_usuarios');
		$this->db->where('evx_usuarios.'.$atributo, $valor);

		$consulta = $this->db->get();
		return $consulta->row();
	}
}