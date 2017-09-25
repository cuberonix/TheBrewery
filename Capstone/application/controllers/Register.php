<?php

class Register extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/register.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
        }
}