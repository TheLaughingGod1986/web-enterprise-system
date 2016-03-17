<?php

class Update_cntrl extends CI_Controller{

//    var $data = array();
//    var $Front_End_data = array();
//    var $template = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
    }

    //Select every user on table UserACC
    function get_users(){

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data){
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }

    //Update users... fetching user from database by id
    function update_user(){
        $id = $this->input->post('StaffID');
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

        $this->load->model->update_user($id, $data);
//        // This is a hack, naughty Ben ....but it may work ... hehehe
        $this->template['middle'] = $this->load->view ($this->middle = 'update_view',$data, true);
        $this->layout();
    }

//    public function layout()
//    {
//        $this->template['header'] = $this->load->view('layout/header', $this->Front_End_data, true);
//        $this->template['left'] = $this->load->view('layout/left', $this->Front_End_data, true);
//        $this->template['middle'] = $this->load->view($this->middle, $this->Front_End_data, true);
//        $this->load->view('layout/index', $this->template);
//    }

//    function index()
//    {
//        $this->load->model('Update_model');
//        $id = 2;
//        $data['all_users'] = $this->Update_model->get_users();
//        $data['single_user'] = $this->Update_model->get_user_id($id);
//
//        $this->template['middle'] = $this->load->view($this->middle = 'pages/update_view', $data, $id, true);
////        $this->load->view($this->middle = 'pages/update_view', $data, $id, true);
//        $this->layout();
//    }
}
