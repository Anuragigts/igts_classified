<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	class Coupons extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model("admin_model");
			$this->load->model("coupons_model");
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
	
		public function ListCoupons(){
		
			$coupons_list = $this->coupons_model->get_coupons();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "coupons_list",
						"coupons_list"  =>     $coupons_list,
				);
			$this->load->view("admin_layout/inner_template",$data);
		}
		public function AddCoupon(){
			if($this->input->post()){
				echo '<pre>';print_r($this->input->post());echo '</pre>';
				$this->form_validation->set_rules("c_value","Coupon Code","required");
				$this->form_validation->set_rules("max_disc","Maximum Discount","required");
				$this->form_validation->set_rules("c_type","Coupon Type ","required");
				//$this->form_validation->set_rules("c_count","Coupon Count","required");
				$this->form_validation->set_rules("c_status","Coupon Status","required");
				if($this->form_validation->run() == TRUE){
					 $ins_status = $this->coupons_model->add_new_coupon();	
				}
				else{
					$this->session->set_flashdata('err','Some details are not valid, Please try again');
					$user_list = $this->admin_model->get_userlist();
				}
			}
			else{
			$coupons_list = $this->coupons_model->get_coupons();
			$data   =   array(
						"title"         =>     "Admin Dashboard",
						"metadesc"      =>     "Classifieds :: Admin Dashboard",
						"metakey"       =>     "Classifieds :: Admin Dashboard",
						"content"       =>     "addNewCoupon",
				);
				$this->load->view("admin_layout/inner_template",$data);
			}
		}
		function change_status(){
			$change_status = $this->coupons_model->change_status();
			$status = $this->input->post('status');
			$coupon = $this->input->post('coupon');
			if($status == 0){
				echo "<span class='btn btn-danger'><i class='halflings-icon plus-sign active_coupon' id='coupon_".$coupon."'title='Activate Coupon'></i></span>";
			}else{
				echo "<span class='btn btn-success'><i class='halflings-icon minus-sign inactive_coupon' id='coupon_".$coupon."'title='In-Activate Coupon'></i></span>";
			}
			//echo $this->db->last_query();
			//return $change_status;
		}
	}
?>

