<?php

class Auth extends CI_Controller {

	public function login()
	{
        $this->load->view('templates/header');
        $this->load->view('pages/login');
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()== TRUE){
        	
        	$username =$_POST['username'];
        	$password = md5($_POST['password']);

        	$this->db->select('*');
        	$this->db->from('users');
        	$this->db->where(array('username' => $username, 'password' => $password));
        	$query = $this->db->get();

        	$user = $query->row();

        	if($user->email){
        			$this->session->set_flashdata("success", "You are now logged in.");

        			$_SESSION['user_logged'] = TRUE;
        			$_SESSION['username'] = $user->username;

        			redirect("profile/user", "refresh");
        	} else {
                redirect("auth/login", "refresh");
        		$this->session->set_flashdata("error", " There was an error. Please try again.");
        		redirect("auth/login", "refresh");
        	}
        }
	}

	public function logout()
	{
		unset($_SESSION);
		session_destroy();
		redirect("auth/login", "refresh");

		$this->load->view('templates/header');
        $this->load->view('pages/login');
        $this->load->view('templates/footer');
	}

	public function register()
	{
		$this->load->view('templates/header');
		date_default_timezone_set("America/New_York");

        if(isset($_POST['register'])){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');
			$this->form_validation->set_rules('password1', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]');
			
			if($this->form_validation->run() == TRUE){

				$data = array(
					'username' => $_POST['username'],
					'password' => md5($_POST['password']),
					'email' => $_POST['email'],
					'register_date' => date('Y-m-d h:i:sa')
					);
				$this->db->insert('users', $data);

				$this->session->set_flashdata("success", "Your account has been registered! You may now login.");
				redirect("auth/login", "refresh");
			}
		}
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
    }

    public function reset_password(){

    	if(isset($_POST['email'])){
            $this->load->library('form_validation');
    		$this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[60]');

            if($this->form_validation->run() == FALSE){

                $this->load->view('templates/header');
                $this->load->view('pages/forgottenpassword', array('error' => 'Please enter a valid email address.'));
                $this->load->view('templates/footer');
            }


    	}
    }
}