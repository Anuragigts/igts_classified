<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Contact_us extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
               }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "contact_us"
                );
                if ($this->input->post("submit")) {
                    $ins = $this->classifed_model->contactus_create();
                    if ($ins == 1) {
                        $this->session->set_flashdata("msg", "Your Form Submitted Successfully");
                        redirect("contact-us");
                     }
                    else{
                        $this->session->set_flashdata("err", "Internal error occured");   
                    }
                }
                $this->load->view("classified_layout/inner_template",$data);
        }
}

