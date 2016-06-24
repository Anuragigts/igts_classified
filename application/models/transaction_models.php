<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class Transaction_models extends CI_Model{
		function get_Transactions(){
			$this->db->select('p.*,p_ad.deal_tag,l.first_name,l.lastname,l.login_email,l.login_id');
			$this->db->join('postad as p_ad', "p_ad.ad_id = p.product_id", 'join');
			$this->db->join('login as l', "l.login_id = p_ad.login_id", 'join');
			if ($this->input->post('cat_type') !='') {
				$this->db->where('p_ad.category_id',$this->input->post('cat_type'));
			}
			if ($this->input->post('start_date') !='') {
				$this->db->where('DATE_FORMAT(STR_TO_DATE(p_ad.created_on,"%d-%m-%Y %H:%i:%s"),"%Y-%m-%d %H:%i:%s") >= "'.date("Y-m-d H:i:s", strtotime($this->input->post('start_date'))).'"');
			}
			if ($this->input->post('end_date') !='') {
				$this->db->where('DATE_FORMAT(STR_TO_DATE(p_ad.created_on,"%d-%m-%Y %H:%i:%s"),"%Y-%m-%d %H:%i:%s") <= "'.date("Y-m-d H:i:s", strtotime($this->input->post('end_date'))).'"');
			}
			$this->db->order_by('p.payment_date','desc');
			$this->db->from('payments p');
			$transactions = $this->db->get()->result();
			 // echo $this->db->last_query();exit;
			return $transactions;
		}
		public function adrenewal_lists(){
			$this->db->select("*, ad.ad_id as adid");
			$this->db->join('login as l', "l.login_id = ad.login_id", 'join');
			$this->db->join('adrenewalhistory as adrenewal', "adrenewal.ad_id = ad.ad_id", 'join');
			$this->db->where('adrenewal > 0');
			$this->db->from('postad AS ad');
			$adrenewal = $this->db->get()->result();
			return $adrenewal;
		}
		public function adrenewal_history(){
			$this->db->select("*,(SELECT pkg_dur_name FROM pkg_duration_list WHERE pkg_dur_id= adrenewalhistory.packagefrom) AS pckfrom,
				(SELECT pkg_dur_name FROM pkg_duration_list WHERE pkg_dur_id= adrenewalhistory.packageto) AS pckto,
				(SELECT u_pkg_name FROM urgent_pkg_label WHERE u_pkg_id= adrenewalhistory.urgfrom) as urgfrom,
				(SELECT u_pkg_name FROM urgent_pkg_label WHERE u_pkg_id= adrenewalhistory.urgto) as urgto");
			$this->db->where('ad_id', $this->uri->segment(3));
			$this->db->from('adrenewalhistory');
			$this->db->order_by('updatedon','DESC');
			$adrenewal = $this->db->get()->result();
			// echo $this->db->last_query(); exit;
			return $adrenewal;
		}
	}
?>