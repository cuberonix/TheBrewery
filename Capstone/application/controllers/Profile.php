<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
		public function __construct() {
        	
			parent::__construct();
			$this->load->model('user_model');
			$this->output->nocache();

			if($this->session->userdata('username') == ""){
				redirect("auth/login");
				$this->session->set_flashdata("error", "Please login first to view this page!");
			}
		}

		public function user() {

        	$this->load->library('image_lib');
        	$config['image_library'] = 'gd2';
			$config['source_image'] = './assets/user_image/default/blank_user.png';
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 75;
			$config['height']       = 50;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$id = $this->uri->segment(3);
			$data['users'] = $this->user_model->show_users();	
			$data['id'] = $this->user_model->showUserID($id);
			
			$this->load->view('templates/header');
        	$this->load->view('pages/profile', $data);
    		$this->load->view('templates/footer');
        }

        public function editProfile($username) {
        $username = $_SESSION['username'];

        $this->load->view('templates/header');
        $this->load->view('pages/editprofile', array('error' => ''));
        $this->load->view('templates/footer');
        
        if(isset($_POST['updatechanges'])) {
	        if($this->user_model->updateUser($username)) {        		
	        		$this->session->set_flashdata('success', 'Profile updated!');
	        		redirect('profile/user', 'refresh');
	       		}
	       	}
        }

        public function changePassword($username) {
        	
        	$username = $this->uri->segment(3);

        	$this->load->view('templates/header');
        	$this->load->view('pages/changepassword');
        	$this->load->view('templates/footer');

        	if(isset($_POST['changepasswordbtn'])) {
        		$this->form_validation->set_rules('changepassword', 'New Password', 'required|min_length[6]|max_length[30]');
				$this->form_validation->set_rules('confirmpassword', 'Confirm New Password', 'required|matches[changepassword]');
        		if($this->form_validation->run() == TRUE) {
        			$changepass = md5($_POST['changepassword']);
	        		if($this->user_model->updatePassword($username, $changepass)) {        	
		        		$this->session->set_flashdata('success', 'Password updated!');
		        		redirect('profile/user', 'refresh');
		       		}
		       	}
	       	}
        }

        public function picUpload()
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/picupload', array('error' => '', 'success' => ''));
        	$this->load->view('templates/footer');
        	$username = $_SESSION['username'];

        	$config['upload_path'] = './assets/user_images/'; //The path where the image will be save
		    $config['allowed_types'] = 'gif|jpg|jpeg|png'; //Images extensions accepted
		    //$config['max_size']    = '2048'; //The max size of the image in kb's
		    //$config['max_width']  = '1024'; //The max of the images width in px
		    //$config['max_height']  = '768'; //The max of the images height in px
		    $config['overwrite'] = TRUE; //If exists an image with the same name it will overwrite.
		    $config['file_name']    = $username.".png";
		    
		    $this->load->library('upload', $config); //Load the upload CI library
		    
		    if(isset($_POST['upload'])){
		    if (!$this->upload->do_upload()){             
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pages/picupload/'.$username, $error);
            } else {
               	$file_data = $this->upload->data();
               	$data['img'] = base_url().'/assets/user_images/' . $file_data['file_name'];
               	
               	$fp = fopen($config['upload_path'].$config['file_name'], 'r');
                $datadb = fread($fp, filesize($config['upload_path'].$config['file_name']));
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('username',$username);
                $this->db->insert('profile_picture', $datadb);
                fclose($fp);
               	//$success = "Image uploaded! Nice job, David.";
                $this->load->view('pages/picuploadsucc', $data);
                //$this->session->set_flashdata('success', 'Picture updated!');
			}
		}
        }
        public function user_upload()
        {
        	//$data = ['user_id'] = $user_id;
        	$data['error'] = '';

        	$config['upload_path'] = './assets/User_image/'; //The path where the image will be save
		    $config['allowed_types'] = 'gif|jpg|png'; //Images extensions accepted
		    $config['max_size']    = '2048'; //The max size of the image in kb's
		    $config['max_width']  = '1024'; //The max of the images width in px
		    $config['max_height']  = '768'; //The max of the images height in px
		    $config['overwrite'] = TRUE; //If exists an image with the same name it will overwrite.
		    
		    $this->load->library('upload', $config); //Load the upload CI library
		    
		    if (!$this->upload->do_upload()){             
                $data['error'] = $this->upload->display_errors();   
            } else {
                $this->upload->data();
                // now move the image into the DB
                $fp = fopen($config['upload_path'].$config['file_name'], 'r');
                $data = fread($fp, filesize($config['upload_path'].$config['file_name']));

                $this->db->where('id',$user_id);
                $this->db->update('users',array('profile_picture' => $data));
                fclose($fp);
                // optionally delete the file from the HD after this step
                //unlink($config['upload_path'].$config['file_name']);
			}
        }

        public function securityquestion($username)
        {
        	$this->load->view('templates/header');
        	$this->load->view('pages/securityquestion');
        	$this->load->view('templates/footer');

        }


	}