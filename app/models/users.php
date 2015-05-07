<?php namespace models;
class Users extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from user ");
	} 

	public function loginAdmin($username, $password){
		$sql =  " SELECT U.*, R.name as role_name FROM user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id AND (R.name = 'staff' OR R.name = 'admin') AND U.username = :username AND U.password = :password" ;
		return $this->_db->select($sql, array(':username'=>$username,':password'=>$password));
	}
}