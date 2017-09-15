<?php

class News extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/news.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/news');
        $this->load->view('templates/footer');
        }
}