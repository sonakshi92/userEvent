<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
 
    public function chkAdminExist(){
        $chkAdmin = $this->db->get('admin');
        if($chkAdmin->num_rows() > 0){
            return $chkAdmin->num_rows();
        }
    }

    public function save($admindata){
        $this->db->insert('admin', $admindata);
        return $this->db->insert_id();
    }

    public function login($email, $password)
	{
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('admin');

        if($query->num_rows() == 1){
            return $query->row();
        }
        return false;
	}
	
    public function getuser()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    

}
