<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Reviews_model extends CI_Model{
	public function get_reviews(){
		$this->db->select();
		$this->db->from('review_rating as rr');
		$this->db->join('postad as p','rr.ad_id = p.ad_id','inner');
		$reviews = $this->db->get()->result();
		return $reviews;	
	}
	public function get_reviewByAd(){
		$this->db->select('rr.ad_id as ad_id, count(*) as review_count,p.login_id,p.deal_tag,p.deal_desc,p.ad_status,p.package_type,p.category_id,cat.category_name,pd.pkg_dur_name');
		$this->db->from('review_rating as rr');
		$this->db->group_by('rr.ad_id');
		$this->db->join('postad as p','rr.ad_id = p.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->join('pkg_duration_list as pd','pd.pkg_dur_id = p.package_type','inner');
		$reviews = $this->db->get()->result();
		return $reviews;	
	}
	public function get_Adreview($a_id){
		$this->db->select();
		$this->db->from('review_rating as rr');
		$this->db->join('postad as p','rr.ad_id = p.ad_id','inner');
		$this->db->where('rr.ad_id',$a_id);
		$reviews = $this->db->get()->result();
		return $reviews;
		
		
		/*$this->db->select('rr.ad_id as ad_id, count(*) as review_count,p.login_id,p.deal_tag,p.deal_desc,p.ad_status,p.package_type,p.category_id,cat.category_name,pd.pkg_dur_name');
		$this->db->from('review_rating as rr');
		$this->db->group_by('rr.ad_id');
		$this->db->join('postad as p','rr.ad_id = p.ad_id','inner');
		$this->db->join('catergory as cat','cat.category_id = p.category_id','inner');
		$this->db->join('pkg_duration_list as pd','pd.pkg_dur_id = p.package_type','inner');
		$reviews = $this->db->get()->result();
		return $reviews;	
		*/
	}
	function change_status(){
			$review = $this->input->post('review');
			$status = $this->input->post('status');
			$data = array('status' => $status );
			$this->db->where('id',$review);
			$update_status = $this->db->update('review_rating',$data);
			//echo $this->db->last_query();
			return $update_status;
	}
}
?>