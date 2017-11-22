<?php 

class User_model extends CI_Model {
	
	public function __construct()
    {
        parent::__construct();
    }

    function show_users()
    {
    	$query = $this->db->get('users');
		$query_result = $query->result();
		return $query_result;
    }

	public function showUserID($id)
	{

	$this->db->where('id ', $id);
    $query = $this->db->get('users');
    return $query->result_array();

		//$this->db->select('*');
	//	$this->db->from('users');
	//	$this->db->where('id ', $data);
	//	$query = $this->db->get();
	//	$result = $query->result();
	//	return $result;
	 }

	 public function updateUser($username)
	 {

	 	$data = array(
				'age' => $this->input->post('age'),
				'location' => $this->input->post('location'),
				'favouritebeer' => $this->input->post('favouritebeer'),
				'website' => $this->input->post('website'),
				'bio' => $this->input->post('bio')
				);

	 	$this->db->select('*');
	 	$this->db->where('username', $username);
	 	$this->db->update('users', $data);
	 	return $username;
	 }

	 public function getUser($username)
	 {
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->from('users');
		$query = $this->db->get();
		return $query->row_array();	 
	
	 }
}