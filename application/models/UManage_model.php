<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select every user on table UserACC
    function get_users(){

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    function get_login($email, $password){

        $this->db->where('Email', $email);
        $this->db->where('Password', $password);

        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data){
//        $this->db->select('*');
//        $this->db->from('staff');
//        $this->db->where('StaffID', $data);
//
//        $dbquery = $this->db->get();
//        $dbresult = $dbquery->result();
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();

//        return $dbresult;
    }
}