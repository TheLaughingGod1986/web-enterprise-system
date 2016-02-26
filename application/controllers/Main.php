<?php

class Main extends CI_Controller
{
    function index()
    {
        $dataContent['main_content'] = 'pages/home_view';
        $this->load->view('includes/template', $dataContent);
    }

    function about()
    {
        $dataContent['main_content'] = 'pages/about_view';
        $this->load->view('includes/template', $dataContent);
    }

}