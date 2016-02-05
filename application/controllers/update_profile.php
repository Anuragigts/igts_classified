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

                if ($this->session->userdata("postad_time") != '') {
                    $new_time = time() - $this->session->userdata("postad_time");
                    if ($new_time > 0) {
                        $this->session->unset_userdata('postad_success');
                    }
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

        /*deactivate account*/
        public function deactivate_account(){
            $mail = $this->input->post('mail');
            $rand_val = md5(rand(10000,99999));
            $inp            =       $this->profile_model->deactivate($rand_val);
            if ($inp == 1) {
                 // $this->session->sess_destroy();
                $this->session->set_flashdata("msg","Account Deactivated Successfully!!");
                 echo json_encode('0');
            }
            else{
                $this->session->set_flashdata("err","internal error occured!!");
                 echo json_encode('1');

            }
        }

        /*re activate account*/
        public function re_activate(){
                 $uri            =       $this->uri->segment(3);
                $login_id       =        $this->uri->segment(4);

                $in = $this->profile_model->activate($uri, $login_id);
                if($in == 1){
                     // $this->session->sess_destroy();
                    $this->session->set_flashdata("msg","Re-activated Successfully!!");
                    redirect('login');
                }
                else{
                    $this->session->set_flashdata("msg","Internal error");
                    redirect('login');
                }
        }
}

