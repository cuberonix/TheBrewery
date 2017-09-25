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
        		$this->session->set_flashdata("error", "User doesn't exist!");
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
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password1', 'Confirm Password', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required');
			
			if($this->form_validation->run() == TRUE){

				$data = array(
					'username' => $_POST['username'],
					'password' => md5($_POST['password']),
					'email' => $_POST['email'],
					'register_date' => date('Y-m-d h:i:sa')
					);
				$this->db->insert('users', $data);

				$this->session->set_flashdata("success", "Your account has been registered.");
				redirect("auth/register", "refresh");
			}
		}
        $this->load->view('pages/register');
        $this->load->view('templates/footer');
    }
}