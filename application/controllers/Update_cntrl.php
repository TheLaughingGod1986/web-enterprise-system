<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 23/02/2016
 * Time: 11:24
 */
class Update_cntrl extends CI_Controller{

    var $data = array();
    var $Front_End_data = array();
    var $template = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('Update_model');
    }

    //Select every user on table UserACC
    function get_users(){

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data){
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }

    public function layout()
    {
        $this->template['header'] = $this->load->view('layout/header', $this->Front_End_data, true);
        $this->template['left'] = $this->load->view('layout/left', $this->Front_End_data, true);
//        $this->template['middle'] = $this->load->view($this->middle, $this->Front_End_data, true);
        $this->load->view('layout/index', $this->template);
    }

    function index()
    {
        $this->load->model('Update_model');
        $id = 2;
        $data['all_users'] = $this->Update_model->get_users();
        $data['single_user'] = $this->Update_model->get_user_id($id);

        $this->template['middle'] = $this->load->view($this->middle = 'pages/update_view', $data, $id, true);
        $this->layout();
    }
}
