<?php
$x = null;
$data = $crud->show_all('siswa');
?>
<marquee> <h1> Yang Harus Dibayar Sebanyak <?= rupiah($y) ?></h1> </marquee>
<table>
	<thead>
			<th> No </th>
			<th> Nama </th>
			<th> Pemasukan </th>
			<th> Keterangan </th>
			<th> ========= </th>
	</thead>
	<tbody>
	<?php

	$no = 1;
	foreach ($data as $siswa) {
		if ($transaksi->empty_data_transaksi($siswa['id'])) {
			$x = 0;
		} else {
			$saldos = $transaksi->show_transaksi($siswa['id']);
			foreach ($saldos as $saldo) {
				$x = $x + $saldo['pemasukan'];
			}
		}
		if ($x < $y) {
			$ket = "<span class='warning red'> Segera Lunasi!! </span>";
		} else {
			$ket = "<span class='warning green'> Lunas! </span>";
		}
	?>
		<tr>
			<td class="center bold"> <?= $no++ ?> </td>
			<td> <?= $siswa['nama'] ?> </td>
			<td> <?= rupiah($x) ?> </td>
			<td><?=$ket?></td>
			<td>
				<a href="?page=detail&idsis=<?= $siswa['id']?>"> Lihat Detail </a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
