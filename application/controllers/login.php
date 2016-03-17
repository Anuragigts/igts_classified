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
                if($this->input->post("submit")){

                        $this->form_validation->set_rules("email","Email Id","required|valid_email");
                        
                                    $ins    = $this->login_model->check();
                                    if($ins>0){
                                            redirect("postad");
                                    }else{
                                            $this->session->set_flashdata("err","Login Failed : Please Check your Email Id or Password");
                                            redirect("login");                                        
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

