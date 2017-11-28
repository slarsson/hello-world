<?php

class index extends controller{

	function __construct(){
		
		parent::__construct(get_class($this));

		session::authorize();

	}

	public function index(){

		$this->load_model("news", true, "news");	

		$this->view->set("news", $this->news->fetch_news(1,5));

		
		$this->view->render("index/index");
		
	}

}

?>