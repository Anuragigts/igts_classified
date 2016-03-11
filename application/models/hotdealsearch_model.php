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

			/* motor sub category*/
			public function motor_sub_search(){
				        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12) AS car,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13) AS bikes,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14) AS motorhomes,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15) AS vans,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16) AS buses,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=17) AS plants,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=18) AS farming,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=19) AS bloats");
		return $this->db->get()->result();
			}

			/*ezone sub category*/
			public function ezone_sub_search(){
				        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=59) AS phones,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=60) AS homes,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=61) AS small,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=62) AS lappy,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=63) AS access,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=64) AS pcare,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=65) AS entertain,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '8' AND ad.`sub_cat_id`=66) AS grapy");
									return $this->db->get()->result();
			}

			public function phone_sub_search(){
				$this->db->select("sscat.*,COUNT(ad.ad_id) AS no_ads");
				$this->db->from('sub_subcategory AS sscat');
				$this->db->join("postad AS ad", "ad.sub_scat_id= sscat.sub_subcategory_id", "left");
				$this->db->where("sscat.sub_category_id", '59');
				$this->db->group_by("sscat.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			public function homes_sub_search(){
				$this->db->select("sscat.*,COUNT(ad.ad_id) AS no_ads");
				$this->db->from('sub_subcategory AS sscat');
				$this->db->join("postad AS ad", "ad.sub_scat_id= sscat.sub_subcategory_id", "left");
				$this->db->where("sscat.sub_category_id", '60');
				$this->db->group_by("sscat.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			/*small appliances*/
			public function smalls_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '61');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			public function lappy_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '62');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			public function access_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '63');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			public function pcare_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '64');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			public function entertain_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '65');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			public function poto_sub_search(){
				$this->db->select("sub_subcategory.*, COUNT(postad.sub_scat_id) AS no_ads");
				$this->db->from('sub_subcategory');
				$this->db->join("postad", "postad.sub_scat_id = sub_subcategory.sub_subcategory_id", "left");
				$this->db->where("sub_subcategory.sub_category_id", '66');
				$this->db->group_by("sub_subcategory.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/*boats sub category*/	
			public function boats_sub_search(){
				$this->db->select("sscat.*,COUNT(ad.ad_id) AS no_ads");
				$this->db->from('sub_subcategory AS sscat');
				$this->db->join("postad AS ad", "ad.sub_scat_id= sscat.sub_subcategory_id", "left");
				$this->db->where("sscat.sub_category_id", '19');
				$this->db->group_by("sscat.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			/*plant machinery sub category*/
			public function plants_sub_search(){
				$this->db->select("sscat.*,COUNT(ad.ad_id) AS no_ads");
				$this->db->from('sub_subcategory AS sscat');
				$this->db->join("postad AS ad", "ad.sub_scat_id= sscat.sub_subcategory_id", "left");
				$this->db->where("sscat.sub_category_id", '17');
				$this->db->group_by("sscat.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}
			/*farming vehicles sub category*/
			public function farming_sub_search(){
				$this->db->select("sscat.*,COUNT(ad.ad_id) AS no_ads");
				$this->db->from('sub_subcategory AS sscat');
				$this->db->join("postad AS ad", "ad.sub_scat_id= sscat.sub_subcategory_id", "left");
				$this->db->where("sscat.sub_category_id", '18');
				$this->db->group_by("sscat.sub_subcategory_id");
				$rs = $this->db->get();
				 // echo $this->db->last_query(); exit;
				return $rs->result();
			}

			public function petrolcnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Petrol') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Diesel') AS diesel,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Electric') AS electric");
		return $this->db->get()->result();
			}
			public function caravans_petrolcnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Petrol') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Diesel') AS diesel,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Electric') AS electric");
		return $this->db->get()->result();
			}
			public function coaches_petrolcnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Petrol') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Diesel') AS diesel,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Electric') AS electric");
		return $this->db->get()->result();
			}
			public function vans_petrolcnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Petrol') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Diesel') AS diesel,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`fueltype` = 'Electric') AS electric");
		return $this->db->get()->result();
			}
			public function bikepetrolcnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`fuel_type` = 'Petrol') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`fuel_type` = 'Diesel') AS diesel");
		return $this->db->get()->result();
			}

			public function milagecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '0') AS allmiles,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '1' AND '15000') AS fiftin,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '15001' AND '30000') AS thirty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '30001' AND '50000') AS fifty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '50000') AS sixty");
		return $this->db->get()->result();
			}
			public function caravans_milagecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '0') AS allmiles,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '1' AND '15000') AS fiftin,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '15001' AND '30000') AS thirty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '30001' AND '50000') AS fifty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '50000') AS sixty");
		return $this->db->get()->result();
			}
			public function coaches_milagecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '0') AS allmiles,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '1' AND '15000') AS fiftin,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '15001' AND '30000') AS thirty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '30001' AND '50000') AS fifty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '50000') AS sixty");
		return $this->db->get()->result();
			}
			public function vans_milagecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '0') AS allmiles,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '1' AND '15000') AS fiftin,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '15001' AND '30000') AS thirty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` BETWEEN '30001' AND '50000') AS fifty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`tot_miles` > '50000') AS sixty");
		return $this->db->get()->result();
			}
			public function bikemilagecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`no_of_miles` > '0') AS allmiles,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`no_of_miles` BETWEEN '1' AND '15000') AS fiftin,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`no_of_miles` BETWEEN '15001' AND '30000') AS thirty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`no_of_miles` BETWEEN '30001' AND '50000') AS fifty,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`no_of_miles` > '50000') AS sixty");
		return $this->db->get()->result();
			}
			public function enginecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '0') AS allengine,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1' AND '1000') AS thousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1001' AND '2000') AS tthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '2001' AND '3000') AS ttthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=12 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '3000') AS tttthousand");
		return $this->db->get()->result();
			}
			public function caravans_enginecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '0') AS allengine,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1' AND '1000') AS thousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1001' AND '2000') AS tthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '2001' AND '3000') AS ttthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_home_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=14 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '3000') AS tttthousand");
		return $this->db->get()->result();
			}
			public function coaches_enginecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '0') AS allengine,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1' AND '1000') AS thousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1001' AND '2000') AS tthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '2001' AND '3000') AS ttthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=16 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '3000') AS tttthousand");
		return $this->db->get()->result();
			}
			public function vans_enginecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '0') AS allengine,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1' AND '1000') AS thousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1001' AND '2000') AS tthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '2001' AND '3000') AS ttthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_car_van_bus_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=15 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '3000') AS tttthousand");
		return $this->db->get()->result();
			}
			public function bikeenginecnt(){
				$this->db->select("(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '0') AS allengine,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1' AND '1000') AS thousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '1001' AND '2000') AS tthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` BETWEEN '2001' AND '3000') AS ttthousand,
		(SELECT COUNT(*) FROM postad AS ad, sub_category AS scat, motor_bike_ads AS mc WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '3' AND ad.`sub_cat_id`=13 AND mc.ad_id = ad.`ad_id` AND mc.`engine_size` > '3000') AS tttthousand");
		return $this->db->get()->result();
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

		public function count_hotdeal_search(){
				$cat_id =  $this->session->userdata('cat_id');
				$bus_id =  $this->session->userdata('bus_id');
				$search_bustype = $this->session->userdata('search_bustype');
				$dealurgent = $this->session->userdata('dealurgent');
				$dealtitle = $this->session->userdata('dealtitle');
				$dealprice = $this->session->userdata('dealprice');
				$recentdays = $this->session->userdata('recentdays');
				$latt = $this->session->userdata('latt');
				$longg = $this->session->userdata('longg');
        		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
        		$this->db->from('postad AS ad');
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->where('ad.ad_status', 1);
				if ($cat_id != 'all') {
					$this->db->where('ad.category_id', $cat_id);
				}
				if ($bus_id != '') {
					$this->db->where('ad.ad_type', $bus_id);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
			}

			
				$pcktype = '((ad.package_type = "3" OR ad.package_type = "6") OR ((ad.package_type = "2" OR ad.package_type = "5" )
				AND ad.urgent_package != "0" ))';
				$this->db->where($pcktype);
				$this->db->group_by("img.ad_id");
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
				$this->db->order_by("ad.ad_id", "DESC");
				$m_res = $this->db->get();
				return $m_res->result();
		}

	    public function hotdeal_search($data){
	    		$cat_id =  $this->session->userdata('cat_id');
	    		$bus_id =  $this->session->userdata('bus_id');
	    		$search_bustype = $this->session->userdata('search_bustype');
	    		$dealurgent = $this->session->userdata('dealurgent');
				$dealtitle = $this->session->userdata('dealtitle');
				$dealprice = $this->session->userdata('dealprice');
				$recentdays = $this->session->userdata('recentdays');
				$latt = $this->session->userdata('latt');
				$longg = $this->session->userdata('longg');
	    		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->where('ad.ad_status', 1);
				if ($cat_id != 'all') {
					$this->db->where('ad.category_id', $cat_id);
				}
				if ($bus_id != '') {
					$this->db->where('ad.ad_type', $bus_id);
				}
				if ($search_bustype) {
					if ($search_bustype == 'business' || $search_bustype == 'consumer') {
						$this->db->where("ad.ad_type", $search_bustype);
					}
				}
				/*package search*/
				if ($cat_id != 'all') {
					if ($cat_id == '1' || $cat_id == '2' || $cat_id == '3' || $cat_id == '4') {
						if (!empty($dealurgent)) {
							$pcklist = [];
							if (in_array("0", $dealurgent)) {
								$this->db->where('ad.urgent_package !=', '0');
							}
							else{
								$this->db->where('ad.urgent_package =', '0');
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
					}
					else if ($cat_id == '5' || $cat_id == '6' || $cat_id == '7' || $cat_id == '8') {
						if (!empty($dealurgent)) {
							$pcklist = [];
							if (in_array("0", $dealurgent)) {
								$this->db->where('ad.urgent_package !=', '0');
							}
							else{
								$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
			}

			
				$pcktype = '((ad.package_type = "3" OR ad.package_type = "6") OR ((ad.package_type = "2" OR ad.package_type = "5" )
					AND ad.urgent_package != "0" ))';
				$this->db->where($pcktype);
				$this->db->group_by("img.ad_id");
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
				$this->db->order_by("ad.ad_id", "DESC");
				$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
				// echo $this->db->last_query(); exit;
				return $m_res->result();
			
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
        	$profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "2");
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
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        /*count of searched filters for services*/
        public function count_servicesprof_search(){
        	$profpop = array_merge($this->session->userdata('prof_service'),$this->session->userdata('pop_service'));
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "2");
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
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
				return $m_res->result();
        }

        /*count of searched filters for clothstyles*/
        public function count_clothstyle_search(){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
				return $m_res->result();
        }

        public function clothstyle_list(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=20) AS women,
		(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=21) AS men,
		(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=22) AS boy,
		(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=23) AS girls,
		(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=24) AS babyboy,
		(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
		AND ad.`category_id` = '6' AND ad.`sub_cat_id`=25) AS babygirl");
		return $this->db->get()->result();
        }

        public function clothstyle_search($data){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
						$this->db->order_by('dtime', 'DESC');
					}
			// $this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			// echo $this->db->last_query(); exit;
				return $m_res->result();
        }

        	/*women view*/
        	public function women_view_search($data){
        	$sub_cat = $this->session->userdata('sub_cat');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "20");
			$this->db->where("ad.ad_status", "1");
			if (!empty($sub_cat)) {
				$this->db->where_in('ad.sub_scat_id', $sub_cat);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
						$this->db->order_by('dtime', 'DESC');
					}
			// $this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			// echo $this->db->last_query(); exit;
				return $m_res->result();
        }

        /*men search*/
        public function count_men_view_search(){
        	$sub_cat = $this->session->userdata('men_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "21");
			$this->db->where("ad.ad_status", "1");
			
			if (!empty($sub_cat)) {
				$this->db->where_in('ad.sub_scat_id', $sub_cat);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
				return $m_res->result();
        }
        public function men_view_search($data){
        	$sub_cat = $this->session->userdata('men_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "21");
			$this->db->where("ad.ad_status", "1");
			if (!empty($sub_cat)) {
				$this->db->where_in('ad.sub_scat_id', $sub_cat);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			// echo $this->db->last_query(); exit;
				return $m_res->result();
        }
        /*boys search*/
        public function count_boys_view_search(){
        	$boys_list = $this->session->userdata('boys_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "22");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($boys_list)) {
				$this->db->where_in('ad.sub_scat_id', $boys_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
				return $m_res->result();
        }
        public function boys_view_search($data){
        	$boys_list = $this->session->userdata('boys_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "22");
			$this->db->where("ad.ad_status", "1");
			
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($boys_list)) {
				$this->db->where_in('ad.sub_scat_id', $boys_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			// echo $this->db->last_query(); exit;
				return $m_res->result();
        }
        public function count_girls_view_search(){
        	$girls_list = $this->session->userdata('girls_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "23");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($girls_list)) {
				$this->db->where_in('ad.sub_scat_id', $girls_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get();
				return $m_res->result();
        }
        public function count_babyboy_view_search(){
        	$babyboy_list = $this->session->userdata('babyboy_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "24");
			$this->db->where("ad.ad_status", "1");
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($babyboy_list)) {
				$this->db->where_in('ad.sub_scat_id', $babyboy_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $this->input->post("longg"));
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
				return $m_res->result();
        }
        public function count_babygirl_view_search(){
        	$babygirl_list = $this->session->userdata('babygirl_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "25");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($babygirl_list)) {
				$this->db->where_in('ad.sub_scat_id', $babygirl_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get();
				return $m_res->result();
        }
        public function girls_view_search($data){
        	$girls_list = $this->session->userdata('girls_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "23");
			$this->db->where("ad.ad_status", "1");
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($girls_list)) {
				$this->db->where_in('ad.sub_scat_id', $girls_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
				return $m_res->result();
        }
        public function babyboy_view_search($data){
        	$babyboy_list = $this->session->userdata('babyboy_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "24");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
			if ($this->input->post('bustype')) {
				if ($this->input->post('bustype') == 'business' || $this->input->post('bustype') == 'consumer') {
					$this->db->where("ad.ad_type", $this->input->post('bustype'));
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($babyboy_list)) {
				$this->db->where_in('ad.sub_scat_id', $babyboy_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			// echo $this->db->last_query(); exit;
				return $m_res->result();
        }
        public function babygirl_view_search($data){
        	$babygirl_list = $this->session->userdata('babygirl_list');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "25");
			$this->db->where("ad.ad_status", "1");
			// if (!empty($profpop)) {
			// 	$this->db->where_in('ad.sub_scat_id', $profpop);
			// }
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

			/*seller search*/
			if (!empty($seller)) {
				$this->db->where_in('ad.services', $seller);
			}

			if (!empty($babygirl_list)) {
				$this->db->where_in('ad.sub_scat_id', $babygirl_list);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
				return $m_res->result();
        }

        public function women_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=20 AND ad.`sub_scat_id`=359) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=20 AND ad.`sub_scat_id`=360) AS shoes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=20 AND ad.`sub_scat_id`=361) AS accessories,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=20 AND ad.`sub_scat_id`=362) AS wedding
			");
        	return $this->db->get()->result();
        }

         public function men_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=21 AND ad.`sub_scat_id`=363) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=21 AND ad.`sub_scat_id`=364) AS shoes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=21 AND ad.`sub_scat_id`=365) AS accessories,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=21 AND ad.`sub_scat_id`=366) AS wedding
			");
        	return $this->db->get()->result();
        }
         public function boys_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=22 AND ad.`sub_scat_id`=367) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=22 AND ad.`sub_scat_id`=368) AS shoes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=22 AND ad.`sub_scat_id`=369) AS accessories
			");
        	return $this->db->get()->result();
        }
        public function girls_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=23 AND ad.`sub_scat_id`=370) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=23 AND ad.`sub_scat_id`=371) AS shoes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=23 AND ad.`sub_scat_id`=372) AS accessories
			");
        	return $this->db->get()->result();
        }

        public function babyboy_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=24 AND ad.`sub_scat_id`=373) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=24 AND ad.`sub_scat_id`=374) AS accessories
			");
        	return $this->db->get()->result();
        }
         public function babygirl_list_count(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=25 AND ad.`sub_scat_id`=373) AS clothes,
			(SELECT COUNT(*) FROM postad AS ad, `sub_subcategory` AS sscat WHERE sscat.`sub_subcategory_id`=ad.`sub_scat_id`
			AND ad.`category_id` = '6' AND ad.`sub_cat_id`=25 AND ad.`sub_scat_id`=374) AS accessories
			");
        	return $this->db->get()->result();
        }

        public function count_women_view_search(){
        	$sub_cat = $this->session->userdata('sub_cat');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "6");
			$this->db->where("ad.sub_cat_id", "20");
			$this->db->where("ad.ad_status", "1");
			if (!empty($sub_cat)) {
				$this->db->where_in('ad.sub_scat_id', $sub_cat);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
				return $m_res->result();
        }

        /*jobs search fo  sub category*/
        public function jobs_search($data){
        	$jobslist = $this->session->userdata('job_search');
        	$jobs_pos = $this->session->userdata('positionfor');
        	$seller = $this->session->userdata('seller_deals');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$recentdays = $this->session->userdata('recentdays');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*, jd.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "1");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
					
			$this->db->order_by('dtime', 'DESC');
			$m_res = $this->db->get('postad AS ad',$data['limit'], $data['start']);
			   // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

         public function count_jobs_search(){
        	$jobslist = $this->session->userdata('job_search');
        	$jobs_pos = $this->session->userdata('positionfor');
        	$seller = $this->session->userdata('seller_deals');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$recentdays = $this->session->userdata('recentdays');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$this->db->select("ad.*, img.*, COUNT(img.ad_id) AS img_count, loc.*, jd.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('job_details AS jd', "jd.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "1");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function pets_search($data){
        	$pets_sub = $this->session->userdata('pets_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "5");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

         public function count_pets_search(){
        	$pets_sub = $this->session->userdata('pets_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "5");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        /*motor point search*/
        public function motors_search($data){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function ezone_search($data){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.ad_status", "1");
			
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function phone_search($data){
        	$phone_sub = $this->session->userdata('phone_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "59");
			$this->db->where("ad.ad_status", "1");
			if (!empty($phone_sub)) {
				$this->db->where_in('ad.sub_scat_id', $phone_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function homes_search($data){
        	$homes_sub = $this->session->userdata('homes_sub');
        	$phone_sub = $this->session->userdata('phone_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "60");
			$this->db->where("ad.ad_status", "1");
			if (!empty($homes_sub)) {
				$this->db->where_in('ad.sub_scat_id', $homes_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function smalls_search($data){
        	$smalls_sub = $this->session->userdata('smalls_sub');
        	$phone_sub = $this->session->userdata('phone_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "61");
			$this->db->where("ad.ad_status", "1");
			if (!empty($smalls_sub)) {
				$this->db->where_in('ad.sub_scat_id', $smalls_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
         public function lappy_search($data){
        	$lappy_sub = $this->session->userdata('lappy_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "62");
			$this->db->where("ad.ad_status", "1");
			if (!empty($lappy_sub)) {
				$this->db->where_in('ad.sub_scat_id', $lappy_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
         public function pcare_search($data){
        	$pcare_sub = $this->session->userdata('pcare_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "64");
			$this->db->where("ad.ad_status", "1");
			if (!empty($pcare_sub)) {
				$this->db->where_in('ad.sub_scat_id', $pcare_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function entertain_search($data){
        	$entertain_sub = $this->session->userdata('entertain_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "65");
			$this->db->where("ad.ad_status", "1");
			if (!empty($entertain_sub)) {
				$this->db->where_in('ad.sub_scat_id', $entertain_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function poto_search($data){
        	$poto_sub = $this->session->userdata('poto_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "66");
			$this->db->where("ad.ad_status", "1");
			if (!empty($poto_sub)) {
				$this->db->where_in('ad.sub_scat_id', $poto_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function access_search($data){
        	$access_sub = $this->session->userdata('access_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "63");
			$this->db->where("ad.ad_status", "1");
			if (!empty($access_sub)) {
				$this->db->where_in('ad.sub_scat_id', $access_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
         public function count_motors_search(){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

         public function count_ezone_search(){
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.ad_status", "1");
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function count_phone_search(){
        	$phone_sub = $this->session->userdata('phone_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "59");
			$this->db->where("ad.ad_status", "1");
			if (!empty($phone_sub)) {
				$this->db->where_in('ad.sub_scat_id', $phone_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_homes_search(){
        	$homes_sub = $this->session->userdata('homes_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "60");
			$this->db->where("ad.ad_status", "1");
			if (!empty($homes_sub)) {
				$this->db->where_in('ad.sub_scat_id', $homes_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
         public function count_smalls_search(){
        	$smalls_sub = $this->session->userdata('smalls_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "61");
			$this->db->where("ad.ad_status", "1");
			if (!empty($smalls_sub)) {
				$this->db->where_in('ad.sub_scat_id', $smalls_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function count_lappy_search(){
        	$lappy_sub = $this->session->userdata('lappy_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "62");
			$this->db->where("ad.ad_status", "1");
			if (!empty($lappy_sub)) {
				$this->db->where_in('ad.sub_scat_id', $lappy_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function count_access_search(){
        	$access_sub = $this->session->userdata('access_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "63");
			$this->db->where("ad.ad_status", "1");
			if (!empty($access_sub)) {
				$this->db->where_in('ad.sub_scat_id', $access_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function count_pcare_search(){
        	$pcare_sub = $this->session->userdata('pcare_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "64");
			$this->db->where("ad.ad_status", "1");
			if (!empty($pcare_sub)) {
				$this->db->where_in('ad.sub_scat_id', $pcare_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_entertain_search(){
        	$entertain_sub = $this->session->userdata('entertain_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "65");
			$this->db->where("ad.ad_status", "1");
			if (!empty($entertain_sub)) {
				$this->db->where_in('ad.sub_scat_id', $entertain_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_poto_search(){
        	$poto_sub = $this->session->userdata('poto_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "8");
			$this->db->where("ad.sub_cat_id", "66");
			$this->db->where("ad.ad_status", "1");
			if (!empty($poto_sub)) {
				$this->db->where_in('ad.sub_scat_id', $poto_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_cars_search(){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "12");
			$this->db->where("ad.ad_status", "1");
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles BETWEEN 1 AND 15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles BETWEEN 15001 AND 30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles  BETWEEN 30001 AND 50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles BETWEEN 50001 AND 50000');
					}
				}
			}
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size BETWEEN 1 AND 1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size BETWEEN 1001 AND 2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size BETWEEN 2001 AND 3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
          public function count_plants_search(){
          	$plants_sub = $this->session->userdata('plants_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_plant_farming as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "17");
			$this->db->where("ad.ad_status", "1");
			if (!empty($plants_sub)) {
				$this->db->where_in('ad.sub_scat_id', $plants_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
         public function count_farming_search(){
         	$farming_sub =  $this->session->userdata('farming_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_plant_farming as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "18");
			$this->db->where("ad.ad_status", "1");
			if (!empty($farming_sub)) {
				$this->db->where_in('ad.sub_scat_id', $farming_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
         public function count_boats_search(){
         	$boats_sub = $this->session->userdata('boats_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_plant_farming as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "19");
			$this->db->where("ad.ad_status", "1");
			if (!empty($boats_sub)) {
				$this->db->where_in('ad.sub_scat_id', $boats_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
        public function plants_search($data){
        	$plants_sub = $this->session->userdata('plants_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_home_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "17");
			$this->db->where("ad.ad_status", "1");
			if (!empty($plants_sub)) {
				$this->db->where_in('ad.sub_scat_id', $plants_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function farming_search($data){
        	$farming_sub =  $this->session->userdata('farming_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_home_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "18");
			$this->db->where("ad.ad_status", "1");
			if (!empty($farming_sub)) {
				$this->db->where_in('ad.sub_scat_id', $farming_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function boats_search($data){
        	$boats_sub = $this->session->userdata('boats_sub');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_home_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "19");
			$this->db->where("ad.ad_status", "1");
			if (!empty($boats_sub)) {
				$this->db->where_in('ad.sub_scat_id', $boats_sub);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function carvans_search($data){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_home_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "14");
			$this->db->where("ad.ad_status", "1");
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size <=', '1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size <=', '2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size <=', '3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles <=', '15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles <=', '30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles <=', '50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles >', '50000');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function coaches_search($data){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "16");
			$this->db->where("ad.ad_status", "1");
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size <=', '1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size <=', '2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size <=', '3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles <=', '15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles <=', '30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles <=', '50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles >', '50000');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function vans_search($data){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "15");
			$this->db->where("ad.ad_status", "1");
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size <=', '1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size <=', '2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size <=', '3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles <=', '15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles <=', '30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles <=', '50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles >', '50000');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function count_carvans_search(){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_home_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "14");
			$this->db->where("ad.ad_status", "1");
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles BETWEEN 1 AND 15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles BETWEEN 15001 AND 30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles  BETWEEN 30001 AND 50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles BETWEEN 50001 AND 50000');
					}
				}
			}
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size BETWEEN 1 AND 1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size BETWEEN 1001 AND 2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size BETWEEN 2001 AND 3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_coaches_search(){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "16");
			$this->db->where("ad.ad_status", "1");
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles BETWEEN 1 AND 15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles BETWEEN 15001 AND 30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles  BETWEEN 30001 AND 50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles BETWEEN 50001 AND 50000');
					}
				}
			}
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size BETWEEN 1 AND 1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size BETWEEN 1001 AND 2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size BETWEEN 2001 AND 3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
         public function count_vans_search(){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "15");
			$this->db->where("ad.ad_status", "1");
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles BETWEEN 1 AND 15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles BETWEEN 15001 AND 30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles  BETWEEN 30001 AND 50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles BETWEEN 50001 AND 50000');
					}
				}
			}
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size BETWEEN 1 AND 1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size BETWEEN 1001 AND 2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size BETWEEN 2001 AND 3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_bikes_search(){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_bike_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "13");
			$this->db->where("ad.ad_status", "1");
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.no_of_miles BETWEEN 1 AND 15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.no_of_miles BETWEEN 15001 AND 30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.no_of_miles  BETWEEN 30001 AND 50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.no_of_miles BETWEEN 50001 AND 50000');
					}
				}
			}
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size BETWEEN 1 AND 1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size BETWEEN 1001 AND 2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size BETWEEN 2001 AND 3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fuel_type', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function cars_search($data){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_car_van_bus_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "12");
			$this->db->where("ad.ad_status", "1");
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size <=', '1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size <=', '2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size <=', '3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.tot_miles <=', '15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.tot_miles <=', '30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.tot_miles <=', '50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.tot_miles >', '50000');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fueltype', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }
        public function bikes_search($data){
        	$engine = $this->session->userdata('engine');
        	$nomiles = $this->session->userdata('nomiles');
        	$fueltype = $this->session->userdata('fueltype');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('motor_bike_ads as mc', "mc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "3");
			$this->db->where("ad.sub_cat_id", "13");
			$this->db->where("ad.ad_status", "1");
			if ($engine) {
				if ($engine != 'any') {
					if ($engine == '1000') {
						$this->db->where('mc.engine_size <=', '1000');
					}
					if ($engine == '2000') {
						$this->db->where('mc.engine_size <=', '2000');
					}
					if ($engine == '3000') {
						$this->db->where('mc.engine_size <=', '3000');
					}
					if ($engine == '3001') {
						$this->db->where('mc.engine_size >', '3001');
					}
				}
			}
			if ($nomiles) {
				if ($nomiles != 'all') {
					if ($nomiles == '15000') {
						$this->db->where('mc.no_of_miles <=', '15000');
					}
					if ($nomiles == '30000') {
						$this->db->where('mc.no_of_miles <=', '30000');
					}
					if ($nomiles == '50000') {
						$this->db->where('mc.no_of_miles <=', '50000');
					}
					if ($nomiles == '60000') {
						$this->db->where('mc.no_of_miles >', '50000');
					}
				}
			}
			if (!empty($fueltype)) {
				$this->db->where_in('mc.fuel_type', $fueltype);
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
			 // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

        /*kitchen home search*/
       	public function kitchenhome_search($data){
        	$kitchen_sub = $this->session->userdata('kitchen_search');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "7");
			$this->db->where("ad.ad_status", "1");
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
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $this->input->post("longg"));
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
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

        public function count_kitchenhome_search(){
        	$kitchen_sub = $this->session->userdata('kitchen_search');
	        $search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->where("ad.category_id", "7");
			$this->db->where("ad.ad_status", "1");
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
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get();
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

        /*find a property*/
        public function residential_search($data){
	 		$proptype = $this->session->userdata('proptype');
            $bedrooms = $this->session->userdata('bed_rooms');
            $bathroom = $this->session->userdata('bathroom');
            $area = $this->session->userdata('area_square');

        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			// $this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('property_resid_commercial as prc', "ad.ad_id = prc.ad_id", 'join');
			$this->db->where("ad.category_id", "4");
			$this->db->where("ad.ad_status", "1");
			if (!empty($proptype)) {
				$this->db->where_in('ad.sub_cat_id', $proptype);
			}
			if (!empty($seller)) {
				$this->db->where_in('prc.offered_type', $seller);
			}
			if ($search_bustype) {
				if ($search_bustype == 'business' || $search_bustype == 'consumer') {
					$this->db->where("ad.ad_type", $search_bustype);
				}
			}
			if (!empty($dealurgent)) {
				$pcklist = [];
				if (in_array("0", $dealurgent)) {
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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

        public function count_residential_search(){
        	$proptype = $this->session->userdata('proptype');
            $bedrooms = $this->session->userdata('bed_rooms');
            $bathroom = $this->session->userdata('bathroom');
            $area = $this->session->userdata('area_square');
        	$search_bustype = $this->session->userdata('search_bustype');
        	$dealurgent = $this->session->userdata('dealurgent');
        	$dealtitle = $this->session->userdata('dealtitle');
        	$dealprice = $this->session->userdata('dealprice');
        	$recentdays = $this->session->userdata('recentdays');
        	$latt = $this->session->userdata('latt');
        	$longg = $this->session->userdata('longg');
        	$seller = $this->session->userdata('seller_deals');
        	$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
			$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
			$this->db->from("postad AS ad");
			$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "left");
			$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'left');
			$this->db->join('property_resid_commercial as prc', "ad.ad_id = prc.ad_id", 'join');
			$this->db->where("ad.category_id", "4");
			$this->db->where("ad.ad_status", "1");
			if (!empty($proptype)) {
				$this->db->where_in('ad.sub_cat_id', $proptype);
			}
			if (!empty($seller)) {
				$this->db->where_in('prc.offered_type', $seller);
			}
			if ($search_bustype) {
				if ($search_bustype == 'business' || $search_bustype == 'consumer') {
					$this->db->where("ad.ad_type", $search_bustype);
				}
			}
			if (!empty($dealurgent)) {
				$pcklist = [];
				if (in_array("0", $dealurgent)) {
					$this->db->where('ad.urgent_package !=', '0');
				}
				else{
					$this->db->where('ad.urgent_package =', '0');
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
			if ($latt) {
				$this->db->where("loc.latt", $latt);
				$this->db->where("loc.longg", $longg);
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
			$m_res = $this->db->get();
			  // echo $this->db->last_query(); exit;
			if($m_res->num_rows() > 0){
				return $m_res->result();
			}
			else{
				return array();
			}
        }

        /*business and consumer count in hotdeals*/
        public function busconcount_hotdeals(){
        	$cat_id =  $this->session->userdata('cat_id');
        	if ($cat_id != 'all') {
        		$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND ad_status = 1 AND (ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
				(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND ad_status = 1 AND ad_type = 'business') AS business,
				(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND ad_status = 1 AND ad_type = 'consumer') AS consumer");
        	}
        	else{
        		$this->db->select("(SELECT COUNT(*) FROM postad WHERE ad_status = 1 AND (ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
				(SELECT COUNT(*) FROM postad WHERE ad_status = 1 AND ad_type = 'business') AS business,
				(SELECT COUNT(*) FROM postad WHERE ad_status = 1 AND ad_type = 'consumer') AS consumer");
        	}
        	$rs = $this->db->get();
        	// echo $this->db->last_query(); exit;
        	return $rs->result();
        }

        public function deals_pck_hotdeals(){
        	$cat_id =  $this->session->userdata('cat_id');
        	if ($cat_id != 'all') {
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND package_type = 3 AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND package_type = 2 AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '$cat_id' AND package_type = 1 AND urgent_package = '0') AS freecount");
        	}
        	else{
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE package_type = 3 AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE package_type = 2 AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE package_type = 1 AND urgent_package = '0') AS freecount");	
        	}
        	
        	$rs = $this->db->get();
        	return $rs->result();
        }
        /*business and consumer count in services*/
        public function busconcount_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND ad_type = 'consumer') AS consumer");
        	$this->db->from("postad");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        /*jobs count business or consumer*/
        public function busconcount_jobs(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*pets count business or consumer*/
        public function busconcount_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*motorc count business or consumer*/
        public function busconcount_motors(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_ezone(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_phones(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '59' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '59' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '59' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_homes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '60' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '60' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '60' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_smalls(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '61' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '61' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '61' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_lappy(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '62' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '62' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '62' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_access(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '63' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '63' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '63' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_pcare(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '64' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '64' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '64' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_entertain(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '65' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '65' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '65' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_poto(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '66' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '66' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id = '66' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_cars(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '12' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '12' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '12' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_plants(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '17' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '17' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '17' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_farming(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '18' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '18' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '18' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_boats(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '19' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '19' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '19' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_caravans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '14' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '14' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '14' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_coaches(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '16' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '16' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '16' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_vans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '15' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '15' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '15' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_bikes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '13' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '13' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id = '13' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*kitchenhome count business or consumer*/
        public function busconcount_kitchen(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*findproperty count business or consumer*/
        public function busconcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*cloths and lifestyles count business or consumer*/
        public function busconcount_clothstyle(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
			(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND ad_type = 'business') AS business,
			(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        public function busconcount_womenview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        public function busconcount_menview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_boysview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function busconcount_girlsview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_babyboyview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function busconcount_babygirlview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND(ad_type = 'business' || ad_type = 'consumer')) AS allbustype,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND ad_type = 'business') AS business,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND ad_type = 'consumer') AS consumer");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*pets seller and needed count*/
        public function sellerneeded_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND services = 'Needed') AS needed");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*motors seller and needed count*/
        public function sellerneeded_motors(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_ezone(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_phone(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='59' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='59' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='59' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function sellerneeded_homes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='60' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='60' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='60' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_smalls(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='61' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='61' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='61' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_lappy(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='62' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='62' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='62' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_access(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='63' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='63' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='63' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_pcare(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='64' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='64' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='64' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_entertain(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='65' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='65' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='65' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_poto(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='66' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='66' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND sub_cat_id='66' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_cars(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_plants(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_farming(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_boats(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_caravans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_coaches(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_vans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function sellerneeded_bikes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND services = 'ForHire') AS forhire");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*services seller and needed count*/
        public function sellerneeded_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND services = 'service_provider') AS provider,
	(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND services = 'service_needed') AS needed");
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
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND services = 'Seller') AS seller,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND services = 'Needed') AS needed,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND services = 'Charity') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*findproperty seller and needed count*/
        public function sellerneeded_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND prc.offered_type = 'Offered') AS offered,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND prc.offered_type = 'Wanted') AS wanted");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*clothstyles seller and needed count*/
        public function sellerneeded_clothstyle(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed' AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity' AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        public function sellerneeded_womenview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 20 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 20 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 20 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_menview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 21 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 21 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 21 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_boyview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 22 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 22 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 22 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_girlsview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 23 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 23 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 23 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function sellerneeded_babyboyview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 24 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 24 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 24 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function sellerneeded_babygirlview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Seller' AND ad.sub_cat_id = 25 AND ad.category_id = '6') AS seller,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Needed'AND ad.sub_cat_id = 25 AND ad.category_id = '6') AS needed,
			(SELECT COUNT(*) FROM postad AS ad WHERE ad.services = 'Charity'AND ad.sub_cat_id = 25 AND ad.category_id = '6') AS charity");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*findproperty area count*/
        public function areacount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND prc.`build_area` < 500) AS less500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND (prc.`build_area` BETWEEN 500 AND 1000)) AS plus500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND (prc.`build_area` BETWEEN 1000 AND 1500)) AS plus1000,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND (prc.`build_area` BETWEEN 1500 AND 2000)) AS plus1500,
			(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
			ad.category_id = '4' AND prc.build_area > 2000) AS plus2000");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*findproperty bedrooms count*/
        public function bedroomcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bed_rooms = 1) AS one1,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bed_rooms = 2) AS secon2,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bed_rooms = 3) AS third3,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bed_rooms >= 4) AS four4");
        	$rs = $this->db->get();
        	return $rs->row();
        }

         /*findproperty bathroomcount_property count*/
        public function bathroomcount_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bath_rooms = 1) AS one1,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bath_rooms = 2) AS secon2,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bath_rooms = 3) AS third3,
		(SELECT COUNT(*) FROM postad AS ad, property_resid_commercial AS prc WHERE ad.ad_id = prc.ad_id AND
		ad.category_id = '4' AND prc.bath_rooms >= 4) AS four4");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*findproperty resi_comm_count_property count*/
        public function resi_comm_count_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad WHERE ad.category_id = '4' AND ad.sub_cat_id = 11) AS residential,
(SELECT COUNT(*) FROM postad AS ad WHERE ad.category_id = '4' AND ad.sub_cat_id = 26) AS commercial");
        	$rs = $this->db->get();
        	return $rs->row();
        }

        /*packages count for services*/
        public function deals_pck_services(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND package_type = 3 AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND package_type = 2 AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '2' AND package_type = 1 AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for jobs*/
        public function deals_pck_jobs(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '1' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*packages count for pets*/
        public function deals_pck_pets(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '5' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for motors*/
        public function deals_pck_motors(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function deals_pck_ezone(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_phone(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='59' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='59' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='59' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='59' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_homes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='60' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='60' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='60' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='60' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_smalls(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='61' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='61' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='61' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='61' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_lappy(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='62' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='62' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='62' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='62' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_access(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='63' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='63' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='63' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='63' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function deals_pck_pcare(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='64' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='64' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='64' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='64' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_entertain(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='65' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='65' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='65' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='65' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_poto(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='66' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='66' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='66' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '8'  AND sub_cat_id='66' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_cars(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='12' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function deals_pck_plants(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='17' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function deals_pck_farming(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='18' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_boats(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='19' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_caravans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='14' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
         public function deals_pck_coaches(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='16' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_vans(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='15' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_bikes(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '3' AND sub_cat_id='13' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         /*packages count for pets*/
        public function deals_pck_kitchen(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND urgent_package != '0') AS urgentcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND package_type = '6'  AND urgent_package = '0') AS platinumcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND package_type = '5'  AND urgent_package = '0') AS goldcount,
			(SELECT COUNT(*) FROM postad WHERE category_id = '7' AND package_type = '4'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for findproperty*/
        public function deals_pck_property(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND package_type = '3'  AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND package_type = '2'  AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '4' AND package_type = '1'  AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*packages count for findproperty*/
        public function deals_pck_clothstyle(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

         public function deals_pck_womenview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 20 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 20 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_menview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 21 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 21 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_boysview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 22 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 22 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_girlsview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 23 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 23 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_babyboyview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 24 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 24 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }
        public function deals_pck_babygirlview(){
        	$this->db->select("(SELECT COUNT(*) FROM postad WHERE category_id = '6'  AND sub_cat_id = 25 AND urgent_package != '0') AS urgentcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND package_type = '6' AND urgent_package = '0') AS platinumcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND package_type = '5' AND urgent_package = '0') AS goldcount,
		(SELECT COUNT(*) FROM postad WHERE category_id = '6' AND sub_cat_id = 25 AND package_type = '4' AND urgent_package = '0') AS freecount");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        /*job positon count*/
        public function jobpositioncnt(){
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
		WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Student_(Higher_Education_Graduate)')AS students,
		(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
		WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Entry-level')AS entrylevel,
		(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
		WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Expirenced_(Non-Manager)')AS nonmanager,
		(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
		WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Manager_(Managing_the_staff)')AS manager,
		(SELECT COUNT(*) FROM postad AS ad, job_details AS jd 
		WHERE ad.`ad_id`=jd.`ad_id` AND jd.`positionfor` = 'Executive_(Director_Dept.Head)')AS executive");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        public function category(){
        	$this->db->select();
        	$this->db->from("catergory");
        	$rs = $this->db->get();
        	return $rs->result();
        }

        
}
?>