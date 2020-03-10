<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Library extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Librarymodel');
		$this->load->model('Studentmodel');
	}
	public function index(){
		$condition = array('status' => 0);
		$libs=$this->Librarymodel->getliblist($condition);
		$data=array('libs'=>$libs);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('library/lindex',$data);
		$this->load->view('includes/footer');
	}
	public function clearlib(){
      $id = $this->uri->segment('3');
      $id = strtr($id, array('.' => '+', '-' => '=', '~' => '/'));
        $id = $this->encryption->decrypt($id);

      $condition=array('studentId'=>$id);
      $data=array('status'=>1);
      $this->Librarymodel->update($data, $condition);
      redirect(base_url().'library/index');

   }
}