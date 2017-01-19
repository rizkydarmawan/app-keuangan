<?php

if (!$user->is_login('username') ) {
	
} else {
	echo "<h2> Hay ". Session::get('username'). "</h2>";
}

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
			$total = 0;
		} else {
			$total = $transaksi->total_filter('pemasukan','id_siswa',$siswa['id']);
			$total = $total['SUM(pemasukan)'];
		}

		if ($total < $y) {
			$ket = "<span class='warning red'> Segera Lunasi!! </span>";
		} else {
			$ket = "<span class='warning green'> Lunas! </span>";
		}
	?>
		<tr>
			<td class="center bold"> <?= $no++ ?> </td>
			<td> <?= $siswa['nama'] ?> </td>
			<td> <?= rupiah($total) ?> </td>
			<td><?=$ket?></td>
			<td>
				<a href="?page=detail&idsis=<?= $siswa['id']?>"> Lihat Detail </a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>
