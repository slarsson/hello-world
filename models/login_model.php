<?php
class login_model extends model{
	

	public function login(){

		$json = array('success' => 'false', 'error' => 'error');

		if(!empty($_POST['username']) && !empty($_POST['password'])){
			
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$result = $this->check($username, $password);
			
			if($result){
				
				session::set($username);

				$json['success'] = true;

			}

			$json['error'] = "wrong username or password";//FIXA

		}

		return $json;

	}

	private function check($username, $password){

		$stmt = $this->dbh->prepare('SELECT password FROM users WHERE username=:username');
		$stmt->bindParam(':username', $username);
		$stmt->execute();

		if($stmt->rowCount() > 0){
			
			$user = $stmt->fetch();
			
			$hash = new hash();
			$password = $hash->generate_hash($username, $password);
			
			if($password == $user['password']){

				return true;

			}

			//wrong password
			return false;
		
		}

		//error user does not exist
		return false;

	}



}
?>