<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Paypal extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('paypal_model');
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
		
		$ins_status = $this->paypal_model->insert_tran($data);
		echo '<pre>';print_r($data);echo '</pre>';//exit;
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "tran_success",
						"tran_details"     	=>  	$data,
			);
			$this->load->view("admin_layout/inner_template",$data);		
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
            $this->paypal_model->insertTransaction($data);
        }
    }
}