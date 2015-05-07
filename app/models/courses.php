<?php namespace models;
class Courses extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from course order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from course where id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('course',$data);
	}

	public function update($data,$where){
		$this->_db->update('course',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('course',$where);
	}
}