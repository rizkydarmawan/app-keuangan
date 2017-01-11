<?php

Class Transaksi extends Crud
{
	
	public function show_transaksi($id)
	{
		return $this->db->show_transaksi('transaksi','id_siswa',$id);
	}

	public function empty_data_transaksi($id)
	{
		if (!$this->get_data('transaksi', 'id_siswa', $id)) {
			return true;
		} else return false;
	}
}

?>