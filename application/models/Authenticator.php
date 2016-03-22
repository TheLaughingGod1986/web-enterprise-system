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

//        $is_logged_in = $this->session->userdata('is_logged_in');
//
//        if (!isset($is_logged_in) || $is_logged_in != true) {
//            echo 'lol, try again. this area is secure. MEMBERS ONLY !. please ';
//            echo anchor('login/index', 'Login');
//            die();
//        }
    }
}
