<?php

class Main extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'pages/home_view';
        $this->load->view('includes/template', $data);
    }

    function about()
    {
        $data['main_content'] = 'pages/about_view';
        $this->load->view('includes/template', $data);
    }

}