<?php

class Main extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
        $this->load->helper('array');
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

    function update()
    {
        $id = 2;
        $data22['all_users'] = $this->Update_model->get_users();
        $data22['single_user'] = $this->Update_model->get_user_id($id);
        echo 'data variable: '.random_element($all_users);
        $this->middle = 'pages/update_view.php'; // passing middle to function. change this for different views.
        $this->layout();
    }
}