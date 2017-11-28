<?php

class user_data extends model{
	
	function __construct(){}

	public static function get(){

		//check if!!!
		$db = new database();

			$username = session::get();

			$stmt = $db->prepare('SELECT * FROM users LEFT JOIN user_data ON id=user_id WHERE username=:username');
			$stmt->bindParam(':username', $username);
			$stmt->execute();
	
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

		return $user;

	}

}

?>