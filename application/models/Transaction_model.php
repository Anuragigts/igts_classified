<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	class Transaction_model extends CI_Model{
		function get_Transactions(){
			$this->db->select();
			$this->db->from('payments');
			$transactions = $this->db->get()->result();
			return $transactions;
		}
	}
?>