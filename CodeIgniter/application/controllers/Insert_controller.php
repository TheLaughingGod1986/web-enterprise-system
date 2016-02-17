<?php
/**
 * Created by PhpStorm.
 * User: ruifurtado
 * Date: 16/02/2016
 * Time: 22:11
 */

    class Insert_controller extends CI_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('Insert_model');
        }

        function index() {

            //Including validation library
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

            //Validating Name Field
            $this->form_validation->set_rules('userName', 'Username', 'required|min_length[5]|max_length[15]');

            //Validating Address Field
            $this->form_validation->set_rules('pass', 'Password', 'required|min_length[5]|max_length[50]');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('Insert_view');
            } else {
                //Setting values for table columns
                $data = array(
                    'userName' => $this->input->post('userName'),
                    'pass' => $this->input->post('pass')
                );
                //Transfering data to Model
                $this->Insert_model->form_insert($data);
                $data['message'] = 'Data Inserted Successfully';
                //Loading View
                $this->load->view('Insert_view', $data);
            }
        }

    }
?>