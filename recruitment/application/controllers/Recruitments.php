<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Recruitments_model', 'rec');

        $config['upload_path']          =  './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
    }
    public function newCompany()
    {
        echo json_encode($this->rec->saveCompany());
        redirect('company');
    }

    public function getCompanies($stat)
    {
        echo json_encode($this->rec->companies($stat));
    }

    public function archiveCompany($id)
    {
        echo json_encode($this->rec->setCompanyStatus($id));
    }

    public function revertCompany($id)
    {
        echo json_encode($this->rec->revertCompanyStatus($id));
    }

    public function updateCompanyDetails($id)
    {
        echo json_encode($this->rec->updateComp($id));
    }

    public function addSchedule($page)
    {
        echo json_encode($this->rec->addSched());
        redirect($page);
    }

    public function getSchedule($page,$eventType)
    {
        $list = $this->rec->getSched($page,$eventType);
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $userType = $this->session->userdata['logged_in']['userType'];

        $data = [];
        foreach ($list as $schedule) {
            $time = $schedule['start_time'] . '-' . $schedule['end_time'];
            if($userType !== 'admin'){
                if($user_id !== $schedule['user_id']){
                    $data[] = array(
                        'sched_id' => $schedule['sched_id'],
                        'date' => $schedule['sched_date'],
                        'time' => $time,
                        'location' => $schedule['location'],
                        'room' => $schedule['room'],
                        'company' => $schedule['company_name'],
                        'type' => $schedule['event_type'],
                        'slots' => $schedule['slots'],
                        'register'=>'<a onclick="appointmentAction('.$schedule['sched_id'].',0)" 
                        class="btn btn-danger">Register</a>',
                        'view'=>'<a onclick="appointmentAction('.$schedule['sched_id'].',1)" 
                         class="btn btn-success">View</a>'
                    );
                }
            }else{
                $data[] = array(
                    'sched_id' => $schedule['sched_id'],
                    'date' => $schedule['sched_date'],
                    'time' => $time,
                    'location' => $schedule['location'],
                    'room' => $schedule['room'],
                    'company' => $schedule['company_name'],
                    'type' => $schedule['event_type'],
                    'slots' => $schedule['slots']
                );
            }

        }
        echo json_encode($data);
    }

    public function getAppointment($id)
    {
        echo json_encode($this->rec->appointments($id));
    }

    public function getUsers($status)
    {
        echo json_encode($this->rec->getUser($status));
    }

    public function userAppointments($sched_id,$action){
       if($action === '0'){
           echo json_encode($this->rec->register($sched_id));
       }else{
           echo 1;
       }
    }

    public function getAppointmentPerUser(){
        $list = $this->rec->appoitnmentPerUser();
        $data = array();
        foreach ($list as $schedule) {
            $time = $schedule['start_time'] . '-' . $schedule['end_time'];
                $data[] = array(
                    'sched_id' => $schedule['sched_id'],
                    'date' => $schedule['sched_date'],
                    'time' => $time,
                    'location' => $schedule['location'],
                    'room' => $schedule['room'],
                    'company' => $schedule['company_name'],
                    'type' => $schedule['event_type'],
                    'slots' => $schedule['slots']
                );
        }
        echo json_encode($data);
    }

    public function editSchedule(){
        echo json_encode($this->rec->editSched());
        redirect('schedules');
    }


}
