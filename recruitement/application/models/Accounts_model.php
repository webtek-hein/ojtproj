<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts_model extends CI_Model
{
    public function signup()
    {
        $data = array(
            'first_name'=>$this->input->post('first'),
            'last_name'=>$this->input->post('last'),
            'id_num'=>$this->input->post('id'),
            'contact_num'=>$this->input->post('contact'),
            'course'=>$this->input->post('course'),
            'email'=>$this->input->post('email'),
            'year'=>$this->input->post('year'),
            'user_name'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'user_type'=>$this->input->post('usertype')
        );
        $this->db->insert('user',$data);
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->db->where('user_name',$username);
        $this->db->where('password',$password);
        if($this->db->count_all_results('user') > 0){
            $query = $this->db->get('user')->row();
            return $query;
        }else{
            return 0;
        }
    }
}