<?php

class news_model extends model {

	public function fetch_news($page, $limit){
		
		//$limit = POST_LIMIT_NEWS;
		$offset = ($page-1)*$limit;
		
		if($offset <= 0){$offset = 0;}

		$stmt = $this->dbh->prepare('SELECT * FROM news ORDER BY post_time DESC LIMIT '.$limit.' OFFSET '.$offset);
		$stmt->execute();

		if($stmt->rowCount() == 0){

			return false;

		}		

		$data = $stmt->fetchAll();

		foreach ($data as $key => $value) {
			
			$lenght = $data[$key]['content'];

			$data[$key]['content'] = substr($data[$key]['content'], 0, 500);

			if(strlen($lenght) > 500){

				$data[$key]['content'] .= "...";

			}

			$data[$key]['time'] = time::time_ago($data[$key]['post_time']);
			$data[$key]['timestamp'] = time::timestamp($data[$key]['post_time']);

		
		}

		return $data;

	}

	public function article($link = null, $id = null){

		$stmt = $this->dbh->prepare('SELECT username, news_id, link_id, headline, content, post_time FROM news LEFT JOIN users ON user_id = id WHERE link_id = :link_id OR news_id = :news_id');
		
		$stmt->bindParam(':link_id', $link);
		$stmt->bindParam(':news_id', $id);
		
		$stmt->execute();

		if($stmt->rowCount() == 0){

			return false;

		}
	
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

			$data['time_ago'] = time::time_ago($data['post_time']);
			$data['date'] = time::date($data['post_time']);
			$data['time'] = time::t_time($data['post_time']);
			$data['timestamp'] = time::timestamp($data['post_time']);
			
 			$data['raw_content'] = $data['content'];

			$test = explode("\n", $data['content']);
			$data['content'] = "";

			for ($i=0; $i < count($test); $i++) { 
				
				$test[$i] = $test[$i]."<br>";

				$data['content'] .= $test[$i];
			
			}

		return $data;

	}

	public function new_article($data){

		$text = data::insert($data['content']);
		$headline = data::insert($data['headline']);

		if(empty($text) || empty($headline)){return false;}

		$link = $this->link_id($data['headline']);


			$stmt = $this->dbh->prepare('INSERT INTO news (link_id, headline, content, post_time, user_id) VALUES (:link_id, :headline, :content, :post_time, :user_id)');
			
			$stmt->bindParam(':link_id', $link);
			$stmt->bindParam(':headline', $headline);
			$stmt->bindParam(':content', $text);
			$stmt->bindValue(':post_time', time(), PDO::PARAM_INT);
			$stmt->bindValue(':user_id', user_data::get()['user_id'], PDO::PARAM_INT);

			$stmt->execute();

			return $link;

	}

	public function edit_article($data){

		if(!empty($data['id']) && preg_match("/^[0-9]*$/", $data['id'])){

			$stmt = $this->dbh->prepare('SELECT * FROM news WHERE news_id = :id');
			
			$stmt->bindParam(':id', $data['id']);
			$stmt->execute();

			if($stmt->rowCount() == 0){return false;}

			$article = $stmt->fetch(PDO::FETCH_ASSOC);

			$data['content'] = data::insert($data['content']);
			$data['headline'] = data::insert($data['headline']);



			$result = array_intersect_key($article, $data);
			$sql = "";
			$values = array();

			foreach ($result as $key => $value) {
				
				if($key == "link_id" || $key == "news_id" || empty($value)){

					return false;
				
				}

				if($data[$key] != $article[$key]){

					if($key == "headline"){

						$sql .= "link_id = :link_id, ";
						$values['link_id'] = $this->link_id($data['headline']);

					}
					
					$sql .= $key." = :".$key.", ";
					$values[$key] = $data[$key];

				}

			}

			$sql = substr($sql, 0, -2);

			if(empty($sql)){
				
				return array($article['headline'], $article['content']);
			
			}
			
			$stmt = $this->dbh->prepare('UPDATE news SET '.$sql.' WHERE news_id = :id');
			
			$stmt->bindParam(':id', $data['id']);
			

			foreach ($values as $key => &$value) {
				
				$stmt->bindValue(':'.$key, $value);

			}

			$stmt->execute();

			return array($data['headline'], $data['content']);

		}

		return false;

	}

	public function remove($id){

		if(preg_match("/^[0-9]*$/", $id)){

			$stmt = $this->dbh->prepare('DELETE FROM news WHERE news_id = :id');

			$stmt->bindParam(':id', $id);

			$stmt->execute();

			return true;

		}

		return false;

	}

	private function link_id($data){

		$link = strtolower($data);//bort med VERSALER
		$link = trim($link);//whitespace left n right
		$link = preg_replace("/[äå]/", "a", $link);//FIXA DET HÄR!
		$link = preg_replace("/[ö]/", "o", $link);//FIXA DET HÄR!
		$link = preg_replace("/[^a-z0-9\s]/", "", $link);//endast A - Z och 0-9
		$link = preg_replace("/ /", "-", $link);

		$i = 1;
		$test_link = $link;
		$reserved = array("new", "authorize", "edit");
		
		//link_id får bara finns en gång
		do {
			
			$stmt = $this->dbh->prepare('SELECT link_id FROM news WHERE link_id = "'.$test_link.'"');
			$stmt->execute();
			
			if($stmt->rowCount() == 0 && !in_array($test_link, $reserved)){
				
				$link = $test_link;

				break;	

			}
			
			$test_link = $link."-".$i;
			$i++;

		}while(true);

		return $link;

	}
	
}

?>