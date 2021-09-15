<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');
class User_model extends CI_Model {

    public function save($userdata){
        $this->db->insert('user', $userdata);
        return $this->db->insert_id();
    }

    public function login($email, $password)
	{
        $this->db->where('email', $email);
        $this->db->where('password', md5($password));
        $query = $this->db->get('user');

        if($query->num_rows() == 1){
            return $query->row();
        }
        return false;
	}

    public function saveevent($eventdata){
        $this->db->insert('event', $eventdata);
        return $this->db->insert_id();
    }

    public function getevent($id)
    {
        $this->db->select('*');
        $this->db->where('uid', $id);
        $query = $this->db->get('event');

            return $query->result();
    }

    public function getusers($id){
        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d ');
        $this->db->select('*');
        $this->db->where('uid', $id);
        $this->db->where('DATE(created_at)', $curr_date);
        $query = $this->db->get('event');
        return $query->result();
    }

}
