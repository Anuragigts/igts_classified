<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Postad_job_model extends CI_Model{
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
              if ($this->input->post('package_type') == '1') {
                            $url = "";
                        }
                        /*web-link for gold*/
              if ($this->input->post('package_type') == '2') {
                            $url = $this->input->post("gold_weblink");
                        }
                        /*web-link for platinum*/
              if ($this->input->post('package_type') == '3') {
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
                                    'price'       => '',
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

                    /*job details*/
                    $job_details = array('ad_id' => $insert_id,
                                    'jobtype_title' => $this->input->post('jobtype_title'),
                                    'jobtype' => $this->input->post('typeofjob'),
                                    'companyname' => $this->input->post('companyname'),
                                    'salarymin' => $this->input->post('salarymin'),
                                    'salarymax'=>$this->input->post('salarymax'),
                                    'salarytype' => $this->input->post('salarytype'),
                                    'suitableskils' => $this->input->post('suitableskils'),
                                    'positionfor' => $this->input->post('positionfor')
                                );
                        $this->db->insert("job_details", $job_details);

                    
                     if ($insert_id != '') {
                        $this->session->set_userdata("postad_success","Ad Posted Successfully!!");
                        $this->session->set_userdata("postad_time",time());
                       }
                }

                /*jobs sub categories*/
                public function busconcount_jacnts(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jacnts(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 27 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 27 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 27 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jacnts(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 27 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 27 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jacnts_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "27");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jacnts_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "27");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jacnts_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "27");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jacnts_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "27");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_acnts(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 27 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 27 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 27 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 27 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 27 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }

        /*banking */
                 public function busconcount_jbank(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jbank(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 30 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 30 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 30 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jbank(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 30 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 30 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jbank_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "30");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jbank_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "30");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jbank_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "30");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jbank_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "30");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jbank(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 30 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 30 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 30 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 30 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 30 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }

        /* news and media */
                 public function busconcount_jnews(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jnews(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 33 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 33 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 33 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jnews(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 33 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 33 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jnews_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "33");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jnews_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "33");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jnews_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "33");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jnews_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "33");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jnews(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 33 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 33 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 33 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 33 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 33 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* it telecom */
                 public function busconcount_jtelecom(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jtelecom(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 36 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 36 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 36 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jtelecom(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 36 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 36 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jtelecom_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "36");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jtelecom_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "36");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jtelecom_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "36");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jtelecom_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "36");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jtelecom(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 36 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 36 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 36 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 36 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 36 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* it telecom */
                 public function busconcount_jhr(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jhr(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 39 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 39 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 39 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jhr(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 39 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 39 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jhr_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "39");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jhr_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "39");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jhr_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "39");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jhr_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "39");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jhr(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 39 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 39 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 39 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 39 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 39 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* P A */
                 public function busconcount_jpa(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jpa(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 42 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 42 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 42 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jpa(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 42 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 42 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jpa_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "42");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jpa_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "42");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jpa_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "42");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpa_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "42");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jpa(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 42 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 42 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 42 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 42 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 42 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* front office */
                 public function busconcount_jfront(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jfront(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 45 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 45 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 45 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jfront(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 45 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 45 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jfront_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "45");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jfront_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "45");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jfront_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "45");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jfront_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "45");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jfront(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 45 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 45 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 45 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 45 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 45 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* electronics enginnering */
                 public function busconcount_jelectro(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jelectro(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 48 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 48 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 48 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jelectro(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 48 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 48 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jelectro_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "48");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jelectro_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "48");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jelectro_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "48");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jelectro_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "48");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jelectro(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 48 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 48 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 48 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 48 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 48 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* manage jobs */
                 public function busconcount_jmanage(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jmanage(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 52 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 52 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 52 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jmanage(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 52 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 52 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jmanage_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "52");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jmanage_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "52");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jmanage_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "52");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jmanage_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "52");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jmanage(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 52 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 52 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 52 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 52 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 52 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* P A */
                 public function busconcount_jpower(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jpower(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 55 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 55 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 55 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jpower(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 55 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 55 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jpower_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "55");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jpower_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "55");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jpower_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "55");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpower_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "55");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jpower(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 55 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 55 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 55 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 55 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 55 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* Miscelleneous */
                 public function busconcount_jmisc(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jmisc(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 58 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 58 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 58 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jmisc(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 58 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 58 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jmisc_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "58");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jmisc_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "58");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jmisc_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "58");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jmisc_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "58");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jmisc(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 58 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 58 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 58 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 58 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 58 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* P A */
                 public function busconcount_jconstr(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jconstr(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 28 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 28 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 28 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jconstr(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 28 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 28 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jconstr_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "28");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jconstr_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "28");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jconstr_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "28");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jconstr_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "28");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jconstr(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 28 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 28 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 28 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 28 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 28 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* jbuild */
                 public function busconcount_jbuild(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jbuild(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 31 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 31 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 31 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jbuild(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 31 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 31 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jbuild_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "31");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jbuild_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "31");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jbuild_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "31");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jbuild_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "31");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jbuild(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 31 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 31 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 31 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 31 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 31 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* retail */
                 public function busconcount_jretail(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jretail(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 34 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 34 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 34 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jretail(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 34 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 34 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jretail_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "34");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jretail_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "34");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jretail_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "34");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jretail_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "34");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jretail(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 34 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 34 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 34 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 34 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 34 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* hardware */
                 public function busconcount_jhard(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jhard(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 37 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 37 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 37 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jhard(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 37 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 37 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jhard_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "37");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jhard_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "37");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jhard_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "37");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jhard_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "37");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jhard(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 37 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 37 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 37 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 37 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 37 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* office admin */
                 public function busconcount_jadmin(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jadmin(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 40 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 40 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 40 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jadmin(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 40 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 40 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jadmin_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "40");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jadmin_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "40");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jadmin_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "40");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jadmin_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "40");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jadmin(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 40 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 40 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 40 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 40 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 40 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        /* P A */
                 public function busconcount_jarchi(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jarchi(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 43 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 43 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 43 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jarchi(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 43 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 43 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jarchi_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "43");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jarchi_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "43");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jarchi_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "43");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jarchi_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "43");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jarchi(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 43 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 43 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 43 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 43 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 43 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }

        /* P A */
                 public function busconcount_jplumb(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function sellerneeded_jplumb(){
                    $date = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 46 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 46 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
                    (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 46 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function deals_pck_jplumb(){
                    $data = date("Y-m-d H:i:s");
                    $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 46 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
                    (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 46 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
                    $rs = $this->db->get();
                    return $rs->result();
                }
                public function count_jplumb_view(){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->from("postad AS ad");
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "46");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get();

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function jplumb_view($data){
                    $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
                    $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
                    '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
                    $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
                    $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
                    $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
                    $this->db->where("ad.sub_cat_id", "46");
                    $this->db->where("ad.ad_status", "1");
                    $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
                    $this->db->group_by(" img.ad_id");
                    $this->db->order_by('ad.approved_on', 'DESC');
                    $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

                    if($m_res->num_rows() > 0){
                        return $m_res->result();
                    }
                    else{
                        return array();
                    }
                }
                public function count_jplumb_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "46");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jplumb_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "46");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jplumb(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 46 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 46 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 46 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 46 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 46 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }
        

        /* Logistic */
        public function busconcount_jlogistic(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jlogistic(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 49 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 49 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 49 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jlogistic(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 49 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 49 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jlogistic_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jlogistic_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jlogistic_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jlogistic_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "49");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jlogistic(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 49 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 49 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 49 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 49 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 49 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
                $rs = $this->db->get();
                return $rs->result();
            }


        /* P A */
         public function busconcount_jtelesale(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jtelesale(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 53 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 53 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 53 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jtelesale(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 53 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 53 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jtelesale_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "53");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jtelesale_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "53");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jtelesale_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "53");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jtelesale_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "53");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jtelesale(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 53 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 53 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 53 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 53 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 53 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
                $rs = $this->db->get();
                return $rs->result();
            }
       

        /* graduation jobs */
         public function busconcount_jgrad(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jgrad(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 56 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 56 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 56 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jgrad(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 56 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 56 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jgrad_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "56");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jgrad_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "56");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jgrad_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "56");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jgrad_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "56");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jgrad(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 56 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 56 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 56 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 56 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
        (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
        WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 56 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }




         /* Financial Services */
         public function busconcount_jfinancial(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jfinancial(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 29 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 29 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 29 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jfinancial(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 29 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 29 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jfinancial_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jfinancial_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jfinancial_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jfinancial_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "29");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jfinancial(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 29 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 29 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 29 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 29 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 29 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }



         /* Sales & Marketing */
         public function busconcount_jsalesmark(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jsalesmark(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 32 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 32 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 32 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jsalesmark(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 32 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 32 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jsalesmark_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jsalesmark_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jsalesmark_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jsalesmark_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "32");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jsalesmark(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 32 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 32 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 32 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 32 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 32 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Purchasing & Supply */
         public function busconcount_jpurchasing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jpurchasing(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 35 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 35 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 35 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jpurchasing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 35 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 35 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jpurchasing_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpurchasing_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jpurchasing_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpurchasing_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "35");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jpurchasing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 35 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 35 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 35 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 35 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 35 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Healthcare & Old Age Care */
         public function busconcount_jhealthcare(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jhealthcare(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 38 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 38 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 38 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jhealthcare(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 38 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 38 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jhealthcare_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jhealthcare_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jhealthcare_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jhealthcare_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "38");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jhealthcare(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 38 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 38 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 38 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 38 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 38 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Driving */
         public function busconcount_jdriving(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jdriving(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 41 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 41 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 41 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jdriving(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 41 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 41 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jdriving_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jdriving_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jdriving_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jdriving_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "41");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jdriving(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 41 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 41 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 41 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 41 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 41 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Catering Jobs */
         public function busconcount_jcatering(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jcatering(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 44 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 44 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 44 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jcatering(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 44 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 44 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jcatering_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jcatering_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jcatering_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jcatering_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "44");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jcatering(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 44 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 44 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 44 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 44 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 44 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Chemical Engineering */
         public function busconcount_jchemical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jchemical(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 47 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 47 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 47 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jchemical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND urgent_package != '0'  AND ad_status = 1 AND expire_data >='$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 47 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jchemical_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jchemical_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jchemical_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jchemical_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "47");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jchemical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 47 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 47 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 47 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 47 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 47 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Mechanical Engineering */
         public function busconcount_jmechanical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jmechanical(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 50 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 50 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 50 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jmechanical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 50 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 50 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jmechanical_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jmechanical_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jmechanical_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jmechanical_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "50");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jmechanical(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 50 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 50 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 50 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 50 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 50 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }



         /* Dentists */
         public function busconcount_jdentists(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jdentists(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 51 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 51 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 51 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jdentists(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 51 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 51 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jdentists_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "51");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jdentists_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "51");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jdentists_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "51");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jdentists_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "51");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jdentists(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 51 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 51 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 51 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 51 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 51 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Petroleum Engineering */
         public function busconcount_jpetrolem(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jpetrolem(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 54 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 54 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 54 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jpetrolem(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 54 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 54 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jpetrolem_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "54");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpetrolem_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "54");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jpetrolem_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "54");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jpetrolem_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "54");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jpetrolem(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 54 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 54 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 54 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 54 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 54 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }


         /* Nursing Jobs */
         public function busconcount_jnursing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND ad_status = 1 AND expire_data >='$data' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'business') AS business,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND ad_status = 1 AND expire_data >='$data' AND ad_type = 'consumer') AS consumer");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function sellerneeded_jnursing(){
            $date = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company' AND postad.sub_cat_id = 57 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS company,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency' AND postad.sub_cat_id = 57 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS agency,
            (SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other' AND postad.sub_cat_id = 57 AND postad.ad_status = 1 AND postad.expire_data >='$date') AS other");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function deals_pck_jnursing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(ud.valid_to) AS aa FROM postad AS ad LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >='$data'
                    WHERE ad.category_id = '1' AND sub_cat_id = 57 AND ad.urgent_package != '0' AND ad.ad_status = 1 AND ad.expire_data >= '$data') AS urgentcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND package_type = '3'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS platinumcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND package_type = '2'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS goldcount,
            (SELECT COUNT(*) FROM postad WHERE category_id = '1' AND sub_cat_id = 57 AND package_type = '1'  AND urgent_package = '0'  AND ad_status = 1 AND expire_data >='$data') AS freecount");
            $rs = $this->db->get();
            return $rs->result();
        }
        public function count_jnursing_view(){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "57");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jnursing_view($data){
            $this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "57");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            $this->db->group_by(" img.ad_id");
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function count_jnursing_search(){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $latt = $this->session->userdata('latt');
            $longg = $this->session->userdata('longg');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "57");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get();
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
        public function jnursing_search($data){
            $jobslist = $this->session->userdata('job_search');
            $jobs_pos = $this->session->userdata('positionfor');
            $seller = $this->session->userdata('seller_deals');
            $dealurgent = $this->session->userdata('dealurgent');
            $dealtitle = $this->session->userdata('dealtitle');
            $recentdays = $this->session->userdata('recentdays');
            $search_bustype = $this->session->userdata('search_bustype');
            $location = $this->session->userdata('location');
            $this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*,ud.valid_to AS urg, jd.*");
            $this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
            '%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
            // $this->db->from("postad AS ad");
            $this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
            $this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
            $this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
            $this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
            $this->db->where("ad.category_id", "1");
            $this->db->where("ad.sub_cat_id", "57");
            $this->db->where("ad.ad_status", "1");
            $this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
            if (!empty($jobslist)) {
                $this->db->where_in('ad.sub_cat_id', $jobslist);
            }
            if (!empty($jobs_pos)) {
                $this->db->where_in('jd.positionfor', $jobs_pos);
            }
            if (!empty($seller)) {
                $this->db->where_in('jd.jobtype_title', $seller);
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
                if (in_array(1, $dealurgent)){
                    array_push($pcklist, 1);
                }
                if (in_array(2, $dealurgent)){
                    array_push($pcklist, 2);
                }
                if (in_array(3, $dealurgent)){
                    array_push($pcklist, 3);
                }
                if (!empty($pcklist)) {
                    $this->db->where_in('ad.package_type', $pcklist);
                }
                
            }
            if ($search_bustype) {
                if ($search_bustype == 'business' || $search_bustype == 'consumer') {
                    $this->db->where("ad.ad_type", $search_bustype);
                }
            }

            /*location search*/
            if ($location) {
                $this->db->where("(loc.loc_name LIKE '$location%' OR loc.loc_name LIKE '%$location' OR loc.loc_name LIKE '%$location%')");
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
            $this->db->group_by(" img.ad_id");
            /*deal title ascending or descending*/
                    if ($dealtitle == 'atoz') {
                        $this->db->order_by("ad.deal_tag","ASC");
                    }
                    else if ($dealtitle == 'ztoa'){
                        $this->db->order_by("ad.deal_tag", "DESC");
                    }
                    
            $this->db->order_by('ad.approved_on', 'DESC');
            $m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
               // echo $this->db->last_query(); exit;
            if($m_res->num_rows() > 0){
                return $m_res->result();
            }
            else{
                return array();
            }
        }
         public function position_jnursing(){
            $data = date("Y-m-d H:i:s");
            $this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 57 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 57 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Entry-level')AS entrylevel,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 57 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 57 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
            (SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
            WHERE ad.`ad_id`=jd.`ad_id` AND ad.ad_status = 1 AND ad.sub_cat_id = 57 AND ad.expire_data >='$data' AND jd.`positionfor` = 'Executive_(Director_/_Dept.Head)')AS executive");
            $rs = $this->db->get();
            return $rs->result();
        }

}
?>