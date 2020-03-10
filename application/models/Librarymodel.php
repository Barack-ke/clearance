<?php
defined('BASEPATH') or('No direct script access allowed');
Class Librarymodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tbllibrary');
		$this->db->join('tblstudent','tblstudent.regno=tblcafe.studentregno','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function getliblist($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent');
		$this->db->join('tbllibrary','tbllibrary.studentId=tblstudent.id','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get()->result();
	}
	public function update($data,$condition=''){
		$this->db->trans_begin();;
		$this->db->where($condition);
		$this->db->update('tbllibrary',$data);

		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}
	}
}