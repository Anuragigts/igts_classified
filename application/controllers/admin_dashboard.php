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
				//$pkg_types = $this->admin_model->get_pkg_details();
				//echo '<pre>';print_r($no_of_ads);echo '</pre>';//exit;
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dashboard",
						"no_of_ads"     =>     $no_of_ads,
						//"pkg_types"     =>     $pkg_types,
						"ads_count"     =>     $ads_count
                );
				//echo '<pre>';print_r($data);echo '</pre>';exit;
                $this->load->view("admin_layout/inner_template",$data);
        }
}
?>

