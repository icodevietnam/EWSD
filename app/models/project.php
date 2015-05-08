<?php
/**
 * Created by PhpStorm.
 * User: Hieu
 * Date: 4/24/2015
 * Time: 5:38 AM
 */

namespace models;


use core\Model;

class Project extends model {
	public function getAll(){
		return $this->_db->select(" SELECT p.*, f.path, f.file_name FROM project as p
									join esupervisor.file as f on p.file = f.id
									order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from project where id = :id ",array(':id'=>$id));
	}

	public function getByUserId($id){
		return $this->_db->select(" SELECT p.* FROM user as u
									join project as p on u.project = p.id
									where u.id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('project',$data);
	}

	public function update($data,$where){
		$this->_db->update('project',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('project',$where);
	}
}