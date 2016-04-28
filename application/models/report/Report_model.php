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

    function current_date() {
        date_default_timezone_set ("Europe/London"); // What timezone you want to be the default value for your current date.
        return date('Y-m-d H:i:s');
    }

    function create_comment()
    {
        $this->load->helper('date');

        $comments = $this->input->post('Comments');
        $date = $this->current_date();
        $reportID = $this->input->post('ReportID');
        $userID = $this->session->userdata('LoginID');
        if(isset($reportID) && isset($userID))
        {
            $new_comment = array(
                'Comments' => isset($comments) ? $comments : "",
                'ReportID' => $reportID,
                'UserID' => $userID,
                'Comment_Date' => $date
            );
            return $this->db->insert('Report_Comments', $new_comment);
        }
        return FALSE;
    }

    function get_report()
    {
        $query = $this->db->get('report');
        return $query->result();
    }

    function get_comment($report_id = null)
    {
        if (isset($report_id)) {
            $this->db->where('ReportID', $report_id);
        }
        $this->db->select('Report_Comments.Comments, Report_Comments.Comment_Date, Login.Username')
            ->from('Report_Comments')
            ->join('Login', 'Report_Comments.UserID = Login.LoginID');
        return  $result = $this->db->get();
    }
}