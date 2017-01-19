<?php
$date         = new DateTime();
$hariIni      = $date->format('Ymd');
$transNow     = $transaksi->total_filter('pemasukan','tgl', $hariIni);

if (!$transNow) {
	echo "<h1> Tidak Ada Pemasukan Hari Ini!! Tagihan Ditu! </h1>";
} else {
	$dataTransNow = $transaksi->show_transaksi('tgl',$hariIni);
	?>

	<h2> Pemasukan Hari Ini <span class="green"> <?= rupiah($transNow['SUM(pemasukan)']) ?> </span></h2>
	<table>
		<thead>
			<th> Nama </th>
			<th> Nominal </th>
		</thead>
		<tbody>
		<?php
		foreach ($dataTransNow as $dataTrans) {
		$siswa = $crud->get_data('siswa','id',$dataTrans['id_siswa']);
		?>
			<tr>
				<td> <?= $siswa['nama']; ?> </td>	
				<td> <?= rupiah($dataTrans['pemasukan']) ?></td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

<?php } ?>