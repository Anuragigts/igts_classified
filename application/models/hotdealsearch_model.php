<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class hotdealsearch_model extends CI_Model{

		/*ezone sub categories*/
		public function ezone_sub(){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',8);
			$rs = $this->db->get();
			return $rs->result();
		}

			/*motor point sub categories*/
			public function motor_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',3);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*cloths sub categories*/
			public function cloths_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',6);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*services sub categories*/
			public function services_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',2);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*property sub categories*/
			public function property_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',4);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*hkitchen sub categories*/
			public function hkitchen_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',7);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*pets sub categories*/
			public function pets_sub(){
				$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',5);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*jobs sub categories*/
			public function jobs_sub(){
			$this->db->select("*");
			$this->db->from("sub_category");
			$this->db->where('category_id',1);
			$rs = $this->db->get();
			return $rs->result();
			}

			/*location list*/
			public function loc_list(){
			$this->db->select("*");
			$this->db->from("location");
			$this->db->group_by('latt');
			$rs = $this->db->get();
			return $rs->result();
			}

			/*services search sub category*/
			public function services_sub_prof(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '9');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			public function services_sub_pop(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '10');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/* jobs sub category*/
			public function jobs_sub_search(){
				$this->db->select("sub_category.*, COUNT(postad.sub_cat_id) AS no_ads");
				$this->db->from('sub_category');
				$this->db->join("postad", "postad.sub_cat_id = sub_category.sub_category_id", "left");
				$this->db->where("sub_category.category_id", '1');
				$this->db->group_by("sub_category.sub_category_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/* pets sub category*/
			public function pets_sub_search(){
				$this->db->select("sub_category.*, COUNT(postad.sub_cat_id) AS no_ads");
				$this->db->from('sub_category');
				$this->db->join("postad", "postad.sub_cat_id = sub_category.sub_category_id", "left");
				$this->db->where("sub_category.category_id", '5');
				$this->db->group_by("sub_category.sub_category_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/* kitchen sub category*/
			public function kitchen_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '67');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			/* home sub category*/
			public function home_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '68');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			/* decor sub category*/
			public function decor_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '69');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/* decor sub category*/
			public function brand_kitchen(){
				$this->db->select("*");
				$this->db->from('kitchenhome_ads');
				$rs = $this->db->get();
				return $rs->result();
			}

		

        public function hotdeal_search(){
        		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
				$this->db->from("postad as ad");
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				if ($this->input->post('cat') != 'all') {
					$this->db->where('ad.category_id', $this->input->post('cat'));
				}
				if ($this->input->post('bustype') != '0') {
					$this->db->where('ad.ad_type', $this->input->post('bustype'));
				}
				if ($this->input->post('latt') != '') {
					$this->db->where('loc.latt', $this->input->post('latt'));
					$this->db->where('loc.longg', $this->input->post('longg'));
				}
				$this->db->group_by("img.ad_id");
				$this->db->order_by("ad.ad_id", "DESC");
				$res = $this->db->get();
				return $res->result();
			
        }

        public function search_filters(){
        		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
        		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  				'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
				$this->db->from("postad as ad");
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				if ($this->input->post('cat') != 'all') {
					$this->db->where('ad.category_id', $this->input->post('cat'));
				}
				if ($this->input->post('bustype') != '0') {
					$this->db->where('ad.ad_type', $this->input->post('bustype'));
				}
				if ($this->input->post('latt') != '') {
					$this->db->where('loc.latt', $this->input->post('latt'));
					$this->db->where('loc.longg', $this->input->post('longg'));
				}
				/*search urgent and platinum */
				$ur = $this->input->post("urgenttime_list");
				if (!empty($ur)) {
					foreach ($ur as $ur_val) {
						if ($ur_val =='urgent') {
							$this->db->where('ad.urgent_package !=', '');
						}
						else if ($ur_val =='platinum') {
							$this->db->where('ad.package_type', 'platinum');
						}
					}
				}
				/*search location */
				$loc = $this->input->post('location_list');
				$tot_latt = '';
				$tot_longg = '';
				if (!empty($loc)) {
					foreach ($loc as $lval) {
						$lval1 = explode(",", $lval);
						$tot_latt .= ",".$lval1[0];
						$tot_longg .= ",".$lval1[1];
					}
					$this->db->where_in('loc.latt', explode(",",ltrim($tot_latt,',')));
					$this->db->where_in('loc.longg', explode(",",ltrim($tot_longg,',')));
				}

				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($this->input->post("recentdays") == 'last24hours'){
						$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
					}
					else if ($this->input->post("recentdays") == 'last3days'){
						$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
					}
					else if ($this->input->post("recentdays") == 'last7days'){
						$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
					}
					else if ($this->input->post("recentdays") == 'last14days'){
						$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
					}	
					else if ($this->input->post("recentdays") == 'last1month'){
						$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
					}

				$this->db->group_by("img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					
					/*deal price ascending or descending*/
					if ($this->input->post("priceval") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("priceval") == 'hightolow'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
					}
					else{
						$this->db->order_by("ad.ad_id", "DESC");
					}
				
				$res = $this->db->get();
				return $res->result();
			
        }

        /*services search fo prof sub category*/
        public function servicesprof_search($data){
        	$profpop = $this->input->post('profpop_list');
        	$pck = $this->input->post('pckg_list');
        	$seller = $this->input->post('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "services");
			if (!empty($profpop)) {
				$this->db->where_in('ad.sub_scat_id', $profpop);
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}
			/*package search*/
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}
			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}


			$this->db->group_by(" img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					/*deal price ascending or descending*/
					if ($this->input->post("dealprice") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("dealprice") == 'hightolow'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
					}
					else{
						$this->db->order_by("ad.ad_id", "DESC");
					}
			// $this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

        /*count of searched filters for services*/
        public function count_servicesprof_search(){
        	$profpop = $this->input->post('profpop_list');
        	$pck = $this->input->post('pckg_list');
        	$seller = $this->input->post('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "services");
			if (!empty($profpop)) {
				$this->db->where_in('ad.sub_scat_id', $profpop);
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}
			/*package search*/
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}
			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}


			$this->db->group_by(" img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					/*deal price ascending or descending*/
					if ($this->input->post("dealprice") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("dealprice") == 'hightolow'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
					}
					else{
						$this->db->order_by("ad.ad_id", "DESC");
					}
			$this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get();
				return $m_res->result();
        }

        /*jobs search fo  sub category*/
        public function jobs_search(){
        	$seller = $this->input->post('seller_deals');
        	$jobslist = $this->input->post('jobs_list');
        	$jobs_pos = $this->input->post('jobs_pos');
        	$pck = $this->input->post('pckg_list');
        	$this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*, jd.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "jobs");
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
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}
			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}

			
			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}
			$this->db->group_by(" img.ad_id");
			/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
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
        public function pets_search(){
        	$pets_sub = $this->input->post('pets_sub');
        	$pck = $this->input->post('pckg_list');
        	$seller = $this->input->post('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "pets");
			if (!empty($pets_sub)) {
				$this->db->where_in('ad.sub_cat_id', $pets_sub);
			}
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}
			/*package search*/
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}
			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}

			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}


			$this->db->group_by(" img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					/*deal price ascending or descending*/
					if ($this->input->post("dealprice") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("dealprice") == 'hightolow'){
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

        /*kitchen home search*/
       	public function kitchenhome_search(){
        	$kitchen_sub = $this->input->post('kitchen_sub');
        	$pck = $this->input->post('pckg_list');
        	$seller = $this->input->post('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "kitchenhome");
			if (!empty($kitchen_sub)) {
				$this->db->where_in('ad.sub_scat_id', $kitchen_sub);
			}
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}
			/*package search*/
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}
			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}

			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}


			$this->db->group_by(" img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					/*deal price ascending or descending*/
					if ($this->input->post("dealprice") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("dealprice") == 'hightolow'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
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

        /*find a property*/
        public function residential_search(){
        	$proptype = $this->input->post('proptype');
        	$pck = $this->input->post('pckg_list');
        	$seller = $this->input->post('seller_deals');
        	$area = $this->input->post('area_square');
        	$bedrooms = $this->input->post('bed_rooms');
        	$bathroom = $this->input->post('bathroom');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('property_resid_commercial as prc', "ad.ad_id = prc.ad_id", 'join');
			$this->db->where("ad.category_id", "findaproperty");
			if (!empty($proptype)) {
				$this->db->where_in('ad.sub_cat_id', $proptype);
			}
			if (!empty($seller)) {
				$this->db->where_in('prc.offered_type', $seller);
			}
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
				}
			}
			/*package search*/
			if (!empty($pck)) {
				$this->db->where_in('ad.package_type', $pck);
			}

			/*bedrooms search*/
			if (!empty($bedrooms)) {
				$bed_where = '';
				foreach ($bedrooms as $bedroomval) {
					if ($bedroomval == '1') {
						$bed_where .= '(prc.bed_rooms = 1)';
					}
					else if ($bedroomval == '2') {
						$bed_where .= 'OR (prc.bed_rooms = 2)';
					}
					else if ($bedroomval == '3') {
						$bed_where .= 'OR (prc.bed_rooms = 3)';
					}
					else if ($bedroomval == '4') {
						$bed_where .= 'OR (prc.bed_rooms > 4)';
					}
				}
				$this->db->where(ltrim($bed_where,"OR "));
			}

			/*bathroom search*/
			if (!empty($bathroom)) {
				$bath_where = '';
				foreach ($bathroom as $bathroomval) {
					if ($bathroomval == '1') {
						$bath_where .= '(prc.bath_rooms = 1)';
					}
					else if ($bathroomval == '2') {
						$bath_where .= 'OR (prc.bath_rooms = 2)';
					}
					else if ($bathroomval == '3') {
						$bath_where .= 'OR (prc.bath_rooms = 3)';
					}
					else if ($bathroomval == '4') {
						$bath_where .= 'OR (prc.bath_rooms > 4)';
					}
				}
				$this->db->where(ltrim($bath_where,"OR "));
			}

			/*area square*/
			if (!empty($area)) {
				$area_where = '';
				foreach ($area as $aval) {
					if ($aval == '<500') {
						$area_where .= '(prc.build_area < 500)';
					}
					else if ($aval == '500-1000') {
						$area_where .= 'OR (prc.build_area BETWEEN 500 AND 1000)';
					}
					else if ($aval == '1000-1500') {
						$area_where .= 'OR (prc.build_area BETWEEN 1000 AND 1500)';
					}
					else if ($aval == '1500-2000') {
						$area_where .= 'OR (prc.build_area BETWEEN 1500 AND 2000)';
					}
					else if ($aval == '>2000') {
						$area_where .= 'OR (prc.build_area > 2000)';
					}
				}
				$this->db->where(ltrim($area_where,"OR "));
			}

			/*urgent label*/
			if ($this->input->post("urgent")) {
				$this->db->where('ad.urgent_package !=', '');
			}

			/*deal posted days 24hr/3day/7day/14day/1month */
			if ($this->input->post("recentdays") == 'last24hours'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 day"))));
			}
			else if ($this->input->post("recentdays") == 'last3days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-3 days"))));
			}
			else if ($this->input->post("recentdays") == 'last7days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-7 days"))));
			}
			else if ($this->input->post("recentdays") == 'last14days'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-14 days"))));
			}	
			else if ($this->input->post("recentdays") == 'last1month'){
				$this->db->where("UNIX_TIMESTAMP(STR_TO_DATE(ad.`created_on`, '%d-%m-%Y %h:%i:%s')) >=", strtotime(date("d-m-Y H:i:s", strtotime("-1 month"))));
			}

			/*location search*/
			if ($this->input->post("latt")) {
				$this->db->where("loc.latt", $this->input->post("latt"));
				$this->db->where("loc.longg", $this->input->post("longg"));
			}


			$this->db->group_by(" img.ad_id");
				/*deal title ascending or descending*/
					if ($this->input->post("dealtitle") == 'atoz') {
						$this->db->order_by("ad.deal_tag","ASC");
					}
					else if ($this->input->post("dealtitle") == 'ztoa'){
						$this->db->order_by("ad.deal_tag", "DESC");
					}
					/*deal price ascending or descending*/
					if ($this->input->post("dealprice") == 'lowtohigh'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "ASC");
					}
					else if ($this->input->post("dealprice") == 'hightolow'){
						$this->db->order_by("CAST(`ad`.`price` AS UNSIGNED)", "DESC");
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

        /*business and consumer count in services*/
        public function busconcount_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND ad_type = 'consumer') AS consumer");
        	$this->db->from("postad");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        /*jobs count business or consumer*/
        public function busconcount_jobs(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*pets count business or consumer*/
        public function busconcount_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*kitchenhome count business or consumer*/
        public function busconcount_kitchen(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*findproperty count business or consumer*/
        public function busconcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*pets seller and needed count*/
        public function sellerneeded_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND services = 'Needed') AS needed");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*services seller and needed count*/
        public function sellerneeded_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND services = 'service_provider') AS provider,
	(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND services = 'service_needed') AS needed");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        public function sellerneeded_jobs(){
        	$this->db->select("(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Company') AS company,
(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Agency') AS agency,
(SELECT COUNT(*) FROM job_details, postad WHERE job_details.ad_id = postad.ad_id AND job_details.jobtype_title = 'Other') AS other");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*pets seller and needed count*/
        public function sellerneeded_kitchen(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND services = 'Charity') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*findproperty seller and needed count*/
        public function sellerneeded_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND prc.offered_type = 'Offered') AS offered,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND prc.offered_type = 'Wanted') AS wanted");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*findproperty area count*/
        public function areacount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND prc.`build_area` < 500) AS less500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND (prc.`build_area` BETWEEN 500 AND 1000)) AS plus500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND (prc.`build_area` BETWEEN 1000 AND 1500)) AS plus1000,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND (prc.`build_area` BETWEEN 1500 AND 2000)) AS plus1500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = 'findaproperty' AND prc.build_area > 2000) AS plus2000");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*findproperty bedrooms count*/
        public function bedroomcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bed_rooms = 1) AS one1,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bed_rooms = 2) AS secon2,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bed_rooms = 3) AS third3,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bed_rooms >= 4) AS four4");
        	$rs = $this->db->get();
        	return $rs->row();
        }

         /*findproperty bathroomcount_property count*/
        public function bathroomcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bath_rooms = 1) AS one1,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bath_rooms = 2) AS secon2,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bath_rooms = 3) AS third3,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = 'findaproperty' AND prc.bath_rooms >= 4) AS four4");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*findproperty resi_comm_count_property count*/
        public function resi_comm_count_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.category_id = 'findaproperty' AND ad.sub_cat_id = 11) AS residential,
