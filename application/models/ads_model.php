<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ads_model extends CI_Model{
	
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
	public function get_allpostads(){
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{
						
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			//$this->db->order_by('p_add.updated_on', 'desc');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			//echo '<pre>';print_r($data[0]);echo '</pre>';
			//echo $this->db->last_query();exit;
			return $data;
		}
	}
	public function get_postad($post_add_id){
		$cats = $this->get_assigned_cats();
		$this->db->select();
		$this->db->where('ad_id',$post_add_id);
		
		//echo '<pre>';print_r($data);echo '</pre>';exit;
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('category_id',$cats_list);
		}
		$this->db->from('postad');
		$data = $this->db->get()->row();
		return $data;
	}
	public function get_postad_status(){
		$this->db->select();
		$this->db->from('ad_status');
		$data = $this->db->get()->result();
		return $data;
	}
	public function get_urgent_labelview(){
		$this->db->select();
		$this->db->from('urgent_pkg_label');
		$data = $this->db->get()->result();
		return $data;
	}
	public function update_ad(){
		//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
		if($this->input->post('ad_status') != 1){
			$admin_comment = $this->input->post('pkg_comment_admin');
		}else 
			$admin_comment = '';
		
		$prev_ad_details = $this->get_postad($this->input->post('ad_id'));
		$prev_ad_status = $prev_ad_details->ad_status;
		//echo $prev_ad_status.'----'.$this->input->post('ad_id').'----'.$this->input->post('ad_status');
		/*
		$active_ad = $this->session->userdata('active_ad');
		$new = $this->session->userdata('new');
		$ad_hold = $this->session->userdata('ad_hold');
		$ad_pending = $this->session->userdata('ad_pending');
		$ad_reject = $this->session->userdata('ad_reject');
		
		if($prev_ad_status == 1){
			$active_ad = $active_ad--;
			$this->session->unset_userdata('active_ad');
			$this->session->set_userdata('active_ad',$active_ad);
		}else if($prev_ad_status == 0){
			$new = $new--;
			$this->session->unset_userdata('new');
			$this->session->set_userdata('new',$new);
		}else if($prev_ad_status == 2){
			$ad_hold = $ad_hold--;
			$this->session->unset_userdata('ad_hold');
			$this->session->set_userdata('ad_hold',$ad_hold);
		}else if($prev_ad_status == 3){
			$ad_pending = $ad_pending--;
			$this->session->unset_userdata('ad_pending');
			$ad_pending = $ad_pending--;
			$this->session->set_userdata('ad_pending',$ad_pending);
		}else{
			$this->session->unset_userdata('ad_reject');
			$ad_reject = $ad_reject--;
			$this->session->set_userdata('ad_reject',$ad_reject);
		}
	 
	
		if($this->input->post('ad_status') == 1){
			$active_ad = $active_ad++;
			$this->session->unset_userdata('active_ad');
			$this->session->set_userdata('active_ad',$active_ad);
		}
		else if($this->input->post('ad_status') == 2){
			$ad_hold = $ad_hold++;
			$this->session->unset_userdata('ad_hold');
			$this->session->set_userdata('ad_hold',$ad_hold);
		}
		else if($this->input->post('ad_status') == 3){
			$ad_pending = $ad_pending++;
			$this->session->unset_userdata('ad_pending');
			$this->session->set_userdata('ad_pending',$ad_pending);
		}
		else if($this->input->post('ad_status') == 4){
			$ad_reject = $ad_reject++;
			$this->session->unset_userdata('ad_reject');
			$this->session->set_userdata('ad_reject',$ad_reject);
		}
		else if($this->input->post('ad_status') == 0){
			$new = $new++;
			$this->session->unset_userdata('new');
			$this->session->set_userdata('new',$new);
		}
		*/
		//exit;
		$this->db->select();
			$this->db->where('u_pkg_id',$this->input->post('urg_type'));
			$this->db->from('urgent_pkg_label');
			$urg_pkg_details = $this->db->get()->row();
			
		
			$this->db->select();
			$this->db->where('pkg_dur_id',$this->input->post('pkg_type'));
			$this->db->from('pkg_duration_list');
			$pkg_details = $this->db->get()->row();
			
			$date = date('Y-m-d H:i:s');
		if($this->input->post('urg_type') != ''){
			
			$urg_type=array(
						'ad_id'			=>	$this->input->post('ad_id'),
						'valid_from'	=>	$date,
						'valid_to'		=>	date('Y-m-d H:i:s', strtotime($date. ' + '.$urg_pkg_details->u_pkg_days.' day')),
						'no_ofdays'		=>	$urg_pkg_details->u_pkg_days,
						'status'		=>	1,
					);
			
			$this->db->insert('urgent_details',$urg_type);
		}
			
		$data=array(
			'approved_by'		=>	$this->session->userdata('login_id'),
			'approved_on'		=>	$date,
			'expire_data'		=>	date('Y-m-d H:i:s', strtotime($date. ' + '.$pkg_details->dur_days.' day')),
			'package_type'		=>	$this->input->post('pkg_type'),
			'web_link'			=>	$this->input->post('pkg_web_link'),
			'category_id'		=>	$this->input->post('cat_type'),
			'urgent_package'	=>	$this->input->post('urg_type'),
			'deal_desc'			=>	$this->input->post('pkg_desc'),
			'ad_status'			=>	$this->input->post('ad_status'),
			'service_type'		=>	$this->input->post('service_type'),
			'admin_comment'		=>	$admin_comment
		);
		$this->db->where('ad_id', $this->input->post('ad_id'));
		$update_status = $this->db->update('postad', $data);
		//$this->db->last_query();
		//exit;
		return $update_status;
	}
	function get_ListAds(){
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_status.status_name');
			if($this->uri->segment(3)){
				$ad_type = $this->uri->segment(3);
				if($ad_type == 'platinum'){
					$this->db->where('p_add.package_type','3');
				}else if($ad_type == 'gold'){
					$this->db->where('p_add.package_type','2');
				}else{
					$this->db->where('p_add.package_type','1');
				}
			}
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('ad_status as a_status','a_status.id = p_add.ad_status','inner');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			//$this->db->order_by('p_add.updated_on', 'desc');
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data);echo '</pre>';exit;
			return $data;
		}
	}
	function get_ads($ads_type){
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*');
		$this->db->where('p_add.ad_status',$ads_type);
		$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
		//$this->db->order_by('p_add.updated_on', 'desc');
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		echo $this->db->last_query();exit;
		return $data;
	}
	function change_ads_status(){
		//echo '<pre>';print_r($this->input->post());echo '</pre>';
		$post_ids=explode(',',rtrim($this->input->post('selected_ads'),','));
		//echo '<pre>';print_r($post_ids);echo '</pre>';
		$this->db->set('ad_status',$this->input->post('change_status'));
		$this->db->where_in('ad_id',$post_ids);
		$update_Status = $this->db->update('postad');
		return $update_Status;
	}
	function get_user_ListofAds($u_id){
		$cats = $this->get_assigned_cats();
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.*,pkg_list.pkg_dur_name as pkg_name');
		$this->db->where('p_add.login_id',$u_id);
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
		$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_add.category_id',$cats_list);
		}
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		
		//echo '<pre>';print_r($data);echo '</pre>';
	//	echo '238<br/>'.$this->db->last_query();exit;
		return $data;
	}
	function get_user_details($u_id){
		  //$this->db->select("l.*,p.*,p.login_id as p_login_id,a.login_id as a_login_id,a.*,c.City_name,s.State_name,d.Country_name");
		  $this->db->select('l.user_type,l.login_id,l.bus_addr,l.bus_name,l.login_email,l.login_status,l.first_name,l.lastname');
			$this->db->from("login as l");
			//$this->db->join("profile as p","l.login_id = p.login_id","inner");
			$this->db->where('l.login_id',$u_id);
			//$uq     =     $this->db->get();
			$info = $this->db->get()->row();
			//echo '238<br/>'.$this->db->last_query();exit;
		return $info;
	}
	function getselected_filterads(){
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{		
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			//$this->db->order_by('p_add.updated_on', 'desc');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			if($this->input->post('ad_type') !='')
				$this->db->where('p_add.package_type', $this->input->post('ad_type'));
			if($this->input->post('cat_type') !='')
				$this->db->where('p_add.category_id', $this->input->post('cat_type'));
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			return $data;
		}
	}
	function list_userads(){
		$cats = $this->get_assigned_cats();
		$this->db->select('l.login_id, l.user_type, l.login_email,l.first_name,l.lastname,l.mobile,l.login_status, COUNT(p_ad.login_id) as pkg_count');
		//
		//$this->db->select();
		//$this->db->where('p_ad.login_id',$u_id);
		//$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_ad.package_type','inner');
		//$this->db->join('catergory as cat','cat.category_id = p_ad.category_id','inner');
		
		$this->db->join("postad as p_ad","l.login_id = p_ad.login_id","inner");
		//$this->db->join("profile as p","l.login_id = p.login_id","inner");
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}
		$this->db->where('l.user_type','7');
		$this->db->or_where('l.user_type','6');
		$this->db->group_by('p_ad.login_id'); 
		
		
		$this->db->from('login as l');
		$data = $this->db->get()->result();
		//echo $this->db->last_query();
		//echo '<pre>';print_r($data);echo '</pre>';exit;
		return $data;
	}
	function get_ads_media($ad_id){
		$this->db->select();
		$this->db->where('ad_id',$ad_id);
		$this->db->from('ad_img');
		$data = $this->db->get()->result();
		return $data;
	}
	function get_postad_packages(){
		$this->db->select();
		$this->db->from('pkg_duration_list');
		$data = $this->db->get()->result();
		return $data;
	}
	function get_ads_videos($ad_id){
		$this->db->select();
		$this->db->where('ad_id',$ad_id);
		$this->db->from('videos');
		$data = $this->db->get()->result();
		return $data;
	}
	function change_ad_img_status($img_id,$status){
		$update_status =array(
					'status'	=>	$status);
		$this->db->where('ad_img_id',$img_id);
		$up_status = $this->db->update('ad_img',$update_status);
		return $up_status;
	}
	function change_ad_video_status($v_id,$status){
		$update_status =array(
					'status'	=>	$status);
		$this->db->where('id',$v_id);
		$up_status = $this->db->update('videos',$update_status);
		return $up_status;
	}
	function listAdsbyStatus($ads_type){
		$status_type = $this->uri->segment(3);
		//exit;
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_stat.status_name');
			
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			$this->db->join('ad_status as a_stat','a_stat.id = p_add.ad_status','inner');
			$this->db->where('p_add.ad_status',$status_type);
			$this->db->order_by('p_add.updated_on', 'desc');
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data);echo '</pre>';exit;
			return $data;
		}
	}
	function get_filtered_ads($filter_details){
		//echo '<pre>';print_r($this->input->post());echo '</pre>';exit;
		
		
		
		$status_type = $this->uri->segment(3);
		//exit;
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{
			$this->db->select('p_ad.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name,a_status.status_name');
		$this->db->join('catergory as cat','cat.category_id = p_ad.category_id','inner');
		$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_ad.package_type','inner');
		$this->db->join('ad_status as a_status','a_status.id = p_ad.ad_status','inner');
		//$this->db->order_by('p_ad.updated_on', 'desc');
		if($this->session->userdata('user_type') != 1){
			$cats_list = explode(',',$cats->cat_ids);		
			$this->db->where_in('p_ad.category_id',$cats_list);
		}
		if($filter_details['start_date'] !='')
			$this->db->where('p_ad.created_on >=', date( 'd-m-Y H:i:s',strtotime($filter_details['start_date'])));
		if($filter_details['end_date'] !='')
			$this->db->where('p_ad.created_on <=', date( 'd-m-Y H:i:s',strtotime($filter_details['end_date'])));
		if($filter_details['pkg_type'] != 0 && $filter_details['pkg_type'] !='')
			$this->db->where('p_ad.package_type',$filter_details['pkg_type']);
		if($filter_details['cat_type'] != 0 && $filter_details['cat_type'] != '')
			$this->db->where('p_ad.category_id',$filter_details['cat_type']);
		if($filter_details['ad_status'] != '')
			$this->db->where('p_ad.ad_status',$filter_details['ad_status']);
		if($filter_details['user_type'] != '')
			$this->db->where('p_ad.ad_type',$filter_details['user_type']);
		
			$this->db->order_by('p_ad.updated_on', 'desc');
			$this->db->from('postad as p_ad');
			$data = $this->db->get()->result();
			//echo $this->db->last_query();
			//echo '<pre>';print_r($data);echo '</pre>';exit;
			return $data;
		}
	}
	function ads_by_usertype($user_type){
		if($user_type == 'business')
			$u_type = 'business';
		else $u_type = 'consumer';
		$cats = $this->get_assigned_cats();
		if(empty($cats) && $this->session->userdata('user_type') != 1)
			return array();
		else{		
			$this->db->select('p_add.*,cat.category_id as cat_id, cat.*,pkg_list.pkg_dur_name as pkg_name');
			$this->db->join('catergory as cat','cat.category_id = p_add.category_id','inner');
			$this->db->join('pkg_duration_list as pkg_list','pkg_list.pkg_dur_id = p_add.package_type','inner');
			//$this->db->order_by('p_add.updated_on', 'desc');
			if($this->session->userdata('user_type') != 1){
				$cats_list = explode(',',$cats->cat_ids);		
				$this->db->where_in('p_add.category_id',$cats_list);
			}
			$this->db->where('p_add.ad_type', $u_type);
			$this->db->from('postad as p_add');
			$data = $this->db->get()->result();
			return $data;
		}
	}
	
}
?>