<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

//    //Select every user on table UserACC
//    function get_users(){
//
//        $dbquery = $this->db->get('staff');
//        $dbresult = $dbquery->result();
//        return $dbresult;
//    }
//
//    //Select the wanted user from table UserACC
//    function get_user_id($data){
////        $this->db->select('*');
////        $this->db->from('staff');
////        $this->db->where('StaffID', $data);
////
////        $dbquery = $this->db->get();
////        $dbresult = $dbquery->result();
//        $this->db->where('StaffID', $data);
//        $query = $this->db->get('staff');
//        return $query->result();
//
////        return $dbresult;
//    }

    //Select user by email and pass
    function get_login($email, $pass){
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('Email', $email);
        $this->db->where('Password', $pass);

        $dbquery = $this->db->get();
        $dbresult = $dbquery->result();

        return $dbresult;
    }

    //Insert data model
    function form_insert($data){
        // Inserting in Table of Database
        $this->db->insert('staff', $data);
    }

    //Delete user with selected id
    function delete_user($id){
        $this->db->where('StaffID', $id);
        $this->db->delete('staff');
    }

    //Update database with new data
    function update_user($id, $data){
        $this->db->where('StaffID', $id);
        $this->db->update('staff', $data);
    }
}