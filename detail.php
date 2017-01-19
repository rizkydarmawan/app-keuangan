<?php

if ($transaksi->empty_data_transaksi(Input::get('idsis'))) {

	echo "<h1> Belum Ada Pembayaran </h1>";
	
} else {

	$total = $transaksi->total_filter('pemasukan','id_siswa',Input::get('idsis'));
	$data = $transaksi->show_transaksi('id_siswa',Input::get('idsis'));
	$siswa = $crud->get_data('siswa','id', Input::get('idsis'));

	$total = $total['SUM(pemasukan)'];
	?>
	<h1><?= kapital($siswa['nama']) ?>  </h1>
	<blockquote>
		Uang yang anda Kumpulkan
		<span class="big red"><?= rupiah($total) ?> </span>
	</blockquote>

	<table>
		<thead>
			<tr>
				<th> No </th>
				<th> Pemasukan </th>
				<th> Tanggal Setor  </th>
			</tr>
		</thead>
		<tbody>
		<?php
		$no = 1;
		foreach($data as $transaksi) {
		?>
			<tr>
				<td> <?= $no++ ?> </td>
				<td><?= rupiah($transaksi['pemasukan']) ?> </td>
				<td> <?= tanggal($transaksi['tgl']) ?> </td>
			<?php if ($user->is_login('username')) { ?>
				<td>
				<a onclick="return confirm('Yakin Menghapus?')" href="delete.php?token=<?= Token::generate()?>&id_trans=<?= $transaksi['id']?>&idsis=<?=$siswa['id']?>"> Delete </a>
				</td>
			<?php } ?>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<?php
	if ($y-$total <= 0) {
		$keterangan = "<span class='green'>Tidak Ada / Lunas </span>";
										// <div> Lebih ".rupiah($total-$y)."</div>";

	} else {
		$keterangan = "<span class='red'>".rupiah($y-$total)."</span>";
	}
	?>
	<h2> Kekurangannya <?= $keterangan  ?></h2>
<?php } ?>
