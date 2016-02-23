<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 21/02/2016
 * Time: 13:54
 */

class Delete_model extends CI_Model{
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

    //Delete user with selected id
    function delete_user($id){
        $this->db->where('userID', $id);
        $this->db->delete('UserACC');
    }
}
?>