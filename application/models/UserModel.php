<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve(){
        $this->db->select('user.*, role.role_name as role');
        $this->db->from('user');
        $this->db->join('role','role.id=user.role_id');
        return $this->db->get()->result();
    }

    public function retrieve_role(){
        return $this->db->get('role')->result();
    }

    public function single_retrieve($id){
        $this->db->where('id',$id);
        return $this->db->get('user')->row();
    }

    public function create($data){
        return $this->db->insert('user', $data);
    }

    public function edit($data,$id){
        $this->db->where('id',$id);
        return $this->db->update('user', $data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
}