<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class hotdealsearch_model extends CI_Model{
       
        public function hotdeal_search(){
        		$this->db->select("*, COUNT(`img`.`ad_id`) AS img_count");
				$this->db->from("postad as ad");
				$this->db->join('ad_img as img', "img.ad_id = ad.ad_id", 'join');
				$this->db->join('location as loc', "loc.ad_id = ad.ad_id", 'join');
				$this->db->where('ad.category_id', $this->input->post('cat'));
				$this->db->where('ad.ad_type', $this->input->post('bustype'));
				$this->db->where('loc.latt', $this->input->post('latt'));
				$this->db->where('loc.longg', $this->input->post('longg'));
				$this->db->group_by("img.ad_id");
				$this->db->order_by("ad.ad_id", "DESC");
				$res = $this->db->get();
				return $res->result();
        }
}
?>