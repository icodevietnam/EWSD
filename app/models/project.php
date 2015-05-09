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

	public function getNonManageProject(){
		return $this->_db->select(" SELECT P.* FROM project P
									left join user_project UP on P.id <> UP.user
									order by P.name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from project where id = :id ",array(':id'=>$id));
	}

	public function getByUserId($id){
		return $this->_db->select(" SELECT p.*, f.file_name, f.path FROM project as p
									join user_project as up on up.project = p.id
									join user as u on up.user = u.id
									join file as f on p.file = f.id
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