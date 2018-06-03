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
        $this->db->where('password', $password)
        ->where_in('status',array('registered','alumni'));
        $query = $this->db->get('user')->row();

        if (isset($query)) {
            return $query;
        } else {
            return 0;
        }
    }

    public function userAction($idnum,$action){
        if($action === '0'){
            $this->db->set('status','registered');
            $this->db->where('id_num',$idnum);
            $this->db->update('user');
            $this->recordLogs('Accepted user with id number '.$idnum.'.');
        }else if($action === '2'){
            $this->db->set('status','alumni');
            $this->db->where('id_num',$idnum);
            $this->db->update('user');
            $this->recordLogs('Reverted user with id number '.$idnum.'.');
        }else{
            $this->db->set('status','rejected');
            $this->db->where('id_num',$idnum);
            $this->db->update('user');
            $this->recordLogs('Rejected user with id number'.$idnum.'.');
        }
    }
    public function recordLogs($text){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->insert('logs',array(
            'activity'=> $text,
            'user_id'=>$user_id
        ));
    }
    public function editInfo(){
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');

        $data = array(
            'id_num'=>$this->input->post('idnum'),
            'first_name'=>$fname,
            'last_name'=>$lname,
            'user_type'=>$this->input->post('usertype'),
            'course'=>$this->input->post('course'),
            'year'=>$this->input->post('year')
        );
        $this->db->set($data);
        $this->db->where('user_id',$this->input->post('user_id'));
        $this->db->update('user');


        $this->recordLogs('Updated information of '.$fname.' '.$lname.'.');

    }
}