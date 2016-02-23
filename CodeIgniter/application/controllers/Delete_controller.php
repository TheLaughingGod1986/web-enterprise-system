<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 21/02/2016
 * Time: 14:15
 */

class Delete_controller extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Delete_model');
    }

    //Fetch selected user
    function index(){
        $id = $this->uri->segment(3);
        $data['all_users'] = $this->Delete_model->get_users();
        $data['single_user'] = $this->Delete_model->get_user_id($id);

        $this->load->view('Delete_view', $data);
    }

    //Delete selected user from database
    function delete_user(){
        $id = $this->uri->segment(3);
        $this->Delete_model->delete_user($id);

        $this->index();
    }
}
?>