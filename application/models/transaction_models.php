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
			$this->db->order_by('p.payment_date','desc');
			$this->db->from('payments p');
			$transactions = $this->db->get()->result();
			// echo $this->db->last_query();exit;
			return $transactions;
		}
	}
?>