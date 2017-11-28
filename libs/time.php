<?php

class time {

	public static function time_ago($time){

		$now = time()-$time;

		if($now < 1){$now = 1;}   


		$limit = array(
			"year" => 31536000,
			"month" => 2592000,
			"week" => 604800,
			"day" => 86400,
			"hour" => 3600,
			"minute" => 60,
			"secound" => 1
		);

			foreach ($limit as $key => $value){
				
				if($now < $value){continue;}

					$time = floor($now/$value);
					$type = $key;

					if($time != 1){$type .= "s";}

				break;

			}

			$time = $time." ".$type." ago";

		return $time;

	}

	public static function date($time){
		
		$data = date('d', $time)." ".date('F', $time)." ".date('Y', $time);

		return $data;

	}

	public static function t_time($time){

		$data = date("H:i", $time);

		return $data;

	}

	public static function timestamp($time){

		$data = date("Y-m-d / H:i:s", $time);

		return $data; 

	}

}

?>