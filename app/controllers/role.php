<?php namespace controllers;
use core\view;
use helpers\data;

class Role extends \core\controller{
	
	private $_role;
	
	public function __construct(){
		$this->_role = new \models\roles();
	}

	public function getAll(){
		$listRole = $this->_role->getAll();
		echo json_encode($listRole);
	}

	public function getAllByRole(){
		$roleName = null;
		if(null != Session::get('user')){
			$roleName = Session::get('user')->role_name;
		}
		$listRole = $this->_role->getAllByRole($roleName);
		echo json_encode($listRole);
	}

	public function getById(){
		$id = $_GET['id'];
		$listRole =  $this->_role->getById($id);
		if(sizeof($listRole) > 0){
			$current = $listRole[0];
			echo json_encode($current);
		}
	}

	public function save(){
		$name = $_POST['name'];
		$description = $_POST['description'];
		$obj = array('name'=>$name,'description'=>$description);
		try{
			$this->_role->insert($obj);
			
			echo json_encode(array('msg'=>'success'));
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo json_encode(array('msg'=>'fail'));
		}
	}

	public function edit(){
		$id = $_POST['id'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$obj = array('name'=>$name,'description' => $description);
		$where = array('id'=>$id);
		try{
			$this->_role->update($obj,$where);
			echo json_encode(array('msg'=>'success'));
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo json_encode(array('msg'=>'fail'));
		}
	}

	public function delete(){
		$id = $_POST['id'];
		$where = array('id'=>$id);
		try{
			$this->_role->delete($where);
			echo json_encode(array('msg'=>'success'));
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo json_encode(array('msg'=>'fail'));
		}
	}

}