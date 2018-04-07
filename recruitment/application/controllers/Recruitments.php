<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Recruitments_model', 'rec');
    }
    public function newCompany(){
    	echo json_encode($this->rec->saveCompany());
    }
    public function getCompanies(){
        echo json_encode($this->rec->companies());
    }

}
