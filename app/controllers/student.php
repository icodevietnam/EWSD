<?php namespace controllers;
use core\view;
use helpers\data;

class Student extends \core\controller{
	
	private $_model;
	
	public function __construct(){
		$this->_model = new \models\users();
	}

	public function getAll(){
		$listUser = $this->_model->getAll();
		echo json_encode($listUser);
	}

}