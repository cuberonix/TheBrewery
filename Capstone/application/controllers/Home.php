<?php

class Home extends CI_Controller {

        public function view()
        {
        	if ( ! file_exists(APPPATH.'views/pages/home.php'))
        {
                show_404();
        }

            $this->load->model('news_model');
            $news = $this->news_model->recent_entry();
            $data['news'] = $news;
            $this->load->view('templates/header');
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
        }

        public function index()
        {
            $this->load->model('news_model');
            $news = $this->news_model->recent_entry();
            $data['news'] = $news;
            $this->load->view('templates/header');
            $this->load->view('pages/home', $data);
            $this->load->view('templates/footer');
            
        }

        public function test()
        {
            $this->load->view('pages/test');
        }

        public function search(){
            if($_POST['searchbtn']) {
                $this->load->view('templates/header');
                $this->load->view('pages/search');
                $this->load->view('templates/footer');
            }
    }
}