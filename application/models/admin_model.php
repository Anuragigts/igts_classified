<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_model extends CI_Model{
        public function login(){
                $this->db->select("l.*,");
                $this->db->from("login as l");
                //$this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->where("l.login_email",$this->input->post("email"));
                $this->db->where("l.login_password",md5($this->input->post("password")));
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
					$this->db->select('');
					$this->db->from('postad');
					$post_add_details = $this->db->get()->result();
					//echo '<pre>';print_r($post_add_details);echo '</pre>';//exit;
					//echo $this->db->last_query();exit;
					foreach($post_add_details as $add){
						if($add->ad_status == 1)
							$ad_active++;
						else if($add->ad_status == 2)
							$ad_hold++;
						else if($add->ad_status == 3)
							$ad_pending++;
						else if($add->ad_status == 4)
							$ad_reject++;
						else if($add->ad_status == 0)
							$new++;
					}
					$ad_session =array(
								'active_ad'		=>	$ad_active,
								'ad_hold'		=>	$ad_hold,
								'ad_pending'	=>	$ad_pending,
								'ad_reject'		=>	$ad_reject,
								'new'			=>	$new,
								);
					$this->session->set_userdata($ad_session);
					$this->session->set_userdata($uq->row_array());
					return 1;                        
                }
                else{
					return 0;
                }
        }
		public function get_assigned_cats(){
			$log_id = $this->session->userdata('login_id');
			$this->db->select('cat_ids');
			$this->db->where('status',1);
			$this->db->where('staff_id',$log_id);
			$this->db->from('manage_module');
			$cats = $this->db->get()->row();
			//echo $this->db->last_query();exit;
			return $cats;
		}
        public function insert_user(){
			//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
                $login      =   array(
                                        "user_type"         =>      2,
                                        "login_email"       =>      $this->input->post("email"),
                                        "login_password"    =>      md5($this->input->post("password")),
                                        "is_confirm"        =>      'confirm',
                                        "login_status"      =>      1,
										"first_name"        =>      strtolower($this->input->post("first_name")),
                                        "lastname"         =>       strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
										"profile_img"       =>      "avatar.jpg"
                                );
                $this->db->insert("login",$login);
                $login_id   =   $this->db->insert_id();
                /*$profile    =   array(
                                        "login_id"          =>      $login_id,
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                        "phone"             =>      $this->input->post("phone")?$this->input->post("phone"):"N/A",
                                        "profile_img"       =>      "avatar.jpg"
                                ); 
                $this->db->insert("profile",$profile);  */              
               
                if($this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                }
        }
        public function getCustomers(){
                $this->db->select("l.*,p.*,a.*,c.City_name,s.State_name,d.Country_name");
                $this->db->from("login as l");
                $this->db->order_by("l.login_id","desc");
                $uq     =     $this->db->get();
                if($this->db->affected_rows() > 0){
                        return $uq->result();                        
                }
                else{
                        return array();
                }
        }
        public function getCustomerid($uri){
                $this->db->select("l.*,a.*");
                $this->db->from("login as l");
                //$this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->join("address as a","a.login_id = l.login_id","inner");                
                $this->db->where("l.login_id",$uri);
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
                        return $uq->row_array();                        
                }
                else{
                        return array();
                }
        }
        public function update_user($uri){
                $login_id   =  array("login_id" => $uri);
                $profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "lastname"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                ); 
                $this->db->update("login",$profile,$login_id);     
                $vp     =   $this->db->affected_rows();
                
                if($vp > 0 || $this->db->affected_rows() > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
		function get_userlist(){
			$seg_type = $this->uri->segment(3);
			if($seg_type == 'business')
				$user_type='6';
			else
				$user_type='7';
			
			if($seg_type!=''){
				$this->db->select("l_in.*");
				$this->db->where('l_in.user_type',$user_type);
                $this->db->from("login as l_in");
                //$this->db->join("profile as p","l_in.login_id = p.login_id","inner");
				$info = $this->db->get()->result();
				return $info;
			}
		}
		function add_new_staff(){
			//echo '<pre>';print_r($this->input->post());echo '</pre>';//exit;
			$ins_data = array(
					'user_type'		=>	$this->input->post('staff_type'),
					'login_email'		=>	$this->input->post('login_email'),
					'login_password'		=>	md5($this->input->post('staff_pw')),
					'login_status'		=>	$this->input->post('staff_status'),
					"first_name"        =>      strtolower($this->input->post("staff_f_name")),
					"lastname"         =>      strtolower($this->input->post("staff_l_name")),
					"mobile"             =>      $this->input->post("con_number"),
			);
			$this->db->insert('login',$ins_data);
			$staff_id = $this->db->insert_id();
			
			 /*$profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("staff_f_name")),
                                        "last_name"         =>      strtolower($this->input->post("staff_l_name")),
                                        "phone"             =>      $this->input->post("con_number"),
										"login_id"          =>     	$staff_id,
                                ); 
				$this->db->insert("profile",$profile); */
				return true;
				
				
		}
		function get_staffType(){
			$this->db->select();
			$this->db->from('user_type');
			$user_type = $this->db->get()->result();
			return $user_type;
		}
		function get_postad_categories(){
			$this->db->select();
			$this->db->from('catergory');
			$user_type = $this->db->get()->result();
			return $user_type;
		}
		function get_user_status(){
			$this->db->select();
			$this->db->from('user_status');
			$user_status = $this->db->get()->result();
			return $user_status;
		}
		function getListStaff(){
			$sess_user_type = $this->session->userdata('user_type');
			$this->db->select();
			
			if($this->uri->segment(3)!=''){
				$user_type = $this->uri->segment(3);
			}
			
			if($sess_user_type < $user_type && $user_type != 7){
				$this->db->where('l.user_type',$user_type);
			}
			else{
				return array();
			}
		
			$this->db->from('login as l');
			$this->db->order_by("l.login_id","desc");
			//$this->db->join("profile as p","l.login_id = p.login_id","inner");
			$this->db->join("user_status as us","us.user_status_id = l.login_status","inner");
			$staff = $this->db->get()->result();
			//echo $this->db->last_query();exit;
			return $staff;
		}
		function getStaff(){
			$this->db->select();
			
			if($this->uri->segment(3)!=''){
				$user_type = $this->uri->segment(3);
				$this->db->where('l.login_id',$user_type);
			}
			$this->db->from('login as l');
			$this->db->order_by("l.login_id","desc");
			//$this->db->join("profile as p","l.login_id = p.login_id","inner");
			$staff = $this->db->get()->row();
			//echo '<pre>';print_r($staff);echo '</pre>';exit;
			return $staff;
		}
		 public function update_staff(){
			
                $login_id   =  array("login_id" => $this->uri->segment(3));
                /*$profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "phone"             =>      $this->input->post("phone"),
                                ); 
				$this->db->update("profile",$profile,$login_id);*/
				//echo $this->db->last_query();
				$login_update    =   array(
                                        "login_email"        =>      strtolower($this->input->post("login_email")),
                                        "user_type"            =>      $this->input->post("user_type"),
										"login_status"            =>      $this->input->post("staff_status"),
										"first_name"        =>      strtolower($this->input->post("first_name")),
                                        "lastname"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"             =>      $this->input->post("phone"),
                                );
                $this->db->update("login",$login_update,$login_id);  
				//echo $this->db->last_query();
                $vp     =   $this->db->affected_rows();//exit;
              //echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
			  
                if($vp > 0){
                        return 1;
                }else{
                        return 0;
                } 
        }
		function change_user_status(){
			$user_ids = explode(',',rtrim($this->input->post('selected_users'),','));
			$this->db->set('login_status',$this->input->post('change_status'));
			$this->db->where_in('login_id',$user_ids);
			$update_Status = $this->db->update('login');
			$vp     =   $this->db->affected_rows();
			if($vp > 0){
					return 1;
			}else{
					return 0;
			} 
		}
		function get_adsdetails(){
			$sql = "SELECT DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d') AS dtime , COUNT(*) AS no_ads, package_type FROM(`postad` AS ad) WHERE DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d')>= DATE(NOW()) - INTERVAL 30 DAY GROUP BY dtime, package_type order by dtime desc";


			$query = $this->db->query($sql);

			$last_weak_ads = $query->result();
			return $last_weak_ads;
			//echo $this->db->last_query();

			//echo '<pre>';print_r($last_weak_ads);echo '</pre>';exit;
		}
		function get_no_of_ads(){
			//$this->load->model("ads_model");
			$cats = $this->get_assigned_cats();
			$this->db->select('count(*) as ads_count, p_ad.package_type,pkg_l.pkg_dur_name,pkg_l.pkg_dur_name');
			
			$this->db->from('postad as p_ad');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('category_id',$cats_list);
			}
			$this->db->where_in('pkg_l.status',1);
			$this->db->join("pkg_duration_list as pkg_l","p_ad.package_type = pkg_l.pkg_dur_id","inner");
			$this->db->group_by('p_ad.package_type');
			
			$count_ads = $this->db->get()->result();
			//echo $this->db->last_query();//exit;
			return $count_ads;
		}
		function get_pkg_details(){
			$this->db->select();
			$this->db->where_in('status',1);
			$this->db->from('pkg_duration_list');
			$pkg_details = $this->db->get()->result();
			return $pkg_details;
		}
		function get_latest_ads(){
			$date = date('Y-m-d H:i:s');
			$qry = $this->db->query("SELECT *, DATE_FORMAT(STR_TO_DATE(created_on,
			'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') AS n FROM (`postad`)
			WHERE DATE_FORMAT(STR_TO_DATE(created_on,
			'%d-%m-%Y %H:%i:%s'), '%Y-%m-%d %H:%i:%s') < '$date'
			ORDER BY n DESC LIMIT 10");
			$qry1 = $qry->result();
			return $qry1;
		}
		function get_profile_details(){
			$this->db->select();
			$this->db->where('l.login_id', $this->session->userdata('login_id'));
			//$this->db->join("profile as p","p.login_id = l.login_id","inner");
			$profile = $this->db->get('login as l')->row();
			return $profile;
		}
		function get_reports_count(){
			$this->db->select('r_ad.status, count(r_ad.status) as r_count');
			//$this->db->where('r_ad.login_id', $this->session->userdata('login_id'));
			//$this->db->join("profile as p","p.login_id = l.login_id","inner");
			$this->db->group_by('r_ad.status');
			$this->db->order_by('r_ad.status');
			$reports_count = $this->db->get('reportforads as r_ad')->result();
			
			return $reports_count;
		}
		function get_feedback_count(){
			$this->db->select('f_back.status, count(f_back.status) as f_count');
			$this->db->group_by('f_back.status');
			$this->db->order_by('f_back.status');
			$feedback_count = $this->db->get('feedbackforads as f_back')->result();
			return $feedback_count;
		}
		
	function get_Feedbacks(){
		$cats = $this->get_assigned_cats();
		$this->db->select();
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}
		if($this->uri->segment(3) !=''){
			//echo $this->uri->segment(3);
			$f_type = $this->uri->segment(3);
			if($f_type == 1 || $f_type == 0)
				$this->db->where('f_ad.status',$f_type);
		}
		$this->db->join('postad as p','p.ad_id = f_ad.ad_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		$this->db->from('feedbackforads as f_ad');
		$all_feedbacks = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($all_feedbacks);echo '</pre>';exit;
		return $all_feedbacks;
	}
	function get_FeedbacksByAds(){
		$cats = $this->get_assigned_cats();
		//$this->db->select();
		$this->db->select('l.login_email,l.first_name,l.lastname,l.mobile, COUNT(f_ad.ad_id) as report_count,p.deal_tag,cat.category_name,pkg_list.pkg_dur_name as pkg_name,p.ad_id');
		
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p.category_id',$cats_list);
		}
		$this->db->group_by('f_ad.ad_id');;
		$this->db->join('postad as p','p.ad_id = f_ad.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		if($this->uri->segment(3)){
			$f_type = $this->uri->segment(3);
			if($f_type == 1 || $f_type == 0)
				$this->db->where('f_ad.status',$f_type);
		}
		$this->db->join('login as l','l.login_id = p.login_id','inner');
		$this->db->from('feedbackforads as f_ad');
		$all_feedbacks = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($all_feedbacks);echo '</pre>';exit;
		return $all_feedbacks;
	}
	function getAdfeedbacks(){
		$ad_id = $this->uri->segment(3);
		$this->db->select();
		$this->db->where('f_ad.ad_id',$ad_id);
		$this->db->join('postad as p','p.ad_id = f_ad.ad_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		$this->db->from('feedbackforads as f_ad');
		$all_feedbacks = $this->db->get()->result();
		//echo '<pre>';print_r($all_feedbacks);echo '</pre>';exit;
		return $all_feedbacks;
	}
	function get_reportforads(){
		$cats = $this->get_assigned_cats();
		$this->db->select('r_ad.*, r_ad.created_on as r_created,pkg_list.*,p.ad_prefix,p.ad_id,p.deal_tag,p.price,cat.category_name');
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p.category_id',$cats_list);
		}
		if($this->uri->segment(3)){
			$r_type = $this->uri->segment(3);
			if($r_type == 1 || $r_type == 0)
				$this->db->where('r_ad.status',$r_type);
		}
		$this->db->join('postad as p','p.ad_id = r_ad.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		$this->db->from('reportforads as r_ad');
		$all_reports = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($all_reports);echo '</pre>';exit;
		return $all_reports;
	}
	function get_ReportsByAds(){
		$cats = $this->get_assigned_cats();
		//$this->db->select();
		$this->db->select('l.login_email,l.first_name,l.lastname,l.mobile, COUNT(r_ad.ad_id) as report_count,p.deal_tag,cat.category_name,pkg_list.pkg_dur_name as pkg_name,p.ad_id,r_ad.created_on');
		
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p.category_id',$cats_list);
		}
		$this->db->join('postad as p','p.ad_id = r_ad.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		$this->db->join('login as l','l.login_id = p.login_id','inner');
		$this->db->group_by('r_ad.ad_id');
		$this->db->order_by('r_ad.created_on','desc');
		$this->db->from('reportforads as r_ad');
		$all_reports = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($all_reports);echo '</pre>';exit;
		return $all_reports;
	}
	function getAdReports(){
		$ad_id = $this->uri->segment(3);
		$this->db->select('r_ad.ad_id,r_ad.name,r_ad.created_on,p.ad_id,p.price,pkg_list.pkg_dur_name,p.ad_prefix,p.deal_tag,cat.*');
		$this->db->where('r_ad.ad_id',$ad_id);
		$this->db->join('postad as p','p.ad_id = r_ad.ad_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p.package_type','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->from('reportforads as r_ad');
		$all_reports = $this->db->get()->result();
		//echo '<pre>';print_r($all_reports);echo '</pre>';exit;
		return $all_reports;
	}
	function get_FilterReports($filter_details){
		//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
		$cats = $this->get_assigned_cats();
		$this->db->select();
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}
		if($filter_details['start_date'] !='')
			$this->db->where('r_ad.created_on >=', date( 'Y-m-d H:i:s',strtotime($filter_details['start_date'])));
		if($filter_details['end_date'] !='')
			$this->db->where('r_ad.created_on <=', date( 'Y-m-d H:i:s',strtotime($filter_details['end_date'])));
		if($filter_details['pkg_type'] != 0 && $filter_details['pkg_type'] !='')
			$this->db->where('p_ad.package_type',$filter_details['pkg_type']);
		if($filter_details['cat_type'] != 0 && $filter_details['cat_type'] != '')
			$this->db->where('r_ad.cat_id',$filter_details['cat_type']);
		
		$this->db->join('postad as p_ad','p_ad.ad_id = r_ad.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = r_ad.cat_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_ad.package_type','inner');
		$this->db->from('reportforads as r_ad');
		$all_reports = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($all_reports);echo '</pre>';exit;
		return $all_reports;
	}
	function get_monthly_ads_count(){
		$sql = "SELECT DATE_FORMAT(STR_TO_DATE(pay.payment_date, '%Y-%m-%d'),'%Y-%m-%d') AS dtime ,SUM(pay.gross_amt) as t_paid FROM(`payments` AS pay) WHERE DATE_FORMAT(STR_TO_DATE(pay.payment_date, '%Y-%m-%d'),'%Y-%m-%d')>= DATE(NOW() - INTERVAL 1 YEAR) GROUP BY EXTRACT(YEAR_MONTH FROM dtime) order by dtime desc ";
		
		//$sql = "SELECT DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d') AS dtime , COUNT(*) AS no_ads,SUM(ad.paid_amt)as t_paid, ad.payment_status FROM(`postad` AS ad) WHERE  DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d')>= DATE(NOW() - INTERVAL 1 YEAR) AND ad.payment_status=1 GROUP BY EXTRACT(YEAR_MONTH FROM dtime), ad.payment_status order by dtime desc,ad.payment_status desc ";
		
		
		//$sql = "SELECT DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d') AS dtime , COUNT(*) AS no_ads FROM(`postad` AS ad) WHERE DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d')>= DATE(NOW() - INTERVAL 1 YEAR) GROUP BY EXTRACT(YEAR_MONTH FROM dtime) order by dtime desc";

		$query = $this->db->query($sql);
		$year_ads = $query->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($year_ads);echo '</pre>';
		//exit;
		return $year_ads;
	}
	
}