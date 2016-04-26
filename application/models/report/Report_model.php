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
            'report_name' => $this->input->post('Report_Name'),
          
        );

        $insert = $this->db->insert('report', $new_report);
        return $insert;
    }
}