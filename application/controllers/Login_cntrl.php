<?php

class Login_cntrl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('UManage_model');
    }

    public function index()
    {
        //Get data from form
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        //check user on database
        $userlogged = $this->UManage_model->get_login($email, $pass);

        // read user's credentials from db, through Login Model
        if (isset($userlogged)) {
            $this->session->set_userdata('login_state', TRUE);
            $this->load->view('pages/home_view');
        } else {
            $this->load->view('A_login_view');    // redirect back to login page
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login_cntrl');
        $this->index();
    }
}