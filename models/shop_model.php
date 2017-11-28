<?php

class shop_model extends model {

	public function items($page, $limit, $filter){

		/*$swag = rand(1000, 9999);
		$stmt = $this->dbh->prepare('INSERT INTO shop (name, price, item_link, thumbnail) VALUES (:name, :price, :item_link, :thumbnail)');
		$stmt->bindValue(':name', "Test Product ".$swag);
		$stmt->bindValue(':price', 123);
		$stmt->bindValue(':item_link', "test-product-".$swag);
		$stmt->bindValue(':thumbnail', 0);
		$stmt->execute();*/

		$offset = ($page-1)*$limit;
		
		if($offset <= 0){$offset = 0;}

		$filters = array(
			
			0 => "item_id ASC",
			"desc" => "price DESC",
			"asc" => "price ASC",
			"name" => "name DESC",
		
		);

		if(!array_key_exists($filter, $filters)){$filter = 0;}
		
		$stmt = $this->dbh->prepare('SELECT * FROM shop LEFT JOIN shop_img ON img_id = thumbnail ORDER BY '.$filters[$filter].' LIMIT '.$limit.' OFFSET '.$offset);
		$stmt->execute();

		if($stmt->rowCount() == 0){

			return false;

		}		

		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
		return $data;

	}

	public function item($id){

		$stmt = $this->dbh->prepare('SELECT * FROM shop WHERE item_id = :id');
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		if($stmt->rowCount() == 0){

			return false;

		}		
		
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$stmt = $this->dbh->prepare('SELECT * FROM shop_img WHERE id = :id ORDER BY FIELD(`img_id`, :thumbnail) DESC');
		$stmt->bindParam(':thumbnail', $data['thumbnail']);
		$stmt->bindParam(':id', $id);
		$stmt->execute();

		$test = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$data['img'] = array("");

			$i = 0;
			foreach ($test as $key => $value) {
				$data['img'][$i] = $value['url'];
				$i++;
			}

		return $data;

	}

	public function shipping(){

		$stmt = $this->dbh->prepare('SELECT * FROM shipping_options ORDER BY name DESC');
		$stmt->execute();

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

	public function create_order($data){

		if(empty($cart = $_COOKIE['cart'])){return false;}//0 = items???? fixa..

		if(isset($_COOKIE['checkout'])){

			$stmt = $this->dbh->prepare('SELECT order_id, status FROM shop_orders WHERE checkout_id = :id');
			$stmt->bindParam(':id', $_COOKIE['checkout']);
			$stmt->execute();
			
			$old_order_id = $stmt->fetch(PDO::FETCH_ASSOC);

			if($old_order_id['status'] == 0){

				$stmt = $this->dbh->prepare('DELETE FROM shop_orders WHERE order_id = :id; DELETE FROM shop_order_items WHERE order_id = :id');
				$stmt->bindParam(':id',  $old_order_id['order_id']);
				$stmt->execute();

			}

		}

		do {
				
			$id = rand(1000000, 9999999);

				$stmt = $this->dbh->prepare('SELECT order_id FROM shop_orders WHERE order_id = :order_id');
				$stmt->bindParam(':order_id', $id);
				$stmt->execute();
			
				if($stmt->rowCount() == 0){break;}

		}while(true);

		
		$required = array("email", "phone", "firstname", "lastname", "street", "zip", "city");
		$change = $data["order"];
			
			unset($data["order"]);

		foreach ($data as $key => $value) {

			$data[$key] = data::insert($value);

			if(in_array($key, $required) && !empty($data[$key])){

				if($key == "phone"){
					if(!preg_match('/^[0-9\-\+\(\)\ ]*$/', $value)){return false;}
				}

			}else {return false;}

		}

		//hämta shipping info
		$stmt = $this->dbh->prepare('SELECT price, id FROM shipping_options WHERE id = (SELECT shipping_id FROM shop_cart WHERE cart_id = :cart_id)');
		$stmt->bindParam(':cart_id', $cart);
		$stmt->execute();

		$shipping = $stmt->fetch(PDO::FETCH_ASSOC);

		//hämta produkter
		$stmt = $this->dbh->prepare('SELECT item_id, quantity FROM shop_cart_items WHERE cart_id = :cart_id');
		$stmt->bindParam(':cart_id', $cart);
		$stmt->execute();

		if(empty($item = $stmt->fetchAll(PDO::FETCH_ASSOC))){return false;}

		$total = 0;
		$string = "";

		foreach ($item as $key => $value) {

			$stmt = $this->dbh->prepare('SELECT price FROM shop WHERE item_id = :item_id');
			$stmt->bindParam(':item_id', $item[$key]['item_id']);
			$stmt->execute();

			$price = $stmt->fetch(PDO::FETCH_ASSOC);
			$item[$key]['purchase_price'] = $price['price'];

				$stmt = $this->dbh->prepare('INSERT INTO shop_order_items (order_id, '.implode(", ",array_keys($item[$key])).') VALUES (:order_id, '.implode(", ", $item[$key]).')');
				$stmt->bindParam(':order_id', $id);
				$stmt->execute();

			$total += $price['price']*$item[$key]['quantity'];
			$string .= $item[$key]['item_id'].$price['price'].$item[$key]['quantity'];

		}

		//om 'cart' har ändrats vid checkout
		if($change != ($string.$shipping['id'])){

			$stmt = $this->dbh->prepare('DELETE FROM shop_order_items WHERE order_id = :id');
			$stmt->bindParam(':id',  $id);
			$stmt->execute();

			return false;

		}

		$total_with_shipping = $total+$shipping['price'];

		$checkout_id = sha1(uniqid().rand(1, 999999));

		$stmt = $this->dbh->prepare('INSERT INTO shop_orders (order_id, status, checkout_id, order_created, shipping_email, shipping_phone, shipping_firstname, shipping_lastname, shipping_street, shipping_zip, shipping_city, shipping_method) VALUES (:order_id, :status, :checkout_id, :order_created, :email, :phone, :firstname, :lastname, :street, :zip, :city, :shipping_method)');
		
		$stmt->bindParam(':order_id', $id);
		$stmt->bindParam(':checkout_id', $checkout_id);
		$stmt->bindValue(':status', 0);
		$stmt->bindValue(':order_created', date("Y-m-d H:i:s"));
		$stmt->bindParam(':shipping_method', $shipping['id']);

		$stmt->bindParam(':email', $data["email"]);
		$stmt->bindParam(':phone', $data["phone"]);
		$stmt->bindParam(':firstname', $data["firstname"]);
		$stmt->bindParam(':lastname', $data["lastname"]);
		$stmt->bindParam(':street', $data["street"]);
		$stmt->bindParam(':zip', $data["zip"]);
		$stmt->bindParam(':city', $data["city"]);

		$stmt->execute();

		setcookie("checkout", $checkout_id, time() + (3600), "/");

		return array("order_id" => $id, "product_value" => $total, "total" => $total_with_shipping);

	}

}

?>