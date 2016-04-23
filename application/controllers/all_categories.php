<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  All_categories extends CI_Controller{
        public function __construct(){
                parent::__construct();
                //$this->load->model("login_model");
        }
        public function index(){
            if ($this->input->post()) {
                echo "<pre>"; print_r($this->input->post()); echo "</pre>";
            }
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "all_categories"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

