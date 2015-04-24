<?php namespace controllers;
use core\view;
use helpers\data;
use helpers\url;
use helpers\session;
	
	class User extends \core\controller
	{
		private $_user;

		function __construct()
		{
			parent::__construct();
			$this->_user = new \models\users();
		}

		/*public function __initPage(){
			if(Session::get('user') == false){
				url::redirect('admin/login');
			}
			$data['title'] = 'Staff Management';
			$this->view->rendertemplate('header',$data);
			$this->view->render('admin/admin',$data);
			$this->view->rendertemplate('footer',$data);
		}*/

		public function loginStaff(){
			if(Session::get('user')==true){
				url::redirect('EWSD/admin/dashboard');
			}
			if($_POST['action'] = 'login'){
				$username = $_POST['username'];
				$password = md5($_POST['password']);

				//echo $username.'-'.$password;

				$listUser =  $this->_user->loginAdmin($username,$password);
				if(sizeof(listUser) > 0){
					$currentUser = $listUser[0];
					Session::set('user',$currentUser);
					url::redirect('EWSD/admin/dashboard');
				}
				else{
					url::redirect('EWSD/login');
				}
			}
		}
	}
?>