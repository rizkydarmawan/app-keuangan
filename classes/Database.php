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

	public function insert($table, $data = array())
	{
		// INSERT into table(id_siswa,saldo) VALUES('id','dfd','sdfsd')
		$column 	= implode(",", array_keys($data));
		$valueArr	= array();

		$i = 0;
		foreach ($data as $key => $value) {
			if (is_int($value)) {
				$valueArr[$i] = $this->escape($value);
			}else{
				$valueArr[$i] = "'".$this->escape($value)."'";
			}
		$i++;
		}

		$values = implode(",", $valueArr);
		$sql  = "INSERT INTO $table($column) VALUES ($values)";
		// die($sql);
		return $this->conn->query($sql);


	}

	public function delete($table, $field, $value)
	{
		// if (is_int($value)) {
		// 	$value = "'".$value."'";
		// }
		$sql = "DELETE FROM $table WHERE $field = $value";
		return $this->conn->query($sql);
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
				if (!is_int($value)) {
					$value = "'".$value."'";
				}
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

	public function sum($table, $fieldToSum, $fieldFilter = '', $value = '')
	{
		if ($fieldFilter != '') {
			$sql    = "SELECT SUM($fieldToSum) FROM $table WHERE $fieldFilter = $value";
			$result = $this->conn->query($sql);
			while ( $row =$result->fetch_assoc()){
				return $row;
			}
		} else {
			$sql = "SELECT SUM($fieldToSum) FROM $table";
			$result = $this->conn->query($sql);
			while ($row = $result->fetch_assoc()) {
				return $row;
			}
		}
	}

	public function escape($value)
	{
		return $this->conn->real_escape_string($value);
	}
}
?>