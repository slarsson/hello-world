<?php

class error extends controller{

	function __construct(){
		
		parent::__construct();

		session::authorize();

		$this->view->render("error", false);

	}

}

?>