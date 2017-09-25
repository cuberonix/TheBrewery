<?php

class Profile extends CI_Controller {
	
		public function __construct()
		{	
			parent::__construct();

			if($_SESSION['loggedin'] = FALSE){
				$this->session->set_flashdata("error", "Please login first to view this page!");
				redirect("auth/login");
			}
		}

		public function user()
        {
        
	        if($_SESSION['loggedin'] = FALSE){
					$this->session->set_flashdata("error", "Please login first to view this page!");
					redirect("auth/login");
			}

        $this->load->view('templates/header');
        $this->load->view('pages/profile');
        $this->load->view('templates/footer');
        }
}