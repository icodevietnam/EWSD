<?php namespace helpers;

class data {

	/**
	 * print_r call wrapped in pre tags
	 * @param  string or array $data
	 */
	static public function pr($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	/**
	 * var_dump call
	 * @param  string or array $data
	 */
	static public function vd($data){
		var_dump($data);
	}

	/**
	 * strlen call - count the lengh of the string
	 * @param  string $data 
	 * @return string return the count
	 */
	static public function sl($data){
		return strlen($data);
	}

	/**
	 * strtoupper - convert string to uppercase
	 * @param  string $data 
	 * @return string
	 */
	static public function sup($data){
		return strtoupper($data);
	}

	/**
	 * strtolower - convert string to lowercase
	 * @param  string $data 
	 * @return string
	 */
	static public function slw($data){
		return strtolower($data);
	}

	/**
	 * ucwords - the first letter of each word to be a capital
	 * @param  string $data 
	 * @return string
	 */
	static public function ucw($data){
		return ucwords($data);
	}
}
