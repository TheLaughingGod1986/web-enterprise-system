<?php

class Authenticator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('helper');
    }

    public function index()
    {

        if ($this->session->userdata('login_state') == FALSE) {
            $this->load->view('A_login_view');
        }
    }
}
