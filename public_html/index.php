<?php

	$time = microtime(true);
	require_once('../libs/settings.php');
	
	//autoloader
	function library($name){
		
		//do not load braintree-functions
		if(preg_match('/(Braintree)/', $name)){
			return false;
		}

		require_once(DIR_LIBS.$name.'.php');
	
	}

	spl_autoload_register('library');

	//start
	$start = new bootstrap();
	
?>