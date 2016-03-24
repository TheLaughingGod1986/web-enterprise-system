<?php

class Authenticator extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->checkLogin();
    }

    public function checkLoginAdmin()
    {
        $logged_admin = $this->session->is_logged_admin;

            if(!isset($logged_admin) || $logged_admin != TRUE) {
                echo 'Im sorry, you do not have administrator pillages';
                echo anchor('main/index', 'Return home');
                die();
           }
    }
}
