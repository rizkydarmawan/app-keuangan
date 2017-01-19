<?php
class Crud
{
	protected $db;

	public function __construct()
	{
		 $this->db = Database::getInstance();
	}

	public function show_all($table)
	{
		return $this->db->show($table);
	}

	public function get_data($table, $field, $value)
	{
		return $this->db->show($table, $field, $value);
	}
	public function insert($table, $data = array())
	{
		if ($this->db->insert($table, $data)) {
			return true;
		} else return false;
	}

	public function delete($table, $field, $value)
	{
		return $this->db->delete($table, $field, $value);
	}
}
?>