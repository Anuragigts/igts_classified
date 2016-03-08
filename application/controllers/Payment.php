<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
		$this->load->model('Transaction_model');
		$this->load->model('Payment_model');
     }
     
     function success(){
        //get the transaction data
        $paypalInfo = $this->input->get();
        $post_paypal = $this->input->post();
      /*  $data['item_number'] = $paypalInfo['item_number']; 
        $data['txn_id'] = $paypalInfo["tx"];
        $data['payment_amt'] = $paypalInfo["amt"];
        $data['currency_code'] = $paypalInfo["cc"];
        $data['status'] = $paypalInfo["st"];
		*/
		
		$data['gross_amt'] = $post_paypal['mc_gross']; 
        //$data['user_id'] = $post_paypal["payer_id"];
        $data['address_street'] = $post_paypal["address_street"];
        $data['payment_date'] = $post_paypal["payment_date"];
        $data['payment_status'] = $post_paypal["payment_status"];
		$data['address_zip'] = $post_paypal['address_zip']; 
        $data['first_name'] = $post_paypal["first_name"];
        $data['mc_fee'] = $post_paypal["mc_fee"];
        $data['address_country_code'] = $post_paypal["address_country_code"];
        $data['address_name'] = $post_paypal["address_name"];
		$data['custom'] = $post_paypal['custom']; 
        $data['business'] = $post_paypal["business"];
        $data['address_country'] = $post_paypal["address_country"];
        $data['address_city'] = $post_paypal["address_city"];
        $data['quantity'] = $post_paypal["quantity"];
		$data['payer_email'] = $post_paypal['payer_email']; 
        $data['txn_id'] = $post_paypal["txn_id"];
        $data['address_state'] = $post_paypal["address_state"];
        $data['receiver_email'] = $post_paypal["receiver_email"];
        $data['receiver_id'] = $post_paypal["receiver_id"];
		$data['txn_type'] = $post_paypal["txn_type"];
		$data['item_name'] = $post_paypal['item_name']; 
        $data['currency_code'] = $post_paypal["mc_currency"];
        $data['product_id'] = $post_paypal["item_number"];
        $data['residence_country'] = $post_paypal["residence_country"];
        $data['handling_amount'] = $post_paypal["handling_amount"];
		$data['shipping'] = $post_paypal["shipping"];
		$data['transaction_subject'] = $post_paypal["transaction_subject"];
		
		$coup_status  = $this->Payment_model->update_coupon_status($data['product_id']);
		$ins_status = $this->Payment_model->insert_tran($data);
		$ins_status = $this->Payment_model->update_ad_pay_status($data['product_id']);
		
		$info   =   array(
                        "title"         	=>     "Classifieds ",
                        "content"       	=>     "tran_success",
						"tran_details"     	=>  	$data,
			);
			$this->session->flashdata('msg','Your Payment has successfully Completed');
			redirect('deals_status');
			// $this->load->view("classified_layout/inner_template",$info);
        //$this->load->view('/success', $data);
     }
     
     function cancel(){
        $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
		echo '<pre>';print_r($paypalInfo);echo '</pre>';exit;

        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id']    = $paypalInfo["item_number"];
        $data['txn_id']    = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status']    = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;        
        $result    = $this->paypal_lib->curlPost($paypalURL,$paypalInfo);
        
        //check whether the payment is verified
        if(eregi("VERIFIED",$result)){
            //insert the transaction data into the database
            $this->Payment_model->insertTransaction($data);
        }
    }
	function Transactions(){
        //paypal return transaction details array
		$ins_status = $this->Transaction_model->get_Transactions();
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "Transaction_list",
						"tran_details"     	=>  	$ins_status,
			);
			$this->load->view("admin_layout/inner_template",$data);	
    }
	public function Pay(){
		$ad_id 			= 	$this->input->post('post_ad_id');
		$post_ad_amt 	= 	$this->input->post('post_ad_amt');
		$coup_ad_amt 	= 	$this->input->post('coup_ad_amt');
		$c_code 		= 	$this->input->post('c_code');
		
		if($coup_ad_amt < $post_ad_amt && $coup_ad_amt !=0 ){
			$amt = $coup_ad_amt;
		}else{
			$amt = $post_ad_amt;
		}
        //Set variables for paypal form
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
        $paypalID = 'amanbabu-facilitator@gmail.com'; //business email
        $returnURL = base_url().'payment/success'; //payment success url
        $cancelURL = base_url().'payment/cancel'; //payment cancel url
        $notifyURL = base_url().'payment/ipn'; //ipn url
		
		
        //get particular product data
        $ad_info = $this->Payment_model->getRows($ad_id, $c_code);
		if(empty($ad_info)){
			redirect('deals_status');
		}else{
			//$config['paypal_lib_currency_code'] =$ad_info['currency_type'];
			//$this->paypallib_config->initialize($config);
			//echo '<pre>';print_r($ad_info);echo '</pre>';exit;
			//$userID = 1; //current user id
			$logo = base_url().'assets/images/codexworld-logo.png';
			
			
			$this->paypal_lib->add_field('business', $paypalID);
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', $ad_info['name']);
			//$this->paypal_lib->add_field('currencyCode', $ad_info['currency_type']);
			$this->paypal_lib->add_field('custom', $ad_info['user_id']);
			$this->paypal_lib->add_field('item_number',  $ad_info['ad_id']);
			$this->paypal_lib->add_field('amount', $amt);        
			$this->paypal_lib->image($logo);
			
			$this->paypal_lib->paypal_auto_form();
		}
    }
	  function checkout(){
		$ad_id = $this->uri->segment(3);
        $ins_status = $this->Payment_model->get_ad_details($ad_id);
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "checkout",
						"tran_details"     	=>  	$ins_status,
			);
			$this->load->view("classified_layout/inner_template",$data);	
     }
	
}