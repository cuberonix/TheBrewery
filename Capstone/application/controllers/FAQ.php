<?php

class FAQ extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/faq.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/faq');
        $this->load->view('templates/footer');
        }
}