<?php
class payment extends model {
	
	function __construct(){

		parent::__construct();

		require_once(API."braintree-php-3.19.0/lib/Braintree.php");

		Braintree_Configuration::environment('sandbox');
   		Braintree_Configuration::merchantId('3kr3w2p57qc82h6h');
    	Braintree_Configuration::publicKey('crxtn6j25qyb9xgs');
    	Braintree_Configuration::privateKey('5a29cc8e6c4d8a8d9729c0346e4a482b');

	}

	public function generate_token(){

		return Braintree_ClientToken::generate();

	}

	public function pay($data){
		
		$nonce = $data["payment_method_nonce"];

		if(!isset($_COOKIE['checkout'])){
			
			return array(false);

		}

		$stmt = $this->dbh->prepare('SELECT * FROM shop_orders WHERE checkout_id = :id');
		$stmt->bindParam(':id', $_COOKIE['checkout']);
		$stmt->execute();
		
		$order = $stmt->fetch(PDO::FETCH_ASSOC);

		if($order['status'] == 1){
			
			//payment recived
			return array(true, $order);
			
		}

		$stmt = $this->dbh->prepare('SELECT purchase_price, quantity FROM shop_order_items WHERE order_id = (SELECT order_id FROM shop_orders WHERE checkout_id = :id)');
		$stmt->bindParam(':id', $_COOKIE['checkout']);
		$stmt->execute();

		$total = 0;

		foreach($item = $stmt->fetchAll(PDO::FETCH_ASSOC) as $key => $value){

			$total += $item[$key]['purchase_price']*$item[$key]['quantity'];

		}

		$stmt = $this->dbh->prepare('SELECT price FROM shipping_options WHERE id = :method');
		$stmt->bindParam(':method', $order['shipping_method']);
		$stmt->execute();

		$shipping = $stmt->fetch(PDO::FETCH_ASSOC);


		$result = Braintree_Transaction::sale([
  			'amount' => $total+$shipping['price'],
  			'paymentMethodNonce' => $nonce,
  			'options' => [
    			'submitForSettlement' => True
  			]
		]);

		if($result->success){

			$stmt = $this->dbh->prepare('UPDATE shop_orders SET status = 1, braintree_payment_id = :payment_id WHERE order_id = :id');
			$stmt->bindValue(':payment_id', $result->transaction->id);
			$stmt->bindParam(':id', $order['order_id']);
			$stmt->execute();

			//var_dump($order);
			setcookie("cart", "", time() - 3600, "/");
			
			return array(true, $order);

		}else {

			echo "something went wrong..";
			return array(false);

		}

	}

}

?>