<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Dean extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Deanmodel');
		$this->load->model('Studentmodel');
	}
	public function index(){
		$condition = array('status' => 0);
		$deans=$this->Deanmodel->getdeanlist($condition);
		$data=array('deans'=>$deans);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('dean/index',$data);
		$this->load->view('includes/footer');
	}
	public function cleardean(){
		$id = $this->uri->segment('3');
		$id = strtr($id, array('.' => '+', '-' => '=', '~' => '/'));
        $id = $this->encryption->decrypt($id);

		$condition=array('studentId'=>$id);
		$data=array('status'=>1);
		$this->Deanmodel->update($data, $condition);
		redirect(base_url().'dean/index');

	}
}