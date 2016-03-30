<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select the wanted user from table staff
    function get_user_id($data){
        $this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }

    //Select every user on table staff
    function get_users(){
        $dbquery = $this->db->get('staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //get faculty
    function get_faculty(){
        $dbquery = $this->db->get('faculty');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //get department
    function get_depart($id){
        $this->db->where('Faculty_ID', $id);
        $dbquery = $this->db->get('department');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Check given data if is a valid user to login
    function get_login($email, $password){

        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
        $dbquery = $this->db->get('staff');

        $dbresult = $dbquery->row();

        if($dbquery->num_rows() == 1){
            return $dbresult;
        }
        else{
            return false;
        }
    }

    //Check given data if is a valid user to login
    function get_login_EE($email, $password){

        $this->db->where('Email', $email);
        $this->db->where('Password', $password);
        $dbquery = $this->db->get('external');

        $dbresult = $dbquery->row();

        if($dbquery->num_rows() == 1){
            return $dbresult;
        }
        else{
            return false;
        }
    }

    //Create EE/Admin/Staff
    function insert_user($data, $table)
    {
        $this->db->insert($table, $data);
    }

    //Delete staff
    function delete_user($id){
        $this->db->where('StaffID', $id);
        $this->db->delete('staff');
    }

    //Update staff
    function update_user($id, $data)
    {
        $this->db->where('StaffID', $id);
        $this->db->update('staff', $data);
    }

    //get them all from 3 tables
    function get_3tables($src){
        $query = "SELECT *
                FROM staff, external, Login
                WHERE staff.First_Name LIKE '%$src%' OR staff.Last_Name LIKE '%$src%' OR external.First_Name LIKE '%$src%' OR external.Last_Name LIKE '%$src%' OR Login.Username LIKE '%$src%'";
        $result = $this->db->query($query);
        return $result->result();
    }

    //insert token
    // function insert_token($id, $table){
    //     $this->db->insert($table, $data);        
    // }
}