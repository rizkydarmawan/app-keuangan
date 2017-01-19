<?php
require 'core/init.php';
if ($user->is_login('username')) {
	if(Input::get('token')){
		$crud->delete('transaksi', 'id', Input::get('id_trans'));
		header('location: ./?page=detail&idsis='.Input::get('idsis'));
	}
} else {
	header('location: 404.php');
}
?>