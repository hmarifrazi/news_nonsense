<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeCtrl extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['hslider']=$this->db->where('homemainnewsslider',1)->get('post')->result();
		$data['hmain']=$this->db->where('homemainnews',1)->get('post')->result();
		$data['hmore']=$this->db->where('homemorenews',1)->get('post')->result();
		$data['catsl']=$this->db->get('category')->result();
		$data['ftab']=$this->db->where('featured',1)->limit(3, 0)->get('post')->result();
		$data['ptab']=$this->db->order_by('viewcount','DESC')->limit(3, 0)->get('post')->result();
		$data['ltab']=$this->db->order_by('created_at','DESC')->limit(3, 0)->get('post')->result();
		$data['ttab']=$this->db->where('trending',1)->limit(3, 0)->get('post')->result();
		$data['stab']=$this->db->where('spotlight',1)->limit(3, 0)->get('post')->result();
		$data['vtab']=$this->db->where('video',1)->limit(3, 0)->get('post')->result();
		$data['edtl']=$this->db->where('editorial',1)->limit(4, 0)->get('post')->result();

		$data['page']="front/home";
		$this->load->view('front/app',$data);
	}

	public function advertise(){
		$data['page']="front/advertise";
		$this->load->view('front/app',$data);
	}

	public function advert_save(){
		$insert['name']= htmlspecialchars(trim($this->input->post('fullname')));
		$insert['email']=htmlspecialchars(trim($this->input->post('email_address')));
		$insert['website']=htmlspecialchars(trim($this->input->post('company_website')));
		$insert['company']=htmlspecialchars(trim($this->input->post('company_name')));
		$insert['address']=htmlspecialchars(trim($this->input->post('company_address')));
		$insert['contact']=htmlspecialchars(trim($this->input->post('phone')));
		$insert['description']=htmlspecialchars(trim($this->input->post('message')));
		
		$config['upload_path'] = 'img/admin/ad';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$config['file_name'] = uniqid().rand(1111,9999);
		
		$this->load->library('upload', $config);
		
		if (! $this->upload->do_upload('image')) {
			$error = array(
			'error' => $this->upload->display_errors());
		} else {
			$data = $this->upload->data();
			$insert['image']=$data['file_name'];
			
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
				if ($this->image_lib->resize()) {
					$insert['thumb']=$data['file_name'];
				} else {
					echo $this->image_lib->display_errors();
				}
		}
		
		if($this->db->insert('advertisement', $insert)){
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success!</strong> Thank you for advertising with us.
									</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Oops!</strong> Something went wrong. Please try again.
									</div>');
		}
		redirect('advertise');
	}

	public function contact(){
		$data['page']="front/contact";
		$this->load->view('front/app',$data);
	}

	public function contact_save(){
		$insert['name']= htmlspecialchars(trim($this->input->post('fullname')));
		$insert['email']=htmlspecialchars(trim($this->input->post('email_address')));
		$insert['subject']=htmlspecialchars(trim($this->input->post('subject')));
		$insert['message']=htmlspecialchars(trim($this->input->post('message')));
		if($this->db->insert('contact', $insert)){
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success!</strong> Thank you for reaching us. We will get back to you ASAP.
									</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Fail!</strong> Please try again.
									</div>');
		}
		redirect('contact');
	}

	public function post($id){
		$this->db->query("update post set viewcount=(viewcount+1) where id=$id");
		$data['post']=$this->db->where('id',$id)->get('post')->row();
		$data['comments']=$this->db->where('post_id',$data['post']->id)->get('comment')->result();
		$data['relpost']=$this->db->where('category',$data['post']->category)->limit(5, 0)->get('post')->result();
		$data['featured']=$this->db->where('category',$data['post']->category)->where('featured',1)->limit(5, 0)->get('post')->result();
		$data['trending']=$this->db->where('category',$data['post']->category)->where('trending',1)->limit(5, 0)->get('post')->result();

		$data['cat']=$this->db->where('id',$data['post']->category)->get('category')->row();
		$data['tag']=$this->db->where_in('id',explode(',',$data['post']->tag))->get('tag')->result();

		$data['ad2']=$this->db->where('location', 2)->limit(1, 0)->get('advertisement')->row();
		$data['ad3']=$this->db->where('location', 3)->limit(1, 0)->get('advertisement')->row();
		$data['ad4']=$this->db->where('location', 4)->limit(1, 0)->get('advertisement')->row();

		$data['page']="front/post";
		$this->load->view('front/app',$data);
	}

	public function comment_save(){
		$insert['name']= htmlspecialchars(trim($this->input->post('fullname')));
		$insert['email']=htmlspecialchars(trim($this->input->post('email_address')));
		$insert['message']=htmlspecialchars(trim($this->input->post('message')));
		$insert['post_id']=htmlspecialchars(trim($this->input->post('pid')));
		if($this->db->insert('comment', $insert)){
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Success!</strong> Your comment has been saved.
									</div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show">
										<button type="button" class="close" data-dismiss="alert">&times;</button>
										<strong>Oops!</strong> Something went wrong. Please try again.
									</div>');
		}
		redirect('post/'.$this->input->post('pid'));
	}

	public function category($id){
		$data['cslider']=$this->db->where('catmainnewsslider',1)->where('category', $id)->get('post')->result();
		$data['cmain']=$this->db->where('catmainnews',1)->where('category', $id)->get('post')->result();
		$data['cmore']=$this->db->where('catmorenews',1)->where('category', $id)->get('post')->result();
		$data['cname']=$this->db->where('id', $id)->get('category')->row();
		$data['page']="front/category";
		$this->load->view('front/app',$data);
	}

	public function tag($id){
		$data['tname']=$this->db->where('id', $id)->get('tag')->row();
		$data['tags']=$this->db->where('tag', $id)->get('post')->result();
		$data['page']="front/tag";
		$this->load->view('front/app',$data);
	}

	public function search(){
		$con=$this->input->get('key_word');
		$data['search_key']=$con;
		$data['posts']=$this->db->like('title',$con)->get('post')->result();
		$data['page']="front/search";
		$this->load->view('front/app',$data);
	}

	public function newsletter(){
		$insert['email']=htmlspecialchars(trim($this->input->post('email_address')));
		$this->db->insert('newsletter', $insert);
		redirect('home');
	}
}
