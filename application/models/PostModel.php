<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
		$this->db->select('post.*,category.name as cat, tag.name as tg');
		$this->db->from('post');
		$this->db->join('category','category.id=post.category');
		$this->db->join('tag','tag.id=post.tag');
        return $this->db->get()->result();
    }
	public function retrieve_cat(){
        return $this->db->get('category')->result();
    }
	public function retrieve_tag(){
        return $this->db->get('tag')->result();
    }
	public function retrieve_media(){
		$this->db->select('image');
        return $this->db->get('media')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('post')->row();
    }

    public function create($data){
        return $this->db->insert('post', $data);
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('post', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('post');
    }
}