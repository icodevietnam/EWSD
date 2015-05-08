<?php namespace models;
class Users extends \core\model {

	public function getAllByRole($roleName){
		if($roleName == 'admin'){
			return $this->_db->select(" Select U.*, R.name as role_name from user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id ");
		}elseif ($roleName == 'staff') {
			return $this->_db->select(" Select U.*, R.name as role_name from user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id AND R.name <> 'admin' ");
		}elseif ($roleName == 'student') {
			return $this->_db->select(" Select U.*, R.name as role_name from user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id AND R.name <> 'admin' AND R.name <> 'staff' ");
		}
	} 

	public function loginAdmin($username, $password){
		$sql =  " SELECT U.*, R.name as role_name FROM user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id AND (R.name = 'staff' OR R.name = 'admin') AND U.username = :username AND U.password = :password" ;
		return $this->_db->select($sql, array(':username'=>$username,':password'=>$password));
	}

	public function getById($id){
		return $this->_db->select(" Select U.*, R.name as role_name from user U, role R, users_roles UR WHERE U.id = UR.user_id AND UR.role_id = R.id AND U.id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('user',$data);
	}

	public function update($data,$where){
		$this->_db->update('user',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('user',$where);
	}
}