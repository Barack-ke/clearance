<?php
defined('BASEPATH')OR('No direct script access allowed');
Class Course extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Coursemodel');
	}

public function createcourse(){

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('user/course');
		$this->load->view('includes/footer');
	}
	public function savecourse(){
		$course = $this->input->post('course');
	
		$this->form_validation->set_rules('course','course', 'xss_clean|trim|required');
		if($this->form_validation->run()==false){
			redirect(base_url().'course/createcourse');
		}else{
			$data=array('name'=>$course);
			$result=$this->Coursemodel->insert($data);
			if($result<1){
				return 0;
			}elseif($result>0){
				return 1;
				//redirect(base_url().'');
			}
		}
		
		

		
			
	
	}	
			
}