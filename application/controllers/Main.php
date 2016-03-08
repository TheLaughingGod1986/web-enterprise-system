<?php

class Main extends CI_Controller
{
    var $data = array();
    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
        $this->load->helper('array');

      $this->load->model('Update_model');
        $id = $this->uri->segment(3);
        $data['all_users'] = $this->Update_model->get_users();
//        $data['single_user'] = $this->UManage_model->get_user_id($id);
    }

    var $template = array();


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
        $this->middle = 'pages/update_view'; // passing middle to function. change this for different views.
        $this->layout();

        $id = 2;
        $this->Update_model->get_users();
        $this->Update_model->get_user_id($id);
//        echo 'data variable: '.random_element($data22);
//        $this->middle = 'pages/update_view.php'; // passing middle to function. change this for different views.
//        $this->layout();

    }
}