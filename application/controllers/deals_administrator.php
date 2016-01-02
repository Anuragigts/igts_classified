<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Deals_administrator extends CI_Controller{
        public function __construct(){
                parent::__construct();
                //$this->load->model("login_model");
        }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

