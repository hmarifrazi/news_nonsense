<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
        return $this->db->get('media')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('media')->row();
    }

    public function create($data){
        return $this->db->insert('media', $data);
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('media', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('media');
    }
}