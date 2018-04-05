<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function view($page = 'dashboard')
    {


        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $user = $this->session->userdata('logged_in');
        if ($page == 'login') {
            $this->load->view('pages/login');
        } elseif ($page == 'signup') {
            $this->load->view('pages/signup');
        } else {
            $data['title'] = ucfirst($page);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        };

    }
}

