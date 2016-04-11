<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Common extends CI_Controller {
        public function __construct(){
                parent::__construct();
                $this->load->model("admin_model");
                $this->load->model("common_model");
                $this->load->model("login_model");
        }
        public function getStates(){
               $cst     =   '<option value="">-- Select State --</option>';
               $va      =   $this->common_model->states();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->State_id.'>'.$st->State_name.'</option>';
               }
               echo $cst;
        }
        public function getCities(){
               $cst     =   '<option value="">-- Select City --</option>';
               $va      =   $this->common_model->cities();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->City_id.'>'.$st->City_name.'</option>';
               }
               echo $cst;
        }
        public function checkEmail(){
                 echo  $this->common_model->checkEmail();
        }        
        public function getAll(){
                $view["get"]   =   $this->common_model->getAll();
                $this->load->view('admin/view_all',$view); 
        }
        public function custActDea(){
                $cu     =   $this->common_model->custActDea();
                echo $cu;
        }        
        public function getSubcat(){
               $cst     =   '<option value="">-- Select Sub Category --</option>';
               $va      =   $this->common_model->getSubcat();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->sub_category_id.'>'.ucfirst($st->sub_category_name).'</option>';
               }
               echo $cst;
        }
        public function getssbcat(){
               $cst     =   '<option value="">-- Select Sub Sub Category --</option>';
               $va      =   $this->common_model->getSsubcat();
               foreach ($va as $st){
                        $cst    .=   '<option value='.$st->sub_subcategory_id.'>'.ucfirst($st->sub_subcategory_name).'</option>';
               }
               echo $cst;
        }
        public function checkaddr(){
                echo $this->common_model->checkaddr();
        }
        public function  activate(){
                $data   =   array(
                                    "title"         =>      "Classified",
                                    "content"       =>      "activate"
                            );
                $uri            =       $this->uri->segment(3);
                if($this->input->post("change")){
                        $this->form_validation->set_rules("password",'Password',"required");
                        $this->form_validation->set_rules("conpassword",'Confirm Password',"required");
                        if($this->form_validation->run() == TRUE){
                                $inp        =       $this->common_model->add_password($uri);
                                if($inp == 1){
                                        $this->session->set_flashdata("msg","Your Acount has been Activated Successfully.Now you can Login with your Email and Password");
                                        redirect("login");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while activating your account");
                                        redirect("login");
                                }
                        }
                }
                $data["ve"]     =       $this->common_model->activate($uri);
                if(count($data["ve"]) == 0){
                        $this->session->set_flashdata("err","Your Account has been already activated");
                        redirect("login");
                }
                $this->load->view("classified_layout/inner_template",$data);
        }

        /*signup activate*/
        public function signup_activate(){
             $ul = $this->uri->segment(3);
            $res = $this->common_model->signup_activate($ul);
             if($res == 1){
                        $this->session->set_flashdata("msg","Your Acount has been Activated Successfully.");
                         redirect("login");
                }else{
                        $this->session->set_flashdata("err","Internal error occured while deactivating your account");
                        redirect("login");
                }
        }

        public function  deactivate(){
                $uri            =       $this->uri->segment(3);
                $inp            =       $this->common_model->deactivate($uri);
                if($inp == 1){
                        $this->session->set_flashdata("msg","Your Acount has been Deactivated Successfully.");
                         $this->session->sess_destroy();
                        redirect("login");
                }else{
                        $this->session->set_flashdata("err","Internal error occured while deactivating your account");
                        redirect("login");
                }
        }


        public function re_activate(){
            $data   =   array(
                                    "title"         =>      "Classified",
                                    "content"       =>      "activate"
                            );
                $uri            =       $this->uri->segment(3);
                if($this->input->post("change")){
                        $this->form_validation->set_rules("password",'Password',"required");
                        $this->form_validation->set_rules("conpassword",'Confirm Password',"required");
                        if($this->form_validation->run() == TRUE){
                                $inp        =       $this->common_model->add_password($uri);
                                if($inp == 1){
                                        $this->session->set_flashdata("msg","Your Acount has been Activated Successfully.Now you can Login with your Email and Password");
                                        redirect("login");
                                }else{
                                        $this->session->set_flashdata("err","Internal error occured while activating your account");
                                        redirect("login");
                                }
                        }
                }
                $data["ve"]     =       $this->common_model->activate($uri);
                if(count($data["ve"]) == 0){
                        $this->session->set_flashdata("err","Your Account has been already activated");
                        redirect("login");
                }
                $this->load->view("classified_layout/inner_template",$data);
}

        public function getsearch(){
                $dta["view"] = $this->common_model->getsearch();
                $this->load->view("classified/view_search",$dta);
        }

        public function forgot($rcode){


             if ($this->input->post('forgot_pwd')) {
                         $this->form_validation->set_rules("password","Password","trim|required|min_length[8]|check_pass|matches[conf_password]");
                        $this->form_validation->set_rules("conf_password","Confirm Password","required");
                         if($this->form_validation->run() == TRUE){
                                // redirect('forgot_password');
                            $pwd = md5($this->input->post('password'));
                            $this->login_model->forgot_update($pwd, $rcode);
                            $this->session->set_flashdata("msg","Password Changed Successfully!!");
                                            redirect("login");  
                         }
                }
             $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "forgot_password_active",
                        "rcode"     =>  "$rcode"
                        );
             $this->load->view("classified_layout/inner_template",$data);
        }
}
?>