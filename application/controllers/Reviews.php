<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	class Reviews extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model("reviews_model");
		}
		public function index(){
			if($this->input->post("sign_in")){
					$this->form_validation->set_rules("email","Email Id","required|valid_email");
					$this->form_validation->set_rules("password","Password","required");
					if($this->form_validation->run() == TRUE){
							$ins = $this->admin_model->login();
							if($ins == 1){
									$this->session->set_flashdata("msg","Login Success");
									redirect("admin_dashboard");
							}
							else{
									$this->session->set_flashdata("err","Login Failed");
									redirect("admin/index");
							}
					}
			}
		$this->load->view('admin_layout/login');
	}
	
		public function AllReview(){
		
			$ReviewList = $this->reviews_model->get_reviews();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "ReviewList",
						"ReviewList" 	=>     $ReviewList,
				);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function reviewByAd(){
		
			$ReviewList = $this->reviews_model->get_reviewByAd();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "ReviewByAd",
						"ReviewList" 	=>     $ReviewList,
				);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function getAdReviews(){
			$ad_id = $this->uri->segment(3);
			$ReviewList = $this->reviews_model->get_Adreview($ad_id );
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "ReviewList",
						"ReviewList" 	=>     $ReviewList,
				);
				$this->load->view("admin_layout/inner_template",$data);
		}
		function change_status(){
			$change_status = $this->reviews_model->change_status();
			$status = $this->input->post('status');
			$review = $this->input->post('coupon');
			if($status == 0){
				echo "<span class='btn btn-danger active_coupon' id='review_".$review."'><i class='halflings-icon plus-sign' title='Activate Review'></i></span>";
			}else{
				echo "<span class='btn btn-success inactive_coupon' id='review_".$review."'><i class='halflings-icon minus-sign' title='In-Activate Review'></i></span>";
			}
			//echo $this->db->last_query();
			//return $change_status;
		}
		
	}
?>

