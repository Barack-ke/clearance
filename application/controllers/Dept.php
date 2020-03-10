<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Dept extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Deptmodel');
		$this->load->model('Studentmodel');
	}
	public function index(){
		$condition = array('status' => 0);
		$depts=$this->Deptmodel->getdeptlist($condition);
		$data=array('depts'=>$depts);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('dept/dindex',$data);
		$this->load->view('includes/footer');
	}
	public function cleardept(){
		$id = $this->uri->segment('3');
		$id = strtr($id, array('.' => '+', '-' => '=', '~' => '/'));
        $id = $this->encryption->decrypt($id);

		$condition=array('studentId'=>$id);
		$data=array('status'=>1);
		$this->Deptmodel->update($data, $condition);
		redirect(base_url().'dept/index');

	}
}