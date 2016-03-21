<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select every user on table staff
    function get_users(){
        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Check given data if is a valid user to login
    function get_login($email, $password){

        $this->db->where('Email', $email);
        $this->db->where('Password', $password);

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();

        if($dbresult->num_rows() == 1){
            return $dbresult;
        }
        else{
            return FALSE;
        }

    }

    //Select the wanted user from table staff
    function get_user_id($data){
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }
}