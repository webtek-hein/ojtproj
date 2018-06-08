<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments_model extends CI_Model
{
    public function saveCompany()
    {
        $company = $this->input->post('company');
        $address = '#' . $this->input->post('add_num') . ',' . $this->input->post('street') . ' ' . $this->input->post('province') .
            ',' . $this->input->post('city');
        $suffix = $this->input->post('suffix');
        $contact = $this->input->post('contact_firstname') . ' ' .
            $this->input->post('contact_middlename') . ' ' . $this->input->post('contact_lastname');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $mobile = $this->input->post('mobile');
        $alt = $this->input->post('alt_mobile');
        $desc = $this->input->post('description');


        $data = array(
            'contact_person' => $contact,
            'address' => $address,
            'company_name' => $company,
            'suffix' => $suffix,
            'email' => $email,
            'tel_num' => $tel,
            'mobile_num' => $mobile,
            'alt_number' => $alt,
            'about' => $desc
        );
        if (!$this->upload->do_upload('logo')) {
            print_r($this->upload->display_errors());
            die;
        } else {
            $upload_data = $this->upload->data();
            $data['image_url'] = $file_name = $upload_data['file_name'];
        }
        $this->db->insert('company', $data);
        $this->recordLogs('Added ' . $company . ' as new company.');

    }

    public function companies($stat)
    {
        if ($stat === '0') {
            $status = 'registered';
        } else {
            $status = 'archived';
        }
        $query = $this->db->where('status', $status)->get('company')->result_array();
        return $query;
    }

    public function recordLogs($text)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->insert('logs', array(
            'activity' => $text,
            'user_id' => $user_id
        ));
    }

    public function setCompanyStatus($id)
    {
        $this->db->set('status', 'archived')->where('company_id', $id)->update('company');
        $company = $this->db->select('company_name')->where('company_id', $id)->get('company')->row()->company_name;
        $this->recordLogs($company . ' has been archived.');

    }

    public function revertCompanyStatus($id)
    {
        $this->db->set('status', 'registered')->where('company_id', $id)->update('company');
        $company = $this->db->select('company_name')->where('company_id', $id)->get('company')->row()->company_name;

        $this->recordLogs($company . ' has been reverted.');
    }

    public function updateComp($id)
    {
        $data = array(
            'company_name' => $this->input->post('company_name'),
            'address' => $this->input->post('address'),
            'contact_person' => $this->input->post('contact_person'),
            'mobile_num' => $this->input->post('mobile_num'),
            'tel_num' => $this->input->post('tel'),
            'alt_number' => $this->input->post('alt_number'),
            'email' => $this->input->post('email'),
        );
        $company = $this->db->select('company_name')->where('company_id', $id)->get('company')->row()->company_name;

        $this->recordLogs('Updated information of ' . $company);

        return $this->db->update('company', $data, 'company_id=' . $id);
    }

    public function addSched()
    {
        $slots = null;
        if ($this->input->post('slots') !== null) {
            $slots = $this->input->post('slots');
        }
        $id = $this->input->post('company');
        $event = $this->input->post('event');
        $data = array(
            'company_id' => $id,
            'sched_type' => 'Exam',
            'event_type' => $event,
            'sched_date' => $this->input->post('date'),
            'start_time' => $this->input->post('start'),
            'end_time' => $this->input->post('end'),
            'location' => $this->input->post('location'),
            'room' => $this->input->post('room'),
            'slots' => $slots,
            'defaultSlot' => $slots
        );

        $company = $this->db->select('company_name')->where('company_id', $id)->get('company')->row()->company_name;

        $this->db->insert('schedule', $data);

        $this->recordLogs('Added exam schedule for ' . $event . ' under ' . $company . '.');

    }

    public function getSched($page, $eventType)
    {
        $userID = $this->session->userdata['logged_in']['user_id'];
        $userType = $this->session->userdata['logged_in']['userType'];

        $compID = $this->db->select('company_id,sched_date,start_time,end_time')
            ->where('user_id', $userID)
            ->join('schedule', 'schedule.sched_id = appointment.sched_id', 'inner')
            ->get('appointment')->result_array();


        $data = array();
        foreach ($compID as $c) {
            $data[] = $c['company_id'];
        }


        $this->db->select('appointment.user_id,company_name,schedule.*');
        $this->db->join('appointment', 'appointment.sched_id = schedule.sched_id', 'left');
        $this->db->join('company', 'company.company_id = schedule.company_id', 'inner');


        if ($eventType !== 'All' && $eventType !== 'DONE') {

            $this->db->where('event_type', $eventType);
        } else {
            if ($page === 'schedules') {
                $this->db->where_in('event_type', array('Internship', 'Employment'));
                if ($userType === 'student') {
                    if (!empty($data)) {
                        $this->db->where_not_in('schedule.company_id', $data);
                    }
                }
            } else {
                $this->db->where_in('event_type', array('Seminar', 'Orientation'));
            }
        }
        if ($eventType !== 'DONE') {
            $this->db->group_start();
            $this->db->group_start()
                ->or_where('sched_date', 'date(NOW())', FALSE)
                ->where('start_time >', 'CURRENT_TIME()', FALSE);
            $this->db->group_end();
            $this->db->or_where('sched_date >', 'date(NOW())', FALSE);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->group_start()
                ->where('sched_date', 'date(NOW())', FALSE)
                ->where('end_time <', 'CURRENT_TIME()', FALSE);
            $this->db->group_end();
            $this->db->or_where('sched_date <', 'date(NOW())', FALSE);
            $this->db->group_end();
        }

        $this->db->group_by('schedule.sched_id,appointment.user_id');
        return $this->db
            ->get('schedule')
            ->result_array();
    }

    public function appointments($id)
    {
        $this->db->select('appointment.sched_id,id_num,CONCAT(first_name," ",last_name) as name,user_type,course,year,appointment_date');
        $this->db->join('user', 'user.user_id = appointment.user_id');
        $this->db->where('appointment.sched_id', $id);
//            ->where('sched_date >=', 'date(NOW())', FALSE)
//            ->where('start_time >=', 'time(NOW())', FALSE);
        return $this->db->get('appointment')->result_array();
    }

    public function getUser($status)
    {
        $this->db->select('id_num,CONCAT(first_name," ",last_name) as name,user_type,course,year, first_name,last_name,user_id');
        if ($status === 'registered') {
            $this->db->where_in('status', array('alumni', 'registered'));
        } else {
            $this->db->where('status', $status);
        }
        return $this->db->get('user')->result_array();
    }

    public function register($sched_id)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $appointments = $this->db->where('user_id', $user_id)
            ->join('schedule', 'schedule.sched_id = appointment.sched_id', 'left')
            ->get('appointment')->result_array();
        $schedules = $this->db->where('sched_id', $sched_id)->get('schedule')->row();
        $counter = 0;
        if (!empty($appointments)) {
            foreach ($appointments as $a) {
                //if appointment and schedule have the same date
                if ($a['sched_date'] === $schedules->sched_date) {
                    if ($a['start_time'] === $schedules->start_time ||
                        ($a['start_time'] < $schedules->start_time &&
                            $schedules->end_time < $a['start_time']) ||
                        ($schedules->start_time < $a['end_time'])
                    ) {
                        $counter++;
                    }
                }
            }
        }

        if ($counter >= 1) {
            return false;
        } else {
            $data = array(
                'user_id' => $user_id,
                'sched_id' => $sched_id,
            );
            $this->db->set($data);
            $this->db->set('appointment_date', 'CURDATE()', FALSE);
            $this->db->insert('appointment');

            $this->db->set('slots', 'slots-1', FALSE);
            $this->db->where('sched_id', $sched_id);
            $this->db->update('schedule');
            return true;
        }
    }

    public function appoitnmentPerUser($status)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $this->db->select('company_name,schedule.*');
        $this->db->join('schedule', 'schedule.sched_id = appointment.sched_id', 'inner');
        $this->db->join('company', 'company.company_id = schedule.company_id', 'inner');
        $this->db->where('appointment.user_id', $user_id);
        if ($status === 'ongoing') {
            $this->db->group_start();
            $this->db->group_start()
                ->or_where('sched_date', 'date(NOW())', FALSE)
                ->where('start_time >', 'CURRENT_TIME()', FALSE);
            $this->db->group_end();
            $this->db->or_where('sched_date >', 'date(NOW())', FALSE);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->group_start()
                ->where('sched_date', 'date(NOW())', FALSE)
                ->where('end_time <', 'CURRENT_TIME()', FALSE);
            $this->db->group_end();
            $this->db->or_where('sched_date <', 'date(NOW())', FALSE);
            $this->db->group_end();
        }

        return $this->db->get('appointment')->result_array();

    }

    public function editSched()
    {
        $time = explode('-', $this->input->post('time'));
        $start_time = $time[0];
        $end_time = $time[1];
        $id = $this->input->post('id');

        $data = array(
            'start_time' => $start_time,
            'end_time' => $end_time,
            'sched_date' => $this->input->post('date'),
            'location' => $this->input->post('location'),
            'room' => $this->input->post('room'),
            'slots' => $this->input->post('slots'),
        );

        $this->db->set($data);
        $this->db->where('sched_id', $id);
        $this->db->update('schedule');

        $schedule = $this->db->select('company_name,event_type')
            ->join('company', 'company.company_id = schedule.company_id', 'inner')
            ->where('sched_id', $id)->get('schedule')->row();
        $event = $schedule->event_type;
        $company = $schedule->company_name;

        $this->recordLogs('Updated exam schedule for ' . $event . ' under ' . $company . '.');

    }

    public function getEvents()
    {
        return $this->db->select('company_name,event_type,sched_date,location')
            ->join('company', 'company.company_id = schedule.company_id', 'inner')
            ->where('event_type', 'Seminar')
           ->group_start()
            ->group_start()
                ->or_where('sched_date', 'date(NOW())', FALSE)
                ->where('start_time >', 'CURRENT_TIME()', FALSE)
            ->group_end()
            ->or_where('sched_date >', 'date(NOW())', FALSE)
            ->group_end()
            ->order_by('sched_date', 'ASC')
            ->get('schedule', 5)->result_array();

    }

    public function archiveUser($id)
    {
        $this->db->set('status', 'archived');
        $this->db->where('user_id', $id);
        $this->db->update('user');

        $name = $this->db->select('CONCAT(first_name," ",last_name) as name')
            ->where('user_id', $id)
            ->get('user')->row()->name;


        $this->recordLogs('Archived user ' . $name . '.');

    }

    public function getLogs()
    {
        return $this->db->select('logs.*,CONCAT(user.first_name," ",user.last_name) as name')
            ->join('user', 'user.user_id = logs.user_id', 'inner')
            ->order_by('logs.timestamp', 'DESC')
            ->get('logs')->result_array();
    }

    public function message()
    {
        $message = $this->input->post('message');
        $to = $this->input->post('to');
        $senderID = $this->session->userdata['logged_in']['user_id'];

        $query = $this->db->select('user_id')->where('email', $to)->where('user_type', 'admin')->get('user');
        if ($query->num_rows() === 1) {
            $userID = $query->row()->user_id;
            $this->db->insert('messages', array('message' => $message, 'senderID' => $senderID, 'userID' => $userID));
            if ($this->db->insert_id()) {
                return array('success-message' => 'Message Sent');
            } else {
                return array('failed-message' => 'Message Sent');
            }
        } else {
            return array('err-message' => 'Email not registered or email is not an admin.');
        }
    }

    public function viewMsg()
    {
        return $this->db
            ->select('messages.*,CONCAT(user.first_name," ",user.last_name) as name')
            ->join('user', 'user.user_id = messages.userID')
            ->where('userID', $this->session->userdata['logged_in']['user_id'])
            ->get('messages')
            ->result_array();
    }

}