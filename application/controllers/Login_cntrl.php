<?php

class Login_cntrl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
    }

    public function index()
    {
        $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view', true);
        // why ??
    }

    function login_admin(){

        //Get data from form
        $user_name = $this->input->post('Username');
        $password = $this->input->post('Password');

        $this->load->library('form_validation');

        //Form validation
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|callback_username_exists');

        //check if db returned a valid user or not
        if ($this->form_validation->run() == FALSE) {

            // failed validation
            echo "validation fail";
            redirect('main/index');
//            $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view');

        }else {

            //check user on database
            $userlogged = $this->Login_model->get_login_admin($user_name, $password);

            if (!isset($userlogged) || !$userlogged) {

                $this->template['middle'] = $this->load->view($this->middle = 'A_login_view');
            }

            $timer = date(DATE_COOKIE, time());

            $userInfo = array(
                'logged_in_admin' => TRUE,
                'username' => $userlogged->Username,
                'timeStarted' => $timer
            );
            $this->session->set_userdata($userInfo);
            redirect('main/index');
        }

    }

    function login_external(){

        //Get data from form
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->load->library('form_validation');

        //Form validation
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        //check if db returned a valid user or not
        if ($this->form_validation->run() == FALSE) {

            // failed validation
            $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view');
        }
        else {

            //check user on database
            $userlogged = $this->Login_model->get_login_EE($email, $pass);

            if (!isset($userlogged) || !$userlogged) {

                $this->template['middle'] = $this->load->view($this->middle = 'A_login_view');
            }

            $timer = date(DATE_COOKIE, time());

            $userInfoEE = array(
                'logged_in' => TRUE,
                'username' => $userlogged->Email,
                'name' => $userlogged-> First_Name,
                'userID' => $userlogged->StaffID,
                'timeStarted' => $timer
            );
            $this->session->set_userdata($userInfoEE);
            redirect('main/index');
        }

    }

    function login_staff(){

        //Get data from form
        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $this->load->library('form_validation');

        //Form validation
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        //check if db returned a valid user or not
        if ($this->form_validation->run() == FALSE) {

            // failed validation
            $this->template['middle'] = $this->load->view ($this->middle = 'A_login_view');

        }
        else {

            //check user on database
            $userlogged = $this->Login_model->get_login_staff($email, $pass);

            if (!isset($userlogged) || !$userlogged) {

                $this->template['middle'] = $this->load->view($this->middle = 'A_login_view');
            }

            $timer = date(DATE_COOKIE, time());

            $userInfoStaff = array(
                'logged_in' => TRUE,
                'username' => $userlogged->Email,
                'name' => $userlogged-> First_Name,
                'userID' => $userlogged->StaffID,
                'timeStarted' => $timer
            );
            $this->session->set_userdata($userInfoStaff);
            redirect('main/index');
        }

    }



    function logout()
    {
        $this->session->sess_destroy();
        redirect('main/index');
    }
}