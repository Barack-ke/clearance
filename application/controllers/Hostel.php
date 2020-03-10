<?php
defined('BASEPATH') OR('No direct script access allowed');
Class Hostel extends CI_Controller{
   public function __construct(){
   	parent::__construct();
   	$this->load->model('Hostelmodel');
   	$this->load->model('Studentmodel');
   }
   public function index(){
      $condition=array('status'=>0);
   	$hostels= $this->Hostelmodel->getlist($condition);
   	$data=array('hostels'=>$hostels);

   	$this->load->view('includes/header');
   	$this->load->view('includes/sidebar');
   	$this->load->view('includes/nav');
   	$this->load->view('hostel/hindex',$data);
   	$this->load->view('includes/footer');
   }
   public function clearhostel(){
      $id = $this->uri->segment('3');
      $id = strtr($id, array('.' => '+', '-' => '=', '~' => '/'));
        $id = $this->encryption->decrypt($id);

      $condition=array('studentId'=>$id);
      $data=array('status'=>1);
      $this->Hostelmodel->update($data, $condition);
      redirect(base_url().'hostel/index');
   }
}