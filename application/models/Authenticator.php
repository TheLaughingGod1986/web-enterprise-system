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

        $logged = $this->session->logged_in;
        if(!isset($logged) || $logged != TRUE) {
            echo 'lol, try again. this area is secure. MEMBERS ONLY !. please ';
            echo anchor('login/index', 'Login');
            die();
        }

    }


}
