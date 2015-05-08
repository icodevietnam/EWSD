<?php namespace controllers;

use core\view;
use helpers\data;
use helpers\File;
use helpers\Session;

class Interaction extends \core\controller
{

	private $_model;

	public function __construct()
	{
		$this->_model = new \models\interaction();
	}


	public function index()
	{
		$data['title'] = "Interaction management";
		//echo json_encode($listInteraction);
		View::renderAdminTemplate('header', $data);
		View::render('admin/interaction', $data);
		View::renderAdminTemplate('footer', $data);
	}

	public function getAll()
	{
		$listInteraction = $this->_model->getAll();
		echo json_encode($listInteraction);
	}

	public function getById()
	{
		$id = $_GET['id'];
		$listInteraction = $this->_model->getById($id);
		if (sizeof($listInteraction) > 0)
		{
			$current = $listInteraction[0];
			echo json_encode($current);
		}
	}

	public function save()
	{
		try
		{
			$name = $_POST['name'];
			$description = $_POST['description'];
			$type = $_POST['type'];
			$status = $_POST['status'];
			$createdBy = Session::get('user')->id;
			$file = File::saveFile($_FILES['file']);
			$obj = array(
				'name'         => $name,
				'description'  => $description,
				'type'         => $type,
				'status'       => $status,
				'file'         => $file,
				'created_by'   => $createdBy
			);
			$this->_model->insert($obj);

			echo json_encode(array('msg' => 'success'));
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
			$this->_model->update($obj, $where);
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
			$this->_model->delete($where);
			echo json_encode(array('msg' => 'success'));
		}
		catch (Exception $e)
		{
			echo 'Caught exception: ', $e->getMessage(), "\n";
			echo json_encode(array('msg' => 'fail'));
		}
	}
}