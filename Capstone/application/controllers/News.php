<?php

class News extends CI_Controller {
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/news.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/news');
        $this->load->view('templates/footer');
        }

        public function allNews()
        {
            $this->load->model('news_model');
            $news = $this->news_model->all_news();
            $data['news'] = $news;
            $this->load->view('templates/header');
            $this->load->view('pages/news', $data);
            $this->load->view('templates/footer');
        }

        public function recentNews()
        {
                $this->load->model('news_model');
                $renews = $this->news_model->recent_entry();
                $redata['renews'] = $renews;
                $this->load->view('templates/header');
                $this->load->view('pages/news', $redata);
                $this->newsSide();
                if(isset($_POST['showComments'])){
                        $this->show_comments();
                        $this->load->view('templates/footer');
                }
        }

        public function singleNews($id){

                $this->load->model('news_model');
                $data['singleNews'] = $this->news_model->singleNews($id);

                $this->load->view('templates/header');
                $this->load->view('pages/singlenews', $data);
                $this->load->view('templates/footer');
        }
        
        public function show_comments()
        {
                //$this->load->model('news_model');
                //$comments = $this->news_model->comments();
                //$data['comments'] = $comments;
                $this->recentNews();
                //$this->db->where('entry_id', $this->uri->segment(3));
                $this->load->view('pages/newscomments');
                if(isset($_POST['submitcomment'])){
                        $this->add_comment();
                }
        }

        public function add_comment()
        {
                $this->db->insert('newscomments', $_POST);
                redirect('news/comments', 'refresh');
        }

        public function newsSide()
        {
            $this->load->model('news_model');
            $news = $this->news_model->all_news();
            $data['news'] = $news;
            $this->load->view('pages/newssidebar', $data);
        }

        public function editNews(){

        $data['editNews'] = $this->news_model->editNews($id);

            $this->load->view('templates/header');
            $this->load->view('pages/editproduct', $data);
            $this->load->view('templates/footer');

            if(isset($_POST['updatechanges'])) {
                if($this->news_model->updateNews($id)) {              
                    $this->session->set_flashdata('success', 'Product updated!');
                    redirect('news/newsmanager', 'refresh');
                }
            }
            if(isset($_POST['delete'])){
                $this->news_model->deleteNews($id);
                redirect('news/newsmanager', 'refresh');
            }

            if(isset($_POST['cancel'])){
                redirect('news/newsmanager', 'refresh');
            }
        }
}