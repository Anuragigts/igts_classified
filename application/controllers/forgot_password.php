<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Forgot_password extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("login_model");
        }
        public function index(){
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "forgot_password"
                );

                if ($this->input->post('forgot')) {
                         $this->form_validation->set_rules("forgotemail","Email Id","required|valid_email");
                         if($this->form_validation->run() == TRUE){
                                // redirect('forgot_password');
                            if($this->input->post('forgot')){
                                $mail = $this->input->post('forgotemail');
                                $mail_check = $this->login_model->forgot($mail);
                                if ($mail_check == 1) {
                                    $this->session->set_flashdata("err","Please Check your Email Id");
                                            // redirect(base_url()."forgot-password");
                                    echo'<script>window.location.href = "'.base_url().'forgot-password";</script>';
                                }
                                else{
                                    $this->session->set_flashdata("msg","Verification Link has been sent");
                                            // redirect("forgot-password");
                                    echo'<script>window.location.href = "'.base_url().'forgot-password";</script>';
                                }
                            }
                         }
                }
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        
        
}

?>

