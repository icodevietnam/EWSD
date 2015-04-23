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
		return $this->_db->select("select * from project");
	}
}