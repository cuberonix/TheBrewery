<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Customer;

class Stripe extends CI_Controller {
	
	public function __construct() {
        parent::__construct();	
		$this->load->library('stripegateway');			
	}
	
	public function index()
	{		
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

	public function checkout() {

		try {
			require_once('vendor/autoload.php');
			Stripe::setApiKey('sk_test_VrxFfGLbynBGnDJZBfhSI7Y8');

			$token = $_POST['stripeToken'];

			$charge = Charge::create(
						array()

			);

			$this->load->view('pages/checkout');

		} catch(Exception $e) {
			$error = $e->getMessage();
			echo $error;
		}
	}
}