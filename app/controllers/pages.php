<?php namespace controllers;
use core\view;
use helpers\data;

class Pages extends \core\controller{
	

	public function dashBoardPage(){
		$data['title']='Dashboard Page';
		$data['key']='Role';
		View::renderAdminTemplate('header', $data);
		View::render('admin/dashboard', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function loginPage(){

		$data['title'] = 'eSupervisor';
		
		View::renderLoginTemplate('header', $data);
		View::render('login/index', $data);
		View::renderLoginTemplate('footer', $data);
	}

	public function homePage(){

		$data['title'] = 'eSupervisor';
		
		View::renderHomeTemplate('header', $data);
		View::render('home/index', $data);
		View::renderHomeTemplate('footer', $data);
	}

	public function rolePage(){
		$data['title']='Role Management';
		$data['key']='Role';
		View::renderAdminTemplate('header', $data);
		View::render('admin/role', $data);
		View::renderAdminTemplate('footer', $data);
	}

}