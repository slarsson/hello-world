<?php

class bootstrap{

	function __construct(){

		if(isset($_GET['url'])){
			
			$url = explode("/", rtrim($_GET['url'], "/"));

			if($url[0] == "news"){
				$url[1] = "index";
			}

		}else {
			$url[0] = "index";
			$url[1] = "index";
		}

		$check = is_file(CONTROLLER.$url[0].".php");

		if($check){
			
			require_once(CONTROLLER.$url[0].".php");
			
			$object = new $url[0];
			$object->load_model($url[0]);

			if(isset($url[1])){

				if(method_exists($object, $url[1])){

					$object->{$url[1]}($url);
					//$object->{$url[1]}());


				}else {

					$this->error();
					//echo "NOT FOUND";
					//$object->index();
					return false;

				}


			}else {

				$object->index();
			
			}

		}else {

			//error constructor goes here..
			$this->error();
			return false;

		}

	}

	private function error(){

		require_once(CONTROLLER."error.php");
		$object = new error();

	}

}
?>