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
        }
}