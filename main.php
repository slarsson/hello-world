<?php

class blog {

	function __construct(){

		$hostname = "localhost";
		$dbname = "5";

		$username = "root";
		$password = "";

		$this->dbh = new PDO('mysql:host='.$hostname.';dbname='.$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

	}

	public function fetch($xxx){

		$stmt = $dbh->prepare("SELECT * FROM news");//order by date desc
		
		$stmt->execute();

		return $stmt->fetchAll();

	}

	public function search($word, $xxx = false){
		
		if(empty($word)){return false;} 

		$stmt = $this->dbh->prepare('SELECT * FROM news WHERE headline LIKE :headline OR content LIKE :content');//order by date desc

		$stmt->bindValue(':headline', "%".$word."%");
		$stmt->bindValue(':content', "%".$word."%");
		
		$stmt->execute();

		return $stmt->fetchAll();

	}

	public function insert(){

		$headline = $this->sanitize($_POST['v1']);

		$stmt = $this->dbh->prepare('INSERT INTO samla949 (a, b, c) VALUES (:v1, :v2, :v3)');

		$stmt->bindParam(':v1', $headline);

		$stmt->execute();

		return true;

	}

	public function sanitize($what){

		$what = htmlspecialchars($what);
		$what = trim($what);

		return $what;

	}

	private function swag($test){
		//code osv..asdcasdf
	}

}

	$test = new blog();
	
	var_dump($test->search("asdf"));

?>