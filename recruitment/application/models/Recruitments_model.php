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

        $data = array(
            'contact_person' => $contact,
            'address' => $address,
            'company_name' => $company,
            'suffix' => $suffix,
            'email' => $email,
            'tel_num' => $tel,
            'mobile_num' => $mobile,
            'alt_number' => $alt
        );

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
        return $this->db->update('company',$data,'company_id='.$id);
    }
    public function addSched(){
        $data = array(
            'company_id'=>$this->input->post('company'),
            'sched_type'=>'Exam',
            'event_type'=>$this->input->post('event'),
            'sched_date'=>$this->input->post('date'),
            'start_time'=>$this->input->post('start'),
            'end_time'=>$this->input->post('end'),
            'location'=>$this->input->post('location'),
            'room'=>$this->input->post('room'),
            'slots'=>$this->input->post('slots')
        );
    $this->db->insert('schedule',$data);
    }
    public function getSched($eventType){
        $this->db->join('company','company.company_id = schedule.company_id','inner');
        if($eventType !== 'All'){
            $this->db->where('event_type',$eventType);
        }
        return $this->db->get('schedule')->result_array();
    }
}