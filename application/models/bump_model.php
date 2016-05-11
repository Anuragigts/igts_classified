<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Bump_model extends CI_Model{
       public function bump_gold_platinum(){
	
	}

		public function total_ads_gold(){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.package_type = 2 || ad.package_type = 5");
			$this->db->where("ad.`expire_data` >=", date("Y-m-d H:i:s"));
			$rs = $this->db->get();
			return $rs->result();
		}

		public function total_ads_platinum(){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.package_type = 3 || ad.package_type = 6");
			$this->db->where("ad.`expire_data` >=", date("Y-m-d H:i:s"));
			$rs = $this->db->get();
			return $rs->result();
		}

		public function gold_cnt(){
			$this->db->select();
        	$this->db->from("pkg_duration_list");
        	$this->db->where("pkg_dur_id", 2);
        	$g1 = $this->db->get()->row();
        	return $g1->bump_search;
		}
		public function gold_cnt1(){
			$this->db->select();
        	$this->db->from("pkg_duration_list");
        	$this->db->where("pkg_dur_id", 5);
        	$g1 = $this->db->get()->row();
        	return $g1->bump_search;
		}
		public function platinum_cnt(){
			$this->db->select();
        	$this->db->from("pkg_duration_list");
        	$this->db->where("pkg_dur_id", 3);
        	$g1 = $this->db->get()->row();
        	return $g1->bump_search;
		}
		public function platinum_cnt1(){
			$this->db->select();
        	$this->db->from("pkg_duration_list");
        	$this->db->where("pkg_dur_id", 6);
        	$g1 = $this->db->get()->row();
        	return $g1->bump_search;
		}

		public function bump_ad_services($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

							/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}		


					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 
						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_jobs($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

							/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('job_details', $data); 
						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_motors($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('motor_bike_ads', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('motor_boats', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('motor_car_van_bus_ads', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('motor_home_ads', $data);

					$this->db->where('ad_id', $adid);
					$this->db->update('motor_plant_farming', $data); 

						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_property($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('property_resid_commercial', $data); 
						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_pets($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('pets_details', $data); 
						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_cloths($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('lifestyle_accessories', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('lifestyle_clothing', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('lifestyle_shoes', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('lifestyle_wedding', $data); 
						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_homekitchen($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('kitchenhome_ads', $data); 

						return 1;
					}
					else{
						return 0;
				}
		}

		public function bump_ad_ezone($adid){
			$this->db->select();
			$this->db->from("postad AS ad");
			$this->db->where("ad.ad_id", $adid);
			$rs = $this->db->get();
			$rs1 = $rs->row();
			$ins = array(
						'ad_prefix'=>$rs1->ad_prefix,
						'login_id'=>$rs1->login_id,
						'package_type'=>$rs1->package_type,
						'urgent_package'=>$rs1->urgent_package,
						'package_name'=>$rs1->package_name,
						'deal_tag'=>$rs1->deal_tag,
						'deal_desc'=>$rs1->deal_desc,
						'currency'=>$rs1->currency,
						'service_type'=>$rs1->service_type,
						'services'=>$rs1->services,
						'price_type'=>$rs1->price_type,
						'price'=>$rs1->price,
						'web_link'=>$rs1->web_link,
						'category_id'=>$rs1->category_id,
						'sub_cat_id'=>$rs1->sub_cat_id,
						'sub_scat_id'=>$rs1->sub_scat_id,
						'ad_type'=>$rs1->ad_type,
						'created_on'=>$rs1->created_on,
						'updated_on'=>$rs1->updated_on,
						'terms_conditions'=>$rs1->terms_conditions,
						'approved_by'=>$rs1->approved_by,
						'approved_on'=>$rs1->approved_on,
						'expire_data'=>$rs1->expire_data,
						'admin_comment'=>$rs1->admin_comment,
						'payment_status'=>$rs1->payment_status,
						'paid_amt'=>$rs1->paid_amt,
						'ad_status'=>$rs1->ad_status,
						'is_free'=>$rs1->is_free,
						'likes_count'=>$rs1->likes_count);
					$this->db->insert("postad", $ins);
					$last_insert_id = $this->db->insert_id();
					if ($this->db->affected_rows() > 0) {
							$data = array(
					               'ad_id' => $last_insert_id
					            );

					/*platinum marquee and video link*/
					if ($rs1->package_type == 3 || $rs1->package_type == 6) {
								$this->db->where('ad_id', $adid);
								$this->db->update('videos', $data); 
								$this->db->where('ad_id', $adid);
								$this->db->update('platinum_ads', $data); 
							}
							/*urgent label or not*/		
					if ($rs1->urgent_package != 0) {
								$this->db->where('ad_id', $adid);
								$this->db->update('urgent_details', $data); 
							}

							
					$this->db->where('ad_id', $adid);
					$this->db->update('ad_img', $data); 
					$this->db->where('ad_id', $adid);
					$this->db->update('location', $data); 

					$this->db->where('ad_id', $adid);
					$this->db->update('ezone_details', $data); 
					
						return 1;
					}
					else{
						return 0;
				}
		}

		public function del_ad($adid){
			$this->db->where('ad_id', $adid);
			$this->db->delete('postad');
		}


		public function mainsearchlist(){
			$this->db->select("*,lg.login_email AS mail");
        	$this->db->from("saved_searchs");
        	$this->db->join('login as lg','lg.login_id=saved_searchs.login_id','join');
        	$rs = $this->db->get();
        	return $rs->result();
		}

		public function hotdealsearchlist(){
			$this->db->select("*,lg.login_email AS mail");
        	$this->db->from("saved_searchhot");
        	$this->db->join('login as lg','lg.login_id=saved_searchhot.login_id','join');
        	$rs = $this->db->get();
        	return $rs->result();
		}
		public function searchcnt_yesterday($logid,$title,$cat,$loc){
			$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				if ($title) {
					if ($title != '') {
						$this->db->where("(ad.deal_tag LIKE '%$title%' OR ad.deal_tag LIKE '$title%' OR ad.deal_tag LIKE '%$title' 
  						OR ad.deal_desc LIKE '%$title%' OR ad.deal_desc LIKE '$title%' OR ad.deal_desc LIKE '%$title')");
					}
				}

				if ($cat) {
					if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				}

			$this->db->where("ad.ad_status", "1");
			$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s",strtotime("-1 days")));
			$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s",strtotime("-1 days")));
			/*location search*/
			if ($loc != '') {
				$this->db->where("(loc.loc_name LIKE '$loc%' 
  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
			}
			$this->db->group_by(" img.ad_id");
			$this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get();
			//echo $this->db->last_query();
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
		}

		public function searchcnt_today($logid,$title,$cat,$loc){
			$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				if ($title) {
					if ($title != '') {
						$this->db->where("(ad.deal_tag LIKE '%$title%' OR ad.deal_tag LIKE '$title%' OR ad.deal_tag LIKE '%$title' 
  						OR ad.deal_desc LIKE '%$title%' OR ad.deal_desc LIKE '$title%' OR ad.deal_desc LIKE '%$title')");
					}
				}

				if ($cat) {
					if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				}

			$this->db->where("ad.ad_status", "1");
			$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
			$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s"));

			/*location search*/
			if ($loc != '') {
				$this->db->where("(loc.loc_name LIKE '$loc%' 
  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
			}
			$this->db->group_by(" img.ad_id");
			$this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get();
			//echo $this->db->last_query();
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
		}

		public function searchcnt_todaynow($logid,$title,$cat,$loc){
			$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,jd.*,lg.*, ad.ad_id as adid");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
			$this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
				if ($title) {
					if ($title != '') {
						$this->db->where("(ad.deal_tag LIKE '%$title%' OR ad.deal_tag LIKE '$title%' OR ad.deal_tag LIKE '%$title' 
  						OR ad.deal_desc LIKE '%$title%' OR ad.deal_desc LIKE '$title%' OR ad.deal_desc LIKE '%$title')");
					}
				}

				if ($cat) {
					if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				}

			$this->db->where("ad.ad_status", "1");
			$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
			$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s"));

			/*location search*/
			if ($loc != '') {
				$this->db->where("(loc.loc_name LIKE '$loc%' 
  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
			}
			$this->db->group_by(" img.ad_id");
			$this->db->order_by('ad.approved_on', 'DESC');
			$this->db->limit(4);
			$m_res = $this->db->get();
			// echo $this->db->last_query();
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
		}
		public function hotsearchcnt_yesterday($bus_id,$cat,$loc){
			/*top category*/
			$free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'1','manage_likes.is_top'=>1))->row('likes_count');
			$freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'2','manage_likes.is_top'=>1))->row('likes_count');
			$gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'3','manage_likes.is_top'=>1))->row('likes_count');

			/*low category*/
			$low_free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'4','manage_likes.is_top'=>0))->row('likes_count');
			$low_freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'5','manage_likes.is_top'=>0))->row('likes_count');
			$low_gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'6','manage_likes.is_top'=>0))->row('likes_count');
			
			$pcktype = '(
			(ad.package_type = "3" OR ad.package_type = "6") OR 
			((ad.package_type = "2" OR ad.package_type = "5" )AND ad.urgent_package != "0" )
			OR (ad.package_type = "1" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$freeurgent.'")
			OR (ad.package_type = "4" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$low_freeurgent.'")
			OR (ad.package_type = "1" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$free.'")
			OR (ad.package_type = "4" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_free.'")
			OR (ad.package_type = "2" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$gold.'")
			OR (ad.package_type = "5" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_gold.'")   )';
				$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
        		$this->db->from('postad AS ad');
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->where('ad.ad_status', 1);
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s",strtotime("-1 days")));
				$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s",strtotime("-1 days")));
				if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				if ($bus_id != '') {
					$this->db->where('ad.ad_type', $bus_id);
				}			

				if ($loc != '') {
					$this->db->where("(loc.loc_name LIKE '$loc%' 
	  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
				}
				$this->db->where($pcktype);
				$this->db->group_by("img.ad_id");
				$this->db->order_by("ad.approved_on", "DESC");
				$m_res = $this->db->get();
				return $m_res->result();
		}
		public function hotsearchcnt_today($bus_id,$cat,$loc){
			/*top category*/
			$free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'1','manage_likes.is_top'=>1))->row('likes_count');
			$freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'2','manage_likes.is_top'=>1))->row('likes_count');
			$gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'3','manage_likes.is_top'=>1))->row('likes_count');

			/*low category*/
			$low_free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'4','manage_likes.is_top'=>0))->row('likes_count');
			$low_freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'5','manage_likes.is_top'=>0))->row('likes_count');
			$low_gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'6','manage_likes.is_top'=>0))->row('likes_count');
			
			$pcktype = '(
			(ad.package_type = "3" OR ad.package_type = "6") OR 
			((ad.package_type = "2" OR ad.package_type = "5" )AND ad.urgent_package != "0" )
			OR (ad.package_type = "1" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$freeurgent.'")
			OR (ad.package_type = "4" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$low_freeurgent.'")
			OR (ad.package_type = "1" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$free.'")
			OR (ad.package_type = "4" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_free.'")
			OR (ad.package_type = "2" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$gold.'")
			OR (ad.package_type = "5" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_gold.'")   )';
				$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
        		$this->db->from('postad AS ad');
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->where('ad.ad_status', 1);
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s"));
				if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				if ($bus_id != '') {
					$this->db->where('ad.ad_type', $bus_id);
				}			

				if ($loc != '') {
					$this->db->where("(loc.loc_name LIKE '$loc%' 
	  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
				}
				$this->db->where($pcktype);
				$this->db->group_by("img.ad_id");
				$this->db->order_by("ad.approved_on", "DESC");
				$m_res = $this->db->get();
				return $m_res->result();
		}
		public function hotsearchcnt_todaynow($bus_id,$cat,$loc){
			/*top category*/
			$free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'1','manage_likes.is_top'=>1))->row('likes_count');
			$freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'2','manage_likes.is_top'=>1))->row('likes_count');
			$gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'3','manage_likes.is_top'=>1))->row('likes_count');

			/*low category*/
			$low_free = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'4','manage_likes.is_top'=>0))->row('likes_count');
			$low_freeurgent = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'5','manage_likes.is_top'=>0))->row('likes_count');
			$low_gold = $this->db->get_Where('manage_likes', array('manage_likes.id'=>'6','manage_likes.is_top'=>0))->row('likes_count');
			
			$pcktype = '(
			(ad.package_type = "3" OR ad.package_type = "6") OR 
			((ad.package_type = "2" OR ad.package_type = "5" )AND ad.urgent_package != "0" )
			OR (ad.package_type = "1" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$freeurgent.'")
			OR (ad.package_type = "4" AND ad.urgent_package != "0" AND ad.likes_count >= "'.$low_freeurgent.'")
			OR (ad.package_type = "1" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$free.'")
			OR (ad.package_type = "4" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_free.'")
			OR (ad.package_type = "2" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$gold.'")
			OR (ad.package_type = "5" AND ad.urgent_package = "0" AND ad.likes_count >= "'.$low_gold.'")   )';
				$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,jd.*,ad.ad_id as adid");
        		$this->db->from('postad AS ad');
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
				$this->db->where('ad.ad_status', 1);
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->where("ad.approved_on <= ", date("Y-m-d H:i:s"));
				if ($cat != 'all') {
						$this->db->where('ad.category_id', $cat);
					}
				if ($bus_id != '') {
					$this->db->where('ad.ad_type', $bus_id);
				}			

				if ($loc != '') {
					$this->db->where("(loc.loc_name LIKE '$loc%' 
	  					OR loc.loc_name LIKE '%$loc' OR loc.loc_name LIKE '%$loc%')");
				}
				$this->db->where($pcktype);
				$this->db->group_by("img.ad_id");
				$this->db->order_by("ad.approved_on", "DESC");
				$this->db->limit(4);
				$m_res = $this->db->get();
				return $m_res->result();
		}
}
?>