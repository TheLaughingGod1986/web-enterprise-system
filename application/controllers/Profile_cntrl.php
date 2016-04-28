<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    function profile() {
    	$type = $this->uri->segment(3);
    	$id = $this->uri->segment(4);

        $personal_type = $this->session->Type;
        $personal_id = $this->session->ID;

        $other = ($id != null) ? true : false;
        $profile = ($type == 'ee') ? $this->Profile_model->get_ee_id($id) : ($type == 'staff') ? $this->Profile_model->get_staff_id($id) : ($type == 'messages') ? $this->Profile_model->get_messages($personal_type, $personal_id) : ($type == 'comments') ? $this->Profile_model->get_comments($personal_type, $personal_id) : null;
        $messages = ($type == 'messages') ? 'border-bottom:3px solid #8b9dc3;' : ($type != 'comments') ? 'border-bottom:3px solid #8b9dc3;' : null;
        $comments = ($type == 'comments') ? 'border-bottom:3px solid #8b9dc3;' : null;

    	
        $data['others'] = $other;
    	$data['profile'] = $profile;
        $data['active']['messages'] = $messages;
        $data['active']['comments'] = $comments;

    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>