<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
    public function __construct(){
		parent::__construct();
	}

	public function retrieve($username,$password){
        $this->db->select('user.id, user.name, user.email, user.contact, user.username, user.role_id, user.status, role.role_name, role.role');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id');
        $this->db->where('user.username',$username);
        $this->db->where('user.password',$password);
        return $this->db->get()->row();
    }
}