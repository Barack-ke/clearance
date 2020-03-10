<?php
defined('BASEPATH') or('No direct script access allowed');
Class Dashboard extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}
	public function index(){
		$this->load->view('includes/header');
		$this->load->view('includes/sidebar');
		$this->load->view('includes/nav');
		$this->load->view('includes/index');
		$this->load->view('includes/footer');
	}
}