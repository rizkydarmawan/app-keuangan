<?php
if ($user->is_login('username')) {
	echo "<h2> Kamu Sudah Login ".Session::get('username')."</h2>";
} else {

	$errors = [];
	if (Input::get('submit')) {
			if( $user->login(Input::get('username'), Input::get('password') ) ){
				Session::set('username', Input::get('username'));
				header('location: ?page= ');
			} else {
				$errors[] = "Username Atau Password Salah!!";
			}

				
	}

	// echo password_hash('XX', PASSWORD_DEFAULT);
	?>

	<form action="" method="POST">
		<fieldset>
		<legend> <h2> Login </h2></legend>
			<input type="text" name="username" required placeholder="Username">
			<input type="password" name="password" required placeholder="Password">
			<input type="submit" name="submit" value="Login">
		</fieldset>
	</form>
	<?php foreach ($errors as $error ) { ?>
	<h4 class="error"> <?= $error ?> </h4>
	<?php } 
}
	?>
