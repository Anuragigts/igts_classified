<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad_model extends CI_Model{
       public function postad_creat(){
             /*AD type business or consumer*/
                    $cur_date = date("Y")."".date("m");
                        if($this->input->post('checkbox_toggle') == 'Yes'){
                                $ad_type = 'business';
                                
                                $target_dir = "./pictures/business_logos/";
                            
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
                     if ($this->input->post('pic_hide')) {
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

                    
                    if ($insert_id != '') {
                        $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                        $this->session->set_userdata("postad_time",time());
                       }
            }


            public function getloc_details($pid){
                $this->db->select();
                $this->db->from("uk_postcodes");
                $this->db->where("postcode", $pid);
                $this->db->or_where("town", $pid);
                $this->db->group_by("town");
                return $this->db->get()->result();
            }

            /*coaching and training*/
            public function busconcount_profcoach(){
                $data = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 25 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 25 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 25 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function sellerneeded_profcoach(){
                $date = date("Y-m-d H:i:s");
                $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 25 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
                (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 25 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
                $rs = $this->db->get();
                return $rs->result();
            }
            public function deals_pck_profcoach(){
               $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 25 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
            public function count_profcoach_view(){
                $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg
");
                $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                $this->db->from("postad AS ad");
                $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
                $this->db->where("ad.category_id", "2");
                $this->db->where("ad.sub_cat_id", "9");
                $this->db->where("ad.sub_scat_id", "25");
                $this->db->where("ad.ad_status", "1");
                $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                $this->db->group_by(" img.ad_id");
                $this->db->order_by('ad.approved_on', 'DESC');
                $m_res = $this->db->get();

                return $m_res->result();
                
            }

            public function profcoach_view($data){
                $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
                $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                //$this->db->from("postad AS ad");
                $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("ad.category_id", "2");
                $this->db->where("ad.sub_cat_id", "9");
                $this->db->where("ad.sub_scat_id", "25");
                $this->db->where("ad.ad_status", "1");
                $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                $this->db->group_by(" img.ad_id");
                $this->db->order_by('ad.approved_on', 'DESC');
                $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
                // echo $this->db->last_query(); exit;

                if($m_res->num_rows() > 0){
                    return $m_res->result();
                }
                else{
                    return array();
                }
            }

            public function count_profcoach_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "25");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array("3", $dealurgent)){
                    array_push($pcklist, '3');
                }
                if (in_array("2", $dealurgent)){
                    array_push($pcklist, '2');
                }
                if (in_array("1", $dealurgent)){
                    array_push($pcklist, '1');
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profcoach_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "25");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Business services*/
        public function busconcount_profbusiness(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 26 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 26 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 26 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profbusiness(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 26 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 26 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profbusiness(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 26 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profbusiness_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "26");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profbusiness_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "26");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profbusiness_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "26");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }
        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profbusiness_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
           $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "26");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Party & wedding services*/
        public function busconcount_profparty(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profparty(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 27 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 27 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profparty(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 27 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profparty_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "27");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profparty_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "27");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profparty_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "27");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }
        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profparty_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "27");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*IT & digital marketing services*/
        public function busconcount_profitdigital(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profitdigital(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 28 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 28 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profitdigital(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 28 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profitdigital_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "28");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profitdigital_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "28");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profitdigital_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "28");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }
        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profitdigital_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "28");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Solicitor services*/
        public function busconcount_profsolicitor(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profsolicitor(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 29 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 29 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profsolicitor(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 29 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profsolicitor_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profsolicitor_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profsolicitor_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
           $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "29");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }
        else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profsolicitor_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "29");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Accounting & taxation services*/
        public function busconcount_profaccountingtax(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profaccountingtax(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 30 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 30 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profaccountingtax(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 30 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profaccountingtax_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "30");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profaccountingtax_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "30");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profaccountingtax_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "30");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profaccountingtax_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "30");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Home, construction & renovation services*/
        public function busconcount_profhomeconst(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profhomeconst(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 31 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 31 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profhomeconst(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 31 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profhomeconst_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "31");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profhomeconst_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "31");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profhomeconst_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "31");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profhomeconst_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "31");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



        /*Doctors & hospital services*/
        public function busconcount_profdoctorshosp(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profdoctorshosp(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 32 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 32 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profdoctorshosp(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 32 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profdoctorshosp_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profdoctorshosp_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profdoctorshosp_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "32");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profdoctorshosp_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "32");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



        /*Nurse & carer services*/
        public function busconcount_profnursecarer(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profnursecarer(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 33 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 33 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profnursecarer(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 33 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profnursecarer_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "33");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profnursecarer_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "33");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profnursecarer_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "33");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profnursecarer_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "33");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



        /*Astrology & numerology services*/
        public function busconcount_profastrology(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profastrology(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 34 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 34 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profastrology(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 34 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profastrology_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "34");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profastrology_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "34");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profastrology_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "34");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profastrology_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "34");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Loan & insurance*/
        public function busconcount_profloaninsu(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profloaninsu(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 35 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 35 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profloaninsu(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 35 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profloaninsu_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profloaninsu_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profloaninsu_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "35");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profloaninsu_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "35");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Funeral services*/
        public function busconcount_proffuneral(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_proffuneral(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 36 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 36 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_proffuneral(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 36 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_proffuneral_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "36");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function proffuneral_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "36");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_proffuneral_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "36");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function proffuneral_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "36");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Health & fitness*/
        public function busconcount_profhealthfit(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_profhealthfit(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 37 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 9 AND sub_scat_id = 37 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_profhealthfit(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37  AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='9' AND sub_scat_id = 37 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_profhealthfit_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "37");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function profhealthfit_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "37");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_profhealthfit_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "37");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function profhealthfit_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "9");
            $this->db->where("ad.sub_scat_id", "37");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        /*Popular*/

        /*Dry cleaning & laundry services*/
        public function busconcount_popdryclean(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popdryclean(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 38 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 38 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popdryclean(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 38 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popdryclean_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popdryclean_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popdryclean_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "38");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popdryclean_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "38");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Household services*/
        public function busconcount_pophousehold(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_pophousehold(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 39 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 39 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_pophousehold(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 39 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_pophousehold_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "39");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function pophousehold_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "39");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_pophousehold_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "39");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function pophousehold_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "39");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



        /*Travel & vacation services*/
        public function busconcount_poptravelvac(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_poptravelvac(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 40 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 40 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_poptravelvac(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 40 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_poptravelvac_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "40");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function poptravelvac_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "40");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_poptravelvac_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "40");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function poptravelvac_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
             $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "40");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Massage & beauty services*/
        public function busconcount_popmassage(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popmassage(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 41 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 41 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popmassage(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 41 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popmassage_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popmassage_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popmassage_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "41");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popmassage_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
             $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "41");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


        /*Community services*/
        public function busconcount_popcommunity(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popcommunity(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 42 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 42 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popcommunity(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 42 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popcommunity_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "42");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popcommunity_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "42");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popcommunity_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
             $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "42");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popcommunity_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
             $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "42");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



         /*Entertainment services*/
        public function busconcount_popentertainment(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popentertainment(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 43 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 43 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popentertainment(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 43 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popentertainment_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "43");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popentertainment_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "43");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popentertainment_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "43");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popentertainment_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "43");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



         /*Motor services*/
        public function busconcount_popmotor(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popmotor(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 44 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 44 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popmotor(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 44 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popmotor_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popmotor_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popmotor_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "44");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popmotor_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "44");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Logistics & transport services*/
        public function busconcount_poplogistics(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_poplogistics(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 45 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 45 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_poplogistics(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 45 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_poplogistics_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "45");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function poplogistics_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "45");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_poplogistics_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "45");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function poplogistics_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "45");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



         /*Restaurant & food services*/
        public function busconcount_poprestaurant(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_poprestaurant(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 46 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 46 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_poprestaurant(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 46 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_poprestaurant_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "46");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function poprestaurant_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "46");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_poprestaurant_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "46");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function poprestaurant_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "46");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Friendship & dating services*/
        public function busconcount_popfriendship(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popfriendship(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 47 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 47 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popfriendship(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 47 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popfriendship_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popfriendship_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popfriendship_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "47");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popfriendship_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "47");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
            else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Nannies services*/
        public function busconcount_popnannaies(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popnannaies(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 48 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 48 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popnannaies(){
           $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 48 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popnannaies_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "48");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popnannaies_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "48");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popnannaies_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "48");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popnannaies_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "48");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }


         /*Embroidery Services*/
        public function busconcount_popembroidery(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popembroidery(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 49 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 49 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popembroidery(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 49 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popembroidery_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popembroidery_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popembroidery_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "49");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popembroidery_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "49");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
            // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }



         /*Others Popular Services*/
        public function busconcount_popotherpop(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_popotherpop(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 50 AND services = 'service_provider' AND ad_status = 1 AND expire_data >='$date') AS provider,
            (SELECT COUNT(*) FROM postad WHERE category_id = '2' AND sub_cat_id = 10 AND sub_scat_id = 50 AND services = 'service_needed' AND ad_status = 1 AND expire_data >='$date') AS needed");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_popotherpop(){
            $bustype = $this->session->userdata('search_bustype');
                $date = date("Y-m-d H:i:s");
                $this->db->select('COUNT(ud.valid_to) as urgentcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->join("urgent_details AS ud", "ud.ad_id=postad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND  urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
                if ($bustype) {
                    if ($bustype != 'all') {
                        $this->db->where("ad_type", $bustype);
                    }
                }
                $urgentcount = $this->db->get()->row('urgentcount');

                $this->db->select('COUNT(*) as platinumcount', false);
                $this->db->from('postad');
                $this->db->join("location as loc", "loc.ad_id = postad.ad_id", "left");
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 3 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 3 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 2 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 2 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 1 AND urgent_package = '0' AND ad_status = 1 AND expire_data >='$date'");
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
                $this->db->where("category_id = '2' AND sub_cat_id='10' AND sub_scat_id = 50 AND package_type = 1 AND urgent_package != '0' AND ad_status = 1 AND expire_data >='$date'");
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
        public function count_popotherpop_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            return $m_res->result();
            
        }

        public function popotherpop_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            //$this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
            // echo $this->db->last_query(); exit;

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }

        public function count_popotherpop_search(){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "50");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
            if (in_array("3", $dealurgent)){
                array_push($pcklist, '3');
            }
            if (in_array("2", $dealurgent)){
                array_push($pcklist, '2');
            }
            if (in_array("1", $dealurgent)){
                array_push($pcklist, '1');
            }
            if (!empty($pcklist)) {
                $this->db->where_in('ad.package_type', $pcklist);
            }
            
        }else{
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
        }

        /*seller search*/
        if (!empty($seller)) {
            $this->db->where_in('ad.services', $seller);
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
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
                return $m_res->result();
        }
        public function popotherpop_search($data){
            $profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
            $search_bustype = $this->session->userdata('search_bustype');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $dealprice = $this->session->userdata('dealprice');
            $recentdays = $this->session->userdata('recentdays');
            $location = $this->session->userdata('location');
            $seller = $this->session->userdata('seller_deals');
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
            $this->db->where("ad.category_id", "2");
            $this->db->where("ad.sub_cat_id", "10");
            $this->db->where("ad.sub_scat_id", "50");
            $this->db->where("ad.ad_status", "1");
            if (!empty($profpop)) {
                $this->db->where_in('ad.sub_scat_id', $profpop);
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
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            
             else{
                $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id", "left");
            }
            /*seller search*/
            if (!empty($seller)) {
                $this->db->where_in('ad.services', $seller);
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
                    $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
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