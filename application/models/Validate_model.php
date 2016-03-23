<?php

class Validate_model extends CI_Model {

    function validate_admin()
    {
        $this->db->where('Username', $this->input->post('Username'));
        $this->db->where('Password', $this->input->post('Password'));
        $query = $this->db->get('Login');

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    function validate_external()
    {
        $this->db->where('Email', $this->input->post('Email'));
        $this->db->where('Password', $this->input->post('Password'));
        $query = $this->db->get('external');

        if($query->num_rows() == 1)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
}