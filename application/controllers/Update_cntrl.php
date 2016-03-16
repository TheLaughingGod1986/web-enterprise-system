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
}
