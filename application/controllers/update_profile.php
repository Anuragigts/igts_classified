<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Update_profile extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("profile_model");
               }
        public function index(){
                /*session expiry to login*/
                if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                /*stored profile data*/
                // echo "<pre>"; print_r($this->session->all_userdata());
                // echo "<pre>"; print_r($this->profile_model->prof_data());
                // $data['prof_data'] = $this->profile_model->prof_data();

                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "update_profile",
                        'prof_data' =>  $this->profile_model->prof_data()
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function up_profile(){
            $fname1 = $this->input->post('fname1');
            $lname1 = $this->input->post('lname1');
            $mobile1 = $this->input->post('mobile1');
            
            if ($fname1 == '' || $lname1 == '' || $mobile1 == '' || strlen($mobile1) != 10 ) {
                 echo json_encode('1');
            }

            //Either you can print value or you can send value to database
            echo json_encode($fname1);
        }
}

