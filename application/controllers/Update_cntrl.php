<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 23/02/2016
 * Time: 11:24
 */
class Update_cntrl extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
    }

    //Fetch selected user
    function index(){
        $id = $this->uri->segment(3);
        $data['all_users'] = $this->Update_model->get_users();
        $data['single_user'] = $this->Update_model->get_user_id($id);

        $this->load->view('Update_view', $data);
    }

    function update_user(){
        $id = $this->input->post('userID');
        $data = array(
            'userName' => $this->input->post('userName'),
            'pass' => $this->input->post('pass')
        );

        $this->Update_model->update_user($id, $data);
        $this->index();
    }
}
