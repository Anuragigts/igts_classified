<?php

/* 
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
class Postad_kitchen_model extends CI_Model{
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
                    if (($this->input->post('package_type') == 4) && $this->input->post('package_urgent') == 0) {
                        $isfree = 1;
                        $payment = 1;
                    }
                    else{
                        $isfree = 0;
                        $payment = 0;
                    }
                     /*web-link for free */
          if ($this->input->post('package_type') == 4) {
                        $url = "";
                    }
                    /*web-link for gold*/
          if ($this->input->post('package_type') == 5) {
                        $url = $this->input->post("gold_weblink");
                    }
                    /*web-link for platinum*/
          if ($this->input->post('package_type') == 6) {
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
                                'service_type'=> '',
                                'services'    => $this->input->post('checkbox_motbike'),
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
                                'is_free' => $isfree
                                );
            // echo "<pre>"; print_r($data); exit;
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
                if ($this->input->post('package_type') == 6) {
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

                
                /*kitchen details insertion*/
                if ($this->input->post('category_id') == '7') {
                    $pets_details = array('ad_id' => $insert_id,
                                'brand_name' => $this->input->post('brandname'),
                                'material' => $this->input->post('material'),
                                'color' => $this->input->post('hcolor'),
                                'assembly'=>$this->input->post('assembly'),
                                'dimensions'=>$this->input->post('weight'),
                                'capacity'=>$this->input->post('capacity'),
                                'items_condition'=>$this->input->post('itemconditions'),
                                'warranty'=>$this->input->post('warranty')
                            );
                    $this->db->insert("kitchenhome_ads", $pets_details);
                }

                if ($insert_id != '') {
                    $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                    $this->session->set_userdata("postad_time",time());
                   }
            }


            /*kitchen essentials*/
          public function busconcount_essential(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hessen(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_decor(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            /*kitchen essentials sub category*/
            public function busconcount_ktools(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function busconcount_kstorage(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_cookware(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function busconcount_bakeware(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_burners(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_bbq(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_linen(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_kothers(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }

            /*home essentials*/
            public function busconcount_hbath(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hbed(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hcarpets(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hclean(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hplumb(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function busconcount_hwind(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hdoor(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hgarden(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hfurniture(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hshed(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hplants(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function busconcount_hdining(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hliving(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hkids(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function busconcount_houtdoor(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hstudy(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function busconcount_hothers(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }



        public function sellerneeded_essential(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
            $rs = $this->db->get();
            return $rs->result();
                }
             public function sellerneeded_hessen(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
            }
             public function sellerneeded_decor(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
            }

            /*kitchen essentials sub category sellercnt */
             public function sellerneeded_ktools(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 457 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
            }
            public function sellerneeded_kstorage(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 458 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_cookware(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 459 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_bakeware(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 460 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_burners(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 461 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_bbq(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 462 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_linen(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 463 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_kothers(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '67' AND sub_scat_id = 464 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }

            /*home essentials*/
            public function sellerneeded_hbath(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 465 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hbed(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 466 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hcarpet(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 467 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function sellerneeded_hcleaning(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 468 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hplumb(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 469 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hwind(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 470 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hdoor(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 471 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hgarden(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 472 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hfurniture(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 473 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hshed(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 474 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hplants(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 475 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hdiving(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 476 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hliving(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 477 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
             public function sellerneeded_hkids(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 478 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_houtdoor(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 479 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hstudy(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 480 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_hothers(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '68' AND sub_scat_id = 481 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
                $rs = $this->db->get();
                return $rs->result();
            }


         public function deals_pck_essential(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
                }

          public function deals_pck_hessen(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
                }  
          public function deals_pck_decor(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
                }   

            /*kitchen essentials deal package*/
            public function deals_pck_ktools(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 457 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_kstorage(){
               $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 458 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_cookware(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 459 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }   
            public function deals_pck_bakeware(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 460 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            } 
            public function deals_pck_burners(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 461 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }  
            public function deals_pck_bbq(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 462 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            } 
            public function deals_pck_linen(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 463 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            } 
            public function deals_pck_other(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='67' AND sub_scat_id = 464 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }

            /*home essentials deal type*/
            public function deals_pck_hbath(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 465 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hbed(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 466 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hcarpet(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 467 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hcleaning(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 468 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hplumb(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 469 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hwind(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 470 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hdoor(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 471 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hgarden(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 472 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hfurniture(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 473 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hshed(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 474 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hplants(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 475 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hdining(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 476 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hliving(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 477 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hkids(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 478 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_houtdoor(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 479 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hstudy(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 480 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }
            public function deals_pck_hothers(){
                $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='68' AND sub_scat_id = 481 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
            }



    /*kitchen esentials search*/
    public function kesentials_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_kesentials_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function kesentials_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_kesentials_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

     /*home esentials search*/
    public function homeesentials_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_homeesentials_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function homeesentials_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_homeesentials_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*decor search*/
    public function decor_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "69");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_decor_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "69");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function decor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_decor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*kitchen tools search*/
    public function ktools_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "457");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_ktools_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "457");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function ktools_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "457");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_ktools_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "457");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*kitchen storage search*/
    public function kstorage_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "458");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_kstorage_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "458");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function kstorage_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
      $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "458");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_kstorage_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "458");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*kitchen cookware search*/
    public function cookware_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "459");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_cookware_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "459");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function cookware_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "459");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_cookware_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "459");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*kitchen bakeware search*/
    public function bakeware_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "460");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_bakeware_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "460");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function bakeware_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "460");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_bakeware_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "460");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }
    /*kitchen cooktops search*/
    public function cooktops_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "461");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_cooktops_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "461");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function cooktops_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "461");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_cooktops_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "461");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }
    /*kitchen bbq search*/
    public function bbq_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "462");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_bbq_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "462");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function bbq_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "462");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_bbq_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "462");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /*kitchen bbq search*/
    public function linen_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "463");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_linen_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "463");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function linen_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "463");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_linen_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "463");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

     /*kitchen kitchen others search*/
    public function kothers_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "464");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_kothers_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "67");
    $this->db->where("ad.sub_scat_id", "464");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function kothers_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "464");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_kothers_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
      $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "67");
        $this->db->where("ad.sub_scat_id", "464");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }
     /*home essentials search*/
    public function hbath_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "465");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hbath_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "465");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hbath_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "465");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hbath_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "465");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hbed_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "466");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hbed_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "466");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hbed_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "466");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hbed_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "466");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hcarpets_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "467");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hcarpets_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "467");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hcarpets_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "467");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hcarpets_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "467");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hcleaning_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "468");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hcleaning_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "468");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hcleaning_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "468");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hcleaning_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "468");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hplumb_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "469");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hplumb_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "469");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hplumb_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "469");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hplumb_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "469");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hwind_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "470");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hwind_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "470");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hwind_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "470");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hwind_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "470");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hdoor_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "471");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hdoor_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "471");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hdoor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "471");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hdoor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "471");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hgarden_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "472");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hgarden_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "472");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hgarden_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "472");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hgarden_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "472");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hfurniture_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "473");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hfurniture_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "473");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hfurniture_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "473");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hfurniture_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "473");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hshed_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "474");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hshed_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "474");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hshed_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "474");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hshed_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "474");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hplant_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "475");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hplant_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "475");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hplant_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "475");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hplant_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "475");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

     public function hdining_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "476");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hdining_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "476");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hdining_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "476");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hdining_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "476");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hliving_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "477");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hliving_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "477");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hliving_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "477");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hliving_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "477");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function hkids_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "478");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hkids_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "478");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hkids_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "478");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hkids_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "478");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function houtdoor_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "479");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_houtdoor_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "479");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function houtdoor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "479");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_houtdoor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "479");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }
    public function hstudy_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "480");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hstudy_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "480");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hstudy_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "480");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hstudy_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "480");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

     public function hothers_view($data){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "481");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function count_hothers_view(){
    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
    $this->db->from("postad AS ad");
    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
    $this->db->where("ad.sub_cat_id", "68");
    $this->db->where("ad.sub_scat_id", "481");
    $this->db->where("ad.ad_status", "1");
    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
    $this->db->group_by(" img.ad_id");
    $this->db->order_by('ad.approved_on', 'DESC');
    $m_res = $this->db->get();
    // echo $this->db->last_query();exit;
    if($m_res->num_rows() > 0){
        return $m_res->result();
    }
    else{
        return array();
    }
}

