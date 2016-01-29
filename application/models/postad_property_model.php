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
                                
                                $target_dir = "./ad_images/business_logos/";
                            
                        // $target_file = $target_dir . basename($_FILES["file"]["name"]);
                        // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
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

                         /*web-link for free */
              if ($this->input->post('package_type') == 'free') {
                            $url = "";
                        }
                        /*web-link for free urgent*/
              if ($this->input->post('package_type') == 'free_urgent') {
                            $url = $this->input->post("freeurgent_weblink");
                        }
                        /*web-link for gold*/
              if ($this->input->post('package_type') == 'gold') {
                            $url = $this->input->post("gold_weblink");
                        }
                        /*web-link for gold + urgent*/
              if ($this->input->post('package_type') == 'gold_urgent') {
                            $url = $this->input->post("goldurgent_weblink");
                        }
                        /*web-link for platinum*/
              if ($this->input->post('package_type') == 'platinum') {
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
                                    'created_on'   => date('d-m-Y h:i:s'),
                                    'updated_on'   => date('d-m-Y h:i:s'),
                                    'terms_conditions' =>$this->input->post('terms_condition'),
                                    'ad_status'     => 1
                                    );
                // echo "<pre>"; print_r($data); exit;
                    $this->db->insert('postad', $data);

                       $insert_id = $this->db->insert_id();

                       if ($insert_id != '') {
                        $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                        $this->session->set_userdata("postad_time",time());
                       }

                       /*location map*/
                    $loc = array('ad_id' => $insert_id,
                                'loc_name' => $this->input->post('location'),
                                'latt' => $this->input->post('lattitude'),
                                'longg' => $this->input->post('longtitude')
                                );
                        $this->db->insert("location", $loc);

                        /*free package*/
                    if ($this->input->post('package_type') == 'free') {
                       $plat_data = array('ad_id' => $insert_id,
                                            'ad_validfrom' => date("d-m-Y H:i:s"),
                                            'ad_validto' => date('d-m-Y H:i:s', strtotime("+30 days")),
                                            'status' => 1,
                                            'posted_date' => date("d-m-Y H:i:s")
                                    );
                       $this->db->insert('free_ads', $plat_data);
                    }

                    /*free+urgent package*/
                    if ($this->input->post('package_type') == 'free_urgent') {
                       $plat_data = array('ad_id' => $insert_id,
                                            'ad_validfrom' => date("d-m-Y H:i:s"),
                                            'ad_validto' => date('d-m-Y H:i:s', strtotime("+30 days")),
                                            'status' => 1,
                                            'posted_date' => date("d-m-Y H:i:s")
                                    );
                       $this->db->insert('freeurgent_ads', $plat_data);
                    }

                    /*gold package*/
                    if ($this->input->post('package_type') == 'gold') {
                       $plat_data = array('ad_id' => $insert_id,
                                            'ad_validfrom' => date("d-m-Y H:i:s"),
                                            'ad_validto' => date('d-m-Y H:i:s', strtotime("+30 days")),
                                            'status' => 1,
                                            'posted_date' => date("d-m-Y H:i:s")
                                    );
                       $this->db->insert('gold_ads', $plat_data);
                    }

                    /*gold+urgent package*/
                    if ($this->input->post('package_type') == 'gold_urgent') {
                       $plat_data = array('ad_id' => $insert_id,
                                            'ad_validfrom' => date("d-m-Y H:i:s"),
                                            'ad_validto' => date('d-m-Y H:i:s', strtotime("+30 days")),
                                            'status' => 1,
                                            'posted_date' => date("d-m-Y H:i:s")
                                    );
                       $this->db->insert('goldurgent_ads', $plat_data);
                    }

                        /*platinum package*/
                    if ($this->input->post('package_type') == 'platinum') {
                       $plat_data = array('ad_id' => $insert_id,
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
                            $fp = fopen('./ad_images/'.time().$i.'.jpg', 'w');
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

                       /*video upload free+urgent*/
                       if($_FILES['file_video_free']['name'] != ''){
                       $target_dir = "./ad_videos/";
                        
                    $target_file = $target_dir . basename($_FILES["file_video_free"]["name"]);
                    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_name = explode(".", $_FILES["file_video_free"]["name"]);
                    move_uploaded_file($_FILES["file_video_free"]["tmp_name"],$target_dir.time().".".end($new_name));
                    $plat_video = array('ad_id' => $insert_id,
                                    'video_name' => time().".".end($new_name),
                                    'uploaded_time' => date('d-m-Y H:i:s')
                                );
                    $this->db->insert("videos", $plat_video);
                                }

                    /*video upload gold*/
                       if($_FILES['file_video_gold']['name'] != ''){
                       $target_dir = "./ad_videos/";
                        
                    $target_file = $target_dir . basename($_FILES["file_video_gold"]["name"]);
                    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_name = explode(".", $_FILES["file_video_gold"]["name"]);
                    move_uploaded_file($_FILES["file_video_gold"]["tmp_name"],$target_dir.time().".".end($new_name));
                    $plat_video = array('ad_id' => $insert_id,
                                    'video_name' => time().".".end($new_name),
                                    'uploaded_time' => date('d-m-Y H:i:s')
                                );
                    $this->db->insert("videos", $plat_video);
                                }

                    /*video upload gold+urgent*/
                       if($_FILES['goldurgent_video']['name'] != ''){
                       $target_dir = "./ad_videos/";
                        
                    $target_file = $target_dir . basename($_FILES["goldurgent_video"]["name"]);
                    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_name = explode(".", $_FILES["goldurgent_video"]["name"]);
                    move_uploaded_file($_FILES["goldurgent_video"]["tmp_name"],$target_dir.time().".".end($new_name));
                    $plat_video = array('ad_id' => $insert_id,
                                    'video_name' => time().".".end($new_name),
                                    'uploaded_time' => date('d-m-Y H:i:s')
                                );
                    $this->db->insert("videos", $plat_video);
                                }

                       /*video upload platinum*/
                       if($_FILES['file_video_platinum']['name'] != ''){
                       $target_dir = "./ad_videos/";
                        
                    $target_file = $target_dir . basename($_FILES["file_video_platinum"]["name"]);
                    // $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    $new_name = explode(".", $_FILES["file_video_platinum"]["name"]);
                    move_uploaded_file($_FILES["file_video_platinum"]["tmp_name"],$target_dir.time().".".end($new_name));
                    $plat_video = array('ad_id' => $insert_id,
                                    'video_name' => time().".".end($new_name),
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
            }


}
?>