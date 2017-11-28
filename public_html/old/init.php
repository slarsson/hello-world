<?php

	require_once('settings.php');

	$settings = new settings();

	call($controller, $action);


	function call($controller, $action){
		
		$check = is_file(CONTROLLER.$controller.".php");	

		if($check){

			require_once(CONTROLLER.$controller.".php");
			
			$object = new $controller();
			
			if(method_exists($object, $action)){
				
				$object->{$action}();
				
			}else {

				//error på ngt sätt
				echo $controller." -> ".$action." = finns ej";

			}

		}else {

			//error page not found
			echo "404 page not found";

		}

	}


?>