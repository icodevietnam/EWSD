<?php namespace models;
class Comment extends \core\model {

	public function getAll(){
		return $this->_db->select(" Select * from comment order by name ");
	}

	public function getById($id){
		return $this->_db->select(" Select * from comment where id = :id ",array(':id'=>$id));
	}

	public function getByProject($projectId){
		return $this->_db->select(" Select * from comment where project = :projectId ",array(':projectId'=>$projectId));
	}

	public function insert($data){
		return $this->_db->insert('comment',$data);
	}

	public function update($data,$where){
		$this->_db->update('comment',$data,$where);
	}

	public function delete($where){
		$this->_db->delete('comment',$where);
	}

	public function getAllByComment($commentName){
		if($commentName == 'admin'){
			return $this->_db->select(" SELECT * FROM comment as i
										join user as u on i.created_by = u.id order by name");
		}elseif ($commentName == 'staff') {
			return $this->_db->select(" Select * from comment WHERE name <>'admin' order by name ");
		}elseif ($commentName == 'student') {
			return $this->_db->select(" Select * from comment WHERE name <>'admin' AND name <> 'staff' order by name ");
		}
	}
}