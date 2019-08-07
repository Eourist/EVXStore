<?php
class Agenda_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function alta_reclamo($data)
	{
		return $this->db->insert('reclamos', $data);
	}

	public function baja_reclamo($nombreAtributo, $valorAtributo)
	{
		$this->db->select('reclamos.*');
		$this->db->from('reclamos');
		$this->db->where('reclamos.'.$nombreAtributo, $valorAtributo);

		$consulta = $this->db->get();
		return (array) $consulta->row();
	}

	public function baja_todos_reclamos()
	{
		$this->db->select('reclamos.*');
		$this->db->from('reclamos');

		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function baja_todos_por_id($id)
	{
		$this->db->select('reclamos.*');
		$this->db->from('reclamos');
		$this->db->where('reclamos.id_contacto', $id);

		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function baja_por_id($id)
	{
		$this->db->select('reclamos.estado_reclamo');
		$this->db->from('reclamos');
		$this->db->where('reclamos.id_reclamo', $id);

		$consulta = $this->db->get();
		return (array)$consulta->row();
	}

	public function alta($data)
	{
		return $this->db->insert('agenda', $data);
	}

	public function baja($id)
	{
		$this->db->select('agenda.*');
		$this->db->from('agenda');
		$this->db->where('agenda.id', $id);

		$consulta = $this->db->get();
		return $consulta->row();
	}

	public function modificacion($data, $id)
	{
		$this->db->where('agenda.id', $id);
		return $this->db->update('agenda', $data);
	}

	public function modificar_reclamos($data, $id)
	{
		$this->db->where('reclamos.id_reclamo', $id);
		return $this->db->update('reclamos', $data);
	}

	public function obtener_todos()
	{
		$this->db->select('agenda.nombre, agenda.apellido, agenda.id, agenda.edad, agenda.correo, agenda.telefono');
		$this->db->from('agenda');

		$consulta = $this->db->get();
		return $consulta->result();
	}


	public function eliminar($id)
	{
		$this->db->where('agenda.id', $id);
		$this->db->delete('agenda');
	}

	public function baja_por_atributo($nombreAtributo, $valorAtributo)
	{
		$this->db->select('agenda.*');
		$this->db->from('agenda');
		$this->db->where('agenda.'.$nombreAtributo, $valorAtributo);

		$consulta = $this->db->get();
		return (array) $consulta->row();
	}

	public function baja_ultimo_id()
	{
		$this->db->order_by('id', 'DESC');

		$this->db->select('agenda.*');
		$this->db->from('agenda');

		$consulta = $this->db->get();
		return (array) $consulta->row();
	}

	public function buscar($texto)
	{
		$this->db->select('agenda.nombre, agenda.apellido, agenda.id, agenda.edad, agenda.correo, agenda.telefono');
		$this->db->from('agenda');
		$this->db->like('agenda.nombre', $texto);
		$this->db->or_like('agenda.apellido', $texto);
		$this->db->or_like('agenda.correo', $texto);

		$consulta = $this->db->get();
		return $consulta->result();
	}
}