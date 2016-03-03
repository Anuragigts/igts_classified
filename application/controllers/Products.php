<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('paypal_model');
    }
    
    function index(){
        $data = array();
        //get products data from database
        $data['products'] = $this->paypal_model->getRows();
        //pass the products data to view
        $this->load->view('products/index', $data);
    }
    
    public function buy($id,$c_type){
        //Set variables for paypal form
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
        $paypalID = 'amanbabu-facilitator@gmail.com'; //business email
        $returnURL = base_url().'paypal/success'; //payment success url
        $cancelURL = base_url().'paypal/cancel'; //payment cancel url
        $notifyURL = base_url().'paypal/ipn'; //ipn url
		
		
        //get particular product data
        $product = $this->paypal_model->getRows($id,$c_type);
		//$config['paypal_lib_currency_code'] =$product['currency_type'];
		//$this->paypallib_config->initialize($config);
		//echo '<pre>';print_r($product);echo '</pre>';exit;
        //$userID = 1; //current user id
        $logo = base_url().'assets/images/codexworld-logo.png';
        
		
        $this->paypal_lib->add_field('business', $paypalID);
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $product['name']);
		//$this->paypal_lib->add_field('currencyCode', $product['currency_type']);
        $this->paypal_lib->add_field('custom', $product['user_id']);
        $this->paypal_lib->add_field('item_number',  $product['ad_id']);
        $this->paypal_lib->add_field('amount',  $product['pkg_amt']);        
        $this->paypal_lib->image($logo);
        
        $this->paypal_lib->paypal_auto_form();
    }
}