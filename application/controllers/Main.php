<?php

class Main extends CI_Controller
{
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
}