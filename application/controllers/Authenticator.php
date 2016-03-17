<?php

class Authenticator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function authenticate()
    {
        $this->load->helper('helper');

        if ($this->session->userdata('login_state') == FALSE) {
            $this->load->view('A_login_view');
        }
    }
}
