<?php
class Profile_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select the wanted user from table staff
    function get_ee_id($data){
		$this->db->where('ExternalID', $data);
        $query = $this->db->get('external');
        return $query->result();
    }

    function get_staff_id($data){
		$this->db->where('StaffID', $data);
        $query = $this->db->get('staff');
        return $query->result();
    }

    function get_messages($type, $id){
        $data = "`To` = '$id' AND To_Type = '$type'";
        $this->db->where($data);
        $query = $this->db->get('message');
        return $query->result();
    }

    function post_messages($data){

    }

    function update($id, $type, $data){
        $value = ($type == 'ee') ? 'ExternalID' : ($type == 'staff') ? 'StaffID' : null;
        $table = ($type == 'ee') ? 'external' : ($type == 'staff') ? 'staff' : null;
        $data = $value "= '$id'";
        
        $this->db->where($data);
        $this->db->update($table, $data);
    }
}
