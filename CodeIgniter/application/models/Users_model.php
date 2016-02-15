<?php
class Users_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	public function get_users($userName = FALSE){
		if ($userName === FALSE) {
			$query = $this->db->get('UserACC');
			return $query->result_array();
		}

		$query = $this->db->get_where('UserACC', array('userName' => $userName));
		return $query->row_array();
	}
}