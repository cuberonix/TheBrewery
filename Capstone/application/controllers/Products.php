<?php

class Products extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/products.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/products');
        $this->load->view('templates/footer');
        }
}