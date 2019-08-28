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

	public function baja($id)
	{

	}

	public function modifica($data, $id)
	{

	}
}