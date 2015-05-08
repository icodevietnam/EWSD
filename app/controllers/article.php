<?php namespace controllers;
use core\view;
use helpers\data;
use helpers\session;
use models\Courses;

class Article extends \core\controller{
	
	private $_article;
	
	public function __construct(){
		$this->_article = new \models\Article();
	}

	public function getAll(){
		$listArticle = $this->_article->getAll();
		echo json_encode($listArticle);
	}

	public function getById(){
		$id = $_GET['id'];
		$listArticle =  $this->_article->getById($id);
		if(sizeof($listArticle) > 0){
			$current = $listArticle[0];
			echo json_encode($current);
		}
	}

	public function save(){
		$name = $_POST['name'];
		$content = $_POST['content'];
		$createdDate = date('Y-m-d H:i:s');
		$createdBy = Session::get('user')->id;
		$obj = array('title'=>$name,'content'=>$content,'created_by'=>$createdBy,'created_date'=>$createdDate);
		try{
			$this->_article->insert($obj);
			
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
		$obj = array('title'=>$name,'content' => $description);
		$where = array('id'=>$id);
		try{
			$this->_article->update($obj,$where);
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
			$this->_article->delete($where);
			echo json_encode(array('msg'=>'success'));
		}
		catch(Exception $e){
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			echo json_encode(array('msg'=>'fail'));
		}
	}

}