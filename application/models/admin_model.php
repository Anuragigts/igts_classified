<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin_model extends CI_Model{
        public function login(){
                $this->db->select("l.*,p.*");
                $this->db->from("login as l");
                $this->db->join("profile as p","l.login_id = p.login_id","inner");
                $this->db->where("l.login_email",$this->input->post("email"));
                $this->db->where("l.login_password",md5($this->input->post("password")));
                $uq     =     $this->db->get();
                //echo $this->db->last_query();exit;
                if($this->db->affected_rows() > 0){
					$this->db->select('');
					$this->db->from('postad');
					$post_add_details = $this->db->get()->result();
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
        public function insert_user(){
                $login      =   array(
                                        "user_type"         =>      2,
                                        "login_email"       =>      $this->input->post("email"),
                                        "login_password"    =>      md5($this->input->post("password")),
                                        "is_confirm"        =>      'confirm',
                                        "login_status"      =>      1
                                );
                $this->db->insert("login",$login);
                $login_id   =   $this->db->insert_id();
                $profile    =   array(
                                        "login_id"          =>      $login_id,
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                        "phone"             =>      $this->input->post("phone")?$this->input->post("phone"):"N/A",
                                        "profile_img"       =>      "avatar.jpg"
                                ); 
                $this->db->insert("profile",$profile);                
               
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
                $this->db->select("l.*,p.*,a.*");
                $this->db->from("login as l");
                $this->db->join("profile as p","l.login_id = p.login_id","inner");
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
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "mobile"            =>      $this->input->post("mobile"),
                                        "phone"             =>      $this->input->post("phone")
                                ); 
                $this->db->update("profile",$profile,$login_id);     
                $vp     =   $this->db->affected_rows();
                $addr       =   array(
                                        "house_no"          =>      $this->input->post("houseno"),
                                        "street"            =>      $this->input->post("street"),
                                        "landmark"          =>      $this->input->post("landmark"),
                                        "city"              =>      $this->input->post("city"),
                                        "state"             =>      $this->input->post("state"),
                                        "country"           =>      $this->input->post("cty"),
                                        "zip_code"          =>      $this->input->post("zipcode"),
                                        "is_default"        =>      1,
                                ); 
                $this->db->update("address",$addr,$login_id);
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
				$this->db->select("l_in.*,p.*");
				$this->db->where('l_in.user_type',$user_type);
                $this->db->from("login as l_in");
                $this->db->join("profile as p","l_in.login_id = p.login_id","inner");
				$info = $this->db->get()->result();
				return $info;
			}
		}
		function add_new_staff(){
			$ins_data = array(
					'user_type'		=>	$this->input->post('staff_type'),
					'login_email'		=>	$this->input->post('login_email'),
					'login_password'		=>	md5($this->input->post('staff_pw')),
					'login_status'		=>	0
			);
			$this->db->insert('login',$ins_data);
			$staff_id = $this->db->insert_id();
			
			 $profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("staff_f_name")),
                                        "last_name"         =>      strtolower($this->input->post("staff_l_name")),
                                        "phone"             =>      $this->input->post("con_number"),
										"login_id"          =>     	$staff_id,
                                ); 
				$this->db->insert("profile",$profile); 
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
			$this->db->join("profile as p","l.login_id = p.login_id","inner");
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
			$this->db->join("profile as p","l.login_id = p.login_id","inner");
			$staff = $this->db->get()->row();
			return $staff;
		}
		 public function update_staff(){
			
                $login_id   =  array("login_id" => $this->uri->segment(3));
                $profile    =   array(
                                        "first_name"        =>      strtolower($this->input->post("first_name")),
                                        "last_name"         =>      strtolower($this->input->post("last_name")),
                                        "phone"             =>      $this->input->post("phone"),
                                ); 
				$this->db->update("profile",$profile,$login_id);
				//echo $this->db->last_query();
				$login_update    =   array(
                                        "login_email"        =>      strtolower($this->input->post("login_email")),
                                        "user_type"            =>      $this->input->post("user_type"),
										"login_status"            =>      $this->input->post("staff_status"),
                                );
                $this->db->update("login",$login_update,$login_id);  
				echo $this->db->last_query();
                $vp     =   $this->db->affected_rows();
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
			echo $this->db->last_query();
		}
		function get_adsdetails(){
			$sql = "SELECT DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d') AS dtime , COUNT(*) AS no_ads, package_type FROM(`postad` AS ad) WHERE DATE_FORMAT(STR_TO_DATE(ad.created_on, '%d-%m-%Y'),'%Y-%m-%d')>= DATE(NOW()) - INTERVAL 25 DAY GROUP BY dtime, package_type order by dtime desc";


			$query = $this->db->query($sql);

			$last_weak_ads = $query->result();
			return $last_weak_ads;
			echo $this->db->last_query();

			echo '<pre>';print_r($last_weak_ads);echo '</pre>';exit;
		}
		function get_no_of_ads(){
			$this->load->model("ads_model");
			$cats = $this->ads_model->get_assigned_cats();
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
			$this->db->select();
			$this->db->where('created_on <', date('Y-m-d'));
			//$this->db->from('postad');
			$this->db->order_by('created_on','desc');
			$latest_ads = $this->db->get('postad',10,5)->result();
			//echo '<pre>';print_r($latest_ads);echo '</pre>';
			//echo $this->db->last_query();exit;
			return $latest_ads;
		}
		function get_profile_details(){
			$this->db->select();
			$this->db->where('l.login_id', $this->session->userdata('login_id'));
			$this->db->join("profile as p","p.login_id = l.login_id","inner");
			$profile = $this->db->get('login as l')->row();
			return $profile;
		}
}