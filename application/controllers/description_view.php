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
            if ($this->session->userdata("postad_time") != '') {
                    $new_time = time() - $this->session->userdata("postad_time");
                    if ($new_time > 0) {
                        $this->session->unset_userdata('postad_success');
                    }
                }
            if ($this->uri->segment(3) == '') {
                   redirect('deals_administrator');
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
                            $body_content = array('Service Type' => $value->services,
                                                    'Family Race' => $val->family_race,
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
                                        if ($val->heel_details != '') {
                                            $body_content = array('Cloth Type' => $val->cloth_type,
                                                                    'Size'=>$val->shoe_size,
                                                                    'Color'=> $val->color,
                                                                    'Brand'=>$val->brand,
                                                                    'No of Items'=>$val->no_of_items,
                                                                    'Heel details'=>$val->heel_details,
                                                                    'Material'=>$val->shoe_material,
                                                                    'Shoe style'=>$val->shoe_style,
                                                                    'Made In'=>$val->made_in);
                                        }
                                        else{
                                            $body_content = array('Cloth Type' => $val->cloth_type,
                                                                    'Size'=>$val->shoe_size,
                                                                    'Color'=> $val->color,
                                                                    'Brand'=>$val->brand,
                                                                    'No of Items'=>$val->no_of_items,
                                                                    'Material'=>$val->shoe_material,
                                                                    'Shoe style'=>$val->shoe_style,
                                                                    'Made In'=>$val->made_in);
                                        }
                                        
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
                /*motor point*/
                if ($value->category_id == 'motorpoint') {
                    /*bikes*/
                    if ($value->sub_cat_id == '13') {
                 $detailed_bikes = $this->classifed_model->ads_detailed_bikes();   
                 foreach ($detailed_bikes as $val) {
                    $body_content = array('Registration Number' => $val->reg_number,
                                        'Manufacture'=>$val->manufacture,
                                        'Bike Type'=> $val->bike_type,
                                        'Model'=>$val->model,
                                        'Color'=>$val->color,
                                        'Reg year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fuel_type,
                                        'No of miles'=>$val->no_of_miles,
                                        'Engine size'=>$val->engine_size,
                                        'Road tax'=>$val->road_tax,
                                        'Condition'=>$val->condition
                                        );
                                    }    
                    }
                    /*cars, vans, buses*/
                    if ($value->sub_cat_id == '12' || $value->sub_cat_id == '15' || $value->sub_cat_id == '16') {
                $detailed_cars = $this->classifed_model->ads_detailed_cars();        
                foreach ($detailed_cars as $val) {
                    $body_content = array('Registration Number' => $val->reg_number,
                                        'Manufacture'=>$val->manufacture,
                                        'Model'=>$val->model,
                                        'Color'=>$val->color,
                                        'Reg year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fueltype,
                                        'Transmission'=>$val->transmission,
                                        'Engine size'=>$val->engine_size,
                                        'No of doors'=>$val->noofdoors,
                                        'No of seats'=>$val->noofseats,
                                        'No of miles'=>$val->tot_miles,
                                        'MOT Status'=>$val->mot_status,
                                        'Road tax'=>$val->road_tax
                                        );
                                    } 
                    }
                    /*motor homes and caravans*/
                    if ($value->sub_cat_id == '14') {
                $detailed_motorhomes = $this->classifed_model->ads_detailed_motorhomes();
                 foreach ($detailed_motorhomes as $val) {
                    $body_content = array('Type of motors' => $val->typeofmotorhome,
                                        'Registration Number' => $val->reg_number,
                                        'Manufacture'=>$val->manufacture,
                                        'Model'=>$val->model,
                                        'Color'=>$val->color,
                                        'Reg year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fueltype,
                                        'Transmission'=>$val->transmission,
                                        'Engine size'=>$val->engine_size,
                                        'No of doors'=>$val->noofdoors,
                                        'No of seats'=>$val->noofseats,
                                        'No of miles'=>$val->tot_miles,
                                        'MOT Status'=>$val->mot_status,
                                        'Road tax'=>$val->road_tax
                                        );
                                    } 
                    }
                    /*boats*/
                    if ($value->sub_cat_id == '19') {
                $detailed_boats = $this->classifed_model->ads_detailed_boats();  
                    foreach ($detailed_boats as $val) {
                    $body_content = array('Manufacture'=>$val->manufacture,
                                        'Year'=>$val->year,
                                        'Model'=>$val->model,
                                        'Color'=>$val->color,
                                        'Fuel Type'=>$val->fueltype,
                                        'Condition'=>$val->condition
                                        );
                                    }       
                    }
                }

                if ($value->category_id == 'ezone') {
                    /*ezone*/
                    if ($value->sub_cat_id == '59' || $value->sub_cat_id == '60'
                        || $value->sub_cat_id == '61' || $value->sub_cat_id == '62'
                        || $value->sub_cat_id == '63' || $value->sub_cat_id == '64'
                        || $value->sub_cat_id == '64' || $value->sub_cat_id == '66') {
                $detailed_ezones = $this->classifed_model->ads_detailed_ezones();  
                    foreach ($detailed_ezones as $val) {
                    $body_content = array('Service Type'=>$value->services,
                                        'Brand_name'=>$val->brand_name,
                                        'Size'=>$val->size,
                                        'Color'=>$val->color,
                                        'Model name'=>$val->model_name,
                                        'Operating system'=>$val->operating_system,
                                        'Made in'=>$val->made_in,
                                        'Storage'=>$val->storage,
                                        'Warranty'=>$val->warranty,
                                        'Manufacture'=>$val->manufacture
                                        );
                                    }       
                    }
                    # code...
                }

                if ($value->category_id == 'kitchenhome') {
                    /*ezone*/
                    if ($value->sub_cat_id == '67' || $value->sub_cat_id == '68'
                        || $value->sub_cat_id == '69') {
                $detailed_kitchen = $this->classifed_model->ads_detailed_kitchen();  
                    foreach ($detailed_kitchen as $val) {
                    $body_content = array('Service Type'=>$value->services,
                                        'Brand_name'=>$val->brand_name,
                                        'Material'=>$val->material,
                                        'Color'=>$val->color,
                                        'Assembly'=>$val->assembly,
                                        'Dimensions'=>$val->dimensions,
                                        'Capacity'=>$val->capacity,
                                        'Items condition'=>$val->items_condition,
                                        'Warranty'=>$val->warranty
                                        );
                                    }       
                    }
                    # code...
                }

            }
                

                /*desc info*/
                $ads_description_details = $this->classifed_model->ads_description_details();
                /*images for ad*/
                $ads_description_pics = $this->classifed_model->ads_description_pics();
                /*location for ad*/
                $ads_description_loc = $this->classifed_model->ads_description_loc();
                /*review and rating*/
                $ads_review = $this->classifed_model->ads_review();
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "description_view",
                        "ads_desc"=> $ads_description_details,
                        "ads_pics"=> $ads_description_pics,
                        "ads_loc"=> $ads_description_loc,
                        "body_content"=>$body_content,
                        "ads_review"=>$ads_review
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        public function review(){
             if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
            /*add review*/
                $adid = $this->input->post('ad_id');
                $review_insert = $this->classifed_model->review_insert();
                    if ($review_insert == 1) {
                        $this->session->set_flashdata('msg', 'Review added Successfully!!');
                        redirect("description_view/details/$adid");
                    }
                    else{
                       $this->session->set_flashdata('err', 'Internal error occured'); 
                        redirect("description_view/details/$adid");
                    }
                
        }
}

