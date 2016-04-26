<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 26/04/2016
 * Time: 14:55
 */
class Report_model extends CI_Model {



    function create_report()
    {
        $this->load->helper('date');

        $new_report = array(
            'Report_Name' => $this->input->post('report_name')
        );

        $insert = $this->db->insert('report', $new_report);
        return $insert;
    }
    
    function get_report()
    {
        $query = $this->db->get('report');
        return $query->result();
    }
}