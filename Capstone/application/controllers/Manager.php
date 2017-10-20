<?php

class Manager extends CI_Controller {

	public function userManager()
        {     
        		$this->load->model('user_model');
				//$id = $this->uri->segment(3);
				$data['users'] = $this->user_model->show_users();	
				//$data['id'] = $this->user_model->showUserID($id);
				
				$this->load->view('templates/header');
        		$this->load->view('pages/usermanager', $data);
        		$this->load->view('templates/footer');
        }

    }