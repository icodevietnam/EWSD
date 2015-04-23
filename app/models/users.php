<?php namespace models;
class Users extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from user  ");
	}
}