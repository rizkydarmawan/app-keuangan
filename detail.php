<?php

if ($transaksi->empty_data_transaksi(Input::get('idsis'))) {

	echo "<h1> Belum Ada Pembayaran </h1>";
	
} else {

	$data = $transaksi->show_transaksi(Input::get('idsis'));
	$siswa = $crud->get_data('siswa','id', Input::get('idsis'));

	$x = 0;
	foreach ($data as $transaksi) {
		$x = $x + $transaksi['pemasukan'];
	}

	?>
	<h1><?= kapital($siswa['nama']) ?>  </h1>
	<blockquote>
		Uang yang anda Kumpulkan
		<span class="big red"><?= rupiah($x) ?> </span>
	</blockquote>

	<table>
		<thead>
			<tr>
				<th> No </th>
				<th> Pemasukan </th>
				<th> Tanggal </th>
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
				<td> <?= $transaksi['tgl'] ?> </td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
	<h2> Kekurangannya <?= rupiah($y-$x) ?></h2>
<?php } ?>