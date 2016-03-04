<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 23/02/2016
 * Time: 11:36
 */
class Update_model extends CI_Model{
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

    //Update database with new data
    function update_user($id, $data){
        $this->db->where('userID', $id);
        $this->db->update('UserACC', $data);
    }
}