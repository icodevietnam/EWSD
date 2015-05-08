<?php namespace controllers;
use core\view;
use helpers\data;
use helpers\session;

class Pages extends \core\controller{
	private $_role;

	public function __construct(){
		$this->_role = new \models\roles();
	}

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
		$roleName = null;
		if(null != Session::get('user')){
			$roleName = Session::get('user')->role_name;
		}
		$listRole = $this->_role->getAllByRole($roleName);
		$data['listRole'] = $listRole;
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

	public function about(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderHomeTemplate('header', $data);
		View::render('home/about', $data);
		View::renderHomeTemplate('footer', $data);
	}

	public function courses(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderHomeTemplate('header', $data);
		View::render('home/courses', $data);
		View::renderHomeTemplate('footer', $data);
	}

	public function contact(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderHomeTemplate('header', $data);
		View::render('home/contact', $data);
		View::renderHomeTemplate('footer', $data);
	}

	public function fees(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderHomeTemplate('header', $data);
		View::render('home/fees', $data);
		View::renderHomeTemplate('footer', $data);
	}

	public function portfolio(){
		$data['title']='Forum Management';
		$data['key']='forum';
		View::renderHomeTemplate('header', $data);
		View::render('home/portfolio', $data);
		View::renderHomeTemplate('footer', $data);
	}

}