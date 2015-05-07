<?php namespace controllers;
use core\view;
use helpers\data;
use helpers\session;

class Course extends \core\controller{
	
	private $_course;
	
	public function __construct(){
		$this->_course = new \models\courses();
	}

	public function getAll(){
		$listCourse = $this->_course->getAll();
		echo json_encode($listCourse);
	}

	public function getById(){
		$id = $_GET['id'];
		$listCourse =  $this->_course->getById($id);
		if(sizeof($listCourse) > 0){
			$current = $listCourse[0];
			echo json_encode($current);
		}
	}

	public function save(){
		$name = $_POST['name'];
		$content = $_POST['content'];
		$createdDate = date('Y-m-d H:i:s');
		$createdBy = Session::get('user')->id;
		$obj = array('name'=>$name,'content'=>$content,'created_by'=>$createdBy,'created_date'=>$createdDate);
		try{
			$this->_course->insert($obj);
			
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
		$description = $_POST['content'];
		$obj = array('name'=>$name,'content' => $description);
		$where = array('id'=>$id);
		try{
			$this->_course->update($obj,$where);
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
			$this->_course->delete($where);
			echo json_encode(array('msg'=>'success'));
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo json_encode(array('msg'=>'fail'));
		}
	}

}