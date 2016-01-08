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
                 $this->session->set_flashdata("err","Invalid inputs");
                 echo json_encode('1');
            }
            else{
                $res_prof = $this->profile_model->prof_update();
                if($res_prof == 1){
                $this->session->set_flashdata("msg","profile updated successfully!!");
                echo json_encode('0');    
                }
                else{
                 $this->session->set_flashdata("err","Invalid inputs");
                 echo json_encode('1');
                }
            }
        }

        /*change password*/
        public function change_pwd(){
           $cur_pwd = $this->input->post('cur_pwd1');
            $pwd = $this->input->post('pwd1');
            $conf_pwd = $this->input->post('conf_pwd1');
            if($cur_pwd == '' || $pwd == '' || $conf_pwd == ''){
                $this->session->set_flashdata("err","Invalid inputs");
                echo json_encode('1');
            }
            else if($pwd != $conf_pwd){
                $this->session->set_flashdata("err","Invalid inputs");
                echo json_encode('1');
            }
            else{
                $res_pwd = $this->profile_model->change_pwd_exist();
                if($res_pwd == 0){
                    $this->profile_model->change_pwd_up();
                    $this->session->set_flashdata("msg","Password Changed Successfully!!");
                    echo json_encode('0');
                }else{
                    $this->session->set_flashdata("err","Incorrect Password");
                   echo json_encode('1');
                }
                
            }
        }
}

