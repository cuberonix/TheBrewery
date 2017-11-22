<?php

class Products extends CI_Controller {

        public function __construct()
                {       
                        parent::__construct();
                        $this->load->model('product_model');
                }
	
		public function index()
        {
        		if ( ! file_exists(APPPATH.'views/pages/products.php'))
        {
                show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/products');
        $this->load->view('templates/footer');
        }

        public function addProduct()
        {
                if(isset($_POST['savechanges'])) {       
                        if($this->product_model->add_product()) {
                                $this->session->set_flashdata('success', 'Product updated!');
                               redirect('Products/all', 'refresh');
                       } 
               } else if(isset($_POST['cancel'])){
                    redirect('Products/productManager', 'refresh');
               }
               $this->load->view('templates/header');
               $this->load->view('pages/addProduct');
               $this->load->view('templates/footer');

        }

        public function all()
        {
            $this->load->model('product_model');
            $products = $this->product_model->display_products();
            $data['products'] = $products;
            $this->load->view('templates/header');
            $this->load->view('pages/products', $data);
            $this->load->view('templates/footer');
        }

        public function singleProduct($id)
        {
            $data['singleProduct'] = $this->product_model->singleProduct($id);
            $this->load->view('templates/header');
            $this->load->view('pages/singleproduct', $data);
            $this->load->view('templates/footer');

            if(isset($_POST['reviews'])){
                $this->reviews();
            }
        }

        public function productManager()
        {
            $products = $this->product_model->display_products();
            $data['products'] = $products;
            $this->load->view('templates/header');
            $this->load->view('pages/productmanager', $data);
            $this->load->view('templates/footer');
        }

        public function editProduct($id)
        {
            $data['editProduct'] = $this->product_model->editProduct($id);

            $this->load->view('templates/header');
            $this->load->view('pages/editproduct', $data);
            $this->load->view('templates/footer');

            if(isset($_POST['updatechanges'])) {
                if($this->product_model->updateProduct($id)) {              
                    $this->session->set_flashdata('success', 'Product updated!');
                    redirect('products/productmanager', 'refresh');
                }
            }
            if(isset($_POST['delete'])){
                $this->product_model->deleteProduct($id);
                redirect('products/productmanager', 'refresh');
            }

            if(isset($_POST['cancel'])){
                redirect('products/productmanager', 'refresh');
            }
        }

        public function reviews($id){

            $product = $this->product_model->singleProduct($id);
            $data['product'] = $product;
            $this->load->view('templates/header');
            $this->load->view('pages/reviews', $data);
            $this->load->view('templates/footer');

            if(isset($_POST['submitreview'])) {
                if(empty($_POST['product_title']) || empty($_POST['product_rating']) OR empty($_POST['product_review'])){
                    $this->session->set_flashdata('error', 'Please fill out all review fields.');
                } else {
                $review = array(
                'product' => $this->input->post('product_id'),
                'product_title' => $this->input->post('product_title'),
                'product_rating' => $this->input->post('product_rating'),
                'product_review' => $this->input->post('product_review'),
                'user_id' => $this->input->post('user_id'),
                );
                
                $this->product_model->reviews($review);

                redirect($this->uri->uri_string());
                }
            } 
        }

        public function displayReviews(){
            
            $this->load->model('product_model');
            $reviews = $this->product_model->displayReviews();
            $review['reviews'] = $reviews;
        }
}