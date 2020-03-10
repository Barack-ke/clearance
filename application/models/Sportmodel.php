<?php
defined('BASEPATH') OR('No direct script access allowed');
Class Sportmodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tblsport');
		$this->db->join('tblstudent','tblstudent.regno=tblsport.studentregno','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function getsportlist($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent');
		$this->db->join('tblsport','tblsport.studentId=tblstudent.id','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get()->result();
	}
	public function update($data,$condition){
		$this->db->trans_begin();
		$this->db->update('tblsport',$data);
		$this->db->trans_complete();
		if($this->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}
	}
}
