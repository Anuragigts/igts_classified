<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Pickup_deals extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
               }
        public function index(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '".$this->session->userdata('login_id')."')  "), 0, 'first_name');
                $pickup_deals = $this->classifed_model->pickup_deals();
                // echo "<pre>";
                // print_r($this);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "pickup_deals",
                        "pickup_deals"=> $pickup_deals,
                        'log_name'=> $log_name
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function pickup_deals_search(){
             if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                $pickup_deals = $this->classifed_model->pickup_deals_search();
                $log_name = @mysql_result(mysql_query("SELECT first_name FROM signup WHERE sid = (SELECT signupid FROM `login` WHERE `login_id` = '".$this->session->userdata('login_id')."')  "), 0, 'first_name');
                $result   =   array(
                        'pickup_deals'=> $pickup_deals,
                        'log_name'=>$log_name
                );

                echo $this->load->view("classified/pickup_deals_search", $result);

        }
}

