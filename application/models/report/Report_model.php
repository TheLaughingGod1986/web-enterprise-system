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
            'Report_Name' => $this->input->post('report_name'),
            '1.1' => $this->input->post('1_1'),
            '1.2' => $this->input->post('1_2'),
            '1.3' => $this->input->post('1_3'),
            '1.4' => $this->input->post('1_4'),
            '1.5' => $this->input->post('1_5'),
            '1.6' => $this->input->post('1_6'),
            '1.7' => $this->input->post('1_7'),
            '1.8' => $this->input->post('1_8'),
            '1.9' => $this->input->post('1_9'),
            '1.10' => $this->input->post('1_10'),
            '2.1' => $this->input->post('2_1'),
            '2.2' => $this->input->post('2_2'),
            '2.3' => $this->input->post('2_3'),
            '2.4' => $this->input->post('2_4'),
            '2.5' => $this->input->post('2_5'),
            '2.6' => $this->input->post('2_6'),
            '2.7' => $this->input->post('2_7'),
            '2.8' => $this->input->post('2_8'),
            '3.1' => $this->input->post('3_1'),
            '3.2' => $this->input->post('3_2'),
            '4.1' => $this->input->post('4_1'),
            '4.2' => $this->input->post('4_2'),
            '4.3' => $this->input->post('4_3'),
            '5.1' => $this->input->post('5_1'),
            '6.1' => $this->input->post('6_1'),
            '6.2' => $this->input->post('6_2'),
            '6.3' => $this->input->post('6_3')
        );

        $insert = $this->db->insert('report', $new_report);
        return $insert;
    }
    
    function create_comment()
    {
        $new_comment = array(
            'Comments' => $this->input->post('Comments'),
            'ReportID' => $this->input->post('ReportID'),
            'UserID' => $this->session->userdata('UserID')
        );

        $insert = $this->db->insert('Report_Comments', $new_comment);
        return $insert;
    }


    function get_report()
    {
        $query = $this->db->get('report');
        return $query->result();
    }

    function get_comment()
    {
        $query = $this->db->get('Report_Comments');
        return $query->result();
    }
}