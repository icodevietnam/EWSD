<?php namespace controllers;
use core\view;
use helpers\data;

class Pages extends \core\controller{
	

	public function dashBoardPage(){
		$data['title']='Dashboard Page';
		$data['key']='dashboard';
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
		$data['key']='role';
		View::renderAdminTemplate('header', $data);
		View::render('admin/role', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function coursePage(){
		$data['title']='Course Management';
		$data['key']='course';
		View::renderAdminTemplate('header', $data);
		View::render('admin/course', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function articlePage(){
		$data['title']='Article Management';
		$data['key']='article';
		View::renderAdminTemplate('header', $data);
		View::render('admin/article', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function filePage(){
		$data['title']='File Management';
		$data['key']='file';
		View::renderAdminTemplate('header', $data);
		View::render('admin/file', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function accountPage(){
		$data['title']='Account Management';
		$data['key']='account';
		View::renderAdminTemplate('header', $data);
		View::render('admin/user', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function projectPage(){
		$data['title']='Project Management';
		$data['key']='project';
		View::renderAdminTemplate('header', $data);
		View::render('admin/project', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function forumPage(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderAdminTemplate('header', $data);
		View::render('admin/forum', $data);
		View::renderAdminTemplate('footer', $data);
	}

}