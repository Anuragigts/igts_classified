<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class Coupons_model extends CI_Model{
		function get_coupons(){
			$this->db->select();
			$this->db->from('coupon_codes as cc');
			$this->db->join("login as l","l.login_id = cc.added_by","inner"); 
			$coupon_list = $this->db->get()->result();
			return $coupon_list;
		}
		function get_coupon_details(){
			$c_id = $this->uri->segment(3);
			$this->db->select();
			$this->db->where('c_id',$c_id);
			$this->db->from('coupon_codes');
			$coupon_details = $this->db->get()->row();
			return $coupon_details;
		}
		function add_new_coupon(){
			$c_count = $this->input->post('c_count');
			$c_prefix = $this->input->post('c_prefix');
			//for($i= 0; $i< $c_count; $i++){
				$a = mt_rand(10000,99999); 
				$c_code = strtoupper($c_prefix).$a;
				$coupon_info = array(
								'added_on'				=>	date('Y-m-d H:i:s'),
								'added_by' 				=>	$this->session->userdata('login_id'),
								'c_status'				=>	$this->input->post('c_status'),
								'c_type_percent_cash'	=>	$this->input->post('c_type_percent_cash'),
								'c_value'				=>	$this->input->post('c_value'),
								'max_disc'				=>	$this->input->post('max_disc'),
								'c_code'				=>	$c_code
								);
				$this->db->insert('coupon_codes',$coupon_info);
				echo $this->db->last_query().'<br/>';
			//}
			//exit;
			 if($this->db->affected_rows() > 0){
				 return true;
			 }else
			return false;
		}
		
		function change_status(){
			$c_id = $this->input->post('coupon');
			$status = $this->input->post('status');
			$data = array('c_status' => $status );
			$this->db->where('c_id',$c_id);
			$update_status = $this->db->update('coupon_codes',$data);
			
			return $update_status;
		}
		function get_c_result($c_code){
			$this->db->where('c_code',$c_code);
			$this->db->where('c_status',1);
			$c_info = $this->db->get('coupon_codes')->row();
			//echo $this->db->last_query();
			return $c_info;
		}
		function get_ad_amt($ad_id){
			$this->db->select('u_lab.u_pkg__pound_cost, p_list.cost_pound');
			$this->db->join("pkg_duration_list as p_list","p_list.pkg_dur_id = p_ad.package_type","inner");
			$this->db->join("urgent_pkg_label as u_lab","u_lab.u_pkg_id = p_ad.urgent_package","left");
			$this->db->where('p_ad.ad_id',$ad_id);
			$this->db->group_by("p_ad.ad_id");
			$this->db->from('postad as p_ad');
			$c_info = $this->db->get('coupon_codes')->row();
			// echo $this->db->last_query();exit;
			return $c_info;
		}
	}
?>