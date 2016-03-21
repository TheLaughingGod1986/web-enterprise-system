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

        //check user on database
        $userlogged = $this->UManage_model->get_login($email, $pass);

        //check if db returned a valid user or not
        if ($userlogged == FALSE) {

            $this->index();

        } else {
            $userInfo = array(
                'logged_in' => true,
                'username' => $userlogged->Email,
                'ID' => $userlogged->StaffID
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