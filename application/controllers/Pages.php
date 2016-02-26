<?php
class Pages extends CI_Controller{
	public function view($page = 'home'){
		if (! file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
			//If page doesn't exist show the 404 page stating the error
			show_404();
		}
		$data['title'] = ucfirst($page); //Capitalize the first letter

		$this->load->view('templates/header', $dataContent);
		$this->load->view('pages/'.$page, $dataContent);
		$this->load->view('templates/footer', $dataContent);
	}
}