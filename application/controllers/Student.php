<?php
defined('BASEPATH') or('No direct script access allowed');
 Class Student extends CI_Controller{
 	public function __construct(){
 		parent::__construct();
 		$this->load->model('studentmodel');
 		$this->load->model('Coursemodel');
 		$this->load->library('form_validation');
 	}
 	public function index(){
 		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('user/studentlogin');
		$this->load->view('includes/footer');
 		
 	}
 	public function createuser(){
		$courses=$this->Coursemodel->getcoursedropdown();
		$data=array('courses'=>$courses);
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('user/studentreg',$data);
		$this->load->view('includes/footer');
	}
	public function saveuser(){
		$name=$this->input->post('name');
		$regno=$this->input->post('regno');
		$course=$this->input->post('course');
		$password=sha1($this->input->post('password'));
		

		$this->form_validation->set_rules('name','name','xss_clean|trim|required');
		$this->form_validation->set_rules('regno','regno','xss_clean|trim|required');
		$this->form_validation->set_rules('course','course','xss_clean|trim|required');
		$this->form_validation->set_rules('password','password','xss_clean|trim|required');


		if($this->form_validation->run()==false){
			redirect(base_url().'student/createuser');
		}else{
			$data=array('stname'=>$name,'regno'=>$regno,'course'=>$course,'password'=>$password);
			$result=$this->Studentmodel->insert($data);

			if($result<1){
				return 0;
			}elseif($result>0){
				redirect(base_url('student/index'));
			}

		}
	}
	public function checkclear(){
		$condition=array('tblstudent.id'=>$this->session->userdata('loginid'));
		$clears=$this->studentmodel->showcleared($condition);
		$data=array('clears'=>$clears);

		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('user/home',$data);
		$this->load->view('includes/footer');
	}
	public function getin(){
		echo $this->input->post('regno').'<br>';
		echo $this->input->post('password').'<br>';

		$reg=$this->input->post('regno');
		$pass=sha1($this->input->post('password'));

		$this->form_validation->set_rules('regno','regno','xss_clean|trim|required');
		$this->form_validation->set_rules('password','password','xss_clean|trim|required');

		if($this->form_validation->run()===false){
			redirect(base_url('student/index'));
		}else{

			//$this->session->set_userdata('regno',$reg);
			$data=array('regno' => $reg, 'password' =>$pass);

			$result=$this->studentmodel->confirmifexist($data);
			if($result->num_rows()>0){
				$row = $result->row();

				$this->session->set_userdata('loginid',$row->id);
             redirect(base_url('student/checkclear'));
			}elseif ($result->num_rows()<1){
				//redirect(base_url('student/checkclear'));
			}
		}

	}
 }