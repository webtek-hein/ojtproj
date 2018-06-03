<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('Recruitments_model', 'rec');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
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

    public function getSchedule($page, $eventType)
    {
        $list = $this->rec->getSched($page, $eventType);
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $userType = $this->session->userdata['logged_in']['userType'];

        $data = [];
        foreach ($list as $schedule) {
            $time = $schedule['start_time'] . '-' . $schedule['end_time'];
            if ($userType !== 'admin') {
                if ($user_id !== $schedule['user_id']) {
                    $data[] = array(
                        'sched_id' => $schedule['sched_id'],
                        'date' => $schedule['sched_date'],
                        'time' => $time,
                        'location' => $schedule['location'],
                        'room' => $schedule['room'],
                        'company' => $schedule['company_name'],
                        'type' => $schedule['event_type'],
                        'slots' => $schedule['slots'],
                        'register' => '<a onclick="appointmentAction(' . $schedule['sched_id'] . ',0)" 
                        class="btn btn-danger">Register</a>',
                        'view' => '<a onclick="appointmentAction(' . $schedule['sched_id'] . ',1)" 
                         class="btn btn-success">View</a>'
                    );
                }
            } else {
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

    public function userAppointments($sched_id, $action)
    {
        if ($action === '0') {
            echo json_encode($this->rec->register($sched_id));
        } else {
            echo 1;
        }
    }

    public function getAppointmentPerUser($status)
    {
        $list = $this->rec->appoitnmentPerUser($status);
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

    public function editSchedule($page)
    {
        echo json_encode($this->rec->editSched());
        redirect($page);
    }

    public function sendMessage()
    {
        $email = $this->session->userdata['logged_in']['email'];
        $name = $this->session->userdata['logged_in']['name'];
        // Set SMTP Configuration
        $config = array(
            'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $email,
            'smtp_pass' => '',
            'smtp_crypto' => 'security', //can be 'ssl' or 'tls' for example
            'mailtype' => 'html', //plaintext 'text' mails or 'html'
            'smtp_timeout' => '4', //in seconds
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
        $subject = 'Your gmail subject here';
        $message = 'test';
        // Load CodeIgniter Email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        // Set email preferences
        $this->email->from($email, $name);
        $this->email->to('2151287@slu.edu.ph');
        $this->email->subject($subject);
        $this->email->message($message);
        // Ready to send email and check whether the email was successfully sent
        if (!$this->email->send()) {
            // Raise error message
            show_error($this->email->print_debugger());
        } else {
            // Show success notification or other things here
            echo 'Success to send email';
        }
    }

    public function getEvents(){
        echo json_encode($this->rec->getEvents());
    }
    public function archiveUser($id){
        $this->rec->archiveUser($id);
    }

    public function logs(){
        echo json_encode($this->rec->getLogs());
    }
    public function inquire(){
        $this->session->set_flashdata($this->rec->message());
        redirect('userInquire');
    }
    public function viewMessages(){
        echo json_encode($this->rec->viewMsg());
    }
}
