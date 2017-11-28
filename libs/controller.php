<?php

class controller{

	function __construct($id = false) {

		session_start();
		
		$page_id = $id;

		$this->view = new view($page_id);

	}

	//name = controller
	//auto = true -> när x_model annars false
	public function load_model($name, $auto = true, $load_name = "model"){

		$auto_name = "_model";

		if(!$auto){

			$auto_name = "";

		}

		$path = MODELS.$name.$auto_name.".php";
		
		if(is_file($path)){

			require($path);
			$model_name = $name.$auto_name;
			$this->{$load_name} = new $model_name();

		}

	}

}

?>