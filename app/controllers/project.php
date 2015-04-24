<?php namespace controllers;
use core\view;
use helpers\data;

class Project extends \core\controller{

	private $_model;

	public function __construct(){
		$this->_model = new \models\project();
	}

	public function index(){
		$data['title']="Project management";
		//echo json_encode($listProject);
		View::renderAdminTemplate('header',$data);
		View::render('admin/project',$data);
		View::renderAdminTemplate('footer',$data);
	}

	public function getAll(){
		$listProject = $this->_model->getAll();
		echo json_encode($listProject);
	}
}