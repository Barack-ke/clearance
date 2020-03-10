<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Sport extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Sportmodel');
		$this->load->model('Studentmodel');
	}
	public function index(){
		$condition = array('status' => 0);
		$sports=$this->Sportmodel->getsportlist($condition);
		$data=array('sports'=>$sports);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('sport/sindex',$data);
		$this->load->view('includes/footer');
	}
	public function clearsport(){
      $id = $this->uri->segment('3');
      $id = strtr($id, array('.' => '+', '-' => '=', '~' => '/'));
        $id = $this->encryption->decrypt($id);

      $condition=array('studentId'=>$id);
      $data=array('status'=>1);
      $this->Sportmodel->update($data,$condition);
      redirect(base_url().'sport/index');

   }
}