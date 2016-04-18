<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Report_model extends CI_Model{
        public function get_list_ads() {
			$start = $this->session->userdata('start_date');
			$end = $this->session->userdata('end_date');
			$this->db->select();
			if($this->session->userdata('cat_type')>0)
				$this->db->where('p_ad.category_id',$this->session->userdata('cat_type'));
			if($this->session->userdata('pkg_type')>0)
				$this->db->where('p_ad.package_type',$this->session->userdata('pkg_type'));
			if($this->session->userdata('start_date')>0)
				$this->db->where('p_ad.created_on >=', date( 'd-m-Y H:i:s',strtotime($start)));
			if($this->session->userdata('end_date')>0)
				$this->db->where('p_ad.created_on <=', date( 'd-m-Y H:i:s',strtotime($end)));
			
			$this->db->join('pkg_duration_list p_list','p_list.pkg_dur_id = p_ad.package_type','inner');
			$this->db->join('login log','log.login_id = p_ad.login_id','inner');
                        $this->db->order_by("p_ad.created_on","DESC");
			$this->db->from('postad p_ad');
			
			$result = $this->db->get()->result();
			return $result;
        }

        public function get_newsletters(){
                $this->db->select();
                $this->db->from("newsletter");
                $this->db->where("status",1);
                $rs = $this->db->get()->result();
                return $rs;
        }
}
?>