<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TagModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
        return $this->db->get('tag')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('tag')->row();
    }

    public function create($data){
        return $this->db->insert('tag', $data);
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('tag', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('tag');
    }
}