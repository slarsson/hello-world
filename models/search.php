<?php
class search extends model {
	
	function __construct(){

		parent::__construct();

	}

	public function find($what, $filter){

		$filters = array(
			
			0 => "item_id ASC",
			"desc" => "price DESC",
			"asc" => "price ASC",
			"name" => "name DESC",
		
		);

		if(!array_key_exists($filter, $filters)){$filter = 0;}


		

		$s = array();

		$what = explode(" ", $what);

		foreach ($what as $key => $value) {
			
			$what[$key] = trim($value);

			if(empty($what[$key])){

				unset($what[$key]);
				continue;
			
			}
			
			$what[$key] = "%".$what[$key]."%";
			$s[$key] = ":word".$key;

		}

	
		$sql_data = "";
		
		foreach($s as $key => $value){
			$sql_data .= "AND name LIKE ".$s[$key]." ";
		}
		
		$sql_data = substr($sql_data, 13);


		$stmt = $this->dbh->prepare('SELECT * FROM shop LEFT JOIN shop_img ON img_id = thumbnail WHERE name LIKE '.$sql_data.' ORDER BY '.$filters[$filter]);
		
		foreach ($what as $key => $value) {
			$stmt->bindParam($s[$key], $what[$key]);
		}


		//$stmt = $this->dbh->prepare('SELECT * FROM shop LEFT JOIN shop_img ON img_id = thumbnail WHERE name LIKE :word17 ORDER BY '.$filters[$filter]);
		//$stmt->bindParam(':word17', $what[0]);
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

}

?>