<?php
class Profile_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }

    //Select the wanted user from table staff
    function get_user_id($data){
		$this->db->where('ExternalID', $data);
        $query = $this->db->get('external');
        return $query->result();
    }
}
?>