<?php
defined('BASEPATH') OR('No direct script access allowed');
Class Cafemodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tblcafe');
		$this->db->join('tblstudent','tblstudent.regno=tblcafe.studentregno','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function getcafelist($condition=''){
		$this->db->select('*, tblstudent.id as studid, tblcafe.id as cafeid');
		$this->db->from('tblstudent');
		$this->db->join('tblcafe','tblcafe.studentId=tblstudent.id','outer left');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get()->result();
	}
	public function update($data,$condition){
		$this->db->trans_begin();;
		$this->db->where($condition);
		$this->db->update('tblcafe', $data);

		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}
	}	
}