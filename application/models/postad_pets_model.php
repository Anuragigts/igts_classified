<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad_pets_model extends CI_Model{
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
                                    'services'    => $this->input->post('checkbox_wmcloth'),
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

                    /*pets details*/
                    if ($this->input->post('category_id') == '5') {
                        $pets_details = array('ad_id' => $insert_id,
                                    'family_race' => $this->input->post('family_race'),
                                    'pet_type' => $this->input->post('pet_type'),
                                    'pet_age' => $this->input->post('Age'),
                                    'height'=>$this->input->post('height'),
                                    'gender'=>$this->input->post('gender')
                                );
                        $this->db->insert("pets_details", $pets_details);
                    }

                    
                     if ($insert_id != '') {
                        $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                        $this->session->set_userdata("postad_time",time());
                       }

            }


        public function sellerneeded_pets_dogs(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_cats(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_fishes(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_birds(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_others(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_cobs(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =1 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =1 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function sellerneeded_pets_donkey(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =2 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =2 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_horses(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =3 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =3 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_ponies(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =4 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =4 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_beef(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =5 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =5 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_dailry(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =6 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =6 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function sellerneeded_pets_bothers(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =7 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5 AND sub_scat_id =7 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        /*small animals*/
         public function sellerneeded_pets_pigs(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =8 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =8 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_sheep(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =9 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =9 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_goat(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =10 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =10 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_poultry(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =11 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =11 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_reptile(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =12 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =12 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_furry(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =13 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =13 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_sothers(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =14 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6 AND sub_scat_id =14 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }

        /*pets accessories*/
        public function sellerneeded_pets_food(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =15 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =15 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_toys(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =16 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =16 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_cloths(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =17 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =17 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_feed(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =18 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =18 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_beds(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =19 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =19 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_odour(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =20 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =20 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_tanks(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =21 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =21 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_marine(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =22 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =22 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_aquarium(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =23 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =23 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pets_stuff(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =24 AND services = 'Seller' AND ad_status = 1 AND expire_data >='$date') AS seller,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7 AND sub_scat_id =24 AND services = 'Needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }

        /*business or consumer counts*/
        public function busconcount_petsdogs(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petscats(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsfish(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsbirds(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsother(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }

        public function busconcount_petscobs(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =1 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =1 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =1 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsdonkey(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =2 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =2 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =2 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petshorse(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =3 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =3 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =3 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsponies(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =4 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =4 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =4 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function busconcount_petsbeef(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =5 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =5 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =5 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsdairy(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =6 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =6 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =6 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_petsbothers(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =7 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =7 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =7 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function busconcount_pets_pigs(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =8 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =8 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =8 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_sheep(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =9 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =9 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =9 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_goat(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =10 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =10 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =10 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_poultry(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =11 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =11 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =11 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_reptile(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =12 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =12 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =12 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_furry(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =13 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =13 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =13 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_sother(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =14 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =14 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =14 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        /*pets accessories*/
        public function busconcount_pets_food(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =15 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =15 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =15 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function busconcount_pets_toys(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =16 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =16 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =16 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function busconcount_pets_cloths(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =17 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =17 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =17 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_feed(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =18 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =18 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =18 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_beds(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =19 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =19 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =19 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_odour(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =20 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =20 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =20 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_tank(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =21 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =21 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =21 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_marine(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =22 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =22 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =22 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function busconcount_pets_aquarium(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =23 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =23 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =23 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function busconcount_pets_stuff(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =24 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =24 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =24 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }

         /*packages count for pets*/
        public function deals_pck_petsdog(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =1 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function deals_pck_petscat(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =2 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function deals_pck_petsfish(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =3 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function deals_pck_petsbird(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =4 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
         public function deals_pck_petsother(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =8 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }

        public function deals_pck_petscobs(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =1 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =1  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petsdonkey(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =2 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =2  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petshorse(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =3 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =3  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petsponies(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =4 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =4  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petsbeef(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =5 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =5  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =5  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =5  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petsdairy(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =6 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =6  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =6  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =6  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_petsbothers(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =5  AND sub_scat_id =7 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =5  AND sub_scat_id =7  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =5  AND sub_scat_id =7  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =5  AND sub_scat_id =7  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_pig(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =8 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =8  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_sheep(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =9 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =9  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =9  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =9  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_goat(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =10 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =10  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =10  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =10  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_poultry(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =11 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =11  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =11  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =11  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_reptile(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =12 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =12  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =12  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =12  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_furry(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =13 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =13  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =13  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =13  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_sother(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =6  AND sub_scat_id =14 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =6  AND sub_scat_id =14  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =6  AND sub_scat_id =14  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =6  AND sub_scat_id =14  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        /*pets accessories*/
        public function deals_pck_pets_food(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =15 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =15  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =15  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =15  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_toys(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =16 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =16  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =16  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =16  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_cloths(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =17 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =17  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =17  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =17  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_feed(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =18 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =18  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =18  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =18  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_beds(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =19 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =19  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =19  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =19  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_odour(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =20 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =20  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =20  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =20  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_tank(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =21 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =21  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =21  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =21  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_marine(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =22 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =22  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =22  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =22  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_aquarium(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =23 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =23  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =23  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =23  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pets_stuff(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND sub_cat_id =7  AND sub_scat_id =24 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6' AND sub_cat_id =7  AND sub_scat_id =24  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5' AND sub_cat_id =7  AND sub_scat_id =24  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4' AND sub_cat_id =7  AND sub_scat_id =24  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }

        public function count_petdogs_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petdogs_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petdogs_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets search*/
        public function petdogs_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        /*cats view*/
        public function count_petcats_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petcats_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petcats_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function petcats_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        /*pets fishes*/
        public function count_petfishes_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petfishes_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petfishes_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function petfishes_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        /*pets bird*/
        public function count_petbird_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petbird_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petbird_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function petbird_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        /*pets others*/
        public function count_petothers_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petothers_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petothers_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function petothers_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets cobs*/
        public function count_petcobs_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function petcobs_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_petcobs_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function petcobs_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "1");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets donkeys*/
        public function count_donkey_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function donkey_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_donkey_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function donkey_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "2");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets horses*/
        public function count_horses_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function horses_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_horses_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function horses_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "3");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets ponies*/
        public function count_ponies_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function ponies_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_ponies_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function ponies_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "4");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*pets beefs*/
        public function count_beefs_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "5");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function beefs_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "5");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_beefs_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "5");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function beefs_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "5");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         /*pets dairy*/
        public function count_dairy_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "6");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function dairy_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "6");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_dairy_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "6");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function dairy_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "6");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        
          /*pets big others*/
        public function count_bigother_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "7");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function bigother_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "7");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_bigother_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "7");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function bigother_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "5");
            $this->db->where("ad.sub_scat_id", "7");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }       

         /*pets small pigs*/
        public function count_pigs_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function pigs_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_pigs_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function pigs_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "8");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }  

         /*pets small sheep*/
        public function count_sheep_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "9");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function sheep_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "9");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_sheep_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "9");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function sheep_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "9");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }  

        /*pets small goats*/
        public function count_goats_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "10");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function goats_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "10");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_goats_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "10");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function goats_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "10");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }  

         /*pets small poultry*/
        public function count_poultry_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "11");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function poultry_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "11");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_poultry_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "11");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function poultry_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "11");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }  

         /*pets small reptiles*/
        public function count_reptiles_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "12");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function reptiles_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "12");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_reptiles_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "12");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function reptiles_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "12");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }  

         /*pets small furry*/
        public function count_furry_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "13");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function furry_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "13");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_furry_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "13");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function furry_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "13");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

         /*pets small others*/
        public function count_sother_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "14");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function sother_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "14");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_sother_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "14");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function sother_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "6");
            $this->db->where("ad.sub_scat_id", "14");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }    

            /*pets accessories*/
          /*pets foods */
        public function count_foods_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "15");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function foods_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "15");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_foods_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "15");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function foods_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "15");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }    
        /*pets toys */
        public function count_toys_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "16");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function toys_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "16");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_toys_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "16");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function toys_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "16");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }    

        /*pets cloths */
        public function count_cloths_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "17");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function cloths_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "17");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_cloths_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "17");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function cloths_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "17");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }    

         /*pets feeds */
        public function count_feeds_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "18");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
        }

        public function feeds_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "18");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_feeds_search(){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "18");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
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
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
                    else{
                        $this->db->order_by("ad.ad_id", "DESC");
                    }
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get();
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function feeds_search($data){
            $pets_sub = $this->session->userdata('pets_sub');
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "5");
            $this->db->where("ad.sub_cat_id", "7");
            $this->db->where("ad.sub_scat_id", "18");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($pets_sub)) {
                $this->db->where_in('ad.sub_cat_id', $pets_sub);
            }
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
            }
            if ($search_bustype) {
                if ($this->session->userdata('search_bustype') == 'business' || $this->session->userdata('search_bustype') == 'consumer') {
                    $this->db->where("ad.ad_type", $this->session->userdata('search_bustype'));
                }
            }
            /*package search*/
            if (!empty($dealurgent)) {
                $pcklist = [];
                if (in_array("0", $dealurgent)) {
                    $this->db->where('ad.urgent_package !=', '0');
                }
                else{
                    $this->db->where('ad.urgent_package =', '0');
                }
                if (in_array(4, $dealurgent)){
                    array_push($pcklist, 4);
                }
                if (in_array(5, $dealurgent)){
                    array_push($pcklist, 5);
                }
                if (in_array(6, $dealurgent)){
                    array_push($pcklist, 6);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
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
            $this->db->order_by('dtime', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
             // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }    

}
?>