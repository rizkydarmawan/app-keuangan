<?php

Class Transaksi extends Crud
{
	
	public function show_transaksi($field, $value)
	{
		return $this->db->show_transaksi('transaksi',$field, $value);
	}

	public function empty_data_transaksi($id)
	{
		if (!$this->get_data('transaksi', 'id_siswa', $id)) {
			return true;
		} else return false;
	}
	public function total_filter($fieldToSum, $fieldFilter, $valueFilter)
	{
		if ($this->get_data('transaksi', $fieldFilter, $valueFilter)) {
			return $this->db->sum('transaksi',$fieldToSum,$fieldFilter,$valueFilter);
		} else return false;	
	}

	public function totalAll()
	{
		return $this->db->sum('transaksi','pemasukan');
		// die();
	}
}

?>