<?php
$date = new DateTime();

$totalAll = $transaksi->totalAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Keuangan</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
<header id="header" class="">
	<h1 style="display: inline;"> Keuangan Baju TKJ 08 </h1>	
	<span class="catatan-atas"> 
		<div> <?= $date->format('d - M - Y')?></div>
		<div class="bold">Total Dana Masuk</div>
		<div class="big bold green"> <?= rupiah($totalAll['SUM(pemasukan)']) ?> </div>
	</span>
	<nav>
		<ul>
			<a href="?page=login"> Login </a> ||
			<a href='./'> Data Siswa </a> ||
			<a href="?page=transaksi-hari-ini"> Pemasukan Hari Ini </a>
			<?php
			if ($user->is_login('username')) {

			echo " || <a href='?page=tambah'> Add </a>";
			echo " || <a href='logout.php'> Logout </a>" ;
			}
			?>
		</ul>
	</nav>
</header>
<section>