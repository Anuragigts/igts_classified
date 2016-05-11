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
            $this->session->unset_userdata("cancelad");
            $this->session->unset_userdata('postad_success');
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
            /*without logi*/
            if ($this->session->userdata('login_id') == '') {
                    $login_status = 'no';
                    $login = '';
                }
                else{
                    $login_status = 'yes';
                    $login = $this->session->userdata('login_id');
                }
            if ($this->session->userdata("postad_time") != '') {
                    $new_time = time() - $this->session->userdata("postad_time");
                    if ($new_time > 0) {
                        $this->session->unset_userdata('postad_success');
                    }
                }
            if ($this->uri->segment(3) == '') {
                   redirect('deals-administrator');
                }
                 /*category wise display*/
                $detailed_desc = $this->classifed_model->ads_description_details();
                 $body_content = '';
                foreach ($detailed_desc as $value) {
                    /*services*/
                    if ($value->category_id == '2') {
                        $body_content = array('Service' => $value->services,
                                            'Type of service'=>$value->service_type,
                                            'Price Type'=> $value->price_type );
                    }
                    /*pets*/
                    if ($value->category_id == '5' && $value->sub_cat_id != 7) {
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
                    if ($value->category_id == '6') {
                            /*clothing details*/
                            if ($value->sub_scat_id == '359' || $value->sub_scat_id == '363' ||
                                $value->sub_scat_id == '367' || $value->sub_scat_id == '370' ||
                                $value->sub_scat_id == '373' || $value->sub_scat_id == '375') {
                                $detailed_styles = $this->classifed_model->ads_detailed_cloths();
                                foreach ($detailed_styles as $val) {
                                    $body_content = array('Service type' => $val->cloth_type,
                                                            'Size'=>$val->w_size,
                                                            'Colour'=> $val->color,
                                                            'Brand Name'=>$val->brand,
                                                            'No of Items'=>$val->no_of_items,
                                                            'Fit'=>$val->fit,
                                                            'Made In'=>$val->made_in,
                                                            'Material'=>$val->material,
                                                            'Washing Instructions'=>$val->washing_instruct,
                                                            'Length'=>$val->length );
                                } 
                            }

                             /*accessories details*/
                            if ($value->sub_scat_id == '361' || $value->sub_scat_id == '365' ||
                                $value->sub_scat_id == '369' || $value->sub_scat_id == '372' ||
                                $value->sub_scat_id == '374' || $value->sub_scat_id == '376') {
                                $detailed_styles = $this->classifed_model->ads_detailed_acces();
                                foreach ($detailed_styles as $val) {
                                    $body_content = array('Service type' => $val->cloth_type,
                                                            'Colour'=> $val->color,
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
                                            $body_content = array('Service type' => $val->cloth_type,
                                                                    'Size'=>$val->shoe_size,
                                                                    'Colour'=> $val->color,
                                                                    'Brand Name'=>$val->brand,
                                                                    'No of Items'=>$val->no_of_items,
                                                                    'Heel details'=>$val->heel_details,
                                                                    'Material'=>$val->shoe_material,
                                                                    'Shoe style'=>$val->shoe_style,
                                                                    'Made In'=>$val->made_in);
                                        }
                                        else{
                                            $body_content = array('Service type' => $val->cloth_type,
                                                                    'Size'=>$val->shoe_size,
                                                                    'Colour'=> $val->color,
                                                                    'Brand Name'=>$val->brand,
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
                                    $body_content = array('Service type' => $val->cloth_type,
                                                            'Size'=>$val->w_size,
                                                            'Colour'=> $val->color,
                                                            'Brand Name'=>$val->brand,
                                                            'No of Items'=>$val->no_of_items,
                                                            'Washing Instructions'=>$val->washing_instruct,
                                                            'Material'=>$val->material,
                                                            'Length'=>$val->length);
                                    } 
                            }
                    }

                    /*find a property*/
                    if ($value->category_id == '4') {
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
                    if ($value->category_id == '1') {
                        $detailed_jobs = $this->classifed_model->ads_detailed_jobs();
                        $sal = $value->price_type;
                        if ($value->currency == 'pound') {
                            $currency = '<span class="pound_sym"></span>';
                        }
                        else if($value->currency == 'euro'){
                            $currency = '<span class="euro_sym"></span>';
                        }

                                 foreach ($detailed_jobs as $val) {
                                    $body_content = array('Job type' => $val->jobtype,
                                                        'Company Name'=>$val->companyname,
                                                        'Minmum Salary'=> $currency.$val->salarymin,
                                                        'Maximum Salary'=>$currency.$val->salarymax,
                                                        'Salary Type'=>$val->salarytype,
                                                        'Suitable Skills'=>$val->suitableskils,
                                                        'Position For'=>str_replace("_", " ", $val->positionfor),
                                                        'Salary'=>$sal);
                                    }

                }
                /*motor point*/
                if ($value->category_id == '3') {
                    /*bikes*/
                    if ($value->sub_cat_id == '13') {
                 $detailed_bikes = $this->classifed_model->ads_detailed_bikes();   
                 foreach ($detailed_bikes as $val) {
                    $body_content = array(
                                        'Manufacture'=>$val->manufacture1,
                                        'Bike Type'=> $val->btype,
                                        'Model'=>$val->bmodel,
                                        'Colour'=>$val->color,
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
                    $body_content = array(
                                        'Manufacture'=>$val->manufacture1,
                                        'Model'=>$val->cmodel,
                                        'Colour'=>$val->color,
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
                                        'Manufacture'=>$val->manufacture1,
                                        'Model'=>$val->cmodel,
                                        'Colour'=>$val->color,
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
                                        'Colour'=>$val->color,
                                        'Fuel Type'=>$val->fueltype,
                                        'Condition'=>$val->condition
                                        );
                                    }       
                    }

                    /*plant machinery*/
                    if ($value->sub_cat_id == '17') {
                $detailed_plant = $this->classifed_model->ads_detailed_plants();  
                    foreach ($detailed_plant as $val) {
                    $body_content = array('Manufacture'=>$val->manufacture1,
                                        'Year'=>$val->reg_year,
                                        'Model'=>$val->cmodel,
                                        'Colour'=>$val->color,
                                        'Condition'=>$val->condition
                                        );
                                    }       
                    }
                    /*farming vehicles*/
                    if ($value->sub_cat_id == '18') {
                        $detailed_plant = $this->classifed_model->ads_detailed_farms();  
                        foreach ($detailed_plant as $val) {
                        $body_content = array('Manufacture'=>$val->manufacture1,
                                            'Year'=>$val->reg_year,
                                            'Model'=>$val->model,
                                            'Colour'=>$val->color,
                                            'Condition'=>$val->condition
                                            );
                                        }  
                    }
                }

                if ($value->category_id == '8') {
                    /*ezone*/
                    if ($value->sub_cat_id == '59' || $value->sub_cat_id == '60'
                        || $value->sub_cat_id == '61' || $value->sub_cat_id == '62'
                        || $value->sub_cat_id == '63' || $value->sub_cat_id == '64'
                        || $value->sub_cat_id == '65' || $value->sub_cat_id == '66') {
                $detailed_ezones = $this->classifed_model->ads_detailed_ezones();  
                    foreach ($detailed_ezones as $val) {
                        if ($val->operating_system == 0 || $val->storage == 0) {
                            $body_content = array('Service Type'=>$value->services,
                                        'Brand_name'=>$val->brand_name,
                                        'Size'=>$val->size,
                                        'Colour'=>$val->color,
                                        'Model name'=>$val->model_name,
                                        'Operating system'=>$val->operating_system,
                                        'Storage'=>$val->storage,
                                        'Made in'=>$val->made_in,
                                        'Warranty'=>$val->warranty,
                                        'Manufacture'=>$val->manufacture
                                        );
                        }
                        else{
                            $body_content = array('Service Type'=>$value->services,
                                        'Brand_name'=>$val->brand_name,
                                        'Size'=>$val->size,
                                        'Colour'=>$val->color,
                                        'Model name'=>$val->model_name,
                                        'Operating system'=>$val->operating_system,
                                        'Made in'=>$val->made_in,
                                        'Storage'=>$val->storage,
                                        'Warranty'=>$val->warranty,
                                        'Manufacture'=>$val->manufacture
                                        );
                        }
                    
                                    }       
                    }
                    # code...
                }

                if ($value->category_id == '7') {
                    /*ezone*/
                    if ($value->sub_cat_id == '67' || $value->sub_cat_id == '68'
                        || $value->sub_cat_id == '69') {
                $detailed_kitchen = $this->classifed_model->ads_detailed_kitchen();  
                    foreach ($detailed_kitchen as $val) {
                    $body_content = array('Service Type'=>$value->services,
                                        'Brand_name'=>$val->brand_name,
                                        'Material'=>$val->material,
                                        'Colour'=>$val->color,
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
				/*videos for ad*/
                $ads_description_videos = $this->classifed_model->ads_description_videos();
                /*location for ad*/
                $ads_description_loc = $this->classifed_model->ads_description_loc();
                /*review and rating*/
                $ads_review = $this->classifed_model->ads_review();
                /*favourite ad or not*/
                $ads_favourite = $this->classifed_model->ads_favourite();
                /*ads likes ad or not*/
                $ads_likes = $this->classifed_model->ads_likes();
                /*total likes*/
                $total_likes = $this->classifed_model->likes_total();
                /*recommanded ads*/
                $recommanded_ads = $this->classifed_model->recommanded_ads();
				// echo "<pre>"; print_r($this);
                $data   =   array(
                        "title"     =>  "Classifieds",
                        "content"   =>  "description_view",
                        "ads_desc"=> $ads_description_details,
                        "ads_pics"=> $ads_description_pics,
						"ad_video"=>$ads_description_videos,
                        "ads_loc"=> $ads_description_loc,
                        "body_content"=>$body_content,
                        "recommanded_ads"=>$recommanded_ads,
                        "ads_review"=>$ads_review,
                        "ads_favourite"=>$ads_favourite,
                        "ads_likes"=>$ads_likes,
                        "total_likes"=>$total_likes,
                        "login_status"=>$login_status,
                        "login"=>$login,
                        'req_url'=> base_url()."description_view/details/".$id
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        /*review rating*/
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

        /*favourite ads*/
        /*add favourite*/
        public function add_favourite(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
            $fav = $this->classifed_model->add_favourite();
            if ($fav == 1) {
                echo '1';
            }
            else{
                echo '0';
            }
        }

        /*remove favourite ads*/
        public function remove_favourite(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
            $fav = $this->classifed_model->remove_favourite();
            if ($fav == 1) {
                echo '1';
            }
            else{
                echo '0';
            }
        }

        /*add likes*/
        public function add_likes(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
            $fav = $this->classifed_model->add_likes();
            if ($fav == 1) {
                $fav = $this->classifed_model->likes_count();
                echo $fav;
            }
            else{
                echo '0';
            }
        }

        /*remove likes*/
        public function remove_likes(){
            if ($this->session->userdata('login_id') == '') {
                   redirect('login');
                }
            $fav = $this->classifed_model->remove_likes();
            if ($fav == 1) {
                $fav = $this->classifed_model->likes_count();
                echo $fav;
            }
            else{
                echo '0';
            }
        }

        /*feedback ads creation*/
        public function feedbackforads(){
            $adid = $this->input->post('ad_id');
            $feedbackads_insert = $this->classifed_model->feedbackads_insert();
                if ($feedbackads_insert == 1) {
                    $this->session->set_flashdata('feedbackmsg', 'feedback Sent Successfully!!');
                    // redirect($this->input->post('curr_url'));
                }
                else{
                   $this->session->set_flashdata('err', 'Internal error occured'); 
                    // redirect($this->input->post('curr_url'));
                }
                $data = array(
                        "title"     =>  "feedbackadsuccess",
                        "content"   =>  "feedbackadsuccess",
                        'curr_url'  =>  $this->input->post('curr_url')
                );
             $this->load->view("classified_layout/inner_template",$data);
        }

        public function reportforads(){
            $adid = $this->input->post('ad_id');
            $reportads_insert = $this->classifed_model->reportads_insert();
                if ($reportads_insert == 1) {
                    $this->session->set_flashdata('reportmsg', 'Report Sent Successfully!!');
                    redirect($this->input->post('curr_url'));
                }
                else{
                   $this->session->set_flashdata('err', 'Internal error occured'); 
                    redirect($this->input->post('curr_url'));
                }
        }
}

