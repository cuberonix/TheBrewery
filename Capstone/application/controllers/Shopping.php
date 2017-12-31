<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping extends CI_Controller {
	
	public function __construct() {
        parent::__construct();	
		//$this->load->library('stripegateway');
		$this->load->library('cart');
		$this->load->helper(array('url', 'form'));			
	}

	public function index()
	{
		$this->load->model("Product_model");
		//$data['products'] = $this->Product_model->get_all();
		$data = print_r($this->cart->contents());
		$this->load->view('templates/header');
		$this->load->view('pages/shoppingcart', $data);
		$this->load->view('templates/footer');
	}

	function add() {
		
		$this->load->model('Products_model');
		
		$product = $this->Products_model->get($this->input->post('id'));
		
		$insert = array(
			'id' => $this->input->post('id'),
			'qty' => 1,
			'price' => $product->price,
			'name' => $product->name
		);
		if ($product->option_name) {
			$insert['options'] = array(
				$product->option_name => $product->option_values[$this->input->post($product->option_name)]
			);
		}
		
		$this->cart->insert($insert);
	
		redirect('shop');	
	}

	function remove($rowid) {
		
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));
		
		redirect('shop');
		
	}
	
	public function stripe()
	{		
		$data['products'] = array(
				'product_id' => $this->input->post('product_id'),
				'product_name' => $this->input->post('product_name'),
				'product_description' => $this->input->post('product_description'),
				'product_price' => $this->input->post('product_price')
		);

		$this->load->view('cart');

		$data["message"] = "";
		if(isset($_POST['btnsubmit'])){
			$data = array(
				'number' => $this->input->post('cardnumber'),
				'exp_month' => $this->input->post('expirymonth'),
				'exp_year'=> $this->input->post('expiryyear'),
				'amount' => $this->input->post('amount')
			);
			$data["message"] = $this->stripegateway->checkout($data);
		}
		$this->mytemplate->loadAmin('view_stripe',$data);
	}


	public function show()
	{
		$cart = $this->cart->contents();
		echo "<pre>";
		print_r($cart);

	}

	public function total()
	{
		echo $this->cart->total();
	}

}