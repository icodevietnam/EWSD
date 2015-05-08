<?php namespace models;
class Article extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from article order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from article where id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('article',$data);
	}

	public function update($data,$where){
		$this->_db->update('article',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('article',$where);
	}
}