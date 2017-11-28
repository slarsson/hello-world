<?php

class login extends controller{

	function __construct(){
		
		parent::__construct();

		if(isset($_SESSION['login'])){

			header('Location:'.URL);
		
		}

	}
		
	public function index(){

		$this->view->render("login/index", false, "login");
		
	}

	public function authorize(){

		$data = $this->model->login();

		$this->view->json($data);

	}
	
}

?>