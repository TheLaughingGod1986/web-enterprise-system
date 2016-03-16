<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends Template_Controller {
    public function index() {
        $this->middle = 'pages/home_view'; // passing middle to function. change this for different views.
        $this->layout();
    }
}