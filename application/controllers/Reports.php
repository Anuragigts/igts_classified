<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Reports extends CI_Controller {
        public function __construct(){
			parent::__construct();
			$this->load->model("admin_model");
			$this->load->model("report_model");
			$this->load->model("ads_model");
			$this->load->model("category_model");
			$this->load->model('transaction_models');
        }
        public function Ads(){
			
			$pkg_types = $this->ads_model->get_postad_packages();
			$categories = $this->admin_model->get_postad_categories();
			if($this->input->post()){
				$posted_data = array(
								'start_date'=>$this->input->post('start_date'),
								'end_date'=>$this->input->post('end_date'),
								'cat_type'=>$this->input->post('cat_type'),
								'pkg_type'=>$this->input->post('pkg_type')
								);
				$this->session->set_userdata($posted_data);
				$result = $this->report_model->get_list_ads();
				
				$data   =   array(
					"title"         =>     "Admin Dashboard",
					"metadesc"      =>     "Classifieds :: Admin Dashboard",
					"metakey"       =>     "Classifieds :: Admin Dashboard",
					"content"       =>     "Ads_report",
					"pkg_types"    	=>     $pkg_types,
					"posted_data"  	=>     $posted_data,
					"categories"    =>     $categories,	
					"result"    	=>     $result,
				);
				//echo '<pre>';print_r($data);echo '</pre>';exit;
			}else{
				$posted_data = array('start_date'=>'',
								'groupt_by'=>'',
								'end_date'=>'',
								'cat_type'=>'',
								'start_date'=>'',
								'pkg_type'=>''
								);
				$this->session->set_userdata($posted_data);
				$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "Ads_report",
						"pkg_types"    =>      $pkg_types,
						"categories"    =>     $categories,
				);
			}
			
			$this->load->view("admin_layout/inner_template",$data);
        }
		public function Get_report(){
			 $this->load->helper('php-excel');
			 $result = $this->report_model->get_list_ads();
			 $data_array[] = array( "PostAd Id","Deal Name","Package Name", 
			 	"Email id","Service Type","Login Id", "Services", "Expire Date",);
			 foreach($result as $list){
				  //if($list->trans_no != ''){$val = "Success";}else{$val = "Fail";}
                    $data_array[] = array(
							$list->ad_prefix.'_'.str_pad($list->ad_id, 7, "0", STR_PAD_LEFT),
							$list->deal_tag,
							$list->pkg_dur_name, 
							$list->login_email, 
							$list->service_type,
							$list->login_id, 
							$list->services,							
							$list->expire_data, 
							);
			 }
			  $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML ( "ads_list" );
		}

		public function get_newsletterreport(){
			$this->load->helper('php-excel');
			 $result = $this->report_model->get_newsletters();
			 /*$data_array[] = array( "PostAd Id","Deal Name","Package Name", 
			 	"Email id","Service Type","Login Id", "Services", "Expire Date",);*/
			 foreach($result as $list){
                    $data_array[] = array(
							$list->nl_email, 
							);
			 }
			  $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML (time());
		}

		public function get_transactions(){
			$this->load->helper('php-excel');
			 $ins_status = $this->transaction_models->get_Transactions();
			 $data_array[] = array( "Transaction Id","Deal Tag","User id", 
			 	"User Name","Done On","E-Mail", "Gross Amount", "Payment Status",);
			 foreach($ins_status as $list){
                    $data_array[] = array(
							$list->txn_id, 
							$list->deal_tag,
							$list->login_id,
							ucwords($list->first_name).'&nbsp;'.ucwords($list->lastname),
							date("d-m-Y H:i:s", strtotime($list->payment_date)),
							$list->login_email,
							$list->gross_amt,
							$list->payment_status
							);
			 }
			  $xls = new Excel_XML;
            $xls->addArray ($data_array);
            $xls->generateXML (time());
		}
		
}
?>

