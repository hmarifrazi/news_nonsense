<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		$this->load->model('LoginModel', 'lm');
	}
	public function index(){
		$data['page']='admin/dashboard';
		$this->load->view('admin/app',$data);
	}

	public function contact(){
		$data['datas']=$this->db->get('contact')->result();
		$data['page']='admin/contact';
		$this->load->view('admin/app',$data);
	}
	
	public function newsletter(){
		$data['datas']=$this->db->get('newsletter')->result();
		$data['page']='admin/newsletter';
		$this->load->view('admin/app',$data);
	}
}