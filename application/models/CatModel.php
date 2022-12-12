<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CatModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
        return $this->db->get('category')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('category')->row();
    }

    public function create($data){
        return $this->db->insert('category', $data);
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('category', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('category');
    }
}