<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Profile_model');
    }

    function profile() {
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', true);
        $this->layout();
    }

    function user() {
    	$id = $this->uri->segment(3);
    	$data['single_user'] = $this->Profile_model->get_user_id($id);
        $this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>