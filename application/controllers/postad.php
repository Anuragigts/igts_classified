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
            if($this->session->userdata("login_id") == ''){
                redirect("login");
            }
                $plogin_id      =   $this->session->userdata("login_id");
                $data = array(
                                "title"     =>  "Classifieds",
                                "content"   =>  "postad"
                        );
                /*pets categories*/
                $data['pets_sub_cat'] = $this->category_model->pets_sub_cat();
                $data['pets_big_animal'] = $this->category_model->pets_big_animal();
                $data['pets_small_animal'] = $this->category_model->pets_small_animal();
                $data['pets_accessories'] = $this->category_model->pets_accessories();

                /*clothes & lifestyles*/
                $data['cloths_women'] = $this->category_model->cloths_women();
                $data['cloths_men'] = $this->category_model->cloths_men();
                $data['cloths_boy'] = $this->category_model->cloths_boy();
                $data['cloths_girls'] = $this->category_model->cloths_girls();
                $data['cloths_baby_boy'] = $this->category_model->cloths_baby_boy();
                $data['cloths_baby_girl'] = $this->category_model->cloths_baby_girls();


                /*services*/
                $data['services_sub_prof'] = $this->category_model->services_sub_prof();
                $data['services_sub_pop'] = $this->category_model->services_sub_pop();

                /*motor point for cars*/
                $data['cars_fst'] = $this->category_model->cars_sub_cat_fst();
                $data['cars_sec'] = $this->category_model->cars_sub_cat_sec();

                 /*motor point for bikes & scooters*/
                $data['bikes_fst'] = $this->category_model->bikes_sub_cat_fst();
                $data['bikes_sec'] = $this->category_model->bikes_sub_cat_sec();

                /*motor point for motorhomes & caravans*/
                $data['caravans_fst'] = $this->category_model->caravans_sub_cat_fst();

                 /*motor point for vans, trucks, SUV's */
                $data['vans_sub_cat_fst'] = $this->category_model->vans_sub_cat_fst();

                /*motor point for Coaches, buses */
                $data['coach_sub_cat_fst'] = $this->category_model->coach_sub_cat_fst();

                /*motor point for plant machinery sub-category*/
                     /*Tractor Unit */
                $data['tractor_sub_cat_fst'] = $this->category_model->tractor_sub_cat_fst();
                     /*Rigid Trucks*/
                $data['rigid_sub_cat_fst'] = $this->category_model->rigid_sub_cat_fst();
                    /*Trailers Trucks*/
                $data['trailer_sub_cat_fst'] = $this->category_model->trailer_sub_cat_fst();
                    /*Plant Equipment*/
                $data['equip_sub_cat_fst'] = $this->category_model->equip_sub_cat_fst();


                /*motor point for farming vehicles*/
                $data['farm_sub_cat_fst'] = $this->category_model->farm_sub_cat_fst();

                /*motor point for boats*/
                $data['boat_sub_cat_fst'] = $this->category_model->boat_sub_cat_fst();

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
