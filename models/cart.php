<?php
class cart extends model {
	
	function __construct(){
		
		parent::__construct();

		if(isset($_COOKIE['cart'])){

			$this->id = $_COOKIE['cart'];

		}else {
			
			$this->id = 0;

		}

	}

	private function cart_exist(){

		$data = $this->id;

		$stmt = $this->dbh->prepare('SELECT * FROM shop_cart WHERE cart_id = :id');
		$stmt->bindParam(':id', $data);
		$stmt->execute();

		$check = $stmt->fetchAll(PDO::FETCH_ASSOC);

		if($stmt->rowCount() == 0){$data = 0;}

		return $data;

	}

	public function total_items_cart(){

		if($this->id == 0){
			
			return 0;
		
		}else {
			
			$id = $this->id;
		
		}

		$stmt = $this->dbh->prepare('SELECT SUM(quantity) FROM shop_cart_items WHERE cart_id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$total = $stmt->fetchColumn();

		if(empty($total)){$total = 0;}

		return $total;

	}

	public function get_cart($img = false){

		$id = $this->cart_exist();

		$stmt = $this->dbh->prepare('SELECT shop.item_id, item_link, name, price, quantity, thumbnail FROM shop JOIN shop_cart_items ON shop.item_id = shop_cart_items.item_id WHERE cart_id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$test = $stmt->fetchAll(PDO::FETCH_ASSOC);

		foreach ($test as $key => $value) {

			$test[$key]['url'] = URL."shop/item/".$test[$key]['item_id']."/".$test[$key]['item_link'];
			
			if($img){

				$stmt = $this->dbh->prepare('SELECT url FROM shop_img WHERE img_id = :thumbnail');
				$stmt->bindParam(':thumbnail', $test[$key]['thumbnail']);
				$stmt->execute();
				$img  = $stmt->fetch(PDO::FETCH_ASSOC);

				$test[$key]['img'] = $img['url'];

			}

		}

		return $test;

	}

	public function update($data){

		if($this->cart_exist() == 0){
			
			do {
				
				$new_cart_id = rand(100000, 999999);

				$stmt = $this->dbh->prepare('SELECT cart_id FROM shop_cart WHERE cart_id = :id');
				$stmt->bindParam(':id', $new_cart_id);
				$stmt->execute();
			
				if($stmt->rowCount() == 0){
				
					break;	

				}

			}while(true);

			$stmt = $this->dbh->prepare('INSERT INTO shop_cart (cart_id, user_ip, added) VALUES (:id, :ip, :date)');
			$stmt->bindParam(':id', $new_cart_id);
			$stmt->bindValue(':ip', $_SERVER['REMOTE_ADDR']);
			$stmt->bindValue(':date', time());
			$stmt->execute();

			setcookie("cart", $new_cart_id, time() + (300000), "/");

			$id = $new_cart_id;

		}else {

			$id = $this->id;

		}

		if(isset($data['remove'])){

			if($data['remove'] == 0){

				$stmt = $this->dbh->prepare('DELETE FROM shop_cart_items WHERE cart_id = :id');

			}else {

				$stmt = $this->dbh->prepare('DELETE FROM shop_cart_items WHERE cart_id = :id AND item_id = :test');
				$stmt->bindParam(':test', $data['remove']);

			}

			$stmt->bindParam(':id', $id);
			$stmt->execute();

			return true;

		}

		if(!preg_match("/^[0-9]*$/", $data['qty']) || $data['qty'] == 0){

			return false;
		
		}

		$stmt = $this->dbh->prepare('SELECT * FROM shop WHERE item_id = :id');
		$stmt->bindParam(':id', $data['item']);
		$stmt->execute();

		if($stmt->rowCount() == 0){

			return false;

		}

		$stmt = $this->dbh->prepare('SELECT * FROM shop_cart_items WHERE item_id = :item_id AND cart_id = :id');
		$stmt->bindParam(':item_id', $data['item']);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		if($stmt->rowCount() != 0){
			
			$x = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if(isset($data['checkout'])){
				$qty = $data['qty'];
			}else {
				$qty = $x['quantity']+$data['qty'];
			}

			$stmt = $this->dbh->prepare('UPDATE shop_cart_items SET quantity = :qty WHERE item_id = :item_id AND cart_id = :id');
			$stmt->bindParam(':qty', $qty);
			$stmt->bindParam(':item_id', $data['item']);
			$stmt->bindParam(':id', $id);
			$stmt->execute();

			return true;

		}

		$stmt = $this->dbh->prepare('INSERT INTO shop_cart_items (cart_id, item_id, quantity) VALUES (:id, :item, :q)');
		$stmt->bindParam(':id', $id);
		$stmt->bindParam(':item', $data['item']);
		$stmt->bindParam(':q', $data['qty']);
		$stmt->execute();

		

	}

	public function shipping($data){

		if($this->cart_exist() == 0){exit;}

			if(!isset($data['shipping'])){	

				$stmt = $this->dbh->prepare('SELECT id, name, price FROM shop_cart JOIN shipping_options ON shipping_id = id WHERE cart_id = :id');
				$stmt->bindParam(':id', $this->id);
				$stmt->execute();

				return $shipping = $stmt->fetch(PDO::FETCH_ASSOC);

			}

		
		$stmt = $this->dbh->prepare('SELECT * FROM shipping_options WHERE id = :id');
		$stmt->bindParam(':id', $data['shipping']);
		$stmt->execute();

		if($shipping = $stmt->fetch(PDO::FETCH_ASSOC)){

			$stmt = $this->dbh->prepare('UPDATE shop_cart SET shipping_id = :shipping WHERE cart_id = :id');
			$stmt->bindParam(':shipping', $data['shipping']);
			$stmt->bindParam(':id', $this->id);
			$stmt->execute();

			return $shipping;

		}

		return false;

	}


}

?>