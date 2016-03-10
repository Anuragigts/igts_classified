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
		$this->db->or_where("ad.package_type", "3");
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "1");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.package_type", "6");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "7");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ads.package_type", "3");
		$this->db->where("ads.ad_status", "1");
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
		$this->db->or_where("ads.package_type", "2");
		$this->db->or_where("ads.package_type", "5");
		$this->db->where("ads.ad_status", "1");
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
		$this->db->where("ads.ad_status", "1");
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
		$this->db->where("ads.ad_status", "1");
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

	public function business_logos(){
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->where('ads.ad_type', 'business');
		$this->db->where("ads.ad_status", "1");
		$this->db->where('img.bus_logo !=', '');
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
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get();
		return $res->result();
	}
	public function count_my_ads_user(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get();
		return $res->result();
	}

	public function my_ads($data){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		// echo $this->db->last_query();
		return $res->result();
	}
	public function my_ads_user($data){
		$this->db->select("ad.ad_id,ad.deal_tag,pl.cost_pound, COUNT(`img`.`ad_id`) AS img_count,cat.category_name,pl.pkg_dur_name,ad.payment_status, a_s.status_name,u_lab.u_pkg__pound_cost,u_lab.u_pkg_name,u_lab.u_pkg_id,ad.paid_amt,ad.expire_data");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		//$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('ad_status as a_s','a_s.id = ad.ad_status','inner');
		$this->db->join('catergory as cat','cat.category_id = ad.category_id','inner');
		$this->db->join('urgent_pkg_label as u_lab','u_lab.u_pkg_id = ad.urgent_package','inner');
		$this->db->join('pkg_duration_list as pl','pl.pkg_dur_id = ad.package_type','inner');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		// echo $this->db->last_query();//exit;
		return $res->result();
	}
	public function my_ads_box(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by("img.ad_id");
		$this->db->order_by("ad.ad_id", "DESC");
		$res = $this->db->get();
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
		$this->db->where("ad.ad_status", "1");
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
		$vrmcheck = @mysql_result(mysql_query("SELECT `manufacture` FROM `motor_car_van_bus_ads` WHERE ad_id = '".$this->uri->segment(3)."'"), 0, 'manufacture');
		if (ctype_digit($vrmcheck)) {
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, car_model.car_model as cmodel");
		$this->db->from("motor_car_van_bus_ads, sub_subcategory, car_model");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_car_van_bus_ads.manufacture');
		$this->db->where('car_model.id = motor_car_van_bus_ads.model');
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();
				}
		else{
		$this->db->select("*,motor_car_van_bus_ads.manufacture AS manufacture1, motor_car_van_bus_ads.model as cmodel");
		$this->db->from("motor_car_van_bus_ads");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();	
		}
		
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

	/*feedback for ads*/
	public function feedbackads_insert(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'contact_name'	=> $this->input->post('fbkcontname'),
						'mobile'	=> $this->input->post('feedbackno'),
						'email'	=> $this->input->post('busemail'),
						'message'		=> $this->input->post('feedbackmsg'),
						'created_on'	=> date("Y-m-d H:i:s")
			);
			$this->db->insert("feedbackforads", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*feedback for website*/
	public function feedbacksite_insert(){
		$data = array('category'	=> $this->input->post('category'),
						'site_return'	=> $this->input->post('return_site'),
						'frnd_refer'	=> $this->input->post('frnd_ref'),
						'fdk_msg'		=> $this->input->post('Feedback'),
						'fdk_mail'		=> $this->input->post('fdbk_mail'),
						'fdk_mobile'	=> $this->input->post('fdbk_mobile'),
						'easytouse'		=> $this->input->post('easytouse'),
						'stability'		=> $this->input->post('Stability-rating'),
						'design'		=> $this->input->post('Design-rating'),
						'overall'		=> $this->input->post('Overall-rating'),
						'created_on'	=> date("Y-m-d H:i:s")
			);
			$this->db->insert("feedback_site", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*report for ads*/
	public function reportads_insert(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'cat_id'=> $this->input->post('cat_id'),
						'name'	=> $this->input->post('report_view'),
						'message'	=> $this->input->post('reportmsg'),
						'created_on'	=> date("Y-m-d H:i:s")
			);
			$this->db->insert("reportforads", $data);
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

	/*recommanded ads*/
	public function recommanded_ads(){
		$qr = mysql_query("SELECT * FROM postad WHERE ad_id='".$this->uri->segment(3)."'");
		$catid = @mysql_result($qr,0,'category_id');
		$subid = @mysql_result($qr,0,'sub_cat_id');
		$title = @mysql_result($qr,0,'deal_tag');
		$this->db->select("ads.*, img.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->or_where('ads.category_id', $catid);
		$this->db->or_where('ads.sub_cat_id', $subid);
		$this->db->like('ads.deal_tag',$title);
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
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
		
	}

		/*ads for jobs in jobs search */
	public function jobs_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "1");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get("postad AS ad",$data['limit'],$data['start']);

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function count_jobs_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "1");
		$this->db->where("ad.ad_status", "1");
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
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}

	public function pets_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
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

	/*motor search*/
	public function count_motor_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_ezone_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_phones_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "59");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_homes_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "60");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_smalls_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "61");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_lappy_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "62");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_access_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "63");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_pcare_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "64");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_entertain_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "65");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_poto_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "66");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_plants_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "17");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_farming_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "18");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_boats_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "19");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function plants_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "17");
		$this->db->where("ad.ad_status", "1");
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
	public function farming_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "18");
		$this->db->where("ad.ad_status", "1");
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
	public function boats_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "19");
		$this->db->where("ad.ad_status", "1");
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
	/*cars search*/
	public function count_cars_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "12");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_carvans_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "14");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_coaches_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "16");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_vans_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "15");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	/*count_bikes_scoters_view search*/
	public function count_bikes_scoters_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "13");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}

	public function motor_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
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
	public function ezone_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.ad_status", "1");
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

	public function phones_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "59");
		$this->db->where("ad.ad_status", "1");
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
	public function homes_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "60");
		$this->db->where("ad.ad_status", "1");
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
	public function smalls_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "61");
		$this->db->where("ad.ad_status", "1");
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
	public function lappy_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "62");
		$this->db->where("ad.ad_status", "1");
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
	public function access_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "63");
		$this->db->where("ad.ad_status", "1");
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
	public function pcare_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "64");
		$this->db->where("ad.ad_status", "1");
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
	public function entertain_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "65");
		$this->db->where("ad.ad_status", "1");
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
	public function poto_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "66");
		$this->db->where("ad.ad_status", "1");
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

	public function cars_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "12");
		$this->db->where("ad.ad_status", "1");
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
	public function carvans_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "14");
		$this->db->where("ad.ad_status", "1");
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
	public function vans_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "15");
		$this->db->where("ad.ad_status", "1");
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
	public function coaches_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "16");
		$this->db->where("ad.ad_status", "1");
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
	public function bikes_scoters_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "13");
		$this->db->where("ad.ad_status", "1");
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
	public function kitchenhome_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "7");
		$this->db->where("ad.ad_status", "1");
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

	public function count_kitchenhome_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "7");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		// echo $this->db->last_query();exit;
		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*ads for find a property search */
	public function find_property_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.ad_status", "1");
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

	public function count_find_property_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.ad_status", "1");
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

	/*ads for clothstyle in clothstyle search */
	public function clothstyle_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
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

	public function count_clothstyle_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*women view search*/
	public function women_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "20");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_women_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "20");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function count_men_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "21");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function men_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "21");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_boys_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "22");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_girls_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "23");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_baby_boy_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "24");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function count_baby_girl_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "25");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get();
		//echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function boys_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "22");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function girls_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "23");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function baby_boy_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "24");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	public function baby_girl_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "25");
		$this->db->where("ad.ad_status", "1");
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
		// echo $this->db->last_query(); exit;

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
	
	public function publicads_ezone(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 8);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_motor(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 3);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_clothing(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 6);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_service(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 2);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_property(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 4);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_homekitchen(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 7);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_pets(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 5);
		$m_res = $this->db->get();
			return $m_res->result();
	}
	
	public function publicads_jobs(){
		$this->db->select("*");
		$this->db->from("publicads_searchview");
		$this->db->where("cat_id", 1);
		$m_res = $this->db->get();
			return $m_res->result();
	}



}



?>