<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatCtrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		$this->load->model('CatModel', 'cm');
	}

	public function index(){
		$data['datas']=$this->cm->retrieve();
		$data['page']='admin/category/index';
		$this->load->view('admin/app',$data);
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');

		if ($this->form_validation->run() === FALSE){
			$data['page']='admin/category/create';
			$this->load->view('admin/app',$data);
		}else{
			$this->cm->create($_POST);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Saved.
  </div>');
			redirect('admin/category');
		}
	}
	
	public function edit($id){
		
		if($this->session->get_userdata()['role']!="superadmin"){
			$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong> You are not authorized to visit this page.
			  </div>');
			redirect('admin/category');
			exit();
		}
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');

		if ($this->form_validation->run() === FALSE){
			$data['category']=$this->cm->single_retrieve($id);
			$data['page']='admin/category/edit';
			$this->load->view('admin/app',$data);
		}else{
			$this->cm->edit($_POST,$id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Updated.
  </div>');
			redirect('admin/category');
		}
	}
	
	public function delete($id)
	{
		$this->cm->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Deleted.
  </div>');
		redirect('admin/category');
	}
}