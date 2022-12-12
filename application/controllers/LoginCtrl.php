<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('LoginModel', 'lm');
	}

	public function login(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'User Name', 'required|alpha_numeric|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
		
		if ($this->form_validation->run() === FALSE){
			$this->load->view('admin/login');
		}else{
			$password=sha1($this->input->post('password'));
			$username=$this->input->post('username');
			$data=$this->lm->retrieve($username,$password);
			if($data){
				if($data->status==1){
					$this->session->set_userdata('is_login',TRUE);
					$this->session->set_userdata('role',$data->role);
					$this->session->set_userdata('userdata',$data);
					redirect('admin');
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Fail!</strong> You are not active user. Please contact to authority.
  </div>');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Fail!</strong> User name or password is not correct.
  </div>');
			}
			redirect('login');
		}
	}
	
	public function logout(){
		session_destroy();
		redirect('login');
	}
}