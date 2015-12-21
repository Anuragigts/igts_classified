<?php


Class Classifed_model extends CI_model{

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


	/*over all ads for most value ads(displayed for jobs only)*/
	public function most_ads(){
		$this->db->select("`fs`.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`created_on`");
		$this->db->from("`featured` AS fs");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = fs.ad_id", "join");
		$this->db->join("ad_img AS img", "img.ad_id = fs.ad_id", "left");
		$this->db->limit('8');
		$this->db->group_by("fs.`ad_id`");
		$this->db->order_by('ads.created_on', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

/*dammy for most value ads for services */
	public function most_ads_services(){
		$this->db->select("`fs`.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`created_on`");
		$this->db->from("`featured` AS fs");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = fs.ad_id", "join");
		$this->db->join("ad_img AS img", "img.ad_id = fs.ad_id", "left");
		$this->db->limit('3');
		$this->db->group_by("fs.`ad_id`");
		$this->db->order_by('ads.created_on', 'ASC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	/*dammy for most value ads for pets */
	public function most_ads_pets(){
		$this->db->select("`fs`.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`created_on`");
		$this->db->from("`featured` AS fs");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = fs.ad_id", "join");
		$this->db->join("ad_img AS img", "img.ad_id = fs.ad_id", "left");
		$this->db->limit(4, 6);
		$this->db->group_by("fs.`ad_id`");
		$this->db->order_by('ads.created_on', 'ASC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

/*dammy for most value ads for deals */
	public function most_ads_deals(){
		$this->db->select("`fs`.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`created_on`");
		$this->db->from("`featured` AS fs");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = fs.ad_id", "join");
		$this->db->join("ad_img AS img", "img.ad_id = fs.ad_id", "left");
		$this->db->limit(1,3);
		$this->db->group_by("fs.`ad_id`");
		$this->db->order_by('ads.created_on', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

/*dammy for most value ads for ezone */
	public function most_ads_ezone(){
		$this->db->select("`fs`.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`created_on`");
		$this->db->from("`featured` AS fs");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = fs.ad_id", "join");
		$this->db->join("ad_img AS img", "img.ad_id = fs.ad_id", "left");
		$this->db->limit(4,6);
		$this->db->group_by("fs.`ad_id`");
		$this->db->order_by('ads.created_on', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}


	public function sig_ads(){
		$this->db->select("spl.*, `img`.`img_name`, ads.`title`, ads.`ad_desc`, ads.`link`, ads.`number`, 
(SELECT login_email FROM `login` WHERE login_id = ads.`login_id`) AS mail_id, ads.`created_on`");
		$this->db->from("`spotlight` AS spl");
		$this->db->join("`advertisement` AS ads", "ads.ad_id = spl.`ad_id`", "join");
		$this->db->join("ad_img AS img", "img.ad_id = spl.`ad_id`", "left");
		$this->db->group_by("spl.`ad_id`");
		$this->db->order_by('ads.created_on', 'DESC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}
	}

	public function free_ads(){
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
		$this->db->limit(8);
		$this->db->order_by('ads.created_on', 'ASC');
		$m_res = $this->db->get();

		if($m_res->num_rows() > 0){
			return $m_res->result();
		}
		else{
			return array();
		}	
	}

}



?>