<?php 

class Auth_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}

	public function reset_password_form($email, $email_code){
		if(isset($email, $email_code)){
			$email = trim($email);
			$email_hash = sha1($email . $email_code);
			$verified = $this->model_login->verify_code($email, $email_code);

			if($verified){
				
			}
		}
	}

	public function email_valid($email){

		$sql = "SELECT username, email FROM users WHERE email = '{$email}' LIMIT 1";
		$result = $this->db->query($sql);
		$row $result->row();
	}

	public function reset_password_code($email, $code){

		$sql = "SELECT username, email FROM users WHERE email = '{$email}'";
		$result = $this->db->query($sql);
		$row $result->row();

		if($result->num_rows() === 1){
			return ($code == md5($this->config->item('salt').$row->username)) ? true : false;
		}else{
				return false;

		}
	}
	private function reset_email($email, $username){
		$this->load->library('email');
		$email_code = md5($username);

		$this->email->set_mailtype('html');
		$this->email->from('The Brewery');
		$this->email->to($email);
	}
}