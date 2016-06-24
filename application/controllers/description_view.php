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
        public function details($id,$title){
            /*$query = $this->db->get_where('postad', array('ad_id' => $id), 1);
            echo $slug = url_title($query->row('deal_tag'), 'dash', true);*/
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
                        if ($value->services == 'service_provider') {
                            $ser = 'Provided';
                        }
                        else{
                            $ser = 'Needed';
                        }
                        $body_content = array('Type of service'=>$ser);
                    }
                    /*pets*/
                    if ($value->category_id == '5' && $value->sub_cat_id != 7) {
                        $detailed_pets = $this->classifed_model->ads_detailed_pets();
                        foreach ($detailed_pets as $val) {
                            $body_content = array('Service Type' => $value->services,
                                                    'Family Race' => $val->family_race,
                                                    'Type'=>$val->pet_type,
                                                    'Age'=> $val->pet_age,
                                                    'Height / Size'=>$val->height,
                                                    'Gender'=>$val->gender );
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
                                    $body_content = array(
                                                            'Brand name' => $val->brand,
                                                            'Service type' => $val->cloth_type,
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
                                                                    'Shoe Material'=>$val->shoe_material,
                                                                    'Shoe style'=>$val->shoe_style,
                                                                    'Made In'=>$val->made_in);
                                        }
                                        else{
                                            $body_content = array('Service type' => $val->cloth_type,
                                                                    'Size'=>$val->shoe_size,
                                                                    'Colour'=> $val->color,
                                                                    'Brand Name'=>$val->brand,
                                                                    'No of Items'=>$val->no_of_items,
                                                                    'Shoe Material'=>$val->shoe_material,
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
                                                            'Property For'=>$val->prop_for,
                                                            'Property Type'=> $val->prop_type,
                                                            'Bedrooms'=>$val->bed_rooms,
                                                            'Bathrooms'=>$val->bath_rooms,
                                                            'Super built-up Area'=>$val->build_area,
                                                            'Position'=>$val->position,
                                                            'Property Age'=>$val->property_age,
                                                            'Property Ownership'=>$val->property_ownership,
                                                            'Floor Number'=>$val->floor_number);
                                    } 
                        }
                        /*commercial*/
                        if ($value->sub_cat_id == '26') {
                            $detailed_prop = $this->classifed_model->ads_detailed_prop();
                                 foreach ($detailed_prop as $val) {
                                    $body_content =  array('Offered type' => $val->offered_type,
                                                            'Property For'=>$val->prop_for,
                                                            'Property Type'=> $val->prop_type,
                                                            'Bathrooms'=>$val->bath_rooms,
                                                            'Super built-up Area'=>$val->build_area,
                                                            'Position'=>$val->position,
                                                            'Property Age'=>$val->property_age,
                                                            'Property Ownership'=>$val->property_ownership,
                                                            'Floor Number'=>$val->floor_number);
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
                                    $body_content = array('Organisation Type' => $val->jobtype_title,
                                                        'Type of Job' => $val->jobtype,
                                                        'Company Name'=>$val->companyname,
                                                        'Salary Min'=> $currency.$val->salarymin,
                                                        'Salary Max'=>$currency.$val->salarymax,
                                                        'Salary Type'=>$val->salarytype,
                                                        'Suitable Skills'=>$val->suitableskils,
                                                        'Position Type'=>str_replace("_", " ", $val->positionfor),
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
                                        'Type of Service'=>$value->services,
                                        'Manufacture'=>$val->manufacture1,
                                        'Bike Type'=> $val->btype,
                                        'Model'=>$val->bmodel,
                                        'Colour'=>$val->color,
                                        'Registration Year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fuel_type,
                                        'No of Miles Covered'=>$val->no_of_miles,
                                        'Engine size'=>$val->engine_size,
                                        'Road TAX Status'=>$val->road_tax,
                                        'Condition'=>$val->condition
                                        );
                                    }    
                    }
                    /*cars, vans, buses*/
                    if ($value->sub_cat_id == '12' || $value->sub_cat_id == '15' || $value->sub_cat_id == '16') {
                $detailed_cars = $this->classifed_model->ads_detailed_cars();        
                foreach ($detailed_cars as $val) {
                    $body_content = array(
                                        'Type of Service'=>$value->services,
                                        'Manufacture'=>$val->manufacture1,
                                        'Model'=>$val->cmodel,
                                        'Colour'=>$val->color,
                                        'Registration Year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fueltype,
                                        'Transmission'=>$val->transmission,
                                        'Engine Size'=>$val->engine_size,
                                        'No of Doors'=>$val->noofdoors,
                                        'No of Seats'=>$val->noofseats,
                                        'No of Miles Covered'=>$val->tot_miles,
                                        'MOT Status'=>$val->mot_status,
                                        'Road TAX Status'=>$val->road_tax
                                        );
                                    } 
                    }
                    /*motor homes and caravans*/
                    if ($value->sub_cat_id == '14') {
                $detailed_motorhomes = $this->classifed_model->ads_detailed_motorhomes();
                 foreach ($detailed_motorhomes as $val) {
                    $body_content = array(
                                        'Type of Service'=>$value->services,
                                        'Type of motors' => $val->typeofmotorhome,
                                        'Manufacture'=>$val->manufacture1,
                                        'Model'=>$val->cmodel,
                                        'Colour'=>$val->color,
                                        'Registration year'=>$val->reg_year,
                                        'Fuel Type'=>$val->fueltype,
                                        'Transmission'=>$val->transmission,
                                        'Engine size'=>$val->engine_size,
                                        'No of Doors'=>$val->noofdoors,
                                        'No of Seats'=>$val->noofseats,
                                        'No of Miles Covered'=>$val->tot_miles,
                                        'MOT Status'=>$val->mot_status,
                                        'Road TAX Status'=>$val->road_tax
                                        );
                                    } 
                    }
                    /*boats*/
                    if ($value->sub_cat_id == '19') {
                $detailed_boats = $this->classifed_model->ads_detailed_boats();  
                    foreach ($detailed_boats as $val) {
                    $body_content = array(
                                        'Type of Service'=>$value->services,
                                        'Type of Boat'=>$val->manufacture,
                                        'Year'=>$val->year,
                                        'Manufacture'=>$val->model,
                                        'Colour'=>$val->color,
                                        'Fuel Type'=>$val->fueltype,
                                        'Condition'=>$val->condition
                                        );
                                    }       
                    }
                    /*accessories*/
                    if ($value->sub_cat_id == '73') {
                $detailed_accessories = $this->classifed_model->ads_detailed_accessories();  
                    foreach ($detailed_accessories as $val) {
                    $body_content = array('Manufacture'=>$val->manufacture,
                                        'Model'=>$val->model,
                                        'Part Type'=>$val->part_type,
                                        'Year'=>$val->year,
                                        );
                                    }       
                    }

                    /*plant machinery*/
                    if ($value->sub_cat_id == '17') {
                $detailed_plant = $this->classifed_model->ads_detailed_plants();  
                    foreach ($detailed_plant as $val) {
                    $body_content = array(
                                        'Type of Service'=>$value->services,
                                        'Type of Plant-Machinery'=>$val->manufacture1,
                                        'Year'=>$val->reg_year,
                                        'Manufacture'=>$val->cmodel,
                                        'Colour'=>$val->color,
                                        'Condition'=>$val->condition
                                        );
                                    }       
                    }
                    /*farming vehicles*/
                    if ($value->sub_cat_id == '18') {
                        $detailed_plant = $this->classifed_model->ads_detailed_farms();  
                        foreach ($detailed_plant as $val) {
                        $body_content = array('Type of Service'=>$value->services,
                                            'Type of Farming Vehicle'=>$val->manufacture1,
                                            'Year'=>$val->reg_year,
                                            'Manufacture'=>$val->model,
                                            'Colour'=>$val->color,
                                            'Condition'=>$val->condition
                                            );
                                        }  
                    }
                }

                if ($value->category_id == '8') {
                    /*ezone*/
                    $detailed_ezones = $this->classifed_model->ads_detailed_ezones(); 
                    if ($value->sub_cat_id == '60' || $value->sub_cat_id == '61'|| $value->sub_cat_id == '63' || $value->sub_cat_id == '64' || $value->sub_cat_id == '66'
                        || $value->sub_cat_id == '70' || $value->sub_cat_id == '71') {
                    if ($value->sub_cat_id == '70' || $value->sub_cat_id == '71') {
                        $servicetype = @mysql_result(mysql_query("SELECT `sub_subcategory_name` FROM `sub_subcategory` WHERE `sub_subcategory_id`='$value->service_type' "), 0,'sub_subcategory_name');
                        foreach ($detailed_ezones as $val) {
                        $body_content = array('Accessories Type'=> $servicetype,
                            'Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Made in'=>$val->made_in,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            }  
                    }
                    else if ($value->sub_scat_id == '431' || $value->sub_scat_id == '432' || $value->sub_scat_id == '433' || $value->sub_scat_id == '434' || $value->sub_scat_id == '435') {
                        $servicetype = @mysql_result(mysql_query("SELECT `sub_sub_subcategory_name` FROM `sub_sub_subcategory` WHERE `sub_sub_subcategory_id`='$value->service_type' "), 0,'sub_sub_subcategory_name');
                        foreach ($detailed_ezones as $val) {
                        $body_content = array('Accessories Type'=> $servicetype,
                            'Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Made in'=>$val->made_in,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            }  
                    }
                    else{
                        foreach ($detailed_ezones as $val) {
                        $body_content = array('Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Made in'=>$val->made_in,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            }  
                        }     
                    }
                    else if ($value->sub_cat_id == '59' || $value->sub_cat_id == '62') {
                        foreach ($detailed_ezones as $val) {
                         $body_content = array('Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Screen Size'=>$val->size,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Operating system'=>$val->operating_system,
                                'Made in'=>$val->made_in,
                                'Storage'=>$val->storage,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            }  
                    }
                    else if ($value->sub_cat_id == '65') {
                        if ($value->sub_scat_id == '451') {
                            $servicetype = @mysql_result(mysql_query("SELECT `sub_sub_subcategory_name` FROM `sub_sub_subcategory` WHERE `sub_sub_subcategory_id`='$value->service_type' "), 0,'sub_sub_subcategory_name');
                            foreach ($detailed_ezones as $val) {
                         $body_content = array(
                            'Accessories Type'=>$servicetype,
                            'Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Screen Size'=>$val->size,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Made in'=>$val->made_in,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            } 
                        }
                        else{
                            foreach ($detailed_ezones as $val) {
                         $body_content = array('Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Screen Size'=>$val->size,
                                'Colour'=>$val->color,
                                'Model Name / Number'=>$val->model_name,
                                'Made in'=>$val->made_in,
                                'Warranty'=>$val->warranty,
                                'Manufacturer Part Number'=>$val->manufacture
                                );
                            } 
                        }
                    }
                    else if ($value->sub_cat_id == '72') {
                            $servicetype = @mysql_result(mysql_query("SELECT `sub_subcategory_name` FROM `sub_subcategory` WHERE `sub_subcategory_id`='$value->service_type' "), 0,'sub_subcategory_name');
                        foreach ($detailed_ezones as $val) {
                         $body_content = array('Software Type'=>$servicetype,
                                'Service Type'=>$value->services,
                                'Brand name'=>$val->brand_name,
                                'Operating system'=>$val->operating_system,
                                'Model Name / Number'=>$val->model_name,
                                'Number of PCs'=>$val->size,
                                'Subscription Validity'=>$val->warranty,
                                'Media Format'=>$val->manufacture
                                                );
                            }  
                    }
                }

                if ($value->category_id == '7') {
                    /*ezone*/
                    if ($value->sub_cat_id == '67' || $value->sub_cat_id == '68'
                        || $value->sub_cat_id == '69') {
                $detailed_kitchen = $this->classifed_model->ads_detailed_kitchen();  
                    foreach ($detailed_kitchen as $val) {
                    $body_content = array('Service Type'=>$value->services,
                                        'Brand name'=>$val->brand_name,
                                        'Material'=>$val->material,
                                        'Colour'=>$val->color,
                                        'Assembly'=>$val->assembly,
                                        'Dimensions'=>$val->dimensions,
                                        'Capacity'=>$val->capacity,
                                        'Item condition'=>$val->items_condition,
                                        'Warranty'=>$val->warranty
                                        );
                                    }       
                    }
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
                        "ads_fbshare"=> $this->classifed_model->ads_description_fb(),
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
                        'req_url'=> base_url()."description_view/details/".$id."/".str_replace(" ", "-", str_replace("&", "", $title))
                );
                
                $this->load->view("classified_layout/inner_template",$data);
        }

        /*review rating*/
        public function review(){
             if ($this->session->userdata('login_id') == '') {
                $this->session->set_userdata("reviewadid",$this->input->post('ad_id'));
                $this->session->set_userdata("reviewpath",$this->input->post('curr_url'));
                $this->session->set_userdata("reviewdata",$this->input->post());
                   redirect('login');
                }
            /*add review*/
                $adid = $this->input->post('ad_id');
                $deal_tag     =       $this->db->get_where("postad",array("ad_id" => $this->input->post("ad_id")))->row_array();
                $deal_tag1 = str_replace(" ", "-", str_replace("&", "", $deal_tag['deal_tag']));
                $exist_review = $this->classifed_model->review_exists();
                if ($exist_review > 0) {
                   $review_update = $this->classifed_model->review_update();
                    if ($review_update == 1) {
                        $this->session->set_flashdata('msg', 'Review Updated Successfully!!');
                        redirect("description_view/details/$adid/$deal_tag1");
                    }
                    else{
                       $this->session->set_flashdata('err', 'Internal error occured'); 
                        redirect("description_view/details/$adid/$deal_tag1");
                    }
                }
                else{
                $review_insert = $this->classifed_model->review_insert();
                    if ($review_insert == 1) {
                        $this->session->set_flashdata('msg', 'Review added Successfully!!');
                        redirect("description_view/details/$adid/$deal_tag1");
                    }
                    else{
                       $this->session->set_flashdata('err', 'Internal error occured'); 
                        redirect("description_view/details/$adid/$deal_tag1");
                    }
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

        public function favouritelogin(){
            // $this->session->set_userdata('favadid', $this->input->post('ad_id'));
        }

        public function add_favexists(){
            $this->session->set_userdata('favadid', $this->input->post('ad_id'));
            $this->session->set_userdata('favpath', $this->input->post('favpath'));
            echo $this->session->userdata('favadid');
        }
        public function likexists(){
            $this->session->set_userdata('likeadid', $this->input->post('ad_id'));
            $this->session->set_userdata('likepath', $this->input->post('likepath'));
            echo $this->session->userdata('likeadid');
        }

        public function savesearchexists(){
            $this->session->set_userdata('search_cat', $this->input->post('search_cat'));
            $this->session->set_userdata('saveddata', $this->input->post());
            echo $this->session->userdata('search_cat');
        }
        public function hotsearchexists(){
            $this->session->set_userdata('hotcat_id',$this->session->userdata("cat_id"));
            echo $this->session->userdata('hotcat_id');
        }
}

