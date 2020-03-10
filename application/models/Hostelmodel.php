<?php
defined('BASEPATH') or('No direct script allowed');
Class Hostelmodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tblhostel');
		$this->db->join('tblstudent', 'tblstudent.regno=tblhostel.stregno', 'inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		$this->db->get();
	}
	public function getlist($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent');
		$this->db->join('tblhostel','tblhostel.studentId=tblstudent.id', 'inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get()->result();
	}
	public function update($data,$condition){
		$this->db->trans_begin();;
		$this->db->where($condition);
		$this->db->update('tblhostel',$data);

		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}
	}
}