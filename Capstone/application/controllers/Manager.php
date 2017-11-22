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


      public function newsManager()
      {		
      			$this->load->model('news_model');
      			$data['news'] = $this->news_model->all_News();

      			$this->load->view('templates/header');
        		$this->load->view('pages/newsmanager', $data);
        		$this->load->view('templates/footer');
      }

      public function addNews()
        {
        	$this->load->model('news_model');

              if(isset($_POST['savechanges'])) {       
                    if($this->news_model->insert_entry()) {
                            $this->session->set_flashdata('success', 'News entry added!');
                               redirect('Manager/newsManager', 'refresh');
                       } 
               } else if(isset($_POST['cancel'])){
                    redirect('Manager/newsManager', 'refresh');
               }
               $this->load->view('templates/header');
               $this->load->view('pages/addNews');
               $this->load->view('templates/footer');
        }

        public function editNews($id)
        {
         $this->load->model('news_model');
         
         $data['editNews'] = $this->news_model->editEntry($id);

            $this->load->view('templates/header');
            $this->load->view('pages/editnews', $data);
            $this->load->view('templates/footer');

            if(isset($_POST['updatechanges'])) {
                if($this->news_model->updateEntry($id)) {              
                    $this->session->set_flashdata('success', 'News updated!');
                    redirect('manager/newsmanager', 'refresh');
                }
            }
            if(isset($_POST['delete'])){
                $this->news_model->deleteEntry($id);
                redirect('manager/newsmanager', 'refresh');
            }

            if(isset($_POST['cancel'])){
                redirect('manager/newsmanager', 'refresh');
            }
        }

    }