<?php

class Profile extends CI_Controller {
	
		public function __construct()
		{	
			parent::__construct();
			$this->load->model('user_model');

			if($this->session->userdata('username') == ""){
				redirect("auth/login");
				$this->session->set_flashdata("error", "Please login first to view this page!");
			}
		}

		public function user()
        {     

				$id = $this->uri->segment(3);
				$data['users'] = $this->user_model->show_users();	
				$data['id'] = $this->user_model->showUserID($id);
				
				$this->load->view('templates/header');
        		$this->load->view('pages/profile', $data);
        		$this->load->view('templates/footer');
        }

        public function editProfile()
        {
        $this->load->view('templates/header');
        $this->load->view('pages/editprofile');
        $this->load->view('templates/footer');

        $id = $this->uri->segment(3);
        
        if(isset($_POST['updatechanges'])) {
	        	if($this->user_model->getUser($id)) {        		
	        		$this->session->set_flashdata('success', 'Profile updated!');
	        		redirect('profile', 'refresh');
	       		}
	       	}

        }



	}