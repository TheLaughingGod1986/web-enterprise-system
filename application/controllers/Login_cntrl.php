<?php

class Login_cntrl extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_model');
        $this->load->model('Validate_model');
    }

    function admin_login()
    {
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
        $query = $this->Validate_model->validate_external();

        if ($query) // if user cred validate the user session start
        {
            $external_data = array(
                'First_Name' => $query->First_Name,
                'Password' => $query->Password,
                'Email' => $query->Email,
                'is_logged_external' => true
            );

            $this->session->set_userdata($external_data);
            redirect('main/index');
        } else {
            $this->index();
            echo 'Incorrect Password or Username';
        }
    }

    function staff_login()
    {
        $query = $this->Validate_model->validate_staff();
        if ($query) // if user cred validate the user session start
        {
            $staff_data = array(
                'First_Name' => $query->First_Name,
                'Password' => $query->Password,
                'Email' => $query->Email,
                'accessLevel' => $role->RoleID,
                'is_logged_staff_1' => true
            );

            $this->session->set_userdata($staff_data);
            redirect('main/index');
        }

        else {
            $this->index();
            echo 'Incorrect Password or Username';
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('main/index');
    }
}