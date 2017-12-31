<?php

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class Products extends CI_Controller {

        public function __construct()
                {       
                        parent::__construct();
                        $this->load->model('product_model');
                        $this->load->library('cart');
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

        public function test()
        {
            $this->load->view('templates/header');
            $this->load->view('pages/testcart');

            if(isset($_POST['addtocart'])){
                $data = array(
                    'id'      => 'sku_123ABC',
                    'qty'     => 1,
                    'price'   => 39.95,
                    'name'    => 'T-Shirt',
                    'options' => array('Size' => 'L', 'Color' => 'Red')
                );
        
             $this->cart->insert($data);
             print_r($this->cart->contents());
             echo "added to cart!";
            }
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

            if(isset($_POST['addtocart'])){
                $this->addToCart();
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

        public function productpicUpload()
        {
            $product = $_GET['product'];
            $this->load->view('templates/header');
            $this->load->view('pages/productpicupload', array('error' => '', 'success' => ''));
            $this->load->view('templates/footer');
            
            $config['upload_path'] = './assets/product_images/'; //The path where the image will be save
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; //Images extensions accepted
            //$config['max_size']    = '2048'; //The max size of the image in kb's
            //$config['max_width']  = '1024'; //The max of the images width in px
            //$config['max_height']  = '768'; //The max of the images height in px
            $config['overwrite'] = TRUE; //If exists an image with the same name it will overwrite.
            $config['file_name']    = $product.".png";
            
            $this->load->library('upload', $config); //Load the upload CI library
            
            if(isset($_POST['upload'])){
            if (!$this->upload->do_upload()){             
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('pages/productpicupload', $error);
            } else {
                $this->load->view('pages/productpicupload');
                $file_data = $this->upload->data();
                $data['img'] = base_url().'/assets/product_images/' . $file_data['file_name'];
                $fp = fopen($config['upload_path'].$config['file_name'], 'r');
                $datadb = fread($fp, filesize($config['upload_path'].$config['file_name']));
                $this->db->select('*');
                $this->db->from('products');
                $this->db->where('product_name',$product);
                $this->db->insert('product_image', $datadb);
                fclose($fp);
                //$success = "Image uploaded! Nice job, David.";
                $this->load->view('pages/picuploadsucc', $data);
                //$this->session->set_flashdata('success', 'Picture updated!');
                }
            }
        }

        public function youDunGoofed()
        {
            $data = "If you've reached this page, you goofed it. 
                          Also I'm sorry.";

            $this->load->view('templates/header');
            $this->load->view('pages/goofed', $data);
            $this->load->view('templates/footer');

            if (isset($_POST['ungoof'])) {
                $this->session->set_userdata('referred_from', current_url());
                    $referred_from = $this->session->userdata('referred_from');
                    redirect($referred_from, 'refresh');
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

        public function shoppingCart(){
            
            $this->load->view('templates/header');
            $this->load->view('pages/shoppingcart');
            $this->load->view('templates/footer');
        }

        public function addToCart() {
        
        $product = $this->product_model->get($this->input->post('product_id'));
        //$data['product'] = $product;

        $insert = array(
            'id' => $this->input->post('product_id'),
            'qty' => 1,
            'price' => $product->product_price,
            'name' => $product->product_name
        );
        
        $this->cart->insert($insert);

        $success = $this->session->set_flashdata("success", "Item has been added to cart!");

        return $success;

        //$this->load->view('pages/shoppingcart');
        }

        public function removeFromCart($rowid){

            $this->cart->update(array(
            'rowid' => $rowid,
            'qty' => 0
        ));
        
        redirect('products/shoppingcart');
        }

        public function checkout() {

        //$this->load->library('stripegateway');  

        $token = $_POST['stripeToken'];

        try {
            require_once('vendor/autoload.php');
            Stripe::setApiKey('sk_test_VrxFfGLbynBGnDJZBfhSI7Y8');

            $charge = Charge::create( array(        
                        "amount" => 2710,
                        "currency" => "cad",
                        "description" => "Example charge",
                        "source" => $token,
                            )
            );
            echo "<h1>Payment Complete!</h1>";
            //$this->load->view('pages/checkout');

        } catch(\Stripe\Error\Card $e) {
            $error = $e->getMessage();
            echo $error;
        }
    }

}