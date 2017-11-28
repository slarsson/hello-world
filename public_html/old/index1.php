<?php
    
    $url = $_GET['url'];
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    
    
    $controller = $url[0];
    $action = $url[1];

    echo $controller." -- ".$action;

class bootstrap{



}

	/*if(isset($_GET['controller']) && isset($_GET['action'])) {
    	
    	$controller = $_GET['controller'];
    	$action     = $_GET['action'];
  	
  	}else {

  		$controller = "default";
  		$action = "index";

  	}

  	require_once('../init.php');*/

?>