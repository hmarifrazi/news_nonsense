<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagCtrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		$this->load->model('TagModel', 'tm');
	}

	public function index(){
		$data['datas']=$this->tm->retrieve();
		$data['page']='admin/tag/index';
		$this->load->view('admin/app',$data);
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');

		if ($this->form_validation->run() === FALSE){
			$data['page']='admin/tag/create';
			$this->load->view('admin/app',$data);
		}else{
			$this->tm->create($_POST);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Saved.
  </div>');
			redirect('admin/tag');
		}
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required|alpha_numeric_spaces|min_length[3]|max_length[20]');

		if ($this->form_validation->run() === FALSE){
			$data['tag']=$this->tm->single_retrieve($id);
			$data['page']='admin/tag/edit';
			$this->load->view('admin/app',$data);
		}else{
			$this->tm->edit($_POST,$id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Updated.
  </div>');
			redirect('admin/tag');
		}
	}
	
	public function delete($id)
	{
		$this->tm->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Deleted.
  </div>');
		redirect('admin/tag');
	}
}