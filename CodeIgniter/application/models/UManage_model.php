<?php
class UManage_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select every user on table UserACC
    function get_users(){
        $dbquery = $this->db->get('UserACC');
        $dbresult = $dbquery->result();
        return $dbresult;
    }

    //Select the wanted user from table UserACC
    function get_user_id($data){
        $this->db->select('*');
        $this->db->from('UserACC');
        $this->db->where('userID', $data);

        $dbquery = $this->db->get();
        $dbresult = $dbquery->result();

        return $dbresult;
    }

    //Insert data model
    function form_insert($data){
        // Inserting in Table of Database
        $this->db->insert('UserACC', $data);
    }

    //Delete user with selected id
    function delete_user($id){
        $this->db->where('userID', $id);
        $this->db->delete('UserACC');
    }

    //Update database with new data
    function update_user($id, $data){
        $this->db->where('userID', $id);
        $this->db->update('UserACC', $data);
    }
}