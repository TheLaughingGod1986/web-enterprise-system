<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    function profile() {
    	$data['profile_my'] = true;
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }

    function user() {
    	$id = $this->uri->segment(3);
    	$data['profile_other'] = $this->Profile_model->get_user_id($id);
        $this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>