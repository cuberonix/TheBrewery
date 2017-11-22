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

        public function editProfile($username)
        {

        $username = $this->uri->segment(3);

        if(isset($_POST['upload'])){
        	$this->user_upload();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/editprofile');
        $this->load->view('templates/footer');
        
        if(isset($_POST['updatechanges'])) {
	        if($this->user_model->updateUser($username)) {        		
	        		$this->session->set_flashdata('success', 'Profile updated!');
	        		redirect('profile/user', 'refresh');
	       		}
	       	}

        }

        public function user_upload()
        {
        	$config['upload_path'] = './assets/User_image/'; //The path where the image will be save
		    $config['allowed_types'] = 'gif|jpg|png'; //Images extensions accepted
		    $config['max_size']    = '2048'; //The max size of the image in kb's
		    $config['max_width']  = '1024'; //The max of the images width in px
		    $config['max_height']  = '768'; //The max of the images height in px
		    $config['overwrite'] = TRUE; //If exists an image with the same name it will overwrite. Set to  false if don't want to overwrite
		    $this->load->library('upload', $config); //Load the upload CI library
		    
		    if (!$this->user_upload('userpic')){
		        $uploadError = array('upload_error' => $this->upload->display_errors()); 
		        $this->set_flashdata('uploadError', $uploadError); //If for some reason the upload could not be done, returns the error in a flashdata
		        redirect('profile/editprofile', 'refresh');
		       exit;
		    }
		    $file_info = $this->upload->data('userpic');
		    $file_name = $file_info['file_name']; //Now you got the file name in the $file_name var. Use it to record in db.
        }


	}