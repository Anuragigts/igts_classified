<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Description_view extends CI_Controller{
        public function __construct(){
                parent::__construct();
                $this->load->model("classifed_model");
               }
        public function index(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "description_view"
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
        public function details($id){
            if ($this->uri->segment(3) == '') {
                   redirect('deals_administrator');
                }
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }

                /*category wise display*/
                $detailed_desc = $this->classifed_model->ads_description_details();
                foreach ($detailed_desc as $value) {
                    /*services*/
                    if ($value->category_id == 'services') {
                        $body_content = array('Service' => $value->services,
                                            'Type of service'=>$value->service_type,
                                            'Price Type'=> $value->price_type );
                    }
                    /*pets*/
                    if ($value->category_id == 'pets') {
                        $detailed_pets = $this->classifed_model->ads_detailed_pets();
                        foreach ($detailed_pets as $val) {
                            $body_content = array('Family Race' => $val->family_race,
                                                    'Pet Type'=>$val->pet_type,
                                                    'Pet Age'=> $val->pet_age,
                                                    'height'=>$val->height,
                                                    'gender'=>$val->gender );
                        } 
                    }
                    /*clothes and lifestyles*/
                    if ($value->category_id == 'clothing_&_lifestyles') {
                            /*clothing details*/
                            if ($value->sub_scat_id == '359' || $value->sub_scat_id == '363' ||
                                $value->sub_scat_id == '367' || $value->sub_scat_id == '370' ||
                                $value->sub_scat_id == '373' || $value->sub_scat_id == '375') {
                                $detailed_styles = $this->classifed_model->ads_detailed_cloths();
                                foreach ($detailed_styles as $val) {
                                    $body_content = array('Cloth Type' => $val->cloth_type,
                                                            'Size'=>$val->w_size,
                                                            'Color'=> $val->color,
                                                            'Brand'=>$val->brand,
                                                            'No of Items'=>$val->no_of_items,
                                                            'Fit'=>$val->fit,
                                                            'Made In'=>$val->made_in,
                                                            'Material'=>$val->material,
                                                            'Washing Instractor'=>$val->washing_instruct,
                                                            'Length'=>$val->length );
                                } 
                            }

                             /*accessories details*/
                            if ($value->sub_scat_id == '361' || $value->sub_scat_id == '365' ||
                                $value->sub_scat_id == '369' || $value->sub_scat_id == '372' ||
                                $value->sub_scat_id == '374' || $value->sub_scat_id == '376') {
                                $detailed_styles = $this->classifed_model->ads_detailed_acces();
                                foreach ($detailed_styles as $val) {
                                    $body_content = array('Cloth Type' => $val->cloth_type,
                                                            'Size'=>$val->w_size,
                                                            'Color'=> $val->color,
                                                            'No of Items'=>$val->no_of_items,
                                                            'Material'=>$val->material,
                                                            'Made In'=>$val->made_in);
                                } 
                            }

                             /*shoes details*/
                            if ($value->sub_scat_id == '360' || $value->sub_scat_id == '364' ||
                                $value->sub_scat_id == '368' || $value->sub_scat_id == '371') {
                                $detailed_styles = $this->classifed_model->ads_detailed_shoes();
                                foreach ($detailed_styles as $val) {
                                        $body_content = array('Cloth Type' => $val->cloth_type,
                                                                'Size'=>$val->shoe_size,
                                                                'Color'=> $val->color,
                                                                'Brand'=>$val->brand,
                                                                'No of Items'=>$val->no_of_items,
                                                                'No of Items'=>$val->heel_details,
                                                                'Material'=>$val->shoe_material,
                                                                'Shoe style'=>$val->shoe_style,
                                                                'Made In'=>$val->made_in);
                                    } 
                            }

                             /*wedding details*/
                            if ($value->sub_scat_id == '362' || $value->sub_scat_id == '366') {
                                $detailed_styles = $this->classifed_model->ads_detailed_wedding();
                                 foreach ($detailed_styles as $val) {
                                    $body_content = array('Cloth Type' => $val->cloth_type,
                                                            'Size'=>$val->w_size,
                                                            'Color'=> $val->color,
                                                            'Brand'=>$val->brand,
                                                            'No of Items'=>$val->no_of_items,
                                                            'Washing Instruction'=>$val->washing_instruct,
                                                            'Material'=>$val->material,
                                                            'Length'=>$val->length);
                                    } 
                            }
                    }

                    /*find a property*/
                    if ($value->category_id == 'findaproperty') {
                        /*residential*/
                        if ($value->sub_cat_id == '11') {
                            $detailed_prop = $this->classifed_model->ads_detailed_prop();
                                 foreach ($detailed_prop as $val) {
                                    $body_content = array('Offered type' => $val->offered_type,
                                                            'property For'=>$val->prop_for,
                                                            'Type of property'=> $val->prop_type,
                                                            'No of Bedrooms'=>$val->bed_rooms,
                                                            'No of Bathrooms'=>$val->bath_rooms,
                                                            'Area'=>$val->build_area,
                                                            'Position'=>$val->position,
                                                            'Property Age'=>$val->property_age,
                                                            'Owner'=>$val->property_ownership,
                                                            'Floor No.'=>$val->floor_number);
                                    } 
                        }
                        /*commercial*/
                        if ($value->sub_cat_id == '26') {
                            $detailed_prop = $this->classifed_model->ads_detailed_prop();
                                 foreach ($detailed_prop as $val) {
                                    $body_content =  array('Offered type' => $val->offered_type,
                                                            'property For'=>$val->prop_for,
                                                            'Type of property'=> $val->prop_type,
                                                            'No of Bathrooms'=>$val->bath_rooms,
                                                            'Area'=>$val->build_area,
                                                            'Position'=>$val->position,
                                                            'Property Age'=>$val->property_age,
                                                            'Owner'=>$val->property_ownership,
                                                            'Floor No.'=>$val->floor_number);
                                    } 
                        }
                    }

                    /*Job category*/
                    if ($value->category_id == 'jobs') {
                        $detailed_jobs = $this->classifed_model->ads_detailed_jobs();
                        if ($value->currency == 'pound') {
                            $currency = '£';
                        }
                        else if($value->currency == 'euro'){
                            $currency = '€';
                        }

                                 foreach ($detailed_jobs as $val) {
                                    $body_content = array('Job type' => $val->jobtype,
                                                        'Company Name'=>$val->companyname,
                                                        'Minmum Salary'=> $currency.$val->salarymin,
                                                        'Maximum Salary'=>$currency.$val->salarymax,
                                                        'Salary Type'=>$val->salarytype,
                                                        'Suitable Skills'=>$val->suitableskils,
                                                        'Position For'=>$val->positionfor);
                                    }

                }
            }
                

                /*desc info*/
                $ads_description_details = $this->classifed_model->ads_description_details();
                /*images for ad*/
                $ads_description_pics = $this->classifed_model->ads_description_pics();
                /*location for ad*/
                $ads_description_loc = $this->classifed_model->ads_description_loc();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "description_view",
                        "ads_desc"=> $ads_description_details,
                        "ads_pics"=> $ads_description_pics,
                        "ads_loc"=> $ads_description_loc,
                        "body_content"=>$body_content
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }
}

