<?php

class logout extends controller{
	
	public function index(){

		session::destroy();
	
		header('Location:'.URL.'login');

	}

}

?>