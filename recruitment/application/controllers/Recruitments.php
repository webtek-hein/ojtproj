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
    	redirect('company');
    }
    public function getCompanies($stat){
        echo json_encode($this->rec->companies($stat));
    }
    public function archiveCompany($id){
       echo json_encode($this->rec->setCompanyStatus($id));
    }
    public function revertCompany($id){
        echo json_encode($this->rec->revertCompanyStatus($id));
    }
    public function getCompanyInfo($id){

    }

}
