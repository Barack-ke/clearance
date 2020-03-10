<?php
defined('BASEPATH') or('No direct script access allowed');
Class Studentmodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent','tblstudent.id as stid');
		if(!empty($condtion)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function getstudentlist(){
		$this->db->select('*');
		$this->db->from('tblstudent');
		if(!empty($condition)){
			$this->db->where($condition);	
		}
		$this->db->get()->result();
	}
	public function getstudentdropdown($condition=''){
		$this->db->select('*');
		$this->db->from('tblstudent');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		$this->db->get()->result_array();
	}
	public function insert($data){
		$this->db->trans_start();
		$this->db->insert('tblstudent',$data);
		$insertid= $this->db->insert_id();

		$data = array('studentId' => $insertid);
		$this->db->insert('tblcafe',$data);
		$this->db->insert('tbldean',$data);
		$this->db->insert('tbldept',$data);
		$this->db->insert('tblfinance',$data);
		$this->db->insert('tblhostel',$data);
		$this->db->insert('tbllibrary',$data);
		$this->db->insert('tblsport',$data);
 



		$this->db->trans_complete();
		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return $insertid;
		}
	}
	public function update(){
		$this->db->trans_start();
		$this->db->where($condition);
		$this->db->update('tblstudent');

		if($this->db->trans_status()==false){
			$this->db->rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->commit();
			return 1;
		}

	}
	public function showcleared($condition=''){
		$this->db->select('*, tblstudent.id as studentid,  tblsport.status as sportstatus, tbllibrary.status as libstatus,tblhostel.status as hostelstatus,tblcafe.status as cafestatus,tbldean.status as deanstatus,tbldept.status as deptstatus,tblfinance.balance as financebalance');
		$this->db->from('tblstudent');
		$this->db->join('tblsport','tblsport.studentId=tblstudent.id','inner');
		$this->db->join('tbllibrary','tbllibrary.studentId=tblstudent.id','inner');
		$this->db->join('tblhostel','tblhostel.studentId=tblstudent.id','inner');
		$this->db->join('tblcafe','tblcafe.studentId=tblstudent.id','inner');
		$this->db->join('tbldean','tbldean.studentId=tblstudent.id','inner');
		$this->db->join('tbldept','tbldept.studentId=tblstudent.id','inner');
		$this->db->join('tblfinance','tblfinance.studentId=tblstudent.id','inner');
		if(!empty($condition)) {
            $this->db->where($condition);
        }
		return $this->db->get()->result();
	}

}