<?php
require 'core/init.php';

if($user->is_login('username')){	
	session_destroy();
	header('location: index.php');
} else {
	header("location: 404.php");
}
?>