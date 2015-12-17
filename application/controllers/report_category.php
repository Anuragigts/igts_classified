<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Report_category extends CI_Controller{
        public function __construct() {
                parent::__construct();
                $this->load->model("report_model");
                if($this->session->userdata("user_type") == ""){  redirect("/");};
        }
        public function index(){
                $data   =   array(
                                "title"         =>      "Classifieds :: Admin Report Category",
                                "metadesc"      =>      "Classifieds :: Admin Report Category",
                                "metakey"       =>      "Classifieds :: Admin Report Category",
                                "content"       =>      "report_category"
                        );
                if($this->input->post("report_type")){
                        $this->form_validation->set_rules("rtype","Report Type","required");
                        if($this->form_validation->run() == TRUE){
                                $in = $this->report_model->ireport();
                                if($in == 1){
                                        $this->session->set_flashdata("msg","Report Type Successfully");
                                        redirect("report_category");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating report type");
                                        redirect("report_category");
                                }
                        }
                }
                $data["view"]   =   $this->report_model->vreport();
                $this->load->view("admin_layout/inner_template",$data);
        }
        public function ereport_category(){
                echo $this->report_model->ereport_category();
        }
        public function uareport_category(){
                $uri    =       $this->uri->segment(3);
                echo $this->report_model->uareport_category($uri);
        }
        public function delete(){
                $uri    =       $this->uri->segment(3);
                $this->report_model->delete($uri);
                $this->session->set_flashdata("msg","Deleted Report Type Successfully");
                redirect("report_category");
        }
}
?>

