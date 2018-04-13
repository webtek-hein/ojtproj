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

    public function addSchedule()
    {
        echo json_encode($this->rec->addSched());
        redirect('schedules');
    }

    public function getSchedule($eventType)
    {
        $list = $this->rec->getSched($eventType);
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

    public function getUsers()
    {
        echo json_encode($this->rec->getAllUsers());
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
        $data = [];
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



}
