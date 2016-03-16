<?php
class Main extends CI_Controller
{
    var $data = array();
    var $Front_End_data = array();
    var $template = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
        $this->load->helper('array');
    }

    public function layout()
    {
        $this->template['header'] = $this->load->view('layout/header', $this->Front_End_data, true);
        $this->template['left'] = $this->load->view('layout/left', $this->Front_End_data, true);
//        $this->template['middle'] = $this->load->view($this->middle, $this->Front_End_data, true);
        $this->load->view('layout/index', $this->template);
    }

    function index()
    {
        $this->middle = 'pages/home_view';
        $this->layout();
    }

    function update()
    {
        $id = 2;
        $data['all_users'] = $this->Update_model->get_users();
        $data['single_user'] = $this->Update_model->get_user_id($id);

// This is a hack, naughty Ben ....but it may work ... hehehe
//        $this->template['middle'] = $this->load->view($this->middle = 'pages/update_view', $data, $id, true);
//        $this->layout();
    }
}