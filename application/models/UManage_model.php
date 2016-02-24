<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select every user on table UserACC
    function get_users(){
        $dbquery = $this->db->get('Staff');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data){
        $this->db->select('*');
        $this->db->from('Staff');
        $this->db->where('StaffID', $data);

        $dbquery = $this->db->get();
        $dbresult = $dbquery->result();

        return $dbresult;
    }

    //Insert data model
    function form_insert($data){
        // Inserting in Table of Database
        $this->db->insert('Staff', $data);
    }

    //Delete user with selected id
    function delete_user($id){
        $this->db->where('StaffID', $id);
        $this->db->delete('Staff');
    }

    //Update database with new data
    function update_user($id, $data){
        $this->db->where('StaffID', $id);
        $this->db->update('Staff', $data);
    }
}