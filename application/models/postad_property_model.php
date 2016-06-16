<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad_property_model extends CI_Model{
        /*property for in residential and commercial*/
            public function get_property(){
            $cv     =   $this->input->post("id");
            return $this->db->get_where("sub_subcategory",array("sub_category_id" => $cv))->result();
            }

            public function get_property_type(){
            $cv     =   $this->input->post("id");
            return $this->db->get_where("sub_sub_subcategory",array("sub_subcategory_id" => $cv))->result();
            }



       public function postad_creat(){
             /*AD type business or consumer*/
                    $cur_date = date("Y")."".date("m");
                        if($this->input->post('checkbox_toggle') == 'Yes'){
                                $ad_type = 'business';
                                
                                $target_dir = "./pictures/business_logos/";
                            
                                    if ($_FILES["file"]["name"] != '') {
                                       $new_name = explode(".", $_FILES["file"]["name"]);
                            $business_logo = "buslogo_".time().".".end($new_name);
                            move_uploaded_file($_FILES["file"]["tmp_name"],$target_dir."buslogo_".time().".".end($new_name));
                                    }
                                    else{
                                        $business_logo = '';
                                    }
                    
                        }
                        else{
                            $ad_type = 'consumer';
                            $business_logo = '';
                        }
                         /*is free or not*/
                        if (($this->input->post('package_type') == 1) && $this->input->post('package_urgent') == 0) {
                            $isfree = 1;
                            $payment = 1;
                        }
                        else{
                            $isfree = 0;
                            $payment = 0;
                        }
                         /*web-link for free */
              if ($this->input->post('package_type') == 1) {
                            $url = "";
                        }
                        /*web-link for gold*/
              if ($this->input->post('package_type') == 2) {
                            $url = $this->input->post("gold_weblink");
                        }
                        /*web-link for platinum*/
              if ($this->input->post('package_type') == 3) {
                            $url = $this->input->post("platinum_weblink");
                        }


                        $data = array('ad_prefix' => $cur_date,
                                    'login_id'  => $this->input->post('login_id'),
                                    'package_type'=> $this->input->post('package_type'),
                                    'urgent_package' => $this->input->post('package_urgent'),
                                    'package_name' => $ad_type."_".$this->input->post('package_name'),
                                    'deal_tag'    => $this->input->post('dealtag'),
                                    'deal_desc'   =>$this->input->post('dealdescription'),
                                     'currency'   =>$this->input->post('checkbox_toggle1'),
                                    'service_type'=> $this->input->post('typeservice'),
                                    'services'    => $this->input->post('checkbox_services'),
                                    'price_type'  => $this->input->post('price_type'),
                                    'price'       => $this->input->post('priceamount'),
                                    'web_link'    => $url,
                                    'category_id' => $this->input->post('category_id'),
                                    'sub_cat_id'  => $this->input->post('sub_id'),
                                    'sub_scat_id' => $this->input->post('sub_sub_id'),
                                    'ad_type'     => $ad_type,
                                    'created_on'   => date('d-m-Y H:i:s'),
                                    'updated_on'   => date('d-m-Y H:i:s'),
                                    'terms_conditions' =>$this->input->post('terms_condition'),
                                    'payment_status' => $payment,
                                    'ad_status'     => 0,
                                    'is_free' => $isfree,
                                    'adrenewal' => 0
                                    );
                    $this->db->insert('postad', $data);

                       $insert_id = $this->db->insert_id();
                       $this->session->set_userdata("last_insert_id", $insert_id);
                      

                       /*location map*/
                    $loc = array('ad_id' => $insert_id,
                                'loc_name' => $this->input->post('location'),
                                'latt' => $this->input->post('lattitude'),
                                'longg' => $this->input->post('longtitude'),
                                'loc_city' => $this->input->post('loc_city'),
                                'location_name' => $this->input->post('location_name')
                                );
                        $this->db->insert("location", $loc);

                       /*platinum package*/
                if ($this->input->post('package_type') == 3) {
                   $plat_data = array('ad_id' => $insert_id,
                                        'marquee'=>$this->input->post('marquee_title'),
                                        'ad_validfrom' => date("d-m-Y H:i:s"),
                                        'ad_validto' => date('d-m-Y H:i:s', strtotime("+30 days")),
                                        'status' => 1,
                                        'posted_date' => date("d-m-Y H:i:s")
                                );
                   $this->db->insert('platinum_ads', $plat_data);
                }
                        
                     /*image upload*/
                             $i=1;
                       foreach($this->input->post('pic_hide') as $rawData){ 
                                $filteredData = explode(',', $rawData);
                            $unencoded = base64_decode($filteredData[1]);
                            //Create the image 
                            $fp = fopen('./pictures/'.time().$i.'.jpg', 'w');
                            $plat_img = array('ad_id' => $insert_id,
                                        'img_name' => time().$i.'.jpg',
                                        'img_time' => date('d-m-Y H:i:s'),
                                        'status' => 1,
                                        'bus_logo' => $business_logo
                                    );
                        $this->db->insert("ad_img", $plat_img);
                            fwrite($fp, $unencoded);
                            fclose($fp); 
                            $i++;
                       }

                        /*video upload platinum*/
                       if($this->input->post('file_video_platinum')){
                   $plat_video = array('ad_id' => $insert_id,
                                    'video_name' => $this->input->post('file_video_platinum'),
                                    'uploaded_time' => date('d-m-Y H:i:s')
                                );
                    $this->db->insert("videos", $plat_video);
                                }

                
                    
                            

                    /*contact info*/
                    if ( $ad_type == 'consumer') {
                        $plat_cont = array('ad_id' => $insert_id,
                                    'contact_name' => $this->input->post('conscontname'),
                                    'email' => $this->input->post('consemail'),
                                    'mobile' => $this->input->post('conssmblno')
                                );
                        $this->db->insert("contactinfo_consumer", $plat_cont);
                    }

                    /*contact info*/
                    if ( $ad_type == 'business') {
                        $plat_cont = array('ad_id' => $insert_id,
                                    'bus_name' => $this->input->post('busname'),
                                    'contact_person' => $this->input->post('buscontname'),
                                    'email' => $this->input->post('busemail'),
                                    'mobile'=>$this->input->post('bussmblno')
                                );
                        $this->db->insert("contactinfo_business", $plat_cont);
                    }

                    /*property for residential*/
                    if ($this->input->post('sub_id') == '11') {
                     $pro_rent = array('ad_id' => $insert_id,
                                    'offered_type'=>$this->input->post('offered_type'),
                                    'property_for'=>$this->input->post('property_for'),
                                    'property_type'=>$this->input->post('property_type'),
                                    'bed_rooms' => $this->input->post('Bedrooms'),
                                    'bath_rooms' => $this->input->post('Bathrooms'),
                                    'build_area'=>$this->input->post('area'),
                                    'position'=>$this->input->post('Position'),
                                    'property_age'=>$this->input->post('propertyage'),
                                    'property_ownership'=>$this->input->post('Ownership'),
                                    'floor_number'=>$this->input->post('floor_number')
                                );
                        $this->db->insert("property_resid_commercial", $pro_rent);   
                    }

                    /*property for commercial*/
                    if ($this->input->post('sub_id') == '26') {
                     $pro_rent = array('ad_id' => $insert_id,
                                    'offered_type'=>$this->input->post('offered_type'),
                                    'property_for'=>$this->input->post('property_for'),
                                    'property_type'=>$this->input->post('property_type'),
                                    'bed_rooms' => '',
                                    'bath_rooms' => $this->input->post('Bathrooms'),
                                    'build_area'=>$this->input->post('area'),
                                    'position'=>$this->input->post('Position'),
                                    'property_age'=>$this->input->post('propertyage'),
                                    'property_ownership'=>$this->input->post('Ownership'),
                                    'floor_number'=>$this->input->post('floor_number')
                                );
                        $this->db->insert("property_resid_commercial", $pro_rent);   
                    }

                    
                     if ($insert_id != '') {
                        $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                        $this->session->set_userdata("postad_time",time());
                       }
                        
            }


}
?>