<?php

class About extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/about.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/about');
        $this->load->view('templates/footer');
        }
}