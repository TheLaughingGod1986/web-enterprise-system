<?php

class UManage_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UManage_model');
    }

    //Insert users form
    function insert_user() {

        //Including validation library
        $this->load->library('form_validation');

        $where = $this->input->post('role');

        if($where == 'Admin'){

            $this->form_validation->set_rules('apassword', 'Password', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required');

        } elseif($where == 'Staff'){

            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'First_Name',
                    'label' => 'First Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'Last_Name',
                    'label' => 'Last Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'postal',
                    'label' => 'Post-Code',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'phone',
                    'label' => 'Telephone',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);

        } elseif($where == 'EE'){

            $config = array(
                array(
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'First_Name',
                    'label' => 'First Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'Last_Name',
                    'label' => 'Last Name',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'postal',
                    'label' => 'Post-Code',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'phone',
                    'label' => 'Telephone',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'hei',
                    'label' => 'HEI',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ),
                array(
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'faculty',
                    'label' => 'Faculty',
                    'rules' => 'required'
                ),
                array(
                    'field' => 'depart',
                    'label' => 'Department',
                    'rules' => 'required'
                )
            );

            $this->form_validation->set_rules($config);

        }

        if ($this->form_validation->run() == FALSE) {
            $data['message'] = 'Error';
            $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view',$data, true);
            $this->layout();

        } elseif($where == 'Staff'){
            //Setting values for table columns
            $data = array(
                'Email' => $this->input->post('Email'),
                'Password' => $this->input->post('Password'),
                'First_Name' => $this->input->post('First_Name'),
                'Last_Name' => $this->input->post('Last_Name'),
                'Postcode' => $this->input->post('Postcode'),
                'Telephone' => $this->input->post('Telephone'),
                'Address' => $this->input->post('Address'),
                'Title' => $this->input->post('Title')
            );

            //Insert into table staff
            $this->UManage_model->insert_user($data, 'staff');
            $data['message'] = 'Staff Created Successfully';
            //Loading View
            $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view',$data, true);
            $this->layout();

        } elseif($where == 'EE'){
            $data = array(
                'Email' => $this->input->post('Email'),
                'Password' => $this->input->post('Password'),
                'First_Name' => $this->input->post('First_Name'),
                'Last_Name' => $this->input->post('Last_Name'),
                'Postcode' => $this->input->post('Postcode'),
                'Telephone' => $this->input->post('Telephone'),
                'HEI' => $this->input->post('hei'),
                'Address' => $this->input->post('Address'),
                'Title' => $this->input->post('Title'),
                'Faculty' => $this->input->post('faculty'),
                'Department' => $this->input->post('depart')
            );
            $this->UManage_model->insert_user($data, 'external');
            $data['message'] = 'External Examiner Created Successfully';
            //Loading View
            $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view',$data, true);
            $this->layout();

        } else{
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => $this->input->post('Password')
            );
            $this->UManage_model->insert_user($data, 'login');
            $data['message'] = 'Admin Created Successfully';
            //Loading View
            $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view',$data, true);
            $this->layout();
        }

    }

    //Delete selected user from database
    function delete_user(){
        $id = $this->uri->segment(3);
        $this->UManage_model->delete_user($id);
        $data['message'] = 'User deleted';
        $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view',$data, true);
        $this->layout();
    }

    function getUser_id(){
        $id = $this->uri->segment(3);
        $data['single_user'] = $this->UManage_model->get_user_id($id);
        $data['all_users'] = $this->UManage_model->get_users();
        $data['message']='User loaded';

        $this->template['middle'] = $this->load->view($this->middle = 'pages/update_view', $data, true);
        $this->layout();
    }

    //Update users... fetching user from database by id
    function update_staff(){
        $id = $this->input->post('StaffID');
        $data = array(
            'Email' => $this->input->post('Email'),
            'Password' => $this->input->post('Password'),
            'First_Name' => $this->input->post('First_Name'),
            'Last_Name' => $this->input->post('Last_Name'),
            'Postcode' => $this->input->post('Postcode'),
            'Telephone' => $this->input->post('Telephone'),
            'Address' => $this->input->post('Address'),
            'Title' => $this->input->post('Title')
        );
    }

    function ajaxTry(){
        $a = $this->uri->segment(3);
        $data = $this->UManage_model->get_depart($a);
        echo json_encode($data);
    }
}