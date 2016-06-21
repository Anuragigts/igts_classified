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
                $config['upload_path'] = './pictures/';
                $config['allowed_types'] = 'gif|jpg|png';
                $this->load->library('upload',$config);
        }
        public function index(){
            if($this->session->userdata("login_id") == ''){
                // redirect(base_url()."login");
                echo'<script>window.location.href = "'.base_url().'login";</script>';
            }
                $plogin_id      =   $this->session->userdata("login_id");
                $last_insert_id = $this->session->userdata("last_insert_id");
                if ($last_insert_id != '') {
                   redirect(base_url()."payments/checkout/".$last_insert_id);
                }
               
                if ($this->session->userdata("postad_time") != '') {
                    $new_time = time() - $this->session->userdata("postad_time");
                    if ($new_time > 10) {
                        $this->session->unset_userdata('postad_success');
                    }
                }
                if ($this->session->userdata("cance_time") != '') {
                    $new_time = time() - $this->session->userdata("cance_time");
                    if ($new_time > 10) {
                        $this->session->unset_userdata('cancelad');
                        $this->session->unset_userdata("cance_time");
                    }
                }
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

                /*find a property residential*/
                $data['property_residential'] = $this->category_model->property_residential();                
                /*find a property commercial*/
                $data['property_commercial'] = $this->category_model->property_commercial();

                /*Job category details*/
                $data['jobs'] = $this->category_model->jobs_details();

                /*Ezone category details*/
                $data['ezone_phones'] = $this->category_model->ezone_phones();
                $data['ezone_home'] = $this->category_model->ezone_home();
                $data['ezone_small'] = $this->category_model->ezone_small();
                $data['ezone_laptops'] = $this->category_model->ezone_laptops();
                $data['ezone_accesories'] = $this->category_model->ezone_accesories();
                $data['ezone_pcare'] = $this->category_model->ezone_pcare();
                $data['ezone_entertainment'] = $this->category_model->ezone_entertainment();
                $data['ezone_photo'] = $this->category_model->ezone_photo();

                /*home and kitchen*/
                $data['kitchen_essentials'] = $this->category_model->kitchen_essentials();
                $data['kitchen_home'] = $this->category_model->kitchen_home();
                $data['kitchen_decor'] = $this->category_model->kitchen_decor();


                if($plogin_id != ""){
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
                }
        }
        public function do_upla($file,$fp){
                $plogin_id      =   $this->session->userdata("login_id");
                $config['upload_path'] = './pictures';
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
