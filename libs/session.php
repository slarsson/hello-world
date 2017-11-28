<?php

class session {

	public static function authorize(){
		
		if(!isset($_SESSION['login'])){

			header('Location:'.URL.'login');
			exit;

		}

		return true;

	}

	public static function set($user){
		
		$_SESSION['login'] = $user;

	}

	public static function get(){

		$user = $_SESSION['login'];

		return $user;

	}

	public static function destroy(){
		
		session_destroy();

	}

}

?>