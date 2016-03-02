<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Settings_model extends CI_Model{
	public function change(){
		$login  =   $this->session->userdata("login_id");
		$dtr    =   array(
						"login_password"    =>  md5($this->input->post("password"))
				);
		$this->db->update("login",$dtr,array("login_id" => $login));
		if($this->db->affected_rows() > 0){
				return 1;
		}else{
				return 0;
		}
	}
		
	public function get_banners(){
		$this->db->select();
		$this->db->from('publicads_searchview');
		$banners = $this->db->get()->row();
		return $banners;	
	}	
	public function update_banner(){
		$update=array(
			'sidead_one'=>htmlspecialchars($this->input->post('banner_side')),
			'topad'=>htmlspecialchars($this->input->post('banner_top')),
			'mid_ad'=>htmlspecialchars($this->input->post('banner_mid'))
			);
			$this->db->where('id',1);
			$up_status = $this->db->update('publicads_searchview', $update);
			return $up_status;
	}
}
?>