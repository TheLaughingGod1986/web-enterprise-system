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



    //bens start
    function admin_login()
    {
        $this->load->model('Validate_model');
        $query = $this->Validate_model->validate_admin();

        if ($query) // if user cred validate the user session start
        {
            $admin_data = array(
                'Username' => $query->Username,
                'Password' => $query->Password,
                'is_logged_admin' => true
            );

            $this->session->set_userdata($admin_data);
            redirect('main/index');
        } else {
            $this->index();
            echo 'Incorrect Password or Username';
        }
    }

    function external_login()
    {
        $this->load->model('Validate_model');
        $query = $this->Validate_model->validate_external();

        if ($query) // if user cred validate the user session start
        {
            $external_data = array(
                'First_Name' => $query->First_Name,
                'Password' => $query->Password,
                'Email' => $query->Email,
                'ExternalID' => $query->ExternalID,
                'is_logged_external' => true
            );

            $this->session->set_userdata($external_data);
            echo "YOUR IN !";
        } else {
            $this->index();
            echo 'Incorrect Password or Username';
        }
    }
    // bens end



    function logout()
    {
        $this->session->sess_destroy();
        redirect('main/index');
    }
}