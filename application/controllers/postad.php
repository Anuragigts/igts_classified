<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("common_model");
                $this->load->model("postad_model");
                $this->load->model("category_model");
                $config['upload_path'] = './ad_mages/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload',$config);
        }
        public function index(){
                $plogin_id      =   $this->session->userdata("login_id");
                $data = array(
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad"
                        );
                /*pets categories*/
                $data['pets_sub_cat'] = $this->category_model->pets_sub_cat();
                $data['pets_big_animal'] = $this->category_model->pets_big_animal();
                $data['services_sub_prof'] = $this->category_model->services_sub_prof();
                $data['services_sub_pop'] = $this->category_model->services_sub_pop();

                if($plogin_id != ""){
                        /*$data = array(
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad"
                        );*/
                        if($this->input->post("postad")){
                                // echo "<pre>"; print_r($_POST);exit;
                                $files1 = "";$files2 = "";$files3="";$files4="";$files5="";
                                $files6="";$files7="";$files8="";$files9="";
                                $this->form_validation->set_rules("cat",'Category',"required");
                                $this->form_validation->set_rules("scat",'Sub Category',"required");
                                $this->form_validation->set_rules("sscat",'Sub Sub Category',"required");
                                $this->form_validation->set_rules("ad_title",'Ad Title',"required");
                                $this->form_validation->set_rules("desc",'Ad Description',"required");
                                $this->form_validation->set_rules("price",'Ad Price',"required");
                                $this->form_validation->set_rules("seller-email",'Email',"required");
                                //$this->form_validation->set_rules("seller-number",'Phone Number',"required");
                                $this->form_validation->set_rules("zipcode",'Zip Code',"required");
                                $this->form_validation->set_rules("city",'City',"required");
                                $this->form_validation->set_rules("state",'State',"required");
                                $this->form_validation->set_rules("cty",'Country',"required");
                                $this->form_validation->set_rules("pay_check[]",'Ad Premium',"required"); 
                                
                                if($_FILES["files1"]["name"] != ""){
                                        $files1 = $this->do_upla($_FILES['files1'],"F1");
                                        if(!$this->upload->do_upload('files1')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files2"]["name"] != ""){
                                        $files2 = $this->do_upla($_FILES['files2'],"F2");
                                        if(!$this->upload->do_upload('files2')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files3"]["name"] != ""){
                                        $files3 = $this->do_upla($_FILES['files3'],"F3");
                                        if(!$this->upload->do_upload('files3')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files4"]["name"] != ""){
                                        $files4 = $this->do_upla($_FILES['files4'],"F4");
                                        if(!$this->upload->do_upload('files4')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files5"]["name"] != ""){
                                        $files5 = $this->do_upla($_FILES['files5'],"F5");
                                        if(!$this->upload->do_upload('files5')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files6"]["name"] != ""){
                                        $files6 = $this->do_upla($_FILES['files6'],"F6");
                                        if(!$this->upload->do_upload('files6')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files7"]["name"] != ""){
                                        $files7 = $this->do_upla($_FILES['files7'],"F7");
                                        if(!$this->upload->do_upload('files7')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files8"]["name"] != ""){
                                        $files8 = $this->do_upla($_FILES['files8'],"F8");
                                        if(!$this->upload->do_upload('files8')){
                                                print_r($this->upload->display_errors());
                                        }
                                }
                                if($_FILES["files9"]["name"] != ""){
                                        $files9 = $this->do_upla($_FILES['files9'],"F9");
                                        if(!$this->upload->do_upload('files9')){
                                                print_r($this->upload->display_errors());
                                        }
                                } 
                                if($this->form_validation->run() == TRUE){
                                        $in = $this->postad_model->ad_insert($files1,$files2,$files3,$files4,$files5,$files6,$files7,$files8,$files9);
                                        if($in == 1){
                                                $this->session->set_flashdata("msg","Your Ad has been Created Successfully. Your Ad will be displayed after 2 hours of posting or after verifying of ads.");
                                                $this->session->set_userdata("info","Alert check");
                                                redirect("postad");
                                        }else{
                                                $this->session->set_flashdata("err","Internal error occurred while posting your Ad");
                                                redirect("postad");
                                        }
                                }
                                 
                        }
                        $data["cat"]        =       $this->common_model->view_cat();
                        $data["scat"]       =       $this->common_model->view_scat();
                        $data["sscat"]      =       $this->common_model->view_sscat();
                        $data["cty"]        =       $this->common_model->countries();
                        $data["scty"]       =       $this->common_model->states();
                        $data["city"]       =       $this->common_model->cities();
                        $data["avid"]       =       $this->common_model->ad_valid();
                        $data["address"]    =       $this->common_model->address();
                        $this->load->view("classified_layout/inner_template",$data);
                }
                else{
                         $this->load->view("classified_layout/inner_template",$data);
                        // redirect("postad");
                }
        }
        public function do_upla($file,$fp){
                $plogin_id      =   $this->session->userdata("login_id");
                $config['upload_path'] = './ad_images';
                $config['allowed_types'] = 'gif|jpg|png';
                $uid = date('Y-m-d_i-s');
                $uid = $fp."_".$uid."_".$plogin_id;
                $filename = basename($file['name']); 
                $fv=explode(".",$filename);
                $idP = $uid.".".$fv['1'];
                $name = $config['file_name'] = $idP; //set file name
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                return $name;
        }
        public function other_ad(){
                $this->session->unset_userdata("info");    
        }

        public function get_category_list(){
            echo $this->input->post('value');
        }
}
