<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recruitments_model extends CI_Model
{
    public function saveCompany(){
        $company = $this->input->post('company');
        $address = $this->input->post('add_num').','.$this->input->post('street').' '.$this->input->post('province').
            ','.$this->input->post('city');
        $suffix = $this->input->post('suffix');
        $contact = $this->input->post('contact_firstname').' '.
            $this->input->post('contact_middlename').' '.$this->input->post('contact_lastname');
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

        $this->db->insert('company',$data);
    }
    public function companies($stat){
        if($stat === '0'){
            $status = 'registered';
        }else{
            $status = 'archived';
        }
        $query = $this->db->where('status',$status)->get('company')->result_array();
        return $query;
    }
    public function setCompanyStatus($id){
        $this->db->set('status','archived')->where('company_id',$id)->update('company');
    }
}