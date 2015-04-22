<?php namespace controllers;
use core\view;
class Student extends \core\controller{
	
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['title'] = 'Student Management';
		View::renderAdminTemplate('header',$data);
		View::render('admin/student',$data);
		View::renderAdminTemplate('footer',$data);
	}
}