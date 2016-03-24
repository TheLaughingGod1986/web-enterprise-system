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
        $logged_admin = $this->session->is_logged_admin;
//        $logged_external = $this->session->is_logged_external;
//        $logged_staff = $this->session->is_logged_staff;

            if(!isset($logged_admin) || $logged_admin != TRUE) {
                echo 'Im sorry, you do not have administrator pillages';
                echo anchor('main/index', 'Return home');
                die();
           }
//            else if(!isset($logged_external) || $logged_external != TRUE) {
//                echo 'Im sorry, you do not have external pillages';
//                echo anchor('main/index', 'Return home');
//            }
//            else if(!isset($logged_staff) || $logged_staff != TRUE) {
//                echo 'Im sorry, you do not have staff pillages';
//                echo anchor('main/index', 'Return home');
//            }
    }
}
