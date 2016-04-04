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
}
?>