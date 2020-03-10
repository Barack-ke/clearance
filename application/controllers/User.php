<?php
defined('BASEPATH') OR('No direct script access allowed');
Class User extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('Usermodel');
		$this->load->model('Rolemodel');

	}
	public function index(){
		$roles=$this->Rolemodel->getroledropdown();
		$data=array('roles'=>$roles);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('user/admin',$data);
		$this->load->view('includes/footer');

	}public function saveadmin(){
		$email=$this->input->post('email');
		$password=sha1($this->input->post('password'));
		$role=$this->input->post('role');

		$this->form_validation->set_rules('email','email','xss_clean|trim|required');
		$this->form_validation->set_rules('password','password','xss_clean|trim|required');
		$this->form_validation->set_rules('role','role','xss_clean|trim|required');

		if($this->form_validation->run()===false){
			redirect(base_url('user/index'));
		}else{
			$data=array('email'=>$email,'password'=>$password, 'role'=>$role);
			$result=$this->Usermodel->insert($data);
			if($result<1){
				return 0;
			}elseif($result>0){
				redirect(base_url('user/userlogin'));
			}
		}
	}
	public function userlogin(){

		$this->load->view('includes/header');
		$this->load->view('includes/nav');
		$this->load->view('user/alogin');
		$this->load->view('includes/footer');
	}
	public function checklogin(){
		$email=$this->input->post('email');
		$password=sha1($this->input->post('password'));
		
		$this->form_validation->set_rules('email','email','xss_clean|trim|required');
		$this->form_validation->set_rules('password','password','xss_clean|trim|required');
		
		if($this->form_validation->run()===false){
			redirect(base_url('user/userlogin'));
		}else{
			$data=array('email'=>$email,'password'=>$password);
			$result=$this->Usermodel->confirmifexist($data);
			$result->num_rows();
			if($result->num_rows()<1){
				redirect(base_url('user/userlogin'));
			}elseif($result->num_rows()>0){
				$row = $result->row();
				$theid = $row->id;
				$email = $row->email;
				$role = $row->role;

				$this->session->set_userdata('logiid',$theid);
				$this->session->set_userdata('loginrole',$role);
				$this->session->set_userdata('loginemail',$email);
				redirect(base_url('dashboard'));
			}
		}
	}
}