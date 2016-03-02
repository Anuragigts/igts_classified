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
        }
        public function Ads(){
			$ads_images = $this->ads_model->get_ads_media($ad_id);
			$ads_videos = $this->ads_model->get_ads_videos($ad_id);

			$data   =   array(
					"title"         =>     "Admin Dashboard",
					"metadesc"      =>     "Classifieds :: Admin Dashboard",
					"metakey"       =>     "Classifieds :: Admin Dashboard",
					"content"       =>     "Ads_report",
			);
			$this->load->view("admin_layout/inner_template",$data);
        }
}
?>

