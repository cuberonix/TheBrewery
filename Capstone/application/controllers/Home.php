<?php

class Pages extends CI_Controller {

        public function view()
        {
        	if ( ! file_exists(APPPATH.'views/pages/home.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/home');
        $this->load->view('templates/footer');
        }
}