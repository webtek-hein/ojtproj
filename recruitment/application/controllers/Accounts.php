<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Accounts_model', 'acc');
    }

    public function signup()
    {
            $this->acc->signup();
            redirect('dashboard');
    }

    public function login()
    {
        $result = $this->acc->login();
        if ($result !== 0 && $result->status !== 'pending') {
            $session_data = array(
                'username' => $result->id_num,
                'user_id' => $result->user_id,
                'password' => $result->password,
                'userType' => $result->user_type,
                'email' =>$result->email,
                'name' => $result->first_name . " " . $result->last_name,
            );
            $this->session->set_userdata('logged_in', $session_data);

            if(!$result->user_type == 'admin')
            {
                redirect('userDashboard');
            }else{
                redirect('dashboard');
            }

        }else{
            $data['message_display'] = 'Wrong Credentials!';
            redirect('login');
        }
    }

    public function userAction($userID,$action){
        $this->acc->userAction($userID,$action);
    }

    public function editUser(){
        $this->acc->editInfo();
        redirect('user');
    }
    /**
     * Destroy session of a logged-in user
     * then will be redirected to the
     * login page.
     */
    public function logout()
    {
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $this->session->sess_destroy();
        $data['message_display'] = 'Successfully Logout';
        redirect('login');
    }
}
