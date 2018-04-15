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
//        if (!$this->upload->do_upload('logo')) {
//            $uploadedDetails = $this->upload->display_errors();
//        } else {
//            $uploadedDetails = $this->upload->data();
//        }
//        print_r($uploadedDetails);
//        die;

        $this->db->insert('company', $data);
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

    public function setCompanyStatus($id)
    {
        $this->db->set('status', 'archived')->where('company_id', $id)->update('company');
    }

    public function revertCompanyStatus($id)
    {
        $this->db->set('status', 'registered')->where('company_id', $id)->update('company');
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
        var_dump($data);
        return $this->db->update('company', $data, 'company_id=' . $id);
    }

    public function addSched()
    {
        $slots = null;
        if($this->input->post('slots') !== null){
            $slots = $this->input->post('slots');
        }
        $data = array(
            'company_id' => $this->input->post('company'),
            'sched_type' => 'Exam',
            'event_type' => $this->input->post('event'),
            'sched_date' => $this->input->post('date'),
            'start_time' => $this->input->post('start'),
            'end_time' => $this->input->post('end'),
            'location' => $this->input->post('location'),
            'room' => $this->input->post('room'),
            'slots' => $slots,
            'defaultSlot' => $slots
        );
        $this->db->insert('schedule', $data);
    }

    public function getSched($page,$eventType)
    {
        $this->db->select('appointment.user_id,company_name,schedule.*,');
        $this->db->join('appointment', 'appointment.sched_id = schedule.sched_id', 'left');
        $this->db->join('company', 'company.company_id = schedule.company_id', 'inner');
        if($page === 'schedules'){
            $this->db->where_in('event_type',array('Internship','Employment'));
        }else{
            $this->db->where_in('event_type',array('Seminar','Orientation'));
        }
        if ($eventType !== 'All') {
            $this->db->where('event_type', $eventType);
        }
        $this->db->group_by('schedule.sched_id,appointment.user_id');
        return $this->db->get('schedule')->result_array();
    }

    public function appointments($id)
    {
        $this->db->select('sched_id,id_num,CONCAT(first_name," ",last_name) as name,user_type,course,year,appointment_date');
        $this->db->join('user', 'user.user_id = appointment.user_id');
        $this->db->where('appointment.sched_id', $id);
        return $this->db->get('appointment')->result_array();
    }

    public function getUser($status)
    {
        $this->db->select('id_num,CONCAT(first_name," ",last_name) as name,user_type,course,year, first_name,last_name,
        user_id');
        $this->db->where('status',$status);
        return $this->db->get('user')->result_array();
    }

    public function register($sched_id)
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];
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
    }

    public function appoitnmentPerUser()
    {
        $user_id = $this->session->userdata['logged_in']['user_id'];

        $this->db->select('company_name,schedule.*');
        $this->db->join('schedule', 'schedule.sched_id = appointment.sched_id', 'inner');
        $this->db->join('company', 'company.company_id = schedule.company_id', 'inner');
        $this->db->where('appointment.user_id', $user_id);
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
        $this->db->where('sched_id',$id);
        $this->db->update('schedule');
    }
}