<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Baby_girl_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                //$this->load->model("login_model");
        }
        public function index(){
                if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "baby_girl_view"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

