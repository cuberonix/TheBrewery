<?php

class Profile extends CI_Controller {
	
		public function index()
        {

        $this->load->view('templates/header');
        $this->load->view('pages/profile');
        $this->load->view('templates/footer');
        }
}