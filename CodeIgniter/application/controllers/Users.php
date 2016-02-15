<?php
class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url_helper');
	}

	public function index(){
		$data['userACC'] = $this->users_model->get_users();
		$data['title'] = 'Users Registred';

		$this->load->view('templates/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('templates/footer');
	}

	public function view ($userName = NULL){
		$data['user_item'] = $this->users_model->get_users($userName);

		if (empty($data['user_item'])) {
			show_404();
		}

		$data['title'] = $data['user_item']['title'];

		$this->load->view('templates/header', $data);
		$this->load->view('users/view', $data);
		$this->load->view('templates/footer');
	}
}