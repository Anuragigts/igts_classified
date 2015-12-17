<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("login_model");
        }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "login"
                );
                if($this->input->post("login")){
                        $this->form_validation->set_rules("email","Email Id","required|valid_email");
                        //echo $this->input->post("chbox");exit;
                        if($this->input->post("w_check") == "1"){
                                $this->form_validation->set_rules("password","Password","");
                               $mail_exist = $this->login_model->mailexist();
                            // echo "<pre>"; print_r($this);
                            if($mail_exist == 1){
                              $this->session->set_flashdata("err","Please Check your Email Id");
                                            redirect("login");  
                            }
                        }
                        if($this->input->post("w_check") == ""){
                              $this->form_validation->set_rules("password","Password","required");
                        }
                        if($this->form_validation->run() == TRUE){
                             
                            
                            // exit;
                                    $ins    = $this->login_model->check();
                                    if($ins>0){
                                            redirect("postad");
                                    }else{
                                            $this->session->set_flashdata("err","Login Failed : Please Check your Email Id and Password");
                                            redirect("login");                                        
                                    }
                        }
                }
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function checkunset(){
                $this->session->unset_userdata("chebox");
                $this->session->unset_userdata("info");
                $this->session->unset_userdata("login_id");
        }
        public function  logout(){
                $this->session->sess_destroy();
                redirect("/");
        }
}

