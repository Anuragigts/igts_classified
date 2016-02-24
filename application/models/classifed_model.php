<?php


Class Classifed_model extends CI_model{

	/*marquee title*/
	public function marquee(){
		$this->db->select("pads.marquee, ad.ad_id");
		$this->db->from("postad as ad");
		$this->db->join("platinum_ads as pads", "pads.ad_id = ad.ad_id","join");
		$this->db->order_by('ad.ad_id', "DESC");
		$rs = $this->db->get();
		return $rs->result();
	}

	/*show all categories in home page*/
	public function show_all(){

		$this->db->select("*");
		$this->db->from("`catergory`");
		$rs = $this->db->get();
		
		if($this->db->affected_rows() > 0){
			return $rs->result();
		}
		else{
			return array();
		}

	}

/*most value ads of logged on user*/
	public function most_ads_user($id){

		$this->db->select("(SELECT (SELECT `City_name` FROM `cities` WHERE `City_id` = `addr`.city) AS cityname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS city,
		(SELECT (SELECT `State_name` FROM `states` WHERE `State_id` = addr.`state`) AS statename FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS state,
		(SELECT (SELECT `Country_name` FROM `countries` WHERE `Country_id` = addr.`country`) AS countryname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS country,
		fs.*,ads.*, (SELECT `img_name` FROM `ad_img` WHERE ad_id = fs.ad_id GROUP BY ad_id ) as img");
		$this->db->from("`featured` AS fs ");
		$this->db->join("advertisement` AS ads", "ads.ad_id = fs.ad_id AND ads.login_id = '$id'", 'join');
		// $this->db->join("ad_img As img", "img.ad_id = ads.ad_id", 'left');
		// $this->db->join("address As addr", "addr.address_id = ads.addr_id", 'join');
		// $this->db->group_by('img.`ad_id`');
		
		$rs = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $rs->result();
		}
		else{
			return array();
		}

	}

	/*significant ads of logged on user*/
	public function sig_ads_user($id){

		$this->db->select("(SELECT (SELECT `City_name` FROM `cities` WHERE `City_id` = `addr`.city) AS cityname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS city,
		(SELECT (SELECT `State_name` FROM `states` WHERE `State_id` = addr.`state`) AS statename FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS state,
		(SELECT (SELECT `Country_name` FROM `countries` WHERE `Country_id` = addr.`country`) AS countryname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS country,
		spt.*,ads.*, (SELECT `img_name` FROM `ad_img` WHERE ad_id = spt.ad_id GROUP BY ad_id ) as img");
		$this->db->from("`spotlight` AS spt ");
		$this->db->join("advertisement` AS ads", "ads.ad_id = spt.ad_id AND ads.login_id = '$id'", 'join');
		// $this->db->join("ad_img As img", "img.ad_id = ads.ad_id", 'left');
		// $this->db->join("address As addr", "addr.address_id = ads.addr_id", 'join');
		// $this->db->group_by('img.`ad_id`');
		
		$rs = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $rs->result();
		}
		else{
			return array();
		}

	}

	/*crucial ads of logged on user*/
	public function crucial_ads_user($id){

		$this->db->select("(SELECT (SELECT `City_name` FROM `cities` WHERE `City_id` = `addr`.city) AS cityname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS city,
		(SELECT (SELECT `State_name` FROM `states` WHERE `State_id` = addr.`state`) AS statename FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS state,
		(SELECT (SELECT `Country_name` FROM `countries` WHERE `Country_id` = addr.`country`) AS countryname FROM `address` AS addr WHERE addr.`address_id` = ads.addr_id) AS country,
		cru.*,ads.*, (SELECT `img_name` FROM `ad_img` WHERE ad_id = cru.ad_id GROUP BY ad_id ) as img");
		$this->db->from("`urgent` AS cru ");
		$this->db->join("advertisement` AS ads", "ads.ad_id = cru.ad_id AND ads.login_id = '$id'", 'join');
		// $this->db->join("ad_img As img", "img.ad_id = ads.ad_id", 'left');
		// $this->db->join("address As addr", "addr.address_id = ads.addr_id", 'join');
		// $this->db->group_by('img.`ad_id`');
		
		$rs = $this->db->get();
		if($this->db->affected_rows() > 0){
			return $rs->result();
		}
		else{
			return array();
		}

	}

	/*free ads of logged on user*/
	public function free_ads_user($id){
		$this->db->select("ads.`title`, ads.`ad_desc`, ads.`created_on`, img.img_name,
		(SELECT `City_name` FROM `cities` WHERE `City_id` = (SELECT `city` FROM `address` WHERE `address_id` = ads.`addr_id`)) city,
		(SELECT `Country_name` FROM `countries` WHERE `Country_id` = (SELECT `country` FROM `address` WHERE `address_id` = ads.`addr_id`))country");
		$this->db->from("`advertisement` AS ads");
		$this->db->join('ad_img as img', 'img.ad_id = ads.ad_id', 'left');
		// $where = array('is_urgent' => 0, 'is_spotlight' => 0, 'is_featured' => 0);
		// $this->db->where($where);
		$this->db->where('is_urgent', 0);
		$this->db->where('is_spotlight', 0);
		$this->db->where('is_featured', 0);
		$this->db->where('login_id', $id);
		$this->db->order_by('ads.created_on', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}	
	}


	/*most value ads for show all in home page*/
	public function sig_show_all(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);

		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	/*over all ads for significant ads(displayed for jobs only)*/
	public function sig_ads_jobs(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "jobs");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for services */
	public function sig_ads_services(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "services");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for motorpoint */
	public function sig_ads_motor(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "motorpoint");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for cloths and lifestyles */
	public function sig_ads_cloths(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "clothing_&_lifestyles");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for find a property*/
	public function sig_ads_property(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "findaproperty");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for home and kitchen*/
	public function sig_ads_khome(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "kitchenhome");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*significant ads for pets */
	public function sig_ads_pets(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "pets");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}



/*significant ads for ezone */
	public function sig_ads_ezone(){
		$this->db->select("ad.*, img.*");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->where("ad.package_type", "platinum");
		$this->db->where("ad.category_id", "ezone");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.ad_id', 'DESC');
		$this->db->limit(12);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*hot_deals in home page 3D */
	public function hot_deals(){
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->where('ads.package_type', 'platinum');
		$this->db->group_by('img.ad_id');
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*most valued ads in home page*/
	public function mostvalued_ads(){
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->where('ads.package_type', 'gold');
		$this->db->group_by('img.ad_id');
		$this->db->order_by('dtime', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function free_ads(){
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->where('ads.ad_type', 'consumer');
		$this->db->group_by('img.ad_id');
		$this->db->order_by('dtime', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}	
	}


	/*business ads in home page*/
	public function business_ads(){
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->where('ads.ad_type', 'business');
		$this->db->group_by('img.ad_id');
		$this->db->order_by('dtime', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}


	/*my ads in deals administrator*/
	public function count_my_ads(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get();
		return $res->result();
	}

	public function my_ads($data){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		// $this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		return $res->result();
	}

	public function my_ads_search(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
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
		$res = $this->db->get();
		return $res->result();
	}

	/*ad description view details*/
	public function ads_description_details(){
		$this->db->select("*");
		$this->db->from("postad");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*ad description view images*/
	public function ads_description_pics(){
		$this->db->select("*");
		$this->db->from("ad_img");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}
	/*ad description view video*/
	public function ads_description_videos(){
		$this->db->select("video_name");
		$this->db->from("videos");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->row();
	}

	/*ad description view location*/
	public function ads_description_loc(){
		$this->db->select("*");
		$this->db->from("location");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*details for pets*/
	public function ads_detailed_pets(){
		$this->db->select("*");
		$this->db->from("pets_details");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*details for clothing_&_lifestyles*/
	/*clothing*/
	public function ads_detailed_cloths(){
		$this->db->select("*");
		$this->db->from("lifestyle_clothing");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*accessories*/
	public function ads_detailed_acces(){
		$this->db->select("*");
		$this->db->from("lifestyle_accessories");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*lifestyle_shoes*/
	public function ads_detailed_shoes(){
		$this->db->select("*");
		$this->db->from("lifestyle_shoes");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*lifestyle_wedding*/
	public function ads_detailed_wedding(){
		$this->db->select("*");
		$this->db->from("lifestyle_wedding");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*resindtilal and commercial property*/
	public function ads_detailed_prop(){
		$this->db->select("	(SELECT `sub_subcategory_name` FROM `sub_subcategory` WHERE sub_subcategory_id = property_for) AS prop_for, 
		(SELECT `sub_sub_subcategory_name` FROM `sub_sub_subcategory` WHERE sub_sub_subcategory_id = property_type) AS prop_type, 
		property_resid_commercial.*");
		$this->db->from("property_resid_commercial");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*Job category*/
	public function ads_detailed_jobs(){
		$this->db->select("*");
		$this->db->from("job_details");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*motor point*/
	/*bikes*/
	public function ads_detailed_bikes(){
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, bike_type.b_type as btype, bike_model.bike_model as bmodel");
		$this->db->from("motor_bike_ads, sub_subcategory, bike_type, bike_model");
		$this->db->where('ad_id', $this->uri->segment(3));
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_bike_ads.manufacture');
		$this->db->where('bike_type.id = motor_bike_ads.bike_type');
		$this->db->where('bike_model.id = motor_bike_ads.model');
		$res = $this->db->get();
		return $res->result();
	}

	/*cars, vans, buses*/
	public function ads_detailed_cars(){
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, car_model.car_model as cmodel");
		$this->db->from("motor_car_van_bus_ads, sub_subcategory, car_model");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_car_van_bus_ads.manufacture');
		$this->db->where('car_model.id = motor_car_van_bus_ads.model');
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*motor home caravans*/
	public function ads_detailed_motorhomes(){
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, car_model.car_model as cmodel");
		$this->db->from("motor_home_ads, sub_subcategory, car_model");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_home_ads.manufacture');
		$this->db->where('car_model.id = motor_home_ads.model');
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*motor boats*/
	public function ads_detailed_boats(){
		$this->db->select("(SELECT sub_subcategory_name FROM sub_subcategory sscat WHERE sscat.sub_subcategory_id = mb.manufacture) AS manufacture,
		year,
		(SELECT car_model FROM car_model AS cm WHERE cm.id = mb.model) AS model,
		color,fueltype,condition");
		$this->db->from("motor_boats AS mb");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*plant machinery*/
	public function ads_detailed_plants(){
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, sub_sub_subcategory.sub_sub_subcategory_name as cmodel");
		$this->db->from("motor_plant_farming, sub_subcategory, sub_sub_subcategory");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_plant_farming.manufacture');
		$this->db->where('sub_sub_subcategory.sub_sub_subcategory_id = motor_plant_farming.model');
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}
	/*farming vehicles*/
	public function ads_detailed_farms(){
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1");
		$this->db->from("motor_plant_farming, sub_subcategory");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_plant_farming.manufacture');
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*ezone details*/
	public function ads_detailed_ezones(){
		$this->db->select("*");
		$this->db->from("ezone_details");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*kitchen home details*/
	public function ads_detailed_kitchen(){
		$this->db->select("*");
		$this->db->from("kitchenhome_ads");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}



	/*review inserting*/
	public function review_insert(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'review_title'	=> $this->input->post('review_title'),
						'review_msg'	=> $this->input->post('review_msg'),
						'review_name'	=> $this->input->post('review_name'),
						'rating'		=> $this->input->post('user_rating'),
						'review_time'	=> date("d-m-Y H:i:s")
			);
			$this->db->insert("review_rating", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*display ads_review()*/
	public function ads_review(){
		$this->db->select("*");
		$this->db->from("review_rating");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
	}

	/*display favourite ad or not(icon symbol)*/
	public function ads_favourite(){
		$this->db->select("*");
		$this->db->from("favourite_deals");
		$this->db->where('ad_id', $this->uri->segment(3));
		$this->db->where('login_id', $this->session->userdata('login_id'));
		$this->db->where('status', 1);
		$res = $this->db->get();
		return $res->result();
	}

	/*favourite_list()*/
	public function favourite_list(){
		$this->db->select("ad_id");
		$this->db->from("favourite_deals");
		$this->db->where('login_id', $this->session->userdata('login_id'));
		$this->db->where('status', 1);
		$res = $this->db->get();
		return $res->result();
	}

	/*display likes ad or not(icon symbol)*/
	public function ads_likes(){
		$this->db->select("*");
		$this->db->from("likes_deals");
		$this->db->where('ad_id', $this->uri->segment(3));
		$this->db->where('login_id', $this->session->userdata('login_id'));
		$res = $this->db->get();
		return $res->result();
	}

	/*display in pickup deals*/
	public function pickup_deals(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('favourite_deals as fav', "fav.ad_id = ad.ad_id", 'join');
		$this->db->where('fav.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by("fav.id", "DESC");
		$res = $this->db->get();
		return $res->result();
	}

	public function pickup_deals_search(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('favourite_deals as fav', "fav.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
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
		$res = $this->db->get();
		return $res->result();
	}

	/*add favourites to logged user*/
	public function add_favourite(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'login_id'	=> $this->input->post('login_id'),
						'status'	=> '1'
			);
			$this->db->insert("favourite_deals", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*remove favourites to logged user*/
	public function remove_favourite(){
			$wr = array(
			'ad_id'=> $this->input->post('ad_id'),
			'login_id'	=> $this->input->post('login_id')
			);
			$this->db->delete("favourite_deals", $wr);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*add_likes to logged user*/
	public function add_likes(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'login_id'	=> $this->input->post('login_id')
			);
			$this->db->insert("likes_deals", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*remove_likes to logged user*/
	public function remove_likes(){
			$wr = array(
			'ad_id'=> $this->input->post('ad_id'),
			'login_id'	=> $this->input->post('login_id')
			);
			$this->db->delete("likes_deals", $wr);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*ads for services in services search */
	public function services_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "services");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_services_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "services");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
		
	}

		/*ads for jobs in jobs search */
	public function jobs_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "jobs");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*ads for jobs in pets search */
	public function count_pets_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "pets");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function pets_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		// $this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "pets");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*ads for kitchen_view search */
	public function kitchenhome_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "kitchenhome");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*ads for find a property search */
	public function find_property_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "findaproperty");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*public ads for services search */
	public function publicads(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$m_res = $this->db->get();
			return $m_res->result();
	}



}



?>