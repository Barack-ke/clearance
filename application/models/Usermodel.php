<?php
defined('BASEPATH') OR('No direct script access allowed');
Class Usermodel extends CI_Model{
	public function __construct(){
		parent:: __construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tbluser');
		//$this->db->join('tblrole', 'tblrole.id=tbluser.role','inner');
		if(!empty($condition)){
			$this->db->where($condition);
		}
		return $this->db->get();
	}
	public function insert($data){
		$this->db->trans_begin();
		$this->db->insert('tbluser',$data);

		$this->db->trans_complete();
		if($this->db->trans_status()==false){
			$this->db->trans_rollback();
			return 0;
		}elseif($this->db->trans_status()==true){
			$this->db->trans_commit();
			return 1;
		}
	}
	public function update(){
		$this->db->trans_begin();
		$this->db->where($condition);
		$this->db->update('tbluser');
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