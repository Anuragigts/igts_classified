<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class  Deals_administrator extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
        }
        public function index(){
                if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                $my_ads = $this->classifed_model->my_ads();
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '".$this->session->userdata('login_id')."')  "), 0, 'first_name');
                // echo "<pre>"; print_r($this);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "deals_administrator",
                        'my_ads_details'=> $my_ads,
                        'log_name'=>$log_name
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
}

