<?php
defined('BASEPATH') OR('No direct script access allowed');
Class Rolemodel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function confirmifexist($condition=''){
		$this->db->select('*');
		$this->db->from('tblrole');
		if(!empty($condition)){
			$this->db->where($condition);
			
		}
		return $this->db->get();
	}

	public function getrolelist($condition=''){
		$this->db->select('*');
		$this->db->from('tblrole');
		if(!empty($condition)){
			$this->db->where($condition);
			
		}
		return $this->db->get()->result();
	}
	public function getroledropdown($condtion=''){
		if (!empty($condition)) {
            $this->db->where($condition);
	}
	return $this->db->get('tblrole')->result_array();
}
}