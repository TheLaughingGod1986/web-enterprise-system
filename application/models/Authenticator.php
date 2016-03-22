<?php

class Authenticator extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function checkLogin()
    {

        $logged = $this->session->userdata('login_state');
        if(!isset($logged) || $logged != TRUE)
            $this->template['middle'] = $this->load->view($this->middle = 'A_login_view');
    }
}
