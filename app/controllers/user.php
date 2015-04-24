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

		public function loginStaff(){
			if(Session::get('user')==true){
				Url::redirect('EWSD/admin/dashboard');
			}
			if($_POST['action'] = 'login'){
				$username = $_POST['username'];
				$password = md5($_POST['password']);

				$listUser =  $this->_user->loginAdmin($username,$password);

				if(sizeof($listUser) > 0){
					$currentUser = $listUser[0];
					Session::set('user',$currentUser);
					Url::redirect('EWSD/admin/dashboard');
				}
				else{
					Url::redirect('EWSD/login');
				}
			}
		}

		public function logOut(){
			
			if(null!=Session::get('user')){
				Session::destroy('user');
			}
			Url::redirect('EWSD/login');
		}
	}
?>