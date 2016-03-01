<?php
    class Login_cntrl extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->library('session');
        }

        public function index(){
            //Get data from form
            $email = $this->input->post('email');
            $pass = $this->input->post('password');

            // read user's credentials from db, through Login Model
            if ($email == "Email" && $pass == "Password") {
                $this->session->set_userdata('login_state', TRUE);
                $this->load->view('A_login_view');
            } else {
                $this->load->view('A_login_view');    // redirect back to login page
            }
        }
    }


?>