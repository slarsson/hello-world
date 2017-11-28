<?php

class database extends PDO {

	function __construct(){

		$hostname = "localhost";
		$dbname = "5";

		$username = "root";
		$password = "";

		parent::__construct('mysql:host='.$hostname.';dbname='.$dbname, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	}
	
}

?>