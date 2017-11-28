<?php

class data {
	
	public static function insert($value){

		$value = htmlspecialchars($value);

		$value = ltrim($value);

		$value = rtrim($value);

		return $value;

	}

	public static function link($value){

		$link = strtolower($value);//bort med VERSALER
		$link = trim($link);//whitespace left n right
		$link = preg_replace("/[äå]/", "a", $link);//FIXA DET HÄR!
		$link = preg_replace("/[ö]/", "o", $link);//FIXA DET HÄR!
		$link = preg_replace("/[^a-z0-9\s]/", "", $link);//endast A - Z och 0-9
		$link = preg_replace("/ /", "-", $link);

		return $link;

	}

}

?>