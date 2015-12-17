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
                $data   =   array(
                        "title"         =>     "Classifieds :: Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dashboard"
                );
                $this->load->view("admin_layout/inner_template",$data);
        }
}
?>

