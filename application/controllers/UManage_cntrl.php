<?php

//Check for is user is valid
require_once(APPPATH.'controllers/Authenticator.php');

class UManage_cntrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UManage_model');
    }


//    var $Front_End_data = array();
//    var $template = array();
//
//    public function layout () {
//        $this->template['header'] = $this->load->view('layout/header', $this->Front_End_data, true);
//        $this->template['left'] = $this->load->view('layout/left', $this->Front_End_data, true);
//        $this->load->view('layout/index', $this->template);
//
//    }

    //Fetch selected user
    /*function index()
    {

        $id = $this->uri->segment(3);
        $data['all_users'] = $this->UManage_model->get_users();
        $data['single_user'] = $this->UManage_model->get_user_id($id);

        //Template importation
        $this->load->view('UManage_view', $data);
//        $this->middle 'UManage_view' $data; // passing middle to function. change this for different views.
//        $this->layout();
    }*/

    //Insert users form
    function insert_user() {

        //Including validation library
        $this->load->library('form_validation');

        $where = $this->input->post('role');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('createUser_view');

        } elseif($where == 'Staff' || $where == 'Admin'){
            //Setting values for table columns
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

            //Insert into table staff
            $this->UManage_model->insert_user($data, 'staff');
            $data['message'] = 'Staff Created Successfully';
            //Loading View
            $this->load->view('createUser_view', $data);

        } elseif($where == 'EE'){
            $data = array(
                'Email' => $this->input->post('Email'),
                'Password' => $this->input->post('Password'),
                'First_Name' => $this->input->post('First_Name'),
                'Last_Name' => $this->input->post('Last_Name'),
                'Postcode' => $this->input->post('Postcode'),
                'Telephone' => $this->input->post('Telephone'),
                'HEI' => $this->input->post('hei'),
                'Address' => $this->input->post('Address'),
                'Title' => $this->input->post('Title'),
                'Faculty' => $this->input->post('faculty'),
                'Department' => $this->input->post('depart')
            );
            $this->UManage_model->insert_user($data, 'external');
            $data['message'] = 'External Examiner Created Successfully';
            //Loading View
            $this->load->view('createUser_view', $data);

        } else{
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => $this->input->post('Password')
            );
            $this->UManage_model->insert_user($data, 'login');
            $data['message'] = 'Admin Created Successfully';
            //Loading View
            $this->load->view('createUser_view', $data);
        }

    }

    //Delete selected user from database
    function delete_user(){
        $id = $this->uri->segment(3);
        $this->UManage_model->delete_user($id);

        $this->load->view('UManage_view');
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

//        // This is a hack, naughty Ben ....but it may work ... hehehe
//        $this->template['middle'] = $this->load->view ($this->middle = 'UManage_view',$data, $id, true);
//        $this->layout();
    }

}