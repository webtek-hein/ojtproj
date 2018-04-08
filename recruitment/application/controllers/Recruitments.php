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
    public function updateCompanyDetails($id){
        echo json_encode($this->rec->updateComp($id));
    }
    public function addSchedule(){
        echo json_encode($this->rec->addSched());
        redirect('schedules');
    }
    public function getSchedule(){
        $list = $this->rec->getSched();
        $data = [];
        foreach ($list as $schedule){
            $time = $schedule['start_time'].'-'.$schedule['end_time'] ;
            $data[] = array(
              'date'=>$schedule['sched_date'],
              'time'=>$time,
              'location'=>$schedule['location'],
              'room'=>$schedule['room'],
              'company'=>$schedule['company_name'],
              'type'=>$schedule['event_type'],
              'slots'=>$schedule['slots'],
            );
        }
        echo json_encode($data);
    }

}
