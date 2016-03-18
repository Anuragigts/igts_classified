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
                 $this->load->library('facebook');
        }
        public function index(){
            $this->load->library('facebook'); // Automatically picks appId and secret from config
        $_REQUEST += $_GET; 
        $user = $this->facebook->getUser();
                    $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "login"
                    );
                        if ($user) {
                            try {
                                $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,name,link,email,gender');
                                $this->session->set_userdata("fb_data", $data['user_profile']);
                            } catch (FacebookApiException $e) {
                                $user = null;
                            }
                        }
                        if ($user) {
                            echo "<script> window.opener.location = 'fbsignup'; window.close(); </script>";

                            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
                            // OR 
                            // Logs off FB!
                            // $data['logout_url'] = $this->facebook->getLogoutUrl();

                        } else {
                            echo "<script> window.opener.location = 'fbsignup'; window.close(); </script>";
                            $data['login_url'] = $this->facebook->getLoginUrl(
                                array(
                                'redirect_uri' => site_url('login'), 
                                'scope' => array("email") // permissions here
                                 ));
                        }
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
                $this->facebook->destroySession();
                redirect("/");
        }

        public function fblogin(){

        // Automatically picks appId and secret from config
        $_REQUEST += $_GET; 
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,name,link,email,gender');
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            // Solves first time login issue. (Issue: #10)
            //$this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('welcome/logout'); // Logs off application
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(
                array(
                'redirect_uri' => site_url('welcome/login'), 
                'scope' => array("email") // permissions here
                 ));
        }
        $this->load->view('login',$data);

    }
}

