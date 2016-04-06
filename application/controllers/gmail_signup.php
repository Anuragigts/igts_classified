<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Gmail_signup extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("signup_model");
               }
        public function index(){
            if ($this->input->get("error") && $this->input->get("error") == 'access_denied') {
                redirect("login");
            }
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
            //$userData['profile_url'] = $userProfile['link'];
            //$userData['picture_url'] = $userProfile['picture'];
        }
                $already = $this->signup_model->onloadgmail_already($userData['oauth_uid']);
                            if($already == 1){
                                    redirect('/');
                    }
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "gmailsignup",
                        'gmail_data'=> $userData
                );

        if($this->input->post("submit")){
                        $already = $this->signup_model->gmail_already();
                            if($already == 1){
                                    redirect('/');                 
                            }
                            else{
                                    $this->signup_model->gmail_create();
                                    redirect('/');
                                }
                }
        $this->load->view("classified_layout/inner_template",$data);
        }
}