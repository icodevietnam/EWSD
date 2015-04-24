<?php namespace models;
class Roles extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from role order by name ");
	}
}