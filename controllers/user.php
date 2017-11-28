<?php

class user extends controller {

	function __construct(){
		
		$this->class = get_class($this);

		parent::__construct($this->class);

		session::authorize();

		$this->view->set("user", user_data::get());//2x?

	}

	public function index(){

		$this->view->content("test", $this->class);

		$this->view->render("user/index");
	
	}

	public function edit(){

		$this->view->content("edit", $this->class);

		$this->view->render("user/index", true, "user");

	}

	public function password(){
		
		$this->view->content("password", $this->class);

		$this->view->render("user/index", true, "user");

	}



	public function authorize(){

		$json_data = array('success' => 'true', 'error' => '');

		if(!empty($_POST)){

			foreach ($_POST as $key => $value) {

				$post_data[$key] = data::insert($value);

			}

			if(isset($_POST['new_password']) && isset($_POST['old_password']) && isset($_POST['confirm_new_password'])){
				
				$data = $this->model->update_password($_POST);

			}else{
				
				$data = $this->model->update($post_data);
			
			}

			if(!$data[0]){
				
				$json_data['success'] = "false";
				$json_data['error'] = $data[1];

			}

			$this->view->json($json_data);

		}

	}

}

?>