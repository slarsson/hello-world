<?php

class news extends controller{

	function __construct(){
		
		$this->class = get_class($this);

		parent::__construct($this->class);

		session::authorize();

	}

	public function index(){

		$url = explode("/", rtrim($_GET['url'], "/"));
			
		if(isset($url[1])){

			if($url[1] == "new"){

				$this->view->render("news/new", true, "news");

				return false;

			}

			if($url[1] == "edit"){

				if(!empty($_GET['remove']) && preg_match("/^[0-9]*$/", $_GET['remove'])){

					$data = $this->model->article(null, $_GET['remove']);
					
					if(!$data){

						header('Location:'.URL.'news/edit/');

						exit;

					}

					$this->view->set("news", $data);

					$this->view->render("news/remove", true, "news");

					return true;

				}

				if(!empty($_GET['id']) && preg_match("/^[0-9]*$/", $_GET['id'])){

					$data = $this->model->article(null, $_GET['id']);
					$this->error($data);

					$this->view->set("news", $data);

					$this->view->render("news/edit_post", true, "news");

					return true;

				}

				$page = 1;
				$limit = 10;

				if(!empty($_GET['page'])){

					$page = $_GET['page'];

					if(!preg_match("/^[0-9]*$/", $page)){

						$this->error();

					}
			
				}

				$data = $this->model->fetch_news($page, $limit);
				$this->error($data);

				$this->view->set("page", $page);
				$this->view->set("posts", $limit);
				$this->view->set("news", $data);

				$this->view->render("news/edit_index");

				return true;

			}

			if($url[1] == "authorize"){

				$this->authorize();

				exit;

			}
			
			$data = $this->model->article($url[1]);
			$this->error($data);

			$this->view->set("news", $data);
			$this->view->set("title", $data['headline']);

			if(isset($_GET['json'])){
				$this->view->json($data);
				return;
			}

			$this->view->render("news/news");
 
		}else {

			$page = 1;

			if(!empty($_GET['page'])){

				$page = $_GET['page'];

				if(!preg_match("/^[0-9]*$/", $page)){

					$this->error();

				}
			
			}

			$data = $this->model->fetch_news($page, POST_LIMIT_NEWS);
			$this->error($data);


			$this->view->set("page", $page);
			$this->view->set("posts", POST_LIMIT_NEWS);
			$this->view->set("news", $data);
			
			$this->view->render("news/index", true, "news_test");
		
		}

	}

	private function authorize(){

		if(!empty($_POST['remove'])){
			
			$data = $this->model->remove($_POST['remove']);

			$json_data['success'] = true;

			$this->view->json($json_data);

			exit;

		}

		if(!empty($_POST['headline']) && !empty($_POST['content']) && !empty($_GET['type'])){

			$type = $_GET['type'];

			$json_data = array('success' => 'true', 'error' => '', 'link_id' => '', 'name' => '', 'content' => '');

			if($type == "new"){

				$data = $this->model->new_article($_POST);

				$json_data['link_id'] = URL.$this->class."/".$data;

			}

			if($type == "edit"){

				$data = $this->model->edit_article($_POST);

				$json_data['name'] = $data[0];
				$json_data['content'] = $data[1];

			}


			if(!$data){
				
				$json_data['success'] = false;

			}

			$this->view->json($json_data);

		}		

	}

	private function error($data = false){

		if(!$data){

			$this->view->render("news/error");

			exit;

		}

	}


}

?>