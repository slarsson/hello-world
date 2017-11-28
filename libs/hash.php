<?php

class hash {
	
	private $salt = "oinuid278237ZC-32";

	public function generate_hash($user, $password){

		$hash = sha1($user.$password.$this->salt);

		return $hash;

	}

}

?>