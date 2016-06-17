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
			$this->db->select();
			$this->db->join('login as l', "l.login_id = ad.login_id", 'join');
			$this->db->where('adrenewal > 0');
			$this->db->from('postad AS ad');
			$adrenewal = $this->db->get()->result();
			return $adrenewal;
		}
	}
?>