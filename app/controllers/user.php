<?php namespace controllers;
use core\view;
use helpers\data;
use helpers\url;
use helpers\session;
	
	class User extends \core\controller
	{
		private $_user;
		private $_role;

		function __construct()
		{
			parent::__construct();
			$this->_user = new \models\users();
			$this->_role = new \models\roles();
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

		public function loginStudent(){
			if(Session::get('homeUser')==true){
				Url::redirect('EWSD/home');
			}
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$listUser =  $this->_user->loginStudent($username,$password);
			if(sizeof($listUser) > 0){
				$currentUser = $listUser[0];
				Session::set('homeUser',$currentUser);
				Url::redirect('EWSD/home');
			}
			else{
				Url::redirect('EWSD/login');
			}
		}



		public function logOut(){
			if(null!=Session::get('user')){
				Session::destroy('user');
			}
			if(null!=Session::get('homeUser')){
				Session::destroy('homeUser');
			}
			Url::redirect('EWSD/login');
		}

		public function getAll(){
			$roleName = null;
			if(null != Session::get('user')){
				$roleName = Session::get('user')->role_name;
			}
			$listUser = $this->_user->getAllByRole($roleName);
			echo json_encode($listUser);
		}

		public function getStudent(){
			$listUser = $this->_user->getAllByRole("student");
			echo json_encode($listUser);
		}

		public function getStaff(){
			$listUser = $this->_user->getStaff();
			echo json_encode($listUser);
		}

		public function getById(){
		$id = $_GET['id'];
		$listUser =  $this->_user->getById($id);
		if(sizeof($listUser) > 0){
			$current = $listUser[0];
			echo json_encode($current);
			}
		}

		public function save(){
			$name = $_POST['name'];
			$address = $_POST['address'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];
			$birthday = $_POST['birthday'];
			$gender = intval($_POST['gender']);
			$roleId = intval($_POST['role']);
			$obj = array('name'=>$name,'address' => $address,'username'=>$username,'password'=>md5($password),'email'=>$email,'birthday'=>$birthday,'gender'=>$gender,'is_suspended'=>1,'is_deleted'=>1);
			try{
				$accountId = $this->_user->insert($obj);
				$usersroles = array('user_id'=>$accountId,'role_id'=>$roleId);
				$this->_user->insertUsersRoles($usersroles);
			}
			catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				echo json_encode(array('msg'=>'fail'));
			}
		}

		public function edit(){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$birthday = $_POST['birthday'];
			$gender = intval($_POST['gender']);
			$roleId = intval($_POST['role']);
			$oldRoleId = intval($_POST['oldRoleId']);
			$obj = array('name'=>$name,'address' => $address,'email'=>$email,'birthday'=>$birthday,'gender'=>$gender);
			$where = array('id'=>$id);
			try{
				$roleUsers = $this->_user->getById($roleId);
				$whereRole = array('role_id'=>$oldRoleId,'user_id'=>$id);
				$this->_user->deleteUsersRoles($whereRole);
				$usersroles = array('role_id'=>$roleId,'user_id'=>$id);
				$this->_user->insertUsersRoles($usersroles);
				$this->_user->update($obj,$where);
				echo json_encode(array('msg'=>'success'));
			}
			catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				echo json_encode(array('msg'=>'fail'));
			}
		}


		public function delete(){
			$id = $_POST['id'];
			$roleId = $_POST['roleId'];
			$where = array('id'=>$id);

			$usersroles = array('role_id'=>$roleId,'user_id'=>$id);
			try{
				$this->_user->deleteUsersRoles($usersroles);
				echo json_encode(array('msg'=>'success'));
			}
			catch(Exception $e){
				echo 'Caught exception: ',  $e->getMessage(), "\n";
				echo json_encode(array('msg'=>'fail'));
			}
			$this->_user->delete($where);
		}
	}
?>