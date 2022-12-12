<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCtrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		if($this->session->get_userdata()['role']!="superadmin"){
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong> You are not authorized to visit this page.
			  </div>');
			redirect('admin');
			exit();
		}
		$this->load->model('UserModel', 'um');
	}

	public function index(){
		$data['datas']=$this->um->retrieve();
		$data['page']='admin/user/index';
		$this->load->view('admin/app',$data);
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('contact', 'Contact', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('username', 'User Name', 'required|alpha_numeric|is_unique[user.username]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|min_length[6]|max_length[20]|matches[password]}');
		
		$this->form_validation->set_message('is_unique', 'This {field} is not available.');

		if ($this->form_validation->run() === FALSE){
			$data['roles']=$this->um->retrieve_role();
			$data['page']='admin/user/create';
			$this->load->view('admin/app',$data);
		}else{
			$_POST['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			unset($_POST['cpassword']);
			$this->um->create($_POST);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Saved.
  </div>');
			redirect('admin/user');
		}
	}
	
	public function edit($id){
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('contact', 'Contact', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('username', 'User Name', 'required|alpha_numeric|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'min_length[6]|max_length[20]|matches[password]}');

		if ($this->form_validation->run() === FALSE){
			$data['roles']=$this->um->retrieve_role();
			$data['user']=$this->um->single_retrieve($id);
			$data['page']='admin/user/edit';
			$this->load->view('admin/app',$data);
		}else{
			
			if($_POST['password']){
			$_POST['password']=password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			}else{
				unset($_POST['password']);
			}
			unset($_POST['cpassword']);
			
			$this->um->edit($_POST,$id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Updated.
  </div>');
			redirect('admin/user');
		}
	}
	
	public function delete($id)
	{
		$this->um->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Deleted.
  </div>');
		redirect('admin/user');
		
	}
	
}