<?php namespace controllers;

use core\view;
use helpers\data;
use helpers\Session;
use helpers\Url;

class Comment extends \core\controller
{

	private $_comment;

	public function __construct()
	{
		$this->_comment = new \models\comment();
	}

	public function getAll()
	{
		$listComment = $this->_comment->getAll();
		echo json_encode($listComment);
	}

	public function getAllByComment()
	{
		$commentName = null;
		if (null != Session::get('user'))
		{
			$commentName = Session::get('user')->comment_name;
		}
		$listComment = $this->_comment->getAllByComment($commentName);
		echo json_encode($listComment);
	}

	public function getById()
	{
		$id = $_GET['id'];
		$listComment = $this->_comment->getById($id);
		if (sizeof($listComment) > 0)
		{
			$current = $listComment[0];
			echo json_encode($current);
		}
	}

	public function save()
	{
		$obj = array(
			'content'      => $_POST['txtComment'],
			'created_date' => date('Y-m-d H:i:s'),
			//TODO: remove hard code user id
			//'user'         => Session::get('user')->id,
			'user'         => 1,
			'project'      => $_POST['projectId']
		);
		try
		{
			$this->_comment->insert($obj);

			Url::redirect('EWSD/interactions');
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage(), "\n";
			echo json_encode(array('msg' => 'fail'));
		}
	}

	public function edit()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$description = $_POST['description'];
		$obj = array('name' => $name, 'description' => $description);
		$where = array('id' => $id);
		try
		{
			$this->_comment->update($obj, $where);
			echo json_encode(array('msg' => 'success'));
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage(), "\n";
			echo json_encode(array('msg' => 'fail'));
		}
	}

	public function delete()
	{
		$id = $_POST['id'];
		$where = array('id' => $id);
		try
		{
			$this->_comment->delete($where);
			echo json_encode(array('msg' => 'success'));
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage(), "\n";
			echo json_encode(array('msg' => 'fail'));
		}
	}

}