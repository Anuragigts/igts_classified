<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Deal_page extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("hotdealsearch_model");
               }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deal_page"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function result_form(){
           $rs['result'] = $this->hotdealsearch_model->hotdeal_search();
           echo $this->load->view("classified/deal_page_search", $rs);
        }
}

