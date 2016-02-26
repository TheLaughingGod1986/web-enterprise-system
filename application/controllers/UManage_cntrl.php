<?php

class UManage_cntrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UManage_model');
    }

    //Fetch selected user
    function index()
    {
        $id = $this->uri->segment(3);
        $data['all_users'] = $this->UManage_model->get_users();
        $data['single_user'] = $this->UManage_model->get_user_id($id);

        $this->load->view('UManage_view', $data);

        //Template importation
        $dataContent['main_content'] = 'UManage_view';
        $this->load->view('includes/template', $dataContent);


    }

    //Insert users form
    function insert_user() {

        //Including validation library
        $this->load->library('form_validation');

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        //Validating Name Field
        $this->form_validation->set_rules('Email', 'Email', 'required|min_length[5]|max_length[15]');

        //Validating Address Field
        $this->form_validation->set_rules('Password', 'Password', 'required|min_length[5]|max_length[50]');

        if ($this->form_validation->run() == FALSE) {
            $this->index;
        } else {
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
            //Transfering data to Model
            $this->UManage_model->form_insert($data);
            $data['message'] = 'Data Inserted Successfully';
            //Loading View
            $this->index();
        }
    }

    //Delete selected user from database
    function delete_user(){
        $id = $this->uri->segment(3);
        $this->UManage_model->delete_user($id);

        $this->index();
    }

    //Update users... fetching user from database by id
    function update_user(){
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

        $this->UManage_model->update_user($id, $data);
        $this->index();
    }

}