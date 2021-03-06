<?php

class Main extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
        $this->load->model('report/report_model');
        $this->load->library('table');
        $this->load->helper('url');
    }

    function index()
    {
        $data = array();
        
        if ($query = $this->report_model->get_report()) {
            $data['reports'] = $query;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/home_view', $data, true);
        $this->layout();
    }

    function my_reports()
    {
        $data = array();

        if ($query = $this->report_model->get_report()) {
            $data['reports'] = $query;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/reports_view', $data, true);
        $this->layout();
    }

    function my_read_reports()
    {
        $data = array();

        if ($query = $this->report_model->get_read_report()) {
            $data['reports'] = $query;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/read_reports_view', $data, true);
        $this->layout();
    }

    function my_unread_reports()
    {
        $data = array();

        if ($query = $this->report_model->get_unread_report()) {
            $data['reports'] = $query;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/unread_reports_view', $data, true);
        $this->layout();
    }

    function responses()
    {
        $data = array();

        $query = $this->report_model->get_responses($this->uri->segment(3));
        if ($query->num_rows() > 0) {
            $data['reports'] = $query->result();
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/responses_view', $data, true);
        $this->layout();
    }

    function create_report()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('report_name', 'report_name', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message', 'Im sorry, That is not right');
            redirect('main/index');
        } else {

            if ($query = $this->report_model->create_report()) {

                $this->session->set_flashdata('message', 'You added a Report');
                redirect('main/index');
                $this->layout();

            } else {
                $this->session->set_flashdata('message', 'You fucked up');
                redirect('main/index');

                $this->layout();
            }
        }
    }
    
    function comments()
    {
        $data = array();
        $reportID = $this->uri->segment(3);

        $query = $this->report_model->get_comment($reportID);
        if ($query->num_rows() > 0) {
            $data['reports'] = $query->result();
        }

        $qReport = $this->report_model->get_report_id($reportID);
        $data['realReport'] = $qReport->row();

        $this->template['middle'] = $this->load->view($this->middle = 'comments/comment_view', $data, true);
        $this->layout();
    }

    function comment_add()
    {
        if ($query = $this->report_model->create_comment()) {

            $this->session->set_flashdata('messagetwo', 'You added a Comment');
            redirect('main/comments/' . $_POST['ReportID']);

        } else {
            $this->session->set_flashdata('messagetwo', 'Sorry not this time');
            redirect('main/comments/' . $_POST['ReportID']);
        }
    }

    function add_old_report()
    {
        if ($query = $this->report_model->old_report_create()) {

            $this->session->set_flashdata('messagethree', 'You marked report as read, you will no longer see this as unread.');
            redirect('main/comments/' . $_POST['ReportID']);

        } else {
            $this->session->set_flashdata('messagethree', 'Sorry no luck');
            redirect('main/comments/' . $_POST['ReportID']);
        }
    }



    function externals()
    {
        $this->load->model('UManage_model');
        $data['opFaculty'] = $this->UManage_model->get_faculty();
        $this->template['middle'] = $this->load->view($this->middle = 'pages/createUser_view', $data, true);
        $this->layout();
        // no page yet made
    }

    function reports()
    {
        $this->load->model('UManage_model');
        $data['all_users'] = $this->UManage_model->get_users();
        $this->template['middle'] = $this->load->view($this->middle = 'pages/allusers_view', $data, true);
        $this->layout();
        // no page yet made
    }

    function writeResponse(){
        $data = array();

        if ($query = $this->report_model->get_report()) {
            $data['reports'] = $query;
        }

        $this->template['middle'] = $this->load->view($this->middle = 'pages/fill_report', $data, true);
        $this->layout();
    }

    

    function recommendations()
    {
        $this->middle = 'pages/recommendations_view';
        $this->layout();
        // no page yet made
    }

    function psrb()
    {
        $this->middle = 'pages/psrb_view';
        $this->layout();
        // no page yet made
    }

    function analiseofdata()
    {
        $this->middle = 'pages/analise_of_data_view';
        $this->layout();
        // no page yet made
    }

    function missingreports()
    {
        $this->middle = 'pages/missing_reports_view';
        $this->layout();
        // no page yet made
    }

    function update()
    {
        $this->load->model('Authenticator');
        $this->load->model('Update_model');
        $id = $this->session->userID;

        $data['all_users'] = $this->Update_model->get_users();
        $data['single_user'] = $this->Update_model->get_user_id($id);

        $this->template['middle'] = $this->load->view($this->middle = 'pages/update_view', $data, true);
        $this->layout();
    }

    function changelogindetails()
    {
        $this->middle = 'pages/change_login_details_view';
        $this->layout();
        // no page yet made
    }
}