(SELECT COUNT(*) FROM postad AS ad WHERE ad.category_id = 'findaproperty' AND ad.sub_cat_id = 26) AS commercial");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*packages count for services*/
        public function deals_pck_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND urgent_package != '') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND package_type = 'platinum') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND package_type = 'gold') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'services' AND package_type = 'free') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for jobs*/
        public function deals_pck_jobs(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND urgent_package != '') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND package_type = 'platinum') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND package_type = 'gold') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'jobs' AND package_type = 'free') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*packages count for pets*/
        public function deals_pck_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND urgent_package != '') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND package_type = 'platinum') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND package_type = 'gold') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'pets' AND package_type = 'free') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*packages count for pets*/
        public function deals_pck_kitchen(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND urgent_package != '') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND package_type = 'platinum') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND package_type = 'gold') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = 'kitchenhome' AND package_type = 'free') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for findproperty*/
        public function deals_pck_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND urgent_package != '') AS urgentcount,
(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND package_type = 'platinum') AS platinumcount,
(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND package_type = 'gold') AS goldcount,
(SELECT COUNT(*) FROM postad WHERE category_id = 'findaproperty' AND package_type = 'free') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*job positon count*/
        public function jobpositioncnt(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Fresher')AS freshers,
(SELECT COUNT(*) FROM postad AS ad, job_details AS jd WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Experience')AS experience,
(SELECT COUNT(*) FROM postad AS ad, job_details AS jd WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Internship')AS internship,
(SELECT COUNT(*) FROM postad AS ad, job_details AS jd WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Contract')AS contract");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        
}
?>