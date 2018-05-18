<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model
{
    public function signup()
    {
        $data = array(
            'first_name' => $this->input->post('first'),
            'last_name' => $this->input->post('last'),
            'id_num' => $this->input->post('id'),
            'contact_num' => $this->input->post('contact'),
            'course' => $this->input->post('course'),
            'email' => $this->input->post('email'),
            'year' => $this->input->post('year'),
            'password' => $this->input->post('password'),
            'user_type' => $this->input->post('usertype'),
            'status' => 'pending'
        );
        $this->db->insert('user', $data);
    }

    public function login()
    {
        $username = $this->input->post('idnumber');
        $password = $this->input->post('password');

        $this->db->where('id_num', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user')->row();

        if (isset($query)) {
            return $query;
        } else {
            return 0;
        }
    }
}