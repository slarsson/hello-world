<?php

class navigation {
	
	public static function navbar(){
		
		$db = new database();
		
			$stmt = $db->prepare('SELECT * FROM navigation');
			$stmt->execute();
		
			$data = $stmt->fetchAll();

		return $data;

	}

	public static function sub_navbar(){

		$db = new database();
		
			$stmt = $db->prepare('SELECT * FROM sub_navigation');
			$stmt->execute();
		
			$data = $stmt->fetchAll();

		return $data;

	}

	public static function count_rows($table){

		$db = new database();
		
			$stmt = $db->prepare('SELECT COUNT(*) FROM '.$table);
			$stmt->execute();

		return $stmt->fetchColumn();
	
	}

	public static function pagination($selected, $limit, $rows){

		$pages = ceil($rows/$limit);
		$start = array();
		$output = "";
		$nav = null;
		
		unset($_GET['url']);
		unset($_GET['page']);
		if(!empty($_GET)){$nav  = "&".http_build_query($_GET);}


		$item = "<a href='?page=X".$nav."'>Y</a>";
		//$item = "<a href='".URL.$nav."/?page=X'>Y</a>";
		$div = "<div class='  page-style'>X</div>";
		$empty = "<div class='empty-space'>..</div>";
			
		function number($start, $end, $selected, $nav){

			$item = "<a href='?page=X".$nav."'>Y</a>";
			$div = "<div class='  page-style'>X</div>";

			for ($i=$start; $i <= $end; $i++) { 

				if($i == $selected){

					$data[$i] = preg_replace("/X/", $i, $div);
					$data[$i] = preg_replace("/  /", "selected ", $data[$i]);
					continue;

				}
				
				$data[$i] = preg_replace("/[X-Y]/", $i, $item);

			}

			return $data;

		}

		
		if($pages < 10){//min = 10
	
			$data = number(1,$pages,$selected, $nav);

		}else if($selected < 5){

			$data = number(1,6,$selected, $nav);

			$data[$pages-1] = $empty;
			$data[$pages] = preg_replace("/[X-Y]/", $pages, $item);

		}else {
	
			$start[1] = preg_replace("/[X-Y]/", 1, $item);
			$start[2] = $empty;

			if($selected > $pages-4){
		
				$data = number($pages-5,$pages,$selected,$nav);

			}else{

				$data = number($selected-1,$selected+2,$selected, $nav);

				$data[$pages-1] = $empty;
				$data[$pages] = preg_replace("/[X-Y]/", $pages, $item);

			}

		}

		$data = $start + $data;

		//prev
		if($selected <= 1){
			
			$prev = preg_replace("/X/", "&#8249; Previous", $div);
			$prev = preg_replace("/  /", "disable ", $prev);

		}else {

			$page = $selected-1;

			$prev = preg_replace("/X/", $page, $item);
			$prev = preg_replace("/Y/", "&#8249; Previous", $prev);

		}

		//next
		if($selected == $pages){

			$next = preg_replace("/X/", "Next &#8250;", $div);
			$next = preg_replace("/  /", "disable ", $next);

		}else {

			$page = $selected+1;

			$next = preg_replace("/X/", $page, $item);
			$next = preg_replace("/Y/", "Next &#8250;", $next);

		}


		foreach ($data as $value) {
			
			$output .= $value;
			
		}

		
		return $prev.$output.$next;

	}


	

}

?>