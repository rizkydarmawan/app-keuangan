<?php

class Database {
	private static  $INSTANCE;
	private $conn;


	public function __construct()
	{
			$this->conn = new mysqli('localhost', 'root', '', 'db_keuangan') or die($this->error);
	}

	public static function getInstance()
	{
		if (!isset(self::$INSTANCE)) {
				self::$INSTANCE = new Database();
		} 

		return self::$INSTANCE;
	}

	public function show_transaksi($table, $field, $value)
	{	
		$sql    = "SELECT * FROM $table WHERE $field = $value";
		$result = $this->conn->query($sql);
		while ($row = $result->fetch_assoc()) {
				$rows[] =  $row;
			}
		return $rows;
	}
	public function show($table, $field = null, $value = null)
	{
			if ($field != null) {
				$sql    = "SELECT * FROM $table WHERE $field = $value";
				$result = $this->conn->query($sql);
				while ($row = $result->fetch_assoc()) {
						return $row;
				}
			} else {

				$sql 		= "SELECT*FROM $table";
				$result = $this->conn->query($sql);
				while ($row = $result->fetch_assoc()) {
					 $rows[] = $row;
				}

				return $rows;
		}
	}

	public function escape($value)
	{
		return $this->conn->real_escape_string($value);
	}
}
?>