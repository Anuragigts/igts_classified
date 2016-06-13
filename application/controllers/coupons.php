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
				$this->form_validation->set_rules("c_value","Coupon Value","required");
				$this->form_validation->set_rules("c_prefix","Coupon Code","required");
				$this->form_validation->set_rules("c_status","Coupon Status","required");
				// $cval = $this->input->post("c_value");
				if($this->form_validation->run() == TRUE){
					$couponexist = $this->coupons_model->couponexist($this->input->post("c_prefix")); 
					if ($couponexist == 1) {
						$this->session->set_flashdata('err','Coupon Code is already exist');
						redirect('coupons/AddCoupon');
					}
					else{
					$this->session->set_flashdata('msg','Coupon Code is Successfully Inserted');
					 $ins_status = $this->coupons_model->add_new_coupon();	
					 redirect('coupons/ListCoupons');
					}
				}
				else{
					$this->session->set_flashdata('err','Some details are not valid, Please try again');
				}
			}
			$data   =   array(
					"title"         =>     "Admin Dashboard",
					"metadesc"      =>     "Classifieds :: Admin Dashboard",
					"metakey"       =>     "Classifieds :: Admin Dashboard",
					"content"       =>     "addNewCoupon",
			);
			$this->load->view("admin_layout/inner_template",$data);
		}
		function change_status(){
			$change_status = $this->coupons_model->change_status();
			$status = $this->input->post('status');
			$coupon = $this->input->post('coupon');
			if($status == 0){
				echo "<span class='btn btn-danger active_coupon' id='coupon_".$coupon."'><i class='halflings-icon plus-sign' title='Activate Coupon'></i></span>";
			}else{
				echo "<span class='btn btn-success inactive_coupon' id='coupon_".$coupon."'><i class='halflings-icon minus-sign' title='In-Activate Coupon'></i></span>";
			}
			//echo $this->db->last_query();
			//return $change_status;
		}
		function get_c_result(){
			if($this->input->post('c_code')){
				$c_code = $this->input->post('c_code');
				//$post_ad_amt = $this->input->post('post_ad_amt');
				$ad_id = $this->input->post('ad_id');
				$p_amt = $this->coupons_model->get_ad_amt($ad_id);
				//echo '<pre>';print_r($p_amt);echo '</pre>';
				if ($p_amt->u_pkg__pound_cost !='') {
					$amt1 = $p_amt->u_pkg__pound_cost+$p_amt->cost_pound;
				}
				else{
					$amt1 = $p_amt->cost_pound;
				}
				$amt = (($amt1)+($amt1)*(0.2));
				$c_info = $this->coupons_model->get_c_result($c_code);
				if(count($c_info) == 1){
					$disc = $amt*($c_info->c_value)/100;
					if($c_info->max_cus == 0){
						
						$pkg_disc_amt = $amt-$disc;
						//echo $pkg_disc_amt ;
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
							$pkg_disc_amt = $amt-(($amt*($c_info->c_value))/100);
							//echo $pkg_disc_amt ;
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
									'c_code'		=>		$c_code,
									'c_value' 		=>		0,
									'max_cus' 		=>		0,
									'used_count' 	=>		0,
									'pkg_disc_amt'	=>		$amt,
									'disc'			=>		0.00,
									'c_responce'	=>		"<span style='color:red'>The Coupon Code you have added is Expired or Invalid.</span>" 
						); 
						$info = json_encode($c_details);
						echo $info;
				}
			}
		}

		public function cancel_adv(){
			$adid = $this->input->post('ad_id');
			$removead = $this->coupons_model->cancel_adv($adid);
			if ($removead == 1) {
				$this->session->unset_userdata("postad_time");
				$this->session->unset_userdata("postad_success");
				$this->session->unset_userdata("last_insert_id");
				$this->session->set_userdata("cancelad", "Your Ad is cancelled");
				$this->session->set_userdata("cance_time", time());
				echo 1;
			}
			else{
				$this->session->set_userdata("cancelad", "Inter error occured");
				echo 0;
			}
		}

		public function adrenewal_cancelad(){
			$this->session->set_flashdata("err", "Your Ad Renewal has been cancelled");
			echo 1;
		}

		public function coupon_codeexist(){
			$cval = $this->input->post("cval");
			$couponexist = $this->coupons_model->couponexist($cval);
			if ($couponexist == 1) {
				echo 1;
			}
			else{
				echo 0;
			}
		}
	}
?>

