<?php

include 'classes/functionTambahan.php';

spl_autoload_register(function($class){
	require_once 'classes/' .$class. '.php';
});

$crud = new Crud();
$transaksi = new Transaksi();
?>