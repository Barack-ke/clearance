<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Deptmodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tbldept');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function getdeptlist($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent');
		$this->db->join('tbldept','tbldept.studentId=tblstudent.id','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get()->result();
	}
	public function update($data,$condition){
		$this->db->trans_begin();
		$this->db->where($condition);
		$this->db->update('tbldept',$data);

		$this->db->trans_complete();
		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}

	}
}