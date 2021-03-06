<?php


Class Classifed_model extends CI_model{

	/*marquee title*/
	public function marquee(){
		$this->db->select("pads.marquee, ad.ad_id, ad.deal_tag");
		$this->db->from("postad as ad");
		$this->db->join("platinum_ads as pads", "pads.ad_id = ad.ad_id","join");
		$this->db->where('ad.ad_status', 1);
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->order_by('ad.approved_on', "DESC");
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("(ad.package_type = 3 OR ad.package_type = 6)");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$this->db->limit(12);

		$m_res = $this->db->get();
		 // echo $this->db->last_query(); exit;
		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}
	/*over all ads for significant ads(displayed for jobs only)*/
	public function sig_ads_jobs(){
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "1");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.package_type", "6");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.package_type", "3");
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "7");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*,ud.valid_to AS urg");
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->or_where("ad.package_type", "6");
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$date = date("Y-m-d H:i:s");
		/*top category*/
		$top_free = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=1 AND is_top = 1"), 0,'likes_count');
		$top_freeurgent = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=2 AND is_top = 1"), 0,'likes_count');
		$top_gold = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=3 AND is_top = 1"), 0,'likes_count');
		/*low category*/
		$low_free = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=4 AND is_top = 0"), 0,'likes_count');
		$low_freeurgent = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=5 AND is_top = 0"), 0,'likes_count');
		$low_gold = mysql_result(mysql_query("SELECT likes_count FROM manage_likes WHERE id=6 AND is_top = 0"), 0,'likes_count');

		$query = $this->db->query("/*jobs*/
(SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad
JOIN ad_img AS img ON img.ad_id = ad.ad_id
 LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
 WHERE ad.`category_id` = 1 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 1)AND ad.urgent_package != 0 AND ad.likes_count >= '$top_freeurgent')OR
