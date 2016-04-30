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
        $tabs = $this->uri->segment(5);

        //Obtaining personal Data if logged in
        $personal_type = $this->session->Type;
        $personal_id = $this->session->ID;

        //Verifying whether its personal profile or others
        $other = ($id != null) ? true : false;
        $profile = ($type == 'ee') ? $this->Profile_model->get_ee_id($id) : ($type == 'staff') ? $this->Profile_model->get_staff_id($id) : null;

        //Adding data and styling to the comments and messages
        $messages['data'] = ($type == 'messages' || $type != 'update') ? $this->Profile_model->get_messages($personal_type, $personal_id) : null;
        //$update['data'] = ($type == 'update') ? $this->Profile_model->get_comments($personal_type, $personal_id) : null;

        $messages['style'] = ($type == 'messages' || $type != 'update') ? 'border-bottom:3px solid #8b9dc3;' : null;
        $update['style'] = ($type == 'update') ? 'border-bottom:3px solid #8b9dc3;' : null;
        
        $main['style'] = ($tabs == 'main' || $tabs != 'send') ? 'border-bottom:3px solid #8b9dc3;' : null;
        $send['style'] = ($tabs == 'send') ? 'border-bottom:3px solid #8b9dc3;' : null;


        //applying the variables to the array
        $data['others'] = $other;
    	$data['profile'] = $profile;

        $data['url']['type'] = $type;
        $data['url']['id'] = $id;

        $data['active']['messages']['data'] = $messages['data'];

        $data['active']['messages']['style'] = $messages['style'];
        $data['active']['update']['style'] = $update['style'];

        $data['active']['main']['style'] = $main['style'];
        $data['active']['send']['style'] = $send['style'];

        $data['debug']['personal_id'] = $personal_id;
        $data['debug']['personal_type'] = $personal_type;


        //Loading the view
    	$this->template['middle'] = $this->load->view($this->middle = 'pages/profile_view', $data, true);
        $this->layout();
    }

    function update(){
        $id = $this->session->ID;
        $type = $this->session->Type;

        $user = array(
            'Email' => $this->input->post('Email'),
            'Password' => $this->input->post('Password'),
            'First_Name' => $this->input->post('First_Name'),
            'Last_Name' => $this->input->post('Last_Name')
        );
        $this->Profile_model->update($id, $type, $user);

        $this->session->Email = $user['Email'];
        $this->session->First_Name = $user['First_Name'];
        $this->session->Last_Name = $user['Last_Name'];

        profile();
    }
}
?>