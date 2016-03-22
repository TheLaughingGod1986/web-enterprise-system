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
        $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view', true);
    }

    function login(){

        //Get data from form
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->load->library('form_validation');

        //Form validation
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        //check if db returned a valid user or not
        if ($this->form_validation->run() == FALSE) {

            $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view');

        }else {

            //check user on database
            $userlogged = $this->UManage_model->get_login($email, $pass);

            if (!isset($userlogged) || !$userlogged) {

                $this->template['middle'] = $this->load->view($this->middle = 'A_login_view');
            }

            $timer = date(DATE_COOKIE, time());

            $userInfo = array(
                'logged_in' => TRUE,
                'username' => $userlogged->Email,
                'name' => $userlogged-> First_Name,
                'userID' => $userlogged->StaffID,
                'timeStarted' => $timer
            );
            $this->session->set_userdata($userInfo);
            redirect('main/update');
        }

    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->index();
    }
}