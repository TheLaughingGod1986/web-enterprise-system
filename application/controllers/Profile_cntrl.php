<?php
class Profile_cntrl extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    function profile() {
        //Obtaining URL segments as data
    	$type = $this->uri->segment(3);
    	$id = $this->uri->segment(4);

        //Obtaining personal Data if logged in
        $personal_type = $this->session->Type;
        $personal_id = $this->session->ID;

        //Verifying whether its personal profile or others
        $other = ($id != null) ? true : false;
        $profile = ($type == 'ee') ? $this->Profile_model->get_ee_id($id) : ($type == 'staff') ? $this->Profile_model->get_staff_id($id) : null;

        //Adding data and styling to the comments and messages
        $messages['data'] = ($type == 'messages' || $type != 'comments') ? $this->Profile_model->get_messages($personal_type, $personal_id) : null;
        $comments['data'] = ($type == 'comments') ? $this->Profile_model->get_comments($personal_type, $personal_id) : null;

        $messages['style'] = ($type == 'messages' || $type != 'comments') ? 'border-bottom:3px solid #8b9dc3;' : null;
        $comments['style'] = ($type == 'comments') ? 'border-bottom:3px solid #8b9dc3;' : null;


        //applying the variables to the array
        $data['others'] = $other;
    	$data['profile'] = $profile;

        $data['active']['messages']['data'] = $messages['data'];
        $data['active']['comments']['data'] = $comments['data'];

        $data['active']['messages']['style'] = $messages['style'];
        $data['active']['comments']['style'] = $comments['style'];


        //Loading the view
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }
}
?>