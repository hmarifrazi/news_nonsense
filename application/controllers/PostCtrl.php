<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostCtrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		$this->load->model('PostModel', 'pm');
	}

	public function index(){
		$data['datas']=$this->pm->retrieve();
		$data['page']='admin/post/index';
		$this->load->view('admin/app',$data);
	}
	
	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE){
			$data['media']=$this->pm->retrieve_media();
			$data['category']=$this->pm->retrieve_cat();
			$data['tag']=$this->pm->retrieve_tag();
			$data['page']='admin/post/create';
			$this->load->view('admin/app',$data);
		}else{
			unset($_POST['files']);
			$_POST['tag']=implode(',',$this->input->post('tag'));
			$this->pm->create($_POST);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Success!</strong> Data Saved.
			  </div>');
			redirect('admin/post');
		}
	}
	
	public function edit($id){
		
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		if ($this->form_validation->run() === FALSE){
			$data['media']=$this->pm->retrieve_media();
			$data['category']=$this->pm->retrieve_cat();
			$data['tag']=$this->pm->retrieve_tag();
			$data['post']=$this->pm->single_retrieve($id);
			$data['page']='admin/post/edit';
			$this->load->view('admin/app',$data);
		}else{
			unset($_POST['files']);
			
			if(!isset($_POST['featured']))
				$_POST['featured']=0;
			if(!isset($_POST['popular']))
				$_POST['popular']=0;
			if(!isset($_POST['latest']))
				$_POST['latest']=0;
			if(!isset($_POST['trending']))
				$_POST['trending']=0;
			if(!isset($_POST['spotlight']))
				$_POST['spotlight']=0;
			if(!isset($_POST['editorial']))
				$_POST['editorial']=0;
			if(!isset($_POST['homemainnews']))
				$_POST['homemainnews']=0;
			if(!isset($_POST['homemainnewsslider']))
				$_POST['homemainnewsslider']=0;
			if(!isset($_POST['homemorenews']))
				$_POST['homemorenews']=0;
			if(!isset($_POST['catmainnews']))
				$_POST['catmainnews']=0;
			if(!isset($_POST['catmainnewsslider']))
				$_POST['catmainnewsslider']=0;
			if(!isset($_POST['catmorenews']))
				$_POST['catmorenews']=0;
			
			$_POST['tag']=implode(',',$this->input->post('tag'));
			$this->pm->edit($_POST,$id);
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Updated.
  </div>');
			redirect('admin/post');
		}
	}
	
	public function delete($id)
	{
		$this->pm->delete($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Deleted.
  </div>');
		redirect('admin/post');	
	}	
}