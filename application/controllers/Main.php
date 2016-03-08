<?php

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
        $this->load->helper('array');

        $this->load->model('UManage_model');
    }

    var $template = array();
    var $data = array();

    public function layout () {
        $this->template['header'] = $this->load->view('layout/header', $this->data, true);
        $this->template['left'] = $this->load->view('layout/left', $this->data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->data, true);
        $this->template['footer'] = $this->load->view('layout/footer', $this->data, true);
        $this->load->view('layout/index', $this->template);
    }

    function index()
    {
        $this->middle = 'pages/home_view'; // passing middle to function. change this for different views.
        $this->layout();

    }

    function about()
    {
        $this->middle = 'pages/about_view'; // passing middle to function. change this for different views.
        $this->layout();
    }

    function about()
    {

        $id = $this->uri->segment(3);
        $data['all_users'] = $this->UManage_model->get_users();
        $data['single_user'] = $this->UManage_model->get_user_id($id);

        //Template importation
        $this->load->view('UManage_view', $data);

    }

    //Update users... fetching user from database by id
    function update(){
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

        $this->UManage_model->update_user($id, $data);
        $this->middle = 'pages/update';
        $this->layout();
        $this->load->about();
    }
}