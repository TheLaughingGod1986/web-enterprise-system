<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    function profile() {
    	$id = $this->uri->segment(4);
    	$type = $this->uri->segment(3);
    	$data['others'] = ($id != null) ? true : false;
    	$data['profile'] = ($type == 'ee') ? $this->Profile_model->get_ee_id($id) : ($type == 'staff') ? $this->Profile_model->get_staff_id($id) : null;
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>