<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    function profile() {
    	$id = ($this->uri->segment(3))?$this->uri->segment(3):false;
    	$data['profile'] = ($id != false)?$this->Profile_model->get_user_id($id):false;
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>