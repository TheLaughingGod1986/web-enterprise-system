<?php

class Index extends CI_Controller
{
    function index()
    {
        $data['main_content'] = 'index_view';
        $this->load->view('includes/template', $data);
    }

}