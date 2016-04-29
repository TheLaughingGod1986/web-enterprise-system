<?php

/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 26/04/2016
 * Time: 14:55
 */
class Report_model extends CI_Model
{
    function create_report()
    {
        $this->load->helper('date');

        $new_report = array(
            'Report_Name' => $this->input->post('report_name'),
            'Semester 1 Subject Panel' => $this->input->post('1_1'),
            'Semester 2 Subject Panel' => $this->input->post('1_2'),
            'Progression and Award Board' => $this->input->post('1_3'),
            'Approval/Review Panel' => $this->input->post('1_4'),
            'Teaching Practise' => $this->input->post('1_5'),
            'Clinical Assessment' => $this->input->post('1_6'),
            'Viva Voce Examination' => $this->input->post('1_7'),
            'Other' => $this->input->post('1_8'),
            'Section_1_Comments' => $this->input->post('1_9'),
            'Section2_Checkbox_1' => $this->input->post('1_10'),
            'Section2_Checkbox_2' => $this->input->post('2_1'),
            'Section2_Checkbox_3' => $this->input->post('2_2'),
            'Section2_Checkbox_4' => $this->input->post('2_3'),
            'Section2_Checkbox_5' => $this->input->post('2_4'),
            'Section2_Checkbox_6' => $this->input->post('2_5'),
            'Section2_Checkbox_7' => $this->input->post('2_6'),
            'Section2_Comments' => $this->input->post('2_7'),
            'Section3_Checkbox1' => $this->input->post('2_8'),
            'Section3_Comments' => $this->input->post('3_1'),
            'Section4_Checkbox1' => $this->input->post('3_2'),
            'Course Examiners' => $this->input->post('4_1'),
            'Programme Examiners' => $this->input->post('4_2'),
            'Section5_PSRB' => $this->input->post('4_3'),
            'AP_Recommendations' => $this->input->post('5_1'),
            'GoodPractice_Innovation' => $this->input->post('6_2'),
            'Recommendations_Action' => $this->input->post('6_3')
        );

        $insert = $this->db->insert('report', $new_report);
        return $insert;
    }

    function current_date()
    {
        date_default_timezone_set("Europe/London"); // What timezone you want to be the default value for your current date.
        return date('Y-m-d H:i:s');
    }

    function create_comment()
    {
        $this->load->helper('date');
        $comments = $this->input->post('Comments');
        $date = $this->current_date();
        $reportID = $this->input->post('ReportID');
        $userID = $this->session->userdata('LoginID');
        $userID_staff = $this->session->userdata('StaffID');
        if (isset($reportID) && isset($userID)) {
            $new_comment = array(
                'Comments' => isset($comments) ? $comments : "",
                'ReportID' => $reportID,
                'UserID' => $userID,
                'Comment_Date' => $date
            );
            return $this->db->insert('Report_Comments', $new_comment);
        } else if (isset($reportID) && isset($userID_staff)) ;
        {
            $new_comment = array(
                'Comments' => isset($comments) ? $comments : "",
                'ReportID' => $reportID,
                'UserID_Staff' => $userID_staff,
                'Comment_Date' => $date
            );
            return $this->db->insert('Report_Comments', $new_comment);
        }

        return FALSE;
    }

    function old_report_create()
    {
        $this->load->helper('date');
        $comments = $this->input->post('Comments');
        $date = $this->current_date();
        $reportID = $this->input->post('ReportID');
        $userID = $this->session->userdata('LoginID');
        $userID_staff = $this->session->userdata('StaffID');
        if (isset($reportID) && isset($userID)) {
            $new_comment = array(
                'Comments' => isset($comments) ? $comments : "",
                'ReportID' => $reportID,
                'UserID' => $userID,
                'Comment_Date' => $date
            );
            return $this->db->insert('Report_Comments', $new_comment);
        } else if (isset($reportID) && isset($userID_staff)) ;
        {
            $new_comment = array(
                'Comments' => isset($comments) ? $comments : "",
                'ReportID' => $reportID,
                'UserID_Staff' => $userID_staff,
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
        $this->db->select('Report_Comments.Comments, Report_Comments.Comment_Date, Login.Username, staff.Staff_Username')
            ->from('Report_Comments')
            ->join('Login', 'Report_Comments.UserID = Login.LoginID', 'left')
            ->join('staff', 'Report_Comments.UserID_Staff = staff.StaffID', 'left');
        return $result = $this->db->get();
    }
    function get_responses($report_id = null)
    {
        if (isset($report_id)) {
            $this->db->where('ReportID', $report_id);
        }
        $this->db->select('Report_Comments.Comments, Report_Comments.Comment_Date ,staff.Staff_Username')
            ->from('Report_Comments')
            ->join('staff', 'Report_Comments.UserID_Staff = staff.StaffID')
            ->where('UserID_Staff', $this->session->userdata("StaffID"));
        return $result = $this->db->get();
    }
}