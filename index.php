<?php
include 'core/init.php';
$y = 100000;
?>
<?php include 'template/header.php'; ?>
<?php
switch(Input::get('page')){
	case '':
		include 'data_siswa.php';
	break;
	case 'detail':
		include 'detail.php';
		break;
	case 'login':
		include 'login.php';
		break;
	case 'tambah':
		include 'tambah.php';
		break;
	case 'transaksi-hari-ini':
		include 'transaksi_hari_ini.php';
		break;
}
?>

<?php include 'template/footer.php'; ?>