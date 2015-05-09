<?php namespace controllers;

use core\view;
use helpers\data;
use helpers\File;
use helpers\Session;

class Project extends \core\controller
{

	private $_model;

	public function __construct()
	{
		$this->_model = new \models\project();
	}


	public function index()
	{
		$data['title'] = "Project management";
		View::renderAdminTemplate('header', $data);
		View::render('admin/project', $data);
		View::renderAdminTemplate('footer', $data);
	}


	public function getProjectIsNotManaged(){
		$listProject = $this->_model->getNonManageProject();
		echo json_encode($listProject);
	}

	public function getAll()
	{
		$listProject = $this->_model->getAll();
		echo json_encode($listProject);
	}


	public function getById()
	{
		$id = $_GET['id'];
		$listProject = $this->_model->getById($id);
		if (sizeof($listProject) > 0)
		{
			$current = $listProject[0];
			echo json_encode($current);
		}
	}

	public function save()
	{
		try
		{
			$name = $_POST['name'];
			$description = $_POST['description'];
			$createdDate = date('Y-m-d H:i:s');
			$createdBy = Session::get('user')->id;
			$file = File::saveFile($_FILES['file']);
			$obj = array(
				'name'         => $name,
				'description'  => $description,
				'date_created' => $createdDate,
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