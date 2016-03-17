<?php

class Main extends MY_Controller {

//    var $data = array();

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
    }

    function index()
    {
        $this->middle = 'pages/home_view';
        $this->layout();
    }

    function update()
    {
        $this->load->model('Update_model');
        $id = 2;
        $data['all_users'] = $this->Update_model->get_users();
        $data['single_user'] = $this->Update_model->get_user_id($id);
        $this->middle = 'pages/update_view';

//        $this->load->view($this->middle = 'pages/update_view', $data);
        $this->template['middle'] = $this->load->view ($this->middle = 'pages/update_view',$data, true);
        $this->layout();
    }
}