<?php

class Update_cntrl extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
    }

    //Select every user on table UserACC
    function get_users()
    {

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data)
    {
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }

    //Update users... fetching user from database by id
    function update_user()
    {
        $this->load->library('form_validation');


        $config = array(
          array(
              'field' => 'firstname',
              'label' => 'Firstname',
              'rules' => 'required'
          ),
            array(
                'field' => 'lastname',
                'label' => 'lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'Title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
              'field' => 'Email',
                'lable' => 'Email',
                'rules' => 'required|valid_email|is_unique[all_users.email]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required',
                array(
                    'required' => 'You must provide a %s.',
                ),
            ),
            array(
                'field' => 'passConfirm',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[Password]'
            )
        );

        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == false){

            $id = $this->uri->segment(3);
            $data['all_users'] = $this->Update_model->get_users();
            $data['single_user'] = $this->Update_model->get_user_id($id);

            $this->template['middle'] = $this->load->view ($this->middle = 'pages/update_view',$data, true);
            $this->layout();

        } else {
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

            $this->Update_model->update_user($id, $data);
            $id = $this->uri->segment(3);
            $data['all_users'] = $this->Update_model->get_users();
            $data['single_user'] = $this->Update_model->get_user_id($id);
//        // This is a hack, naughty Ben ....but it may work ... hehehe
            $this->template['middle'] = $this->load->view ($this->middle = 'pages/update_view',$data, true);
            $this->layout();
        }

    }
}
