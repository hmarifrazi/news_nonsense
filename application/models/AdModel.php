<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
        $this->db->select('advertisement.*, ad_location.name as adl');
		$this->db->from('advertisement');
		$this->db->join('ad_location','ad_location.id=advertisement.location','left');
        return $this->db->get()->result();
    }

    public function retrieve_location(){
        return $this->db->get('ad_location')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('advertisement')->row();
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('advertisement', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('advertisement');
    }
}