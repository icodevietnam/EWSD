<?php namespace models;
class Roles extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from role order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from role where id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('role',$data);
	}

	public function update($data,$where){
		$this->_db->update('role',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('role',$where);
	}

	public function getAllByRole($roleName){
		if($roleName == 'admin'){
			return $this->_db->select(" Select * from role order by name");
		}elseif ($roleName == 'staff') {
			return $this->_db->select(" Select * from role WHERE name <>'admin' order by name ");
		}elseif ($roleName == 'student') {
			return $this->_db->select(" Select * from role WHERE name <>'admin' AND name <> 'staff' order by name ");
		}
	}
}