((ad.package_type = 1)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_free')OR
((ad.package_type = 2)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_gold')OR
((ad.package_type = 3) AND ad.urgent_package != 0)OR
((ad.package_type = 3) AND ad.urgent_package = 0)OR
((ad.package_type = 2)AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 2) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_gold')
OR ((ad.package_type = 1) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_free'))
GROUP BY img.ad_id
ORDER BY ad.approved_on DESC LIMIT 2) UNION
/*services*/
(SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad 
JOIN ad_img AS img ON img.ad_id = ad.ad_id
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
WHERE ad.category_id = 2 AND ad.ad_status = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 1)AND ad.urgent_package != 0 AND ad.likes_count >= '$top_freeurgent')OR
((ad.package_type = 1)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_free')OR
((ad.package_type = 2)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_gold')OR
((ad.package_type = 3) AND ad.urgent_package != 0)OR
((ad.package_type = 3) AND ad.urgent_package = 0)OR
((ad.package_type = 2)AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 2) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_gold')
OR ((ad.package_type = 1) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_free'))
GROUP BY img.ad_id
ORDER BY ad.approved_on DESC LIMIT 2) UNION
/*motor point*/
(SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad 
JOIN ad_img AS img ON img.ad_id = ad.ad_id
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
WHERE ad.`category_id` = 3 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 1)AND ad.urgent_package != 0 AND ad.likes_count >= '$top_freeurgent')OR
((ad.package_type = 1)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_free')OR
((ad.package_type = 2)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_gold')OR
((ad.package_type = 3) AND ad.urgent_package != 0)OR
((ad.package_type = 3) AND ad.urgent_package = 0)OR
((ad.package_type = 2)AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 2) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_gold')
OR ((ad.package_type = 1) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_free'))
GROUP BY img.ad_id
ORDER BY ad.approved_on DESC LIMIT 2) UNION
/*find a property*/
(SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad
JOIN ad_img AS img ON img.ad_id = ad.ad_id
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
WHERE ad.`category_id` = 4 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 1)AND ad.urgent_package != 0 AND ad.likes_count >= '$top_freeurgent')OR
((ad.package_type = 1)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_free')OR
((ad.package_type = 2)AND ad.urgent_package = 0 AND ad.likes_count >= '$top_gold')OR
((ad.package_type = 3) AND ad.urgent_package != 0)OR
((ad.package_type = 3) AND ad.urgent_package = 0)OR
((ad.package_type = 2)AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 2) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_gold')
OR ((ad.package_type = 1) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$top_free'))
GROUP BY img.ad_id
ORDER BY ad.approved_on DESC LIMIT 2)UNION
/*pets*/
(SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad
JOIN ad_img AS img ON img.ad_id = ad.ad_id
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
 WHERE ad.`category_id` = 5 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 4 )AND ad.urgent_package != 0 AND ad.likes_count >= '$low_freeurgent')OR
 ((ad.package_type = 4 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_free')OR
 ((ad.package_type = 5 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_gold')OR
 ((ad.package_type = 6) AND ad.urgent_package != 0)OR
 ((ad.package_type = 6) AND ad.urgent_package = 0)OR
 ((ad.package_type = 5 )AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 5) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_gold')
OR ((ad.package_type = 4) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_free'))
GROUP BY img.ad_id
ORDER BY ad.approved_on DESC LIMIT 2) UNION
 /*cloths*/
 (SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad 
JOIN ad_img AS img ON img.ad_id = ad.ad_id 
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
 WHERE ad.`category_id` = 6 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 4 )AND ad.urgent_package != 0 AND ad.likes_count >= '$low_freeurgent')OR
 ((ad.package_type = 4 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_free')OR
 ((ad.package_type = 5 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_gold')OR
 ((ad.package_type = 6) AND ad.urgent_package != 0)OR
 ((ad.package_type = 6) AND ad.urgent_package = 0)OR
 ((ad.package_type = 5 )AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 5) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_gold')
OR ((ad.package_type = 4) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_free'))
GROUP BY img.ad_id 
 ORDER BY ad.approved_on DESC LIMIT 2) UNION
 /*home and kitchen*/
 (SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad 
 JOIN ad_img AS img ON img.ad_id = ad.ad_id 
 LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
 WHERE ad.`category_id` = 7
 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 4 )AND ad.urgent_package != 0 AND ad.likes_count >= '$low_freeurgent')OR
 ((ad.package_type = 4 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_free')OR
 ((ad.package_type = 5 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_gold')OR
 ((ad.package_type = 6) AND ad.urgent_package != 0)OR
 ((ad.package_type = 6) AND ad.urgent_package = 0)OR
 ((ad.package_type = 5 )AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 5) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_gold')
OR ((ad.package_type = 4) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_free'))
GROUP BY img.ad_id 
 ORDER BY ad.approved_on DESC LIMIT 2) UNION
 /*ezone*/
 (SELECT *,ud.valid_to AS urg,ad.ad_id as adid FROM postad AS ad 
JOIN ad_img AS img ON img.ad_id = ad.ad_id 
LEFT JOIN urgent_details AS ud ON ud.ad_id = ad.ad_id AND ud.valid_to >= '$date' 
WHERE ad.`category_id` = 8
 AND ad.`ad_status` = 1 AND ad.expire_data >='$date' AND
(((ad.package_type = 4 )AND ad.urgent_package != 0 AND ad.likes_count >= '$low_freeurgent')OR
 ((ad.package_type = 4 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_free')OR
 ((ad.package_type = 5 )AND ad.urgent_package = 0 AND ad.likes_count >= '$low_gold')OR
 ((ad.package_type = 6) AND ad.urgent_package != 0)OR
 ((ad.package_type = 6) AND ad.urgent_package = 0)OR
 ((ad.package_type = 5 )AND ad.urgent_package != 0 AND ud.valid_to >= '$date')
OR ((ad.package_type = 5) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_gold')
OR ((ad.package_type = 4) AND ad.urgent_package != 0 AND ud.valid_to < '$date' AND ad.likes_count >= '$low_free'))
GROUP BY img.ad_id 
 ORDER BY ad.approved_on DESC LIMIT 2) 
 
 ");
	 // echo $this->db->last_query(); exit;
	return $query->result();
	}

	/*most valued ads in home page*/
	public function mostvalued_ads(){
		$this->db->select("ads.*, img.*,ud.valid_to AS urg");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ads.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("(ads.package_type = 2 OR ads.package_type = 5)");
		$this->db->where("ads.ad_status", "1");
		$this->db->where("ads.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by('img.ad_id');
		$this->db->order_by('ads.approved_on', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();
		// echo $this->db->last_query(); exit;
		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function free_ads(){
		$this->db->select("ads.*, img.*,ud.valid_to AS urg");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ads.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where('ads.ad_type', 'consumer');
		$this->db->where("ads.ad_status", "1");
		$this->db->where("ads.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by('img.ad_id');
		$this->db->order_by('ads.approved_on', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();
		// echo $this->db->last_query();exit;
		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}	
	}


	/*business ads in home page*/
	public function business_ads(){
		$this->db->select("ads.*, img.*,ud.valid_to AS urg");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ads.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where('ads.ad_type', 'business');
		$this->db->where("ads.ad_status", "1");
		$this->db->where("ads.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by('img.ad_id');
		$this->db->order_by('ads.approved_on', 'DESC');
		$this->db->limit(10);
		$m_res = $this->db->get();
		// echo $this->db->last_query();exit;
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
		$this->db->where("ads.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->where('img.bus_logo !=', '');
		$this->db->group_by('img.ad_id');
		$this->db->order_by('ads.approved_on', 'DESC');
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
		$dealtitle = $this->session->userdata('dealtitle');
		$dealprice = $this->session->userdata('dealprice');
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
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
		$this->db->order_by('dtime', 'DESC');
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
		return $res->result();
	}
	public function count_my_ads_user(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$res = $this->db->get();
		return $res->result();
	}

	public function my_ads($data){
		$dealtitle = $this->session->userdata('dealtitle');
		$dealprice = $this->session->userdata('dealprice');
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
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
		$this->db->order_by('dtime', 'DESC');
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		// echo $this->db->last_query(); exit;
		return $res->result();
	}
	public function my_ads_user($data){
		$this->db->select("ad.ad_id,ad.urgent_package,ad.package_type,ad.deal_tag,pl.cost_pound, COUNT(`img`.`ad_id`) AS img_count,cat.category_name,pl.pkg_dur_name,ad.payment_status, a_s.status_name,u_lab.u_pkg__pound_cost,u_lab.u_pkg_name,u_lab.u_pkg_id,ad.paid_amt,ad.expire_data, ad.ad_status");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('ad_status as a_s','a_s.id = ad.ad_status','inner');
		$this->db->join('catergory as cat','cat.category_id = ad.category_id','inner');
		$this->db->join('urgent_pkg_label as u_lab','u_lab.u_pkg_id = ad.urgent_package','left');
		$this->db->join('pkg_duration_list as pl','pl.pkg_dur_id = ad.package_type','inner');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		return $res->result();
	}
	public function my_ads_box($data){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->where('ad.login_id', $this->session->userdata('login_id'));
		$this->db->group_by("img.ad_id");
		$this->db->order_by('dtime', 'DESC');
		$res = $this->db->get("postad as ad", $data['limit'], $data['start']);
		return $res->result();
	}

	public function my_ads_box_search(){
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
			$this->db->order_by('ad.approved_on', 'DESC');
		}
		$this->db->order_by('ad.approved_on', 'DESC');
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
			$this->db->order_by('ad.approved_on', 'DESC');
		}
		$this->db->order_by('ad.approved_on', 'DESC');
		$res = $this->db->get();
		return $res->result();
	}

	/*ad description view details*/
	public function ads_description_details(){
		$this->db->select("*,ud.valid_to AS urg,postad.ad_id as adid");
		$this->db->from("postad");
		$this->db->join('urgent_details AS ud',"ud.ad_id= postad.ad_id AND ud.valid_to >= '".date('Y-m-d H:i:s')."'",'left');
		$this->db->where('postad.ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
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
	/*facebook share*/
	public function ads_description_fb(){
		$this->db->select("*,ad.ad_id as adid");
		$this->db->from("postad as ad");
		$this->db->join('ad_img AS img',"img.ad_id= ad.ad_id",'join');
		$this->db->where('ad.ad_id', $this->uri->segment(3));
		$this->db->group_by("ad.ad_id");
		$res = $this->db->get();
		return $res->row();
	}
	/*ad description view video*/
	public function ads_description_videos(){
		$this->db->select("video_name");
		$this->db->from("videos");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		if ($this->db->affected_rows() > 0) {
			return $res->row();
		}
		else{
			return 0;
		}
		
	}

	/*ad description view location*/
	public function ads_description_loc(){
		$this->db->select("*");
		$this->db->from("location AS loc");
		$this->db->join("uk_postcodes AS up", "up.latitude = loc.latt AND up.longitude = loc.longg", "join");
		$this->db->where('loc.ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
		return $res->row();
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
		$vrmcheck = @mysql_result(mysql_query("SELECT `manufacture` FROM `motor_bike_ads` WHERE ad_id = '".$this->uri->segment(3)."'"), 0, 'manufacture');
		if (ctype_digit($vrmcheck)) {
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, bike_type.b_type as btype, bike_model.bike_model as bmodel");
		$this->db->from("motor_bike_ads, sub_subcategory, bike_type, bike_model");
		$this->db->where('ad_id', $this->uri->segment(3));
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_bike_ads.manufacture');
		// $this->db->where('bike_type.id = motor_bike_ads.bike_type');
		// $this->db->where('bike_model.id = motor_bike_ads.model');
		$this->db->group_by('ad_id');
		$res = $this->db->get();
		return $res->result();
		}
		else{
		$this->db->select("*,motor_bike_ads.manufacture AS manufacture1, motor_bike_ads.model as bmodel, motor_bike_ads.bike_type as btype");
		$this->db->from("motor_bike_ads");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		return $res->result();	
		}
	}

	/*cars, vans, buses*/
	public function ads_detailed_cars(){
		$vrmcheck = @mysql_result(mysql_query("SELECT `manufacture` FROM `motor_car_van_bus_ads` WHERE ad_id = '".$this->uri->segment(3)."'"), 0, 'manufacture');
		if (ctype_digit($vrmcheck)) {
		$this->db->select("*, sub_subcategory.sub_subcategory_name AS manufacture1, car_model.car_model as cmodel");
		$this->db->from("motor_car_van_bus_ads, sub_subcategory, car_model");
		$this->db->where('sub_subcategory.sub_subcategory_id = motor_car_van_bus_ads.manufacture');
		// $this->db->where('car_model.id = motor_car_van_bus_ads.model');
		$this->db->where('ad_id', $this->uri->segment(3));
		$this->db->group_by('ad_id');
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
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
		$this->db->select("*");
		$this->db->from("motor_boats AS mb");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
		return $res->result();
	}
	/*motor accessories*/
	public function ads_detailed_accessories(){
		$this->db->select("*");
		$this->db->from("motor_accessories AS ma");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get();
		// echo $this->db->last_query(); exit;
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
	public function review_exists(){
			$this->db->select();
			$this->db->from('review_rating');
			$this->db->where('ad_id',$this->input->post('ad_id'));
			$this->db->where('logid',$this->session->userdata('login_id'));
			return $this->db->count_all_results();
	}
	public function reviewexistslogin(){
			$a = $this->session->userdata("reviewdata");
            $this->db->select("*");
			$this->db->from('review_rating');
			$this->db->where('ad_id',$a['ad_id']);
			$this->db->where('logid',$this->session->userdata('login_id'));
			return $this->db->count_all_results();
	}
	public function review_insert(){
		$data = array('ad_id'=> $this->input->post('ad_id'),
						'logid'	=>	$this->session->userdata('login_id'),
						'review_title'	=> $this->input->post('review_title'),
						'review_msg'	=> $this->input->post('review_msg'),
						'review_name'	=> $this->input->post('review_name'),
						'rating'		=> $this->input->post('user_rating'),
						'review_time'	=> date("d-m-Y H:i:s"),
						'status' => 1
			);
			$this->db->insert("review_rating", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	public function reviewinsert1(){
		$a = $this->session->userdata("reviewdata");
		$data = array('ad_id'=> $a['ad_id'],
						'logid'	=>	$this->session->userdata('login_id'),
						'review_title'	=> $a['review_title'],
						'review_msg'	=> $a['review_msg'],
						'review_name'	=> $a['review_name'],
						'rating'		=> $a['user_rating'],
						'review_time'	=> date("d-m-Y H:i:s"),
						'status' => 1
			);
			$this->db->insert("review_rating", $data);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	public function review_update(){
		$data = array('review_title'	=> $this->input->post('review_title'),
						'review_msg'	=> $this->input->post('review_msg'),
						'review_name'	=> $this->input->post('review_name'),
						'rating'		=> $this->input->post('user_rating'),
						'review_time'	=> date("d-m-Y H:i:s"),
						'status' => 1);
			$this->db->update("review_rating", $data,array('ad_id'=> $this->input->post('ad_id'),'logid'=>	$this->session->userdata('login_id')));
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	public function reviewupdate1(){
		$a = $this->session->userdata("reviewdata");
		$data = array('review_title'	=> $a['review_title'],
						'review_msg'	=> $a['review_msg'],
						'review_name'	=> $a['review_name'],
						'rating'		=> $a['user_rating'],
						'review_time'	=> date("d-m-Y H:i:s"),
						'status' => 1);
			$this->db->update("review_rating", $data,array('ad_id'=> $a['ad_id'],'logid'=>	$this->session->userdata('login_id')));
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

	/*feedback for ads*/
	public function feedbackads_insert(){
		$login_email = @mysql_result(mysql_query("SELECT login_email FROM login WHERE login_id = (SELECT login_id FROM postad WHERE ad_id = '".$this->input->post('ad_id')."')"), 0, 'login_email');
		$loginname = @mysql_result(mysql_query("SELECT first_name FROM login WHERE login_id = (SELECT login_id FROM postad WHERE ad_id = '".$this->input->post('ad_id')."')"), 0, 'first_name');
		$deal_tag = @mysql_result(mysql_query("SELECT deal_tag FROM postad WHERE ad_id = '".$this->input->post('ad_id')."'"), 0, 'deal_tag');
		 $config = Array(
                 'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => '99rightdeals@googlemail.com',
                'smtp_pass' => 'S@ibaba2016',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
                 );
				 $this->load->library('email', $config);
                 $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('busemail'), $this->input->post('fbkcontname'));
                $this->email->to($login_email);
                $this->email->subject("99 Right Deals::Deal Viewer Response");
                $message    =   "<div style='padding: 81px 150px;'>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
										<h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
										<img src='http://99rightdeals.com/img/maillogo.png'>
									</div>
									<div style='margin-top:20px'></div>
									<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
										<h3>Hi ".$loginname.",</h3>
										<p>Welcome to 99Rightdeals.com</p>
										<p><a href='".base_url()."description_view/details/".$this->input->post('ad_id')."/$deal_tag'>$deal_tag</a></p>
										<p>Contact Person : ".$this->input->post('fbkcontname')."</p>
										<p>Contact mobile : ".$this->input->post('feedbackno')."</p>
										<p>Contact email : ".$this->input->post('busemail')."</p>
										<p style='word-break: break-word;'>Message : ".$this->input->post('feedbackmsg')."</p>
										<p>Best Wishes,</p>
										<p>The <a href=''><strong style='color:#9FC955;'>99RightDeals </strong></a>Team</p>
									</div>
								</div>";
                $this->email->message($message);
                if (!$this->email->send()) {
                // Raise error message
                show_error($this->email->print_debugger());
                    }
                    else{
						$data = array('ad_id'=> $this->input->post('ad_id'),
										'contact_name'	=> $this->input->post('fbkcontname'),
										'mobile'	=> $this->input->post('feedbackno'),
										'email'	=> $this->input->post('busemail'),
										'message'		=> $this->input->post('feedbackmsg'),
										'created_on'	=> date("Y-m-d H:i:s"),
										'status'		=> 1
							);
							$this->db->insert("feedbackforads", $data);
							if ($this->db->affected_rows() > 0) {
								return 1;
							}
							else{
								return 0;
							}
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
						'created_on'	=> date("Y-m-d H:i:s"),
						'status'	=> 1
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
		$this->db->where('status', 1);
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

	public function likes_total(){
		$this->db->select("*");
		$this->db->where('ad_id', $this->uri->segment(3));
		$res = $this->db->get("postad");
		return $res->row("likes_count");
	}

	/*recommanded ads*/
	public function recommanded_ads(){
		$qr = mysql_query("SELECT * FROM postad WHERE ad_id='".$this->uri->segment(3)."'");
		$catid = @mysql_result($qr,0,'category_id');
		$subid = @mysql_result($qr,0,'sub_cat_id');
		$title = @mysql_result($qr,0,'deal_tag');
		$this->db->select("ads.*, img.*,ud.valid_to AS urg");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ads.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ads");
		$this->db->join("ad_img as img", "img.ad_id = ads.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ads.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ads.ad_status", "1");
		$this->db->where("((ads.package_type =2 OR ads.package_type = 5) OR (ads.package_type =3 OR ads.package_type = 6))");
		$this->db->where("ads.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->where("(ads.category_id = $catid)");
		$this->db->where("(ads.ad_id != '".$this->uri->segment(3)."')");
		$this->db->group_by('img.ad_id');
		$this->db->order_by('ads.approved_on', 'DESC');
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
	public function pickup_deals($data){
		$dealtitle = $this->session->userdata('dealtitle');
		$dealprice = $this->session->userdata('dealprice');
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('favourite_deals as fav', "fav.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where('fav.login_id', $this->session->userdata('login_id'));
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
		$this->db->order_by("fav.id", "DESC");
		$res = $this->db->get('postad AS ad', $data['limit'], $data['start']);
		return $res->result();
	}

	public function pickup_deals_count(){
		$dealtitle = $this->session->userdata('dealtitle');
		$dealprice = $this->session->userdata('dealprice');
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('favourite_deals as fav', "fav.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where('fav.login_id', $this->session->userdata('login_id'));
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
		$this->db->order_by("fav.id", "DESC");
		$res = $this->db->get();
		return $res->result();
	}

	public function pickup_deals_search(){
		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count,ud.valid_to AS urg,ad.ad_id as adid");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
	  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad as ad");
		$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
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
			$this->db->order_by('ad.approved_on', 'DESC');
		}
		$this->db->order_by('ad.approved_on', 'DESC');
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

	public function favexists(){
		$this->db->select("*");
		$this->db->from("favourite_deals");
		$this->db->where('ad_id', $this->session->userdata('favadid'));
        $this->db->where('login_id', $this->session->userdata('login_id'));
        return $this->db->count_all_results();
	}

	public function likexists(){
		$this->db->select("*");
		$this->db->from("likes_deals");
		$this->db->where('ad_id', $this->session->userdata('likeadid'));
        $this->db->where('login_id', $this->session->userdata('login_id'));
        return $this->db->count_all_results();
	}

	public function add_fav(){
		$data = array('ad_id'=> $this->session->userdata('favadid'),
						'login_id'	=> $this->session->userdata('login_id'),
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

	public function remove_fav(){
			$wr = array(
			'ad_id'=> $this->session->userdata('favadid'),
			'login_id'	=> $this->session->userdata('login_id')
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
				$this->db->where('ad_id', $this->input->post('ad_id'));
				$this->db->set('likes_count', 'likes_count+1', FALSE);
				$this->db->update('postad');
				return 1;
			}
			else{
				return 0;
			}
	}

	public function addlikeslogin(){
		$data = array('ad_id'=> $this->session->userdata('likeadid'),
			'login_id'	=> $this->session->userdata('login_id'));
			$this->db->insert("likes_deals", $data);
			if ($this->db->affected_rows() > 0) {
				$this->db->where('ad_id', $this->session->userdata('likeadid'));
				$this->db->set('likes_count', 'likes_count+1', FALSE);
				$this->db->update('postad');
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
				$this->db->where('ad_id', $this->input->post('ad_id'));
				$this->db->set('likes_count', 'likes_count-1', FALSE);
				$this->db->update('postad');
				return 1;
			}
			else{
				return 0;
			}
	}

	public function removelikeslogin(){
			$wr = array(
			'ad_id'=> $this->session->userdata('likeadid'),
			'login_id'	=> $this->session->userdata('login_id')
			);
			$this->db->delete("likes_deals", $wr);
			if ($this->db->affected_rows() > 0) {
				$this->db->where('ad_id', $this->session->userdata('likeadid'));
				$this->db->set('likes_count', 'likes_count-1', FALSE);
				$this->db->update('postad');
				return 1;
			}
			else{
				return 0;
			}
	}

	/*likes count*/
	public function likes_count(){
		$qry = $this->db->query("SELECT * FROM postad WHERE ad_id = '".$this->input->post('ad_id')."'");
		$qry1 = $qry->row();
		return $qry1->likes_count;
	}

	/*ads for services in services search */
	public function services_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
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
	public function serviceprof_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.sub_cat_id", "9");
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
	public function servicepop_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.sub_cat_id", "10");
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
	public function count_services_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
		
	}
	public function count_serviceprof_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.sub_cat_id", "9");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
		
	}
	public function count_servicepop_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "2");
		$this->db->where("ad.sub_cat_id", "10");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
		
	}

		/*ads for jobs in jobs search */
	public function jobs_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "1");
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

	public function count_jobs_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "1");
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

	/*ads for jobs in pets search */
	public function count_pets_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}

	public function pets_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "5");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get("postad AS ad", $data['limit'], $data['start']);
		// echo $this->db->last_query(); exit;
		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*motor search*/
	public function count_motor_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_ezone_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_phones_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "59");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_homes_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "60");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_smalls_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "61");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_lappy_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "62");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_access_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "63");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_pcare_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "64");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_entertain_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "65");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_poto_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "66");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_plants_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "17");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_farming_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "18");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_motoraccessories_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "73");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_boats_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "19");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function plants_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "17");
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
	public function farming_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "18");
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
	public function motoraccessories_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "73");
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
	public function boats_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "19");
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
	/*cars search*/
	public function count_cars_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "12");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_carvans_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "14");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_coaches_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "16");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	public function count_vans_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "15");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}
	/*count_bikes_scoters_view search*/
	public function count_bikes_scoters_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "13");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
		$m_res = $this->db->get();

		return $m_res->result();
	}

	public function motor_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "3");
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
	public function ezone_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
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

	public function phones_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "59");
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
	public function homes_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "60");
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
	public function smalls_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "61");
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
	public function lappy_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "62");
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
	public function access_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "63");
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
	public function pcare_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "64");
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
	public function entertain_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "65");
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
	public function poto_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "8");
		$this->db->where("ad.sub_cat_id", "66");
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

	public function cars_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "12");
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
	public function carvans_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "14");
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
	public function vans_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "15");
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
	public function coaches_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "16");
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
	public function bikes_scoters_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,lg.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "3");
		$this->db->where("ad.sub_cat_id", "13");
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

	/*ads for kitchen_view search */
	public function kitchenhome_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "7");
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

	public function count_kitchenhome_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "7");
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

	/*ads for find a property search */
	public function find_property_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
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

	public function find_propertyresi_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.sub_cat_id", "11");
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

	public function find_propertycomm_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.sub_cat_id", "26");
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

	public function count_find_property_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
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

	public function count_find_propertyresi_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.sub_cat_id", "11");
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

	public function count_find_propertycomm_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "4");
		$this->db->where("ad.sub_cat_id", "26");
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

	/*ads for clothstyle in clothstyle search */
	public function clothstyle_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "20");
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
	public function count_women_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "20");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "21");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		//$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "21");
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
	public function count_boys_view(){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "22");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "23");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "24");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->from("postad AS ad");
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "25");
		$this->db->where("ad.ad_status", "1");
		$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
		$this->db->group_by(" img.ad_id");
		$this->db->order_by('ad.approved_on', 'DESC');
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
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "22");
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
	public function girls_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "23");
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

	public function baby_boy_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "24");
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
	public function baby_girl_view($data){
		$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*,ud.valid_to AS urg,pdl.*
");
		$this->db->select("DATE_FORMAT(STR_TO_DATE(ad.created_on,
  		'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') as dtime", FALSE);
		$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
		$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
		$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
		$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
		$this->db->where("ad.category_id", "6");
		$this->db->where("ad.sub_cat_id", "25");
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

	public function addsaved_search(){
		$data = array(
					  'login_id' => $this->session->userdata("login_id"),
					  'search_title' => $this->input->post("search_title"),
					  'search_cat' => $this->input->post("search_cat"),
					  'save_search' => $this->session->userdata("saved_search"),
					  'search_loc' => $this->input->post("search_loc"),
					  'saved_on' => date("Y-m-d H:i:s"));
		$this->db->insert("saved_searchs", $data);
		if ($this->db->affected_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function addsavedsearchlogin(){
		$a = $this->session->userdata('saveddata');
		$data = array(
					  'login_id' => $this->session->userdata("login_id"),
					  'search_title' => $a["search_title"],
					  'search_cat' => $a["search_cat"],
					  'save_search' => $this->session->userdata("saved_search"),
					  'search_loc' => $a["search_loc"],
					  'saved_on' => date("Y-m-d H:i:s"));
		$this->db->insert("saved_searchs", $data);
		if ($this->db->affected_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function addexist_search(){
		$this->db->where("save_search", $this->session->userdata("saved_search"));
		$this->db->where("login_id", $this->session->userdata("login_id"));
		$rs = $this->db->count_all_results("saved_searchs");
		return $rs;
	}

	public function hotdealsexists(){
		$this->db->where("save_search", $this->session->userdata("saved_search1"));
		$this->db->where("login_id", $this->session->userdata("login_id"));
		$rs = $this->db->count_all_results("saved_searchhot");
		return $rs;
	}

	public function addsaved_hotdeals(){
		$data = array(
					  'login_id' => $this->session->userdata("login_id"),
					  'bus_consumer' => $this->session->userdata("bus_id"),
					  'search_cat' => $this->session->userdata("cat_id"),
					  'save_search' => $this->session->userdata("saved_search1"),
					  'search_loc' => $this->session->userdata("location"),
					  'saved_on' => date("Y-m-d H:i:s"));
		$this->db->insert("saved_searchhot", $data);
		if ($this->db->affected_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function savedsearch_count(){
		$this->db->where("login_id", $this->session->userdata("login_id"));
		$rs = $this->db->count_all_results("saved_searchs");
		return $rs;
	}

	public function savedsearch_list(){
		$this->db->select();
		$this->db->from("saved_searchs");
		$this->db->where("login_id", $this->session->userdata("login_id"));
		$rs = $this->db->get();
		return $rs->result();
	}

	public function deletesave_search(){
			$wr = array(
			'id'=> $this->input->post('s_id'),
			'login_id'	=> $this->input->post('login_id')
			);
			$this->db->delete("saved_searchs", $wr);
			if ($this->db->affected_rows() > 0) {
				return 1;
			}
			else{
				return 0;
			}
	}

		public function subscribe_news(){
				$this->db->where("nl_email", $this->input->post("email"));
				$rs = $this->db->count_all_results("newsletter");
				if ($rs > 0) {
					return 1;
				}
				else{
					$ins = array(
					'nl_name'=> $this->input->post('name'),
					'nl_email'	=> $this->input->post('email'),
					'created_on' => date("Y-m-d H:i:s"),
					'status' =>1
					);
					$this->db->insert("newsletter", $ins);
					return 0;
				}
		}

		public function saved_searchexist(){
			$this->db->select("save_search");
			$this->db->from("saved_searchs");
			$this->db->where("login_id", $this->session->userdata("login_id"));
			$rs = $this->db->get();
			// echo $this->db->last_query(); exit;
			return $rs->result();
		}

		public function search_exists(){
			$this->db->select("COUNT(*) as no_search");
			$this->db->from("saved_searchs");
			$this->db->where("login_id", $this->session->userdata("login_id"));
			$this->db->where("search_title", $this->input->post("title"));
			$this->db->where("search_cat", $this->input->post("cat"));
			$this->db->where("search_loc", $this->input->post("loc"));
			$rs = $this->db->get();
			return $rs->row("no_search");
		}

		public function hotsearch_exists(){
			$this->db->select("COUNT(*) as no_search");
			$this->db->from("saved_searchhot");
			$this->db->where("login_id", $this->session->userdata("login_id"));
			$this->db->where("bus_consumer", $this->session->userdata("bus_id"));
			$this->db->where("search_cat", $this->session->userdata("cat_id"));
			$this->db->where("search_loc", $this->session->userdata("location"));
			$rs = $this->db->get();
			return $rs->row("no_search");
		}


		public function contactus_create(){
			$config = Array(
				            'protocol' => 'smtp',
				            'smtp_host' => 'ssl://smtp.googlemail.com',
				            'smtp_port' => 465,
				            'smtp_user' => '99rightdeals@googlemail.com',
				            'smtp_pass' => 'S@ibaba2016',
				            'mailtype'  => 'html',
				            'charset'   => 'iso-8859-1'
				             );
			$this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post('contact_email'), $this->input->post('contact_name'));
            $this->email->to('support@99rightdeals.com');
            $this->email->subject($this->input->post('subject'));
            $message    =   "<div style='padding: 81px 150px;'>
								<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 10px;background-color: #9FC955;'>
									<h2 style='color: #fff;padding-top: 10px;float:right;'><span>WELCOME </span></h2>
									<img src='http://99rightdeals.com/img/maillogo.png'>
								</div>
								<div style='margin-top:20px'></div>
								<div style='border: 2px solid #9FC955;border-radius: 20px;padding: 23px;'>
									<h2>Customer details</h2>
									<table border='0'><tr><td style='width: 100px;'>Contact Name </td><td>".$this->input->post('contact_name')."</td></tr>
									<tr><td style='width: 100px;'>Contact Email </td><td>".$this->input->post('contact_email')."</td></tr>
									<tr><td style='width: 100px;'>Contact Number </td><td>".$this->input->post('contact_no')."</td></tr>
									<tr><td style='width: 100px;' valign='top'>Message </td><td style='word-break: break-all;'>".$this->input->post('contact_message')."</td></tr>
									</table>
									<p>Best Wishes,</p>
									<p>The <a href=''><b style='color:#9FC955;'>99RightDeals </b></a>Team</p>
								</div>
							</div>";
            $this->email->message($message);
            if (!$this->email->send()) {
                // Raise error message
                show_error($this->email->print_debugger());
                    }
                    else{
                    	$ins = array(
						'cname'=> $this->input->post('contact_name'),
						'subject'=> $this->input->post('subject'),
						'email'	=> $this->input->post('contact_email'),
						'mobile'	=> $this->input->post('contact_no'),
						'msg'	=> $this->input->post('contact_message'),
						'posted_on' => date("Y-m-d H:i:s")
						);
						$this->db->insert("contactus", $ins);
						if ($this->db->affected_rows() > 0) {
							return 1;
						}
						else{
							return 0;
						}
                    }
		}

		
		/*jobs count*/
		public function jobscnt(){
			$data = date("Y-m-d H:i:s");
        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=27 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS acnts,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=28 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS constr,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=29 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS finan,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=30 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS bank,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=31 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS build,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=32 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS sales,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=33 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS news,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=34 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS retail,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=35 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS supp,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=36 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS it,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=37 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS hard,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=38 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS health,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=39 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS human,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=40 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS office,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=41 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS drive,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=42 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS pa,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=43 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS archi,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=44 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS cater,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=45 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS front,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=46 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS plumb,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=47 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS chem,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=48 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS engg,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=49 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS logi,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=50 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS mech,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=51 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS dent,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=52 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS manage,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=53 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS tele,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=54 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS petrol,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=55 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS powerengg,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=56 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS grad,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=57 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS nurse,
		(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
		AND ad.`category_id` = '1' AND ad.`sub_cat_id`=58 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS misc");
			return $this->db->get()->result();
		}
		/*services prof and popular*/
		public function profpopcnt(){
			$data = date("Y-m-d H:i:s");
			        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS prof,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS pop");
			return $this->db->get()->result();
		}

		public function prof_cnt(){
			$data = date("Y-m-d H:i:s");
			        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 25 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS coach,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 26 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS bus,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 27 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS party,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 28 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS it,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 29 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS solic,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 30 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS acnt,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 31 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS home,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 32 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS doctor,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 33 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS nurse,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 34 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS astr,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 35 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS loan,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 36 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS funeral,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=9 AND ad.sub_scat_id = 37 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS health");
			return $this->db->get()->result();
			}

		public function spop_cnt(){
			$data = date("Y-m-d H:i:s");
			        	$this->db->select("(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 38 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS dry,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 39 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS house,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 40 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS travel,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 41 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS massage,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 42 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS comm,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 43 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS enter,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 44 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS motor,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 45 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS logi,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 46 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS rest,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 47 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS frnd,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 48 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS nanni,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 49 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS embro,
						(SELECT COUNT(*) FROM postad AS ad, `sub_category` AS scat WHERE scat.sub_category_id = ad.sub_cat_id
						AND ad.`category_id` = '2' AND ad.`sub_cat_id`=10 AND ad.sub_scat_id = 50 AND ad.ad_status = 1 AND ad.expire_data >='$data') AS others");
			return $this->db->get()->result();
			}

			public function count_viewall_sigads(){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 3 OR ad.package_type = 6)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_sigads($data){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 3 OR ad.package_type = 6)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			public function count_viewall_sigads1(){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 3 OR ad.package_type = 6)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_sigads1($data){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 3 OR ad.package_type = 6)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}


			/*most valued view all ads*/
			public function count_viewallmostads(){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 2 OR ad.package_type = 5)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_mostads($data){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 2 OR ad.package_type = 5)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			public function count_viewall_mostads1(){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 2 OR ad.package_type = 5)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_mostads1($data){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("(ad.package_type = 2 OR ad.package_type = 5)");
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			/*view all business deals*/
			public function count_viewallbusiness(){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'business');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_business($data){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'business');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			public function count_viewall_business1(){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'business');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_business1($data){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'business');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			/*view all consumer deals*/
			public function count_viewallconsumer(){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'consumer');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_consumer($data){
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'consumer');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				$this->db->order_by('ad.approved_on', 'DESC');
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

			public function count_viewall_consumer1(){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->from("postad AS ad");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'consumer');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get();
				return $m_res->result();
			}

			public function viewall_consumer1($data){
				$dealtitle = $this->session->userdata('dealtitle');
	        	$dealprice = $this->session->userdata('dealprice');
	        	$recentdays = $this->session->userdata('recentdays');
				$this->db->select("ad.*, img.*, COUNT(`img`.`ad_id`) AS img_count, loc.*, lg.*,ud.valid_to AS urg,ad.ad_id as adid,pdl.*");
				$this->db->join("ad_img AS img", "img.ad_id = ad.ad_id", "join");
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->join('login as lg', "lg.login_id = ad.login_id", 'join');
				$this->db->join("urgent_details AS ud", "ud.ad_id=ad.ad_id AND ud.valid_to >= '".date("Y-m-d H:i:s")."'", "left");
				$this->db->join('pkg_duration_list as pdl', "pdl.pkg_dur_id = ad.package_type", 'left');
				$this->db->where("ad.ad_type",'consumer');
				$this->db->where("ad.ad_status", "1");
				$this->db->where("ad.expire_data >= ", date("Y-m-d H:i:s"));
				$this->db->group_by(" img.ad_id");
				/*deal posted days 24hr/3day/7day/14day/1month */
					if ($recentdays == 'last24hours'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 day")));
					}
					else if ($recentdays == 'last3days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-3 days")));
					}
					else if ($recentdays == 'last7days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-7 days")));
					}
					else if ($recentdays == 'last14days'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-14 days")));
					}	
					else if ($recentdays == 'last1month'){
						$this->db->where("ad.approved_on >=", date("Y-m-d H:i:s", strtotime("-1 month")));
					}
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
						$this->db->order_by('ad.approved_on', 'DESC');
					}
				$m_res = $this->db->get('postad AS ad', $data['limit'],$data['start']);
				if($m_res->num_rows() > 0){
					return $m_res->result();
				}
				else{
					return array();
				}
			}

		

}



?>