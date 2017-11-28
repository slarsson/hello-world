<?php

class shop extends controller {
	
	function __construct(){
		
		parent::__construct(get_class($this));

		session::authorize();

		
		$this->load_model("cart", false, "cart");
		$this->view->set("total", $this->cart->total_items_cart());

	}

	public function index($search = false){

		$limit = 16;

		$page = 1;
		$filter = 0;
		$q = "";

		$status = array(
			0 => "Displaying all products (*)",
			1 => "Found * products",
			2 => "No products where found (0 results)"
		);

		if(!empty($_GET['page'])){

			$page = $_GET['page'];

			if(!preg_match("/^[0-9]*$/", $page)){

				$this->error();

			}
			
		}

		if(!empty($_GET['filter'])){

			$filter = $_GET['filter'];

		}

		if(!$search){
			
			$data = $this->model->items($page, $limit, $filter);
			$this->error($data);

			$total = navigation::count_rows("shop");
			$msg = preg_replace("[\*]", $total, $status[0]);

		}else {
			
			$q = data::insert($_GET['q']);

			if(empty($q)){
			
				header("HTTP/1.1 302 Not Found");
				header("Location: ".URL."shop/");
				exit;
			
			}

			$this->load_model("search", false, "search");
		
			$data = $this->search->find($q, $filter);
			$total = count($data);

			$data = array_slice($data, ($page-1)*$limit, $limit);
			
			if(empty($data)){

				$msg = $status[2];
				$total = 1;

			}else {$msg = preg_replace("[\*]", $total, $status[1]);}

		}


		$this->view->content("cart", "shop");
		
		$this->view->set("item", $data);
		$this->view->set("page", $page);
		$this->view->set("filter", $filter);
		$this->view->set("rows", $total);
		$this->view->set("query", $q);
		$this->view->set("query_encode", urlencode($q));
		$this->view->set("msg", $msg);
		
		$this->view->render("shop/index", true, "shop");

	}
	
	public function search(){

		$this->index(true);

	}

	public function item($url){

		if(empty($url[2])){

			header('Location: '.URL.'shop');
			exit;

		}

		$data = $this->model->item($url[2]);
		$this->error($data);

		if($url[3] != $data['item_link']){

			header("HTTP/1.1 301 Moved Permanently");
			header("Location: ".URL."shop/item/".$data['item_id']."/".$data['item_link']);
			exit;

		}

		$this->view->content("cart", "shop");
		$this->view->set("item", $data);
		$this->view->render("shop/item", true, "shop");

	}

	public function checkout($url){

		if(isset($url[2])){

			$this->load_model("payment", false, "payment");

			if($url[2] == "payment"){
				
				if(!empty($_POST['order'])){

					$data = $this->model->create_order($_POST);
					
					if(!$data){
						
						header("Location: ".URL."shop/checkout");
						exit;

					}

					$this->view->set("total", $data['total']);
					$this->view->set("token", $this->payment->generate_token());
					$this->view->render("shop/payment", false);

					exit;

				}

				if(isset($_POST["payment_method_nonce"])){

					$data = $this->payment->pay($_POST);

					if(!$data[0]){
						
						echo "errorx";

						exit;
					}
					
					$this->view->set("order", $data[1]);
					$this->view->render("shop/payment_status");

					exit;

				}

				header("Location: ".URL."shop/checkout");
				exit;

			}
		
		}

		
		$cart_items = $this->cart->get_cart(true);

		if(empty($cart_items = $this->cart->get_cart(true))){
			
			header("Location: ".URL."shop/");
			exit;

		}else{

			$this->view->set("cart", $cart_items);

		}

		$this->view->set("shipping", $this->model->shipping());
		$this->view->set("user", user_data::get());
		$this->view->render("shop/checkout", true, "shop");

	}

	public function cart($url){

		if(isset($url[2]) && $url[2] == "shipping"){
			
			$data = $this->cart->shipping($_POST);

		}else{

			if(!empty($_POST)){

				$this->cart->update($_POST);

			}

			$data = $this->cart->get_cart();

		}

		$this->view->json($data);

	}

	private function error($data = false){

		if(!$data){

			//header('Location: '.URL.'shop');
			$this->view->render("error", false);

			exit;

		}

	}

}

?>