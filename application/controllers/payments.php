<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payments extends CI_Controller 
{
     function  __construct(){
        parent::__construct();
        $this->load->library('paypal_lib');
		$this->load->model('transaction_models');
		$this->load->model('payment_models');
		$this->load->model('coupons_model');
		$this->load->model('category_model');
		$this->load->helper('url');
     }
     
     function success(){
        //get the transaction data
        $paypalInfo = $this->input->get();
        $post_paypal = $this->input->post();
		if(!empty($paypalInfo)){
			$data['product_id'] = $paypalInfo['item_number']; 
			$data['txn_id'] = $paypalInfo["txn_id"];
			$data['gross_amt'] = $paypalInfo["amt"];
			$data['currency_code'] = $paypalInfo["cc"];
			$data['payment_status'] = $paypalInfo["st"];
			$data['payment_date'] = date('Y-m-d H:i:s');
		}else {
			$data['gross_amt'] = $post_paypal['mc_gross']; 
			$data['payment_status'] = $post_paypal["payment_status"];
			$data['txn_id'] = $post_paypal["txn_id"];
			$data['currency_code'] = $post_paypal["mc_currency"];
			$data['product_id'] = $post_paypal["item_number"];
			$data['payment_date'] = date('Y-m-d H:i:s');
		}
		/*echo "<pre>";
		print_r($post_paypal); exit;*/
		$coup_status  = $this->payment_models->update_coupon_status($data['product_id']);
		$ins_status = $this->payment_models->insert_tran($data);
		$ins_status = $this->payment_models->update_ad_pay_status($data['product_id'],$data['gross_amt']);
		$this->session->unset_userdata("last_insert_id");
		/*$info   =   array(
                        "title"         	=>     "Classifieds ",
                        "content"       	=>     "tran_success",
						"tran_details"     	=>  	$data,
			);*/
			$this->session->set_flashdata('payment','Your Payment has successfully Completed');
			redirect('deals-status');
     }
     function cancel(){
		$this->session->set_flashdata('payment','The Payment has been Cancled.');
		redirect('deals-status');
       // $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        //paypal return transaction details array
        $paypalInfo    = $this->input->post();
		//echo '<pre>';print_r($paypalInfo);echo '</pre>';exit;

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
            $this->payment_models->insertTransaction($data);
        }
    }
	function transactions(){
		$ins_status = $this->transaction_models->get_Transactions();
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "transaction_lists",
						"tran_details"     	=>  	$ins_status,
			);
		$data['category_list'] = $this->category_model->view();
			$this->load->view("admin_layout/inner_template",$data);	
    }
	public function pay(){
		$ad_id 			= 	$this->input->post('ad_id');
		$query = $this->db->query("SELECT package_type,urgent_package FROM postad WHERE ad_id = '$ad_id'");
	    $row = $query->row();
	    if (($row->package_type == 1 || $row->package_type == 4) && $row->urgent_package == 0) {
	    	$this->session->set_flashdata('payment','Your Ad Created Successfully');
	    	$this->session->unset_userdata("last_insert_id");
	      	redirect('deals-status');
	    }
		$post_ad_amt 	= 	$this->input->post('post_ad_amt');
		$coup_ad_amt 	= 	$this->input->post('coup_ad_amt');
		$c_code 		= 	$this->input->post('c_code');
		
		$p_amt = $this->coupons_model->get_ad_amt($ad_id);
		if ($p_amt->u_pkg__pound_cost !='') {
			$amt = $p_amt->u_pkg__pound_cost+$p_amt->cost_pound;
		}
		else{
			$amt = $p_amt->cost_pound;
		}
		$amt1 = (($amt)+($amt)*(0.2));
		$c_info = $this->coupons_model->get_c_result($c_code);
		//echo '<pre>';print_r($c_info);echo '</pre>';
		if(count($c_info) == 1){
			$disc_aamt = $amt1*$c_info->c_value;
			//echo round($disc_aamt, 2).'<br/>';
			$pkg_disc_amt =  $amt1-($disc_aamt)/100;
			//$payment = $amt*($c_info->c_value)/100;
		}else{
			$pkg_disc_amt = $amt1;
		}
		 $t_amt = substr($pkg_disc_amt, 0, strpos($pkg_disc_amt, ".")+3);
		
        //Set variables for paypal form
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
        $paypalID = 'amanbabu-facilitator-1@gmail.com'; //business email
        $returnURL = base_url().'payments/success'; //payment success url
        $cancelURL = base_url().'payments/cancel'; //payment cancel url
       // $notifyURL = base_url().'payment/ipn'; //ipn url
		
        //get particular product data
        $ad_info = $this->payment_models->getRows($ad_id, $c_code);
		if(empty($ad_info)){
			redirect('deals-status');
		}else{
			//$config['paypal_lib_currency_code'] =$ad_info['currency_type'];
			//$this->paypallib_config->initialize($config);
			//echo '<pre>';print_r($ad_info);echo '</pre>';exit;
			//$userID = 1; //current user id
			$logo = base_url().'assets/images/codexworld-logo.png';
			
			
			$this->paypal_lib->add_field('business', $paypalID);
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			//$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', $ad_info['name']);
			//$this->paypal_lib->add_field('currencyCode', $ad_info['currency_type']);
			$this->paypal_lib->add_field('custom', $ad_info['user_id']);
			$this->paypal_lib->add_field('item_number',  $ad_info['ad_id']);
			$this->paypal_lib->add_field('amount', $t_amt);        
			$this->paypal_lib->image($logo);
			
			$this->paypal_lib->paypal_auto_form();
		}
    }
	function checkout(){
		$ad_id = $this->uri->segment(3);
        $ins_status = $this->payment_models->get_ad_details($ad_id);
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "checkout",
						"tran_details"     	=>  	$ins_status,
			);
			$this->load->view("classified_layout/inner_template",$data);	
     }

     function adrenewal(){
		$ad_id = $this->uri->segment(3);
        $ins_status = $this->payment_models->get_ad_details($ad_id);
        $img_details = $this->payment_models->get_img_details($ad_id);
        if ($ins_status->category_id == 1 || $ins_status->category_id == 2 ||
        	$ins_status->category_id == 3 || $ins_status->category_id == 4) {
        	$pcktype = $this->payment_models->pcktypetop();
        	$urg_label = $this->payment_models->urgpcktop();
        }
	    else{
	    	$pcktype = $this->payment_models->pcktypelow();
	    	$urg_label = $this->payment_models->urgpcklow();
	    }
		$data   =   array(
                        "title"         	=>     "Classifieds :: Admin Category",
                        "metadesc"     		=>     "Classifieds :: Admin Category",
                        "metakey"       	=>     "Classifieds :: Admin Category",
                        "content"       	=>     "adrenewal",
						"tran_details"     	=>  	$ins_status,
						"img_details"     	=>  	$img_details,
						"pcktype"			=>		$pcktype,
						"urg_label"			=>		$urg_label
			);
			$this->load->view("classified_layout/inner_template",$data);	
     }

     public function getpckcost(){
     	$pckid = $this->input->post("pckid");
     	$urgid = $this->input->post("urgid");
     	if ($urgid != '') {
     		$rs = $this->payment_models->urgcost($urgid);
     		$urgprice =  $rs->u_pkg__pound_cost;
     	}
     	else{
     		$urgprice = 0;	
     	}
     	$rs = $this->payment_models->pckcost($pckid);
     	$cost1 = (($rs->cost_pound + $urgprice) + (($rs->cost_pound + $urgprice)*0.2));
     	$vat = (($rs->cost_pound + $urgprice)*0.2);
     	echo json_encode(
     		array('cost' => ($rs->cost_pound + $urgprice),
     			'cost1' => substr($cost1,0,strpos($cost1,".")+3),
     			'vat_tax' => substr($vat,0,strpos($vat,".")+3)
     			));
     }

     public function geturgcost(){
     	$pckid = $this->input->post("pckid");
     	$urgid = $this->input->post("urgid");
     	if ($urgid != '') {
     		$rs = $this->payment_models->urgcost($urgid);
     		$urgprice = $rs->u_pkg__pound_cost;
     	}
     	else{
     		$urgprice = 0;
     	}

     	$rs = $this->payment_models->pckcost($pckid);
     	$cost1 = (($rs->cost_pound + $urgprice) + (($rs->cost_pound + $urgprice)*0.2));
     	$vat = (($rs->cost_pound + $urgprice)*0.2);
     	echo json_encode(
			array('cost' => ($rs->cost_pound + $urgprice),
				'cost1' => substr($cost1,0,strpos($cost1,".")+3),
     			'vat_tax' => substr($vat,0,strpos($vat,".")+3) 
				));
     }

     public function getcouponcost(){
     	$pckid = $this->input->post("pckid");
     	$urgid = $this->input->post("urgid");
     	$couponcode = $this->input->post("c_code");
     	if ($urgid != '') {
     		$rs = $this->payment_models->urgcost($urgid);
     		$urgprice = $rs->u_pkg__pound_cost;
     	}
     	else{
     		$urgprice = 0;
     	}
     	$rs = $this->payment_models->pckcost($pckid);
     	$price = $rs->cost_pound + $urgprice;
     	$amt = ($price) + ($price)*0.2;
		$c_info = $this->coupons_model->get_c_result($couponcode);
		if(count($c_info) == 1){
			$disc = $amt*($c_info->c_value)/100;
			if($c_info->max_cus == 0){
				
				$pkg_disc_amt = $amt-$disc;
				
				$c_details = array(
								'c_code'		=>		$c_info->c_code,
								'c_value' 		=>		$c_info->c_value,
								'max_cus' 		=>		$c_info->max_cus,
								'used_count' 	=>		$c_info->used_count,
								'pkg_disc_amt'	=>		substr($pkg_disc_amt,0,strpos($pkg_disc_amt, ".")+3),
								'disc'			=>		substr($disc, 0,strpos($disc, ".")+3),
								'c_responce'	=>		"<span style='color:green'>After Applying the Coupon <b>$c_info->c_code </b>, The Amount to be paid is ".substr($pkg_disc_amt,0,strpos($pkg_disc_amt, ".")+3)."</span>"
					); 
					$info = json_encode($c_details);
					echo $info;
			}else{
				if($c_info->max_cus > $c_info->used_count){
					$disc = $amt*($c_info->c_value)/100;
					$pkg_disc_amt = $amt-$disc;
					
					$c_details = array(
								'c_code'		=>		$c_info->c_code,
								'c_value' 		=>		$c_info->c_value,
								'max_cus' 		=>		$c_info->max_cus,
								'used_count' 	=>		$c_info->used_count,
								'pkg_disc_amt'	=>		substr($pkg_disc_amt,0,strpos($pkg_disc_amt, ".")+3),
								'disc'			=>		substr($disc, 0,strpos($disc, ".")+3),
								'c_responce'	=>		"<span style='color:green'>After Applying the Coupon <b> $c_info->c_code </b>, The Amount to be paid is ".substr($pkg_disc_amt,0,strpos($pkg_disc_amt, ".")+3)."</span>"
					); 
					$info = json_encode($c_details);
					echo $info;
				 }else{
					 $c_details = array(
								'c_code'		=>		$c_info->c_code,
								'c_value' 		=>		0,
								'max_cus' 		=>		0,
								'used_count' 	=>		$c_info->used_count,
								'pkg_disc_amt'	=>		substr($amt, 0,strpos($amt,".")+3),
								'disc'			=>		0.00,
								'c_responce'	=>		"<span style='color:red'>The Coupon Code you have added is Expired or Invalid.</span>" 
					); 
					$info = json_encode($c_details);
					echo $info;
				 }
			}
		}else{
			$c_details = array(
							'c_code'		=>		$couponcode,
							'c_value' 		=>		0,
							'max_cus' 		=>		0,
							'used_count' 	=>		0,
							'pkg_disc_amt'	=>		round($amt, 2),
							'disc'			=>		0.00,
							'c_responce'	=>		"<span style='color:red'>The Coupon Code you have added is Expired or Invalid.</span>" 
				); 
				$info = json_encode($c_details);
				echo $info;
		}
     }

     public function adrenewal_pay(){
     	// echo "<pre>"; print_r($this->input->post()); echo "</pre>"; exit;
		$ad_id 				= 	$this->input->post('ad_id');
		$pcktype 			= 	$this->input->post('pcktype');
		$urglbl 			= 	$this->input->post('urglbl');
		$pcksession = array('pcktype' => $pcktype,
							'urglbl'  => $urglbl);
		$this->session->set_userdata("pcksession", $pcksession);
	    if (($pcktype == 1 || $pcktype == 4) && $urglbl == 0) {
	    	$this->session->set_flashdata('payment','Your Ad Created Successfully');
	    	$this->session->unset_userdata("last_insert_id");
	      	redirect('deals-status');
	    }
		$c_code 		= 	$this->input->post('c_code');
		
		if ($urglbl != '') {
     		$rs = $this->payment_models->urgcost($urglbl);
     		$urgprice = $rs->u_pkg__pound_cost;
     	}
     	else{
     		$urgprice = 0;
     	}
     	$rs = $this->payment_models->pckcost($pcktype);
     	$price = $rs->cost_pound + $urgprice;
		$amt1 = ($price+($price)*(0.2));
		$c_info = $this->coupons_model->get_c_result($c_code);
		if(count($c_info) == 1){
			$disc_aamt = $amt1*$c_info->c_value;
			$pkg_disc_amt =  $amt1-($disc_aamt)/100;
		}else{
			$pkg_disc_amt = $amt1;
		}
		$t_amt = substr($pkg_disc_amt, 0,strpos($pkg_disc_amt,".")+3);
		
        //Set variables for paypal form
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //test PayPal api url
        $paypalID = 'amanbabu-facilitator@gmail.com'; //business email
        $returnURL = base_url().'payments/adrenewal_success'; //payment success url
        $cancelURL = base_url().'payments/cancel'; //payment cancel url
       // $notifyURL = base_url().'payment/ipn'; //ipn url
		
        //get particular product data
        $ad_info = $this->payment_models->getRows($ad_id, $c_code);
		if(empty($ad_info)){
			redirect('deals-status');
		}else{
			//$config['paypal_lib_currency_code'] =$ad_info['currency_type'];
			//$this->paypallib_config->initialize($config);
			//echo '<pre>';print_r($ad_info);echo '</pre>';exit;
			//$userID = 1; //current user id
			$logo = base_url().'assets/images/codexworld-logo.png';
			
			
			$this->paypal_lib->add_field('business', $paypalID);
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			//$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name', $ad_info['name']);
			//$this->paypal_lib->add_field('currencyCode', $ad_info['currency_type']);
			$this->paypal_lib->add_field('custom', $ad_info['user_id']);
			$this->paypal_lib->add_field('item_number',  $ad_info['ad_id']);
			$this->paypal_lib->add_field('amount', $t_amt);        
			$this->paypal_lib->image($logo);
			
			$this->paypal_lib->paypal_auto_form();
		}
    }

    public function adrenewal_success(){
        //get the transaction data
        $paypalInfo = $this->input->get();
        $post_paypal = $this->input->post();
		if(!empty($paypalInfo)){
			$data['product_id'] = $paypalInfo['item_number']; 
			$data['txn_id'] = $paypalInfo["tx"];
			$data['gross_amt'] = $paypalInfo["amt"];
			$data['currency_code'] = $paypalInfo["cc"];
			$data['payment_status'] = $paypalInfo["st"];
			$data['payment_date'] = date('Y-m-d H:i:s');
		}else {
			$data['gross_amt'] = $post_paypal['mc_gross']; 
			$data['payment_status'] = $post_paypal["payment_status"];
			$data['txn_id'] = $post_paypal["txn_id"];
			$data['currency_code'] = $post_paypal["mc_currency"];
			$data['product_id'] = $post_paypal["item_number"];
			$data['payment_date'] = date('Y-m-d H:i:s');
		}
		$coup_status  = $this->payment_models->update_coupon_status($data['product_id']);
		$ins_status = $this->payment_models->insert_tran($data);
		$ins_status = $this->payment_models->update_adrenewal($data['product_id'],$data['gross_amt']);

		$this->session->unset_userdata("last_insert_id");
		/*$info   =   array(
                        "title"         	=>     "Classifieds ",
                        "content"       	=>     "tran_success",
						"tran_details"     	=>  	$data,
			);*/
			$this->session->set_flashdata('payment','Your Payment has successfully Completed');
			redirect('deals-status');
     }

     public function adrenewal_limit(){
     	echo ltrim(@mysql_result(mysql_query("SELECT img_count FROM pkg_duration_list WHERE pkg_dur_id = ".$this->input->post('pckid')), 0,'img_count'),' ');
     }

     public function adrenewal_img(){
     	$ins_img = $this->payment_models->insert_img();
     	redirect(base_url()."payments/adrenewal/".$this->input->post('adid'));
     }

     public function adrenewal_imgdelete(){
     	mysql_query("DELETE FROM ad_img WHERE ad_img_id='".$this->input->post('id')."'");
     }

     public function adrenewal_data(){
     	// echo $this->input->post('hotdeal').$this->input->post('youtubelink').$this->input->post('weblink').$this->input->post('adid');
     	/*youtube link*/
     	$hot = mysql_query("SELECT * FROM videos WHERE ad_id='".$this->input->post('adid')."'");
     	if (mysql_num_rows($hot) > 0) {
     		@mysql_query("UPDATE videos SET video_name='".$this->input->post('youtubelink')."' WHERE ad_id='".$this->input->post('adid')."'");
     	}
     	else{
     		@mysql_query("INSERT INTO videos(ad_id, video_name, uploaded_time) 
     			VALUES ('".$this->input->post('adid')."','".$this->input->post('youtubelink')."','".date("d-m-Y H:i:s")."')");
     	}
     	/*hotdeals title*/
     	$hot = mysql_query("SELECT * FROM platinum_ads WHERE ad_id='".$this->input->post('adid')."'");
     	if (mysql_num_rows($hot) > 0) {
     		@mysql_query("UPDATE platinum_ads SET marquee='".$this->input->post('hotdeal')."' WHERE ad_id='".$this->input->post('adid')."'");
     	}
     	else{
     		@mysql_query("INSERT INTO platinum_ads(ad_id, marquee, posted_date) 
     			VALUES ('".$this->input->post('adid')."','".$this->input->post('hotdeal')."','".date("d-m-Y H:i:s")."')");
     	}
     	/*weblink*/
     	@mysql_query("UPDATE postad SET web_link='".$this->input->post('weblink')."' WHERE ad_id='".$this->input->post('adid')."'");
	}
}