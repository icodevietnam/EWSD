<?php namespace controllers;
use core\view;
use helpers\data;

class Role extends \core\controller{
	
	private $_model;
	
	public function __construct(){
		$this->_model = new \models\roles();
	}

	public function getAll(){
		$listRole = $this->_model->getAll();
		echo json_encode($listRole);
	}

	public function index(){
		$data['title']='Role Management';
		$data['key']='Role';
		View::renderAdminTemplate('header', $data);
		View::render('admin/role', $data);
		View::renderAdminTemplate('footer', $data);
	}

}