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
                $this->load->model("signup_model");
                $this->load->model("classifed_model");
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
                    // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        // Google Project API Credentials
        $clientId = '438313202103-5ts2epm0c9b8mlj4ddf4lkis3l2qmkq0.apps.googleusercontent.com';
        $clientSecret = 'KIW-gQpaglq1dwa3gBAerJdP';
        $redirectUrl = 'http://99rightdeals.com/gmail_signup';
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('99rightdeals');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if($this->session->userdata("set_gf") && $this->session->userdata("set_gf") == 1){
                if (isset($_REQUEST['code'])) {
                    $gClient->authenticate();
                    $this->session->set_userdata('token', $gClient->getAccessToken());
                    redirect($redirectUrl);
                }
        
                $token = $this->session->userdata('token');
                if (!empty($token)) {
                    $gClient->setAccessToken($token);
                }
                if ($gClient->getAccessToken()) {
                    $userProfile = $google_oauthV2->userinfo->get();
                    // Preparing data for database insertion
                    $userData['oauth_provider'] = 'google';
                    $userData['oauth_uid'] = $userProfile['id'];
                    $userData['first_name'] = $userProfile['given_name'];
                    $userData['last_name'] = $userProfile['family_name'];
                    $userData['email'] = $userProfile['email'];
                    $userData['locale'] = $userProfile['locale'];
                    $userData['profile_url'] = $userProfile['link'];
                    $userData['picture_url'] = $userProfile['picture'];
                } else {
                    $data['authUrl'] = $gClient->createAuthUrl();
                }
                    }
                    else{
                         $data['authUrl'] = $gClient->createAuthUrl();
                    }
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
                            // echo "<script> window.opener.location = 'fbsignup'; window.close(); </script>";
                            $data['login_url'] = $this->facebook->getLoginUrl(
                                array(
                                'redirect_uri' => site_url('login'), 
                                'scope' => array("email") // permissions here
                                 ));
                        }
                if($this->input->post("submit")){
                    $ins    = $this->login_model->check();
    				if($ins>0){
                        /*favourite without login*/
                        if ($this->session->userdata('favadid')) {
                            $exists = $this->classifed_model->favexists();
                            if ($exists == 1) {//yes
                                $remove = $this->classifed_model->remove_fav();
                                if ($remove == 1) {
                                    $this->session->unset_userdata('favadid');
                                    redirect($this->session->userdata('favpath'));
                                }
                            }
                            else{
                                $add = $this->classifed_model->add_fav();
                                if ($add == 1) {
                                    $this->session->unset_userdata('favadid');
                                    redirect($this->session->userdata('favpath'));
                                }
                            }

                        }
                        /*likes without login*/
                        if ($this->session->userdata('likeadid')) {
                           $exists = $this->classifed_model->likexists();
                            if ($exists == 1) {//yes
                                $remove = $this->classifed_model->removelikeslogin();
                                if ($remove == 1) {
                                    $this->session->unset_userdata('likeadid');
                                    redirect($this->session->userdata('likepath'));
                                }
                            }
                            else{
                                $add = $this->classifed_model->addlikeslogin();
                                if ($add == 1) {
                                    $this->session->unset_userdata('likeadid');
                                    redirect($this->session->userdata('likepath'));
                                }
                            }
                        }
                        /*reviews without login*/
                        if ($this->session->userdata('reviewadid')) {

                           $exists = $this->classifed_model->reviewexistslogin();
                           $a = $this->session->userdata('reviewpath');
                            if ($exists == 1) {//yes
                                $update = $this->classifed_model->reviewupdate1();
                                if ($update == 1) {
                                    $this->session->unset_userdata('reviewadid');
                                    $this->session->set_flashdata('msg', 'Review Updated Successfully!!');
                                    redirect($this->session->userdata('reviewpath'));
                                }
                            }
                            else{
                                $add = $this->classifed_model->reviewinsert1();
                                if ($add == 1) {
                                    $this->session->unset_userdata('reviewadid');
                                    $this->session->set_flashdata('msg', 'Review added Successfully!!');
                                    redirect($this->session->userdata('reviewpath'));
                                }
                            }
                        }
                         /*savedsearch without login*/
                        if ($this->session->userdata('search_cat')) {
                                $exist = $this->classifed_model->addexist_search(); 
                                if ($exist > 0) {
                                    $this->session->unset_userdata('search_cat');
                                    redirect($this->session->userdata("saved_search"));
                                }
                                else{
                                  $save = $this->classifed_model->addsavedsearchlogin();
                                  if ($save == 1) {
                                     $this->session->unset_userdata('search_cat');
                                    redirect($this->session->userdata("saved_search"));
                                  }
                                }
                            }

                        /*hotdealsearch without login*/
                        if ($this->session->userdata('hotcat_id')) {

                            $exist = $this->classifed_model->hotdealsexists(); 
                            if ($exist > 0) {
                                $this->session->unset_userdata('hotcat_id');
                                redirect($this->session->userdata("saved_search1"));
                            }
                            else{
                              $save = $this->classifed_model->addsaved_hotdeals();
                              if ($save == 1) {
                                 $this->session->unset_userdata('hotcat_id');
                                redirect($this->session->userdata("saved_search1"));
                              }
                            }
                        }
    						redirect("post-a-deal");
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

