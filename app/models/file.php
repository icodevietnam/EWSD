<?php
/**
 * Created by PhpStorm.
 * User: Hieu
 * Date: 4/24/2015
 * Time: 5:38 AM
 */

namespace models;


use core\Model;

class File extends model {
	public function getAll(){
		return $this->_db->select(" Select * from file order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from file where id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('file',$data);
	}

	public function update($data,$where){
		$this->_db->update('file',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('file',$where);
	}
}