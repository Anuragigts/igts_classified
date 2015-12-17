<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ads extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Admin Dashboard",
                        "metadesc"      =>     "Classifieds :: Admin Dashboard",
                        "metakey"       =>     "Classifieds :: Admin Dashboard",
                        "content"       =>     "dashboard"
                );
                $this->load->view("admin_layout/inner_template",$data);
        }
}
?>