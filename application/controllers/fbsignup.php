<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class fbsignup extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("signup_model");
               }
        public function index(){
                $fbdata = $this->session->userdata('fb_data');
                if (!empty($fbdata)) {
                    $already = $this->signup_model->onloadfb_already();
                    if($already == 1){
                        redirect(base_url());                  
                    }
                }
                if (!empty($fbdata)) {
                    if (array_key_exists('id', $fbdata)) {
                     $fbid = $fbdata['id'];
                    } else {
                     $fbid = '';
                    }
                    if (array_key_exists('first_name', $fbdata)) {
                     $fbfname = $fbdata['first_name'];
                    } else {
                     $fbfname = '';
                    }
                    if (array_key_exists('last_name', $fbdata)) {
                     $fblname = $fbdata['last_name'];
                    } else {
                     $fblname = '';
                    }
                    if (array_key_exists('email', $fbdata)) {
                     $fbemail = $fbdata['email'];
                    } else {
                     $fbemail = '';
                    }
                }
                else{
                    $fbid = '';
                    $fbfname = '';
                    $fblname = '';
                    $fbemail = '';
                }
                if($this->input->post("submit")){
                        $already = $this->signup_model->fb_already();
                            if($already == 1){
                                    redirect(base_url());                 
                            }
                        else{
                                $this->signup_model->fb_create();
                                 redirect(base_url()); 
                            }
                }
                $data   =   array(
                    "title"     =>  "Classifieds",
                        "content"   =>  "fbsignup",
                        "fbid"     =>  $fbid,
                        "fbfname"   =>  $fbfname,
                        "fblname"   =>  $fblname,
                        "fbemail"   =>  $fbemail
                );
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function gmail_account(){
            
        }
}

