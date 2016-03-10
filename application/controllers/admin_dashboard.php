<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_dashboard extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
        }
        public function  index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
				
				$ads_count = $this->admin_model->get_adsdetails();
				$no_of_ads = $this->admin_model->get_no_of_ads();
				$latest_ads = $this->admin_model->get_latest_ads();
				$reports_count = $this->admin_model->get_reports_count();
				$feedback_count = $this->admin_model->get_feedback_count();
				$monthly_ads = $this->admin_model->get_monthly_ads_count();

				//$pkg_types = $this->admin_model->get_pkg_details();
				//echo '<pre>';print_r($monthly_ads);echo '</pre>';exit;
				//echo '<pre>';print_r($reports_count);echo '</pre>';exit;
				if(isset($reports_count[0])){
					$ina_reports = $reports_count[0]->r_count;
				}else{
					$ina_reports = 0;
				}
				if(isset($reports_count[1])){
					$a_reports = $reports_count[1]->r_count;
				}else{
					$a_reports = 0;
				}
				if(isset($feedback_count[0])){
					$ina_feedback = $feedback_count[0]->f_count;
				}else{
					$ina_feedback = 0;
				}
				if(isset($feedback_count[1])){
					$a_feedback = $feedback_count[1]->f_count;
				}else{
					$a_feedback = 0;
				}
				$info = array(
						'a_feedback' =>  $a_feedback,
						'ina_feedback' =>  $ina_feedback,
						'a_reports' =>  $a_reports,
						'ina_reports' =>  $ina_reports,
				);
				//echo '<pre>';print_r($info);echo '</pre>';exit;
				$this->session->set_userdata($info);
				
                $data   =   array(
                        "title"         	=>     "Classifieds :: Admin Dashboard",
                        "metadesc"      	=>     "Classifieds :: Admin Dashboard",
                        "metakey"      	 	=>     "Classifieds :: Admin Dashboard",
                        "content"      	 	=>     "dashboard",
						"no_of_ads"     	=>     $no_of_ads,
						"latest_ads"     	=>     $latest_ads,
						"reports_count"     =>     $reports_count,
						"feedback_count"    =>     $feedback_count,
						"ads_count"     	=>     $ads_count,
						'monthly_ads' 		=>  	$monthly_ads,
                );
				//echo '<pre>';print_r($data['latest_ads']);echo '</pre>';exit;
                $this->load->view("admin_layout/inner_template",$data);
        }
}
?>

