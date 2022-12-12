<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdCtrl extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		if(!isset($this->session->get_userdata()['is_login']) && !$this->session->get_userdata()['is_login']){
			redirect('login');
			exit();
		}
		$this->load->model('AdModel', 'am');
	}

	public function index(){
		$data['datas']=$this->am->retrieve();
		$data['page']='admin/ad/index';
		$this->load->view('admin/app',$data);
	}
	
	public function edit($id){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('status', 'Status', 'required|in_list[0,1]');
		$this->form_validation->set_rules('date', 'Date', 'required');

		$this->form_validation->set_message('in_list', 'The {field} field must be boolean.');


		if ($this->form_validation->run() === FALSE){
			$data['adloc']=$this->am->retrieve_location();
			$data['ad']=$this->am->single_retrieve($id);
			$data['page']='admin/ad/edit';
			$this->load->view('admin/app',$data);
		}else{
			if($_FILES['image']['name']){
				$config['upload_path'] = 'img/admin/ad';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '10000';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				$config['file_name'] = uniqid().rand(111,999);
				
				$this->load->library('upload', $config);
				
				if (! $this->upload->do_upload('image')) {
					$error = array(
					'error' => $this->upload->display_errors());
				} else {
					$data = $this->upload->data();
					$_POST['image']=$data['file_name'];
					
					$origional_image = $data['full_path'];
					$target_path = $data['file_path'].'thumb/';
					
					/* resize image */
					$cdata = array(
							'image_library' => 'gd2',
							'source_image' => $origional_image,
							'new_image' => $target_path,
							'create_thumb' => FALSE,
							'maintain_ratio' => TRUE,
							'width' => '50',
							'height' => '50'
						);
						$this->load->library('image_lib', $cdata);
						if ($this->image_lib->resize())
							$_POST['thumb']=$data['file_name'];
						else
							echo $this->image_lib->display_errors();
				}
				
				unlink("img/admin/ad/".$_POST['old_image']);
				unlink("img/admin/ad/thumb/".$_POST['old_image']);
			}
			
			
			unset($_POST['old_image']);
			$this->am->edit($_POST,$id);
			
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Updated.
  </div>');
			redirect('admin/ad');
		}
	}
	
	public function delete($id,$image)
	{
		unlink("img/admin/ad/".$image);
		unlink("img/admin/ad/thumb/".$image);
		$this->am->delete($id);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> Data Deleted.
  </div>');
		redirect('admin/ad');
	}
}