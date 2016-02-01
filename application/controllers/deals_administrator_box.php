<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Deals_administrator_box extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
        }
        public function index(){
                if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
                $my_ads = $this->classifed_model->my_ads();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator_box",
                        'my_ads_details'=> $my_ads
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

