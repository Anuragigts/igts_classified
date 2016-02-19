<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Ads_model extends CI_Model{
	
	public function get_allpostads(){
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*');
		$this->db->join('catergory as cat','cat.category_id = p_add.sub_cat_id','inner');
		//$this->db->order_by('p_add.updated_on', 'desc');
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		//echo $this->db->last_query();
		return $data;
	}
	public function get_postad($post_add_id){
		$this->db->select();
		$this->db->where('ad_id',$post_add_id);
		$this->db->from('postad');
		$data = $this->db->get()->row();
		return $data;
	}
	public function get_urgent_labelview(){
		$this->db->select();
		$this->db->from('urgent_pkg_label');
		$data = $this->db->get()->result();
		return $data;
	}
	public function update_ad(){
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
		}*/
		//exit;
		$this->db->select();
			$this->db->where('u_pkg_id',$this->input->post('urg_type'));
			$this->db->from('urgent_pkg_label');
			$urg_pkg_details = $this->db->get()->row();
			$date = date('Y-m-d H:i:s');
			
		if($this->input->post('urg_type') != ''){
			$urg_type=array(
						'ad_id'			=>	$this->input->post('ad_id'),
						'valid_from'	=>	$date,
						'valid_to'		=>	date('Y-m-d H:i:s', strtotime($date. ' + '.$urg_pkg_details->u_pkg_days.' day')),
						'no_ofdays'		=>	$urg_pkg_details->u_pkg_days,
						'status'		=>	1,
					);
			echo '<pre>';print_r($urg_type);echo '</pre>';
			$this->db->insert('urgent_details',$urg_type);
		}
		$this->db->select();
		$this->db->where('',$this->input->post('add_type'));
		$this->db->from();
		$this->db->get()->row();
			echo '<pre>';print_r($this->input->post());echo '</pre>';
		$data=array(
			'approved_by'		=>	$this->session->userdata('login_id'),
			'approved_on'		=>	$date,
			'expire_data'		=>	date('Y-m-d H:i:s', strtotime($date. ' + 30 day')),
			'urgent_package'	=>	$this->input->post('urg_type'),
			'ad_status'			=>	$this->input->post('ad_status'),
			'admin_comment'		=>	$admin_comment
		);
		$this->db->where('ad_id', $this->input->post('ad_id'));
		$update_status = $this->db->update('postad', $data);
		$this->db->last_query();
		echo '<pre>';print_r($data);echo '</pre>';
		exit;
		return $update_status;
	}
	function get_ListAds($ads_type){
		$this->db->select('p_add.*,cat.category_id as cat_id, cat.*');
		$this->db->where('p_add.ad_status',$ads_type);
		$this->db->join('catergory as cat','cat.category_id = p_add.sub_cat_id','inner');
		//$this->db->order_by('p_add.updated_on', 'desc');
		$this->db->from('postad as p_add');
		$data = $this->db->get()->result();
		//echo $this->db->last_query();
		return $data;
	}
	
}
?>