public function hothers_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
      $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "481");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_hothers_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "68");
        $this->db->where("ad.sub_scat_id", "481");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    /* Curtains & Accessories */
    public function busconcount_dcurtain(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dcurtain(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 482 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dcurtain(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 482 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dcurtain_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "482");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcurtain_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "482");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dcurtain_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "482");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcurtain_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "482");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



    /* Candles & Fragrances */
    public function busconcount_dcandles(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dcandles(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 483 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dcandles(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 483 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dcandles_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "483");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcandles_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "483");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dcandles_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "483");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcandles_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "483");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }




    /* Vases & Flowers */
    public function busconcount_dvases(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dvases(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 484 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dvases(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 484 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dvases_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "484");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dvases_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "484");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dvases_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "484");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dvases_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "484");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



    /* Wall Decor */
    public function busconcount_dwalldecor(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dwalldecor(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 485 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dwalldecor(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 485 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dwalldecor_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "485");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dwalldecor_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "485");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dwalldecor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "485");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dwalldecor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "485");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



    /* Home Accent */
    public function busconcount_dhomeaccent(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dhomeaccent(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 486 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dhomeaccent(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 486 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dhomeaccent_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "486");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dhomeaccent_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "486");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dhomeaccent_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "486");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dhomeaccent_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "486");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }




    /* Religion & Spirituality */
    public function busconcount_dreligion(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dreligion(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 487 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dreligion(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 487 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dreligion_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "487");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dreligion_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "487");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dreligion_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "487");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dreligion_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "487");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }




    /* Photo frames & Albums */
    public function busconcount_dphotoframe(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dphotoframe(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 488 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dphotoframe(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 488 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dphotoframe_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "488");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dphotoframe_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "488");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dphotoframe_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "488");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dphotoframe_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "488");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }


    /* Rugs & Carpets */
    public function busconcount_drugs(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_drugs(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 489 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_drugs(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 489 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_drugs_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "489");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function drugs_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "489");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_drugs_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "489");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function drugs_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
      $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "489");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



     /* Cushions & Throws*/
    public function busconcount_dcushionsthrows(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dcushionsthrows(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 490 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dcushionsthrows(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 490 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dcushionsthrows_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "490");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcushionsthrows_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "490");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dcushionsthrows_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "490");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dcushionsthrows_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "490");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



     /* Table Lamps & Ceiling Lights */
    public function busconcount_dtablelamps(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dtablelamps(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 491 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dtablelamps(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 491 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dtablelamps_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "491");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dtablelamps_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "491");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dtablelamps_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "491");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dtablelamps_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "491");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



     /* Wall & Outdoor Lights*/
    public function busconcount_dwalloutdoor(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dwalloutdoor(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 492 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dwalloutdoor(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 492 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dwalloutdoor_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "492");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dwalloutdoor_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "492");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dwalloutdoor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "492");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dwalloutdoor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
        $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "492");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }



      /* Other decor */
    public function busconcount_dotherdecor(){
        $data = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
        (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function sellerneeded_dotherdecor(){
        $date = date("Y-m-d H:i:s");
        $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed,
            (SELECT COUNT(*) FROM postad WHERE category_id = '7' AND sub_cat_id= '69' AND sub_scat_id = 493 AND services = 'Charity' AND ad_status = 1 AND expire_data >='$date') AS charity");
        $rs = $this->db->get();
        return $rs->result();
    }

    public function deals_pck_dotherdecor(){
        $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 6 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount = $this->db->last_query();

                
                $this->db->select('COUNT(ud.valid_to) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 6 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $platinumcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(platinumcount) AS platinumcount FROM (".$platinumcount." UNION ALL ".$platinumcount1.") AS a");
                $query1 = $query->row('platinumcount');
                $platinumsum = $query1;

                $this->db->select('COUNT(*) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 5 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as goldcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 5 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $goldcount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(goldcount) AS goldcount FROM (".$goldcount." UNION ALL ".$goldcount1.") AS a");
                $query1 = $query->row('goldcount');
                $goldsum = $query1;

                $this->db->select('COUNT(*) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 4 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount = $this->db->last_query();

                $this->db->select('COUNT(ud.valid_to) as freecount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to < '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '7' AND sub_cat_id='69' AND sub_scat_id = 493 AND package_type = 4 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $this->db->get();
                $freecount1 = $this->db->last_query();
                $query = $this->db->query("SELECT SUM(freecount) AS freecount FROM (".$freecount." UNION ALL ".$freecount1.") AS a");
                $query1 = $query->row('freecount');
                $freesum = $query1;
                $res = array('urgentcount'=>$urgentcount,
                            'platinumcount'=>$platinumsum,
                            'goldcount'=>$goldsum,
                            'freecount'=>$freesum);
                return $res;
    }

    public function count_dotherdecor_view(){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "493");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        // echo $this->db->last_query();exit;
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dotherdecor_view($data){
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
        $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
    $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "493");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        $this->db->group_by(" img.ad_id");
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
    
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function count_dotherdecor_search(){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->from("postad AS ad");
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
     $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "493");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get();
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }

    public function dotherdecor_search($data){
        $kitchen_sub = $this->session->userdata('kitchen_search');
        $search_bustype = $this->session->userdata('search_bustype');
        $dealurgent = $this->session->userdata('dealurgent');
        $dealtitle = $this->session->userdata('dealtitle');
        $dealprice = $this->session->userdata('dealprice');
        $recentdays = $this->session->userdata('recentdays');
        $location = $this->session->userdata('location');
        $seller = $this->session->userdata('seller_deals');
        $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, ud.valid_to AS urg");
        $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
        '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
        $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
        $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
        $this->db->where("ad.category_id", "7");
        $this->db->where("ad.sub_cat_id", "69");
        $this->db->where("ad.sub_scat_id", "493");
        $this->db->where("ad.ad_status", "1");
        $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
        if (!empty($kitchen_sub)) {
            $this->db->where_in('ad.sub_scat_id', $kitchen_sub);
        }
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
        }
        if ($search_bustype) {
            if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                $this->db->where("ad.ad_type", $search_bustype);
            }
        }
        /*package search*/
        if (!empty($dealurgent)) {
            $pcklist = [];
            if (in_array("0", $dealurgent)) {
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                            $this->db->where('ad.urgent_package !=', '0');
            }
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
                            $this->db->where("(ad.urgent_package = '0' OR (ad.urgent_package != '0' AND ud.valid_to < '".date("Y-m-d H:i:s")."' ))");
            }
            if (in_array("6", $dealurgent)){
                array_push($pcklist, '6');
            }
            if (in_array("5", $dealurgent)){
                array_push($pcklist, '5');
            }
            if (in_array("4", $dealurgent)){
                array_push($pcklist, '4');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }

        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }
        /*deal posted days 24hr/3day/7day/14day/1month */
        if ($recentdays == 'last24hours'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
        }
        else if ($recentdays == 'last3days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
        }
        else if ($recentdays == 'last7days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
        }
        else if ($recentdays == 'last14days'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
        }   
        else if ($recentdays == 'last1month'){
            $this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
        }

        /*location search*/
        if ($location) {
            $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
        }


        $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                if ($dealtitle == 'atoz') {
                    $this->db->order_by("ad.deal_tag","ASC");
                }
                else if ($dealtitle == 'ztoa'){
                    $this->db->order_by("ad.deal_tag", "DESC");
                }
                /*deal price ascending or descending*/
                if ($dealprice == 'lowtohigh'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
                }
                else if ($dealprice == 'hightolow'){
                    $this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
                }
        $this->db->order_by('ad.approved_on', 'DESC');
        $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
        if($m_res->num_rows() > 0){
            return $m_res->result();
        }
        else{
            return array();
        }
    }




}
?>