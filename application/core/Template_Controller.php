<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template_Controller extends CI_Controller
{
    var $template = array();
    var $Front_End_data = array();

    public function layout()
    {
        $this->template['header'] = $this->load->view('layout/header', $this->Front_End_data, true);
        $this->template['left'] = $this->load->view('layout/left', $this->Front_End_data, true);
        $this->template['middle'] = $this->load->view($this->middle, $this->Front_End_data, true);
        $this->load->view('layout/index', $this->template);
    }
}