<?php
class User extends Crud
{
	public function login($username, $password)
	{
		$data_user = $this->get_data('user','username', $username);
		if ( password_verify($password, $data_user['password']) ){
			return true;
		}	else return false;
	}

	public function is_login($name)
	{
		if (Session::exists($name) ){
			return true;
		} else return false ;
	}
}
?>