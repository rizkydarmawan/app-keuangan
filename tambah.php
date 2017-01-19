<?php
if (!$user->is_login('username')) {
	header('Location: 404.php');
} else {
	$tgl = date('Y-m-d');

	if (Input::get('submit')) {
		$crud->insert('transaksi', array(
				'id_siswa' => (int) Input::get('id_siswa'),
				'pemasukan'		=> (int) Input::get('saldo'),
				'tgl' => $tgl
			));
		header('location: ./?page=tambah');
	}

	$data = $crud->show_all('siswa');
	?>
	<h3>Kode siswa</h3>
	<div class="article">
		<?php foreach ($data as $siswa) { ?>
		<div>
			<?= "(".$siswa['id'].')' ?>
			<?= $siswa['nama']?>
		</div>
		<?php } ?>
	</div>

	<form action="" method="POST">
		<label> Kode Siswa </label>
		<input type="number" autofocus required name="id_siswa" id="kode" max="35" placeholder="Kode Siswa Ex: 22">
		<input type="number" required name="saldo" placeholder="Nominal Pembayaran">
		<input type="submit" name="submit" value="Tambah">
	</form>
<?php
}
?>