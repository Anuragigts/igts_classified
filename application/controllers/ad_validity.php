<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ad_validity extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("ad_validity_model");
        }
        public function index(){
                if($this->session->userdata("user_type") == ""){  redirect("/");};
                $data   =   array(
                        "title"         =>     "Classifieds :: Ad Validity & Price",
                        "metadesc"      =>     "Classifieds :: Ad Validity & Price",
                        "metakey"       =>     "Classifieds :: Ad Validity & Price",
                        "content"       =>     "ad_validity"
                );
                if($this->input->post("ad_validity")){
                        $this->form_validation->set_rules("ad_name","Ad Name","required");
                        $this->form_validation->set_rules("price","Price","required");
                        $this->form_validation->set_rules("days","Days","required");
                        if($this->form_validation->run() == TRUE){
                                $in     =      $this->ad_validity_model->ad_validity();
                                if($in == 1){
                                        $this->session->set_flashdata("msg","Ad Validity & Price Successfully");
                                        redirect("ad_validity");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating ad validity & price");
                                        redirect("ad_validity");
                                }
                        }
                }
                $data["view"] = $this->ad_validity_model->vad_validity();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function  ead_validity(){
                echo  $this->ad_validity_model->ead_validity();
        }
        public function  uad_validity(){
                echo  $this->ad_validity_model->uad_validity();
        }
        public function delete(){
                $uri    =       $this->uri->segment(3);
                $in     =       $this->ad_validity_model->deletead_validity($uri);
                $this->session->set_flashdata("msg","Deleted Ad Validity & Price Successfully");
                redirect("ad_validity");
        }
}
?>