<?php namespace models;
class Interaction extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from interaction order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from interaction where id = :id ",array(':id'=>$id));
	}

	public function insert($data){
		return $this->_db->insert('interaction',$data);
	}

	public function update($data,$where){
		$this->_db->update('interaction',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('interaction',$where);
	}

	public function getAllByInteraction($interactionName){
		if($interactionName == 'admin'){
			return $this->_db->select(" SELECT * FROM esupervisor.interaction as i
										join user as u on i.created_by = u.id order by name");
		}elseif ($interactionName == 'staff') {
			return $this->_db->select(" Select * from interaction WHERE name <>'admin' order by name ");
		}elseif ($interactionName == 'student') {
			return $this->_db->select(" Select * from interaction WHERE name <>'admin' AND name <> 'staff' order by name ");
		}
	}
}