<?php

class user_model extends model{

	function __construct(){

		parent::__construct();

		$this->user = user_data::get();

	}

	public function update($post_data, $who = false){
		
		if($who) {
			
			$user = $who;

		}else {

			$user = $this->user;
			
		}

		$string = "";
		
		$result = array_intersect_key($user, $post_data);
		
		foreach ($result as $key => $x){

			if($this->user[$key] != $post_data[$key]){

				//får ej ändras
				if($key == "user_id"){

					return array(false, 1);

				}

				//endast "länder" som finns får stoppas in
				if($key == "country"){
					
					if(!array_key_exists($post_data[$key], $GLOBALS['countries'])){

						return array(false, 1);

					}

				}

				//endast 1-9 eller +,-," " -tecken
				if($key == "phone"){

					if(!preg_match('/^[0-9\-\+\(\)\ ]*$/', $post_data[$key])){

						return array(false, 1);

					}

				}

				//email får inte vara tom
				if($key == "email"){

					if(empty($post_data['email'])){

						return array(false, 1);

					}

				}

					//skapar SQL
					$string = $string.$key." = '".$post_data[$key]."', ";

			}

		}

		$string = substr($string, 0, -2);

		if(!empty($string)){
			
			$stmt = $this->dbh->prepare('UPDATE user_data SET '.$string.' WHERE user_id = "'.$user['id'].'"');
			$stmt->execute();

			return array(true);

		}else{
			
			return array(false, 2);//nothing to change

		}

	}

	public function update_password($post_data){

		if($post_data['new_password'] == $post_data['confirm_new_password']){

			$hash = new hash();

			$old_password = $hash->generate_hash($this->user['username'], $post_data['old_password']);
	
			if($old_password == $this->user['password']){

				$new_password = $hash->generate_hash($this->user['username'], $post_data['new_password']);	

					$stmt = $this->dbh->prepare('UPDATE users SET password = "'.$new_password.'" WHERE id = "'.$this->user['id'].'"');
					$stmt->execute();

					return array(true);

			}else {

				return array(false, 4);//wrong password

			}

		}else {

			return array(false, 3);//password does not match

		}

	}

}

?>