<?php

class view {

	function __construct($id = false){
		
		$this->page_id = $id;

		$this->title = $id;
	
	}

	public function set($name, $data){
		
		$this->{$name} = $data;

	}

	public function render($name, $data = true, $script = false){
		
		require(VIEWS.'head.php');

		if($script){

			$path = URL_SCRIPT.$script.".js";
			echo "<script src=".$path."></script>";

		}

		echo "</head><body>";

		if($data){

			$nav = navigation::navbar();

			require(VIEWS.'header.php');
			
		}

		require(VIEWS.$name.".php");

		if($data){
			require(VIEWS.'footer.php');
		}

		echo "</body>\n</html>";

		$total_time = round((microtime(true) - $GLOBALS['time']),6);
		echo "<div class='render-time'>".$total_time."</div>";
	}


	public function content($data, $class, $name = false){

		$this->nav_id = $data;

		$data = VIEWS.$class."/".$data.".php";

		if(!$name){
			$this->set("content", $data);
		}else {
			$this->set($name, $data);
		}

	}

	public function json($data){

		header('Content-type: application/json');

		echo json_encode($data);

	}

}

?>