<?php

class Update_cntrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UManage_model');
    }

    function index()
    {
        $data['single_user'] = $this->UManage_model->get_user_id(2);
        $this->load->view('update_view', $data);
    }

    function update()
    {
        $id = 2;
        $data = array(
            'Email' => $this->input->post('Email'),
            'Password' => $this->input->post('Password'),
            'First_Name' => $this->input->post('First_Name'),
            'Last_Name' => $this->input->post('Last_Name'),
            'Postcode' => $this->input->post('Postcode'),
            'Telephone' => $this->input->post('Telephone'),
            'Address' => $this->input->post('Address'),
            'Title' => $this->input->post('Title')
        );
        $this->UManage_model->update_user($id, $data);
        $this->load->index();
    